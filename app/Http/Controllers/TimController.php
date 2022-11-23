<?php

namespace App\Http\Controllers;

use App\Tim;
use App\User;
use App\Tim_user;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use App\Berita_acara;
use App\Informasi_awal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class TimController extends Controller
{
    public function __construct()
    {

        // $tingkatan = Tingkatan::get();
        // View::share('side_tingkatan', $tingkatan);
        $this->middleware('auth');
        $kecamatan_side = Kecamatan::get();
        View::share('kecamatan_side', $kecamatan_side);
        $kelurahan_side = Kelurahan::get();
        View::share('kelurahan_side', $kelurahan_side);
    }

    public function index()
    {
        // dd('coba');
        $data = Tim::orderBy('created_at', 'desc')->get();
        return view('tim', compact('data'));
    }

    public function index_status($sts)
    {
        // dd('coba');
        if (Auth::user()->id_tingkatan == 1) {
            $data = Tim::join('users', 'tim.id_user', '=', 'users.id')
                ->where('users.id_tingkatan', 1)
                ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                ->select('tim.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                ->where('status', $sts)
                ->orderBy('created_at', 'desc')->get();
        } elseif (Auth::user()->id_tingkatan >= 2) {
            $data = Tim::join('users', 'tim.id_user', '=', 'users.id')
                ->where('users.id_tingkatan', 2)
                ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                ->select('tim.*', 'users.id_tingkatan', 'users.id_kecamatan')
                ->where('status', $sts)
                ->orderBy('created_at', 'desc')->get();
        }

        if ($sts == 'penelusuran') {
            // dd($data);
            return view('tim', compact('sts', 'data'));
        } elseif ($sts == 'pengawasan') {
            if (Auth::user()->id_tingkatan == 2) {
                $user_anggota = User::where('id_tingkatan', '>=', 2)->get();
            } else {
                $user_anggota = User::where('id_tingkatan', 1)->get();
            }
            return view('tim_pengawasan', compact('user_anggota', 'sts', 'data'));
        }
    }

    public function index_status_kec($sts)
    {
        // dd($sts);
        $data = Tim::where('status', $sts)->orderBy('created_at', 'desc')->get();

        if ($sts == 'penelusuran') {
            return view('tim_penelusuran_kecamatan', compact('sts', 'data'));
        } elseif ($sts == 'pengawasan') {
            $user = User::get();
            return view('tim_pengawasan_kecamatan', compact('user', 'sts', 'data'));
        }
    }

    public function addpengawasan(Request $req)
    {
        $file_st_ketua = request()->file('file_st_ketua');
        $file_st_sekretaris = request()->file('file_st_sekretaris');
        if ($file_st_ketua) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_st_ketua' => 'mimes:pdf|max:2024'
            ]);
        }
        if ($file_st_sekretaris) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_st_sekretaris' => 'mimes:pdf|max:2024'
            ]);
        }

        session()->flash('session', 'Kosong');
        $data = $req->validate([
            'nama' => 'required',
            'mulai' => 'required',
        ]);
        $data['status'] = 'pengawasan';
        $data['id_user'] = Auth::user()->id;
        $data['st_ketua'] = request('st_ketua');
        $data['st_sekretaris'] = request('st_sekretaris');
        $data['selesai'] = request('selesai');
        if ($file_st_ketua) {
            $st_ketua = $file_st_ketua->store("file/st_ketua");
            $data['file_st_ketua'] = $st_ketua;
        }
        if ($file_st_sekretaris) {
            $st_sekretaris = $file_st_sekretaris->store("file/st_sekretaris");
            $data['file_st_sekretaris'] = $st_sekretaris;
        }
        $tim = Tim::create($data);
        $tim->users()->attach(request('anggota'));
        session()->flash('session', 'Tim_pengawasan_dibuat');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function show(Tim $tim)
    {
        // dd('aaa');
        if (Auth::user()->id_tingkatan == 2) {
            $user_anggota = User::where('id_tingkatan', '>=', 2)->get();
        } else {
            $user_anggota = User::where('id_tingkatan', 1)->get();
        }
        $data = Berita_acara::where('id_tim', $tim['id'])->get();
        return view('tim_detail', compact('tim', 'data', 'user_anggota'));
    }

    public function show_pengawasan(Tim $tim)
    {
        if (Auth::user()->id_tingkatan == 2) {
            $user_anggota = User::where('id_tingkatan', '>=', 2)->get();
        } else {
            $user_anggota = User::where('id_tingkatan', 1)->get();
        }
        $data = Berita_acara::where('id_tim', $tim['id'])->get();
        return view('tim_pengawasan_detail', compact('tim', 'data', 'user_anggota'));
    }

    
    public function set_ketua(Request $req, Tim $tim)
    {
        $data = request()->validate([
            'id_user' => 'required'
        ]);
        // ketua
        $update = Tim_user::where('id_tim', $tim->id)->where('id_user', $data['id_user'])->first();
        $data_update['status'] = 'ketua';
        $update->update($data_update);

        //update kembali untuk anggota
        $update_anggota = Tim_user::where('id_tim', $tim->id)->where('id_user', '<>', $data['id_user'])->get();
        // dd($update_anggota);
        foreach ($update_anggota as $item) {
            $item->update(['status' => 'anggota']);
        };

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req, Tim $tim)
    {
        // dd('jalan');
        $file_sk = request()->file('file_sk');
        $file_st_ketua = request()->file('file_st_ketua');
        $file_st_sekretaris = request()->file('file_st_sekretaris');

        if ($file_sk) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_sk' => 'mimes:pdf|max:2024',
            ]);
        }

        if ($file_st_ketua) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_st_ketua' => 'mimes:pdf|max:2024'
            ]);
        }
        if ($file_st_sekretaris) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_st_sekretaris' => 'mimes:pdf|max:2024'
            ]);
        }

        session()->flash('session', 'Kosong');
        $data = $req->validate([
            'nama' => 'required',
            'mulai' => 'required',
        ]);
        // $data = $req->all();
        $data['no_sk'] = request('no_sk');
        $data['st_ketua'] = request('st_ketua');
        $data['st_sekretaris'] = request('st_sekretaris');
        $data['selesai'] = request('selesai');
        if ($file_sk) {
            Storage::delete($tim->file_sk);
            $sk = $file_sk->store("file/sk");
            $data['file_sk'] = $sk;
        }
        if ($file_st_ketua) {
            Storage::delete($tim->file_st_ketua);
            $st_ketua = $file_st_ketua->store("file/st_ketua");
            $data['file_st_ketua'] = $st_ketua;
        }
        if ($file_st_sekretaris) {
            Storage::delete($tim->file_st_sekretaris);
            $st_sekretaris = $file_st_sekretaris->store("file/st_sekretaris");
            $data['file_st_sekretaris'] = $st_sekretaris;
        }

        $tim->update($data);
        $tim->users()->sync(request('anggota'));
        session()->flash('session', 'Diubah');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tim $tim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tim  $tim
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tim $tim)
    {
        //
    }
}
