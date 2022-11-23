<?php

namespace App\Http\Controllers;

use App\Lhp;
use App\Tim;
use App\Informasi;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use App\Informasi_awal;
use App\Kabupaten_kota;
use App\Tim_user;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $kabupaten = Kabupaten_kota::get();
        if (Auth::user()->level == 'admin') {
            $data = Kecamatan::where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->paginate(10);
        } else {
            $data = Kecamatan::paginate(10);
        }
        return view('kecamatan', compact('data', 'kabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'nama' => 'required',
            'id_kabupaten_kota' => 'required'
        ]);
        Kecamatan::create($data);
        session()->flash('session', 'Disimpan');
        return back();
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
     * @param  \App\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        return view('kecamatan_edit', compact('kecamatan'));
    }

    public function detail(Kecamatan $kecamatan)
    {
        $tot_pengawas = User::where('id_kecamatan', $kecamatan->id)->count();
        $tot_ia = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->whereYear('informasi_awal.created_at', '=', date('Y'))
            ->count();
        $tot_lhp = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->count();
        $tot_tim = Tim::join('users', 'tim.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->whereYear('tim.created_at', '=', date('Y'))
            ->count();
        $lhp_ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->where('dugaan', 'ada')
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->count();
        $lhp_tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->where('dugaan', 'tidak')
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->count();
        $lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->where('dugaan', 'pleno')
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->count();
        $lhp_belum = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->where('dugaan', 'belum')
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->count();
        $dugaan = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
            ->groupBy('bulan')
            ->orderBy('lhp.created_at')
            ->get();
        $ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->where('dugaan', 'ada')
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
            ->groupBy('bulan')
            ->orderBy('lhp.created_at')
            ->get();
        $tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->where('dugaan', 'tidak')
            ->whereYear('lhp.created_at', '=', date('Y'))
            ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
            ->groupBy('bulan')
            ->orderBy('lhp.created_at')
            ->get();

        $informasi_awal = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)->orderByDesc('updated_at')->paginate(10);

        $lhp = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->select('lhp.*', 'users.id_tingkatan', 'users.id_kecamatan')
            ->orderByDesc('lhp.created_at')->paginate(10);

        $user = Tim::join('users', 'tim.id_user', '=', 'users.id')
            ->where('users.id_kecamatan', $kecamatan->id)
            ->select('tim.*')
            ->orderByDesc('created_at')->paginate(10);

        return view('kecamatans_detail', compact('user','lhp','informasi_awal','kecamatan', 'dugaan', 'tidak', 'ada', 'tot_pengawas', 'tot_ia', 'tot_lhp', 'tot_tim', 'lhp_ada', 'lhp_tidak', 'lhp_pleno', 'lhp_belum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {

        if (request()->file('img_kop')) {
            session()->flash('session', 'Img');
            $data = $request->validate([
                'img_kop' => 'image|mimes:png,jpg,jpeg'
            ]);
        }
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'almt_kecamatan' => 'required',
            'almt_kel_des' => 'required',
            'almt_jalan' => 'required',
        ]);
        if (request()->file('img_kop')) {
            Storage::delete($kecamatan->img_kop);
            $img_kop = request()->file('img_kop');
            $img = $img_kop->store("kop/kecamatan");
            $data['img_kop'] = $img;
        }
        $kecamatan->update($data);
        session()->flash('session', 'Laporan_proses');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        //
    }
}
