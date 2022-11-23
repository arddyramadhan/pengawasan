<?php

namespace App\Http\Controllers;

use App\Lhp;
use App\User;
use App\Jabatan;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use App\Informasi_awal;
use App\Kabupaten_kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
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
        $data = User::where('id_tingkatan', '>=', Auth::user()->id_tingkatan)->paginate(10);
        return view('user', compact('data'));
    }

    public function kabupaten_index()
    {
        $jabatan = Jabatan::get();
        $data = User::where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->where('level', '!=', 'super')->where('id_tingkatan', Auth::user()->id_tingkatan)->paginate(10);
        return view('pengawas', compact('data', 'jabatan'));
    }

    public function kecamatan_index()
    {
        $jabatan = Jabatan::get();
        $data = User::where('id_kecamatan', Auth::user()->id_kecamatan)->where('id_tingkatan', Auth::user()->id_tingkatan)->paginate(10);
        return view('pengawas_kecamatan', compact('data', 'jabatan'));
    }

    public function create($tingkatan)
    {
        // dd($tingkatan);
        if ($tingkatan == 'Kabupaten') {
            if (Auth::user()->level == 'admin' || Auth::user()->level == 'user') {
                $data = User::where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->where('id_tingkatan', $tingkatan)->get();
            } elseif (Auth::user()->level == 'super') {
            }
        } else {
            # code...
        }
    }

    // ini store untuk tingkatan kabupaten 
    public function store(Request $request, $status)
    {
        // dd($status);
        $foto = $request->file('foto');
        if ($foto) {
            session()->flash('session', 'Img');
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg'
            ]);
        }
        session()->flash('session', 'Kosong');

        if ($status == 'kabupaten') {
            $data = $request->validate([
                'name' => 'required',
                'id_jabatan' => 'required',
                'email' => 'required',
                'password' => 'required',
                'level' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            $data['password'] = bcrypt(Request('password'));
            $data['id_tingkatan'] = Auth::user()->id_tingkatan;
            $data['id_kabupaten_kota'] = Auth::user()->id_kabupaten_kota;
            $data['id_kecamatan'] = Auth::user()->id_kecamatan;
            $data['id_kelurahan'] = Auth::user()->id_kelurahan;
            if ($foto) {
                $foto_store = $foto->store('img/foto');
                $data['foto'] = $foto_store;
            }
            session()->flash('session', 'Berhasil');
            User::create($data);
            return back();
        } elseif ($status == 'kecamatan') {
            $data = $request->validate([
                'name' => 'required',
                'id_jabatan' => 'required',
                'email' => 'required',
                'password' => 'required',
                'level' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            $data['password'] = bcrypt(Request('password'));
            $data['id_tingkatan'] = 2;
            $data['id_kabupaten_kota'] = Auth::user()->id_kabupaten_kota;
            $data['id_kecamatan'] = Request('id_kecamatan');
            $data['id_kelurahan'] = Auth::user()->id_kelurahan;
            if ($foto) {
                $foto_store = $foto->store('img/foto');
                $data['foto'] = $foto_store;
            }
            session()->flash('session', 'Berhasil');
            User::create($data);
            return back();
        }
    }

    // ini untuk store admin tingkat kecamatan
    public function store_kecamatan(Request $request, $status)
    {
        // dd($status);
        $foto = $request->file('foto');
        if ($foto) {
            session()->flash('session', 'Img');
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg'
            ]);
        }
        session()->flash('session', 'Kosong');

        if ($status == 'kecamatan') {
            $data = $request->validate([
                'name' => 'required',
                'id_jabatan' => 'required',
                'email' => 'required',
                'password' => 'required',
                'level' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            $data['password'] = bcrypt(Request('password'));
            $data['id_tingkatan'] = Auth::user()->id_tingkatan;
            $data['id_kabupaten_kota'] = Auth::user()->id_kabupaten_kota;
            $data['id_kecamatan'] = Auth::user()->id_kecamatan;
            $data['id_kelurahan'] = Auth::user()->id_kelurahan;
            if ($foto) {
                $foto_store = $foto->store('img/foto');
                $data['foto'] = $foto_store;
            }
            session()->flash('session', 'Berhasil');
            User::create($data);
            return back();
        } elseif ($status == 'kelurahan') {
            $data = $request->validate([
                'name' => 'required',
                'id_jabatan' => 'required',
                'email' => 'required',
                'password' => 'required',
                'level' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            $data['password'] = bcrypt(Request('password'));
            $data['id_tingkatan'] = 3;
            $data['id_kabupaten_kota'] = Auth::user()->id_kabupaten_kota;
            $data['id_kecamatan'] = Auth::user()->id_kecamatan;
            $data['id_kelurahan'] = Request('id_kelurahan');
            if ($foto) {
                $foto_store = $foto->store('img/foto');
                $data['foto'] = $foto_store;
            }
            session()->flash('session', 'Berhasil');
            User::create($data);
            return back();
        } elseif ($status == 'tps') {
            $data = $request->validate([
                'name' => 'required',
                'id_jabatan' => 'required',
                'email' => 'required',
                'password' => 'required',
                'level' => 'required',
                'jk' => 'required',
                'alamat' => 'required',
                'tlp' => 'required',
            ]);
            $data['password'] = bcrypt(Request('password'));
            $data['id_tingkatan'] = 4;
            $data['id_kabupaten_kota'] = Auth::user()->id_kabupaten_kota;
            $data['id_kecamatan'] = Auth::user()->id_kecamatan;
            $data['id_kelurahan'] = Request('id_kelurahan');
            if ($foto) {
                $foto_store = $foto->store('img/foto');
                $data['foto'] = $foto_store;
            }
            session()->flash('session', 'Berhasil');
            User::create($data);
            return back();
        }
    }

    // untuk admin tingkat kabupaten
    public function table_index($status, $id)
    {
        $jabatan = Jabatan::get();
        // tapilan tabel for user kabupaten
        if (Auth::user()->id_tingkatan == 1) {
            $kec_kel = Kecamatan::find($id);
            if ($status == 'kecamatan') {
                $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 2)->get();
            } elseif ($status == 'kelurahan') {
                $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 3)->get();
            } elseif ($status == 'tps') {
                $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 4)->get();
            }
        }
        // untuk user kecamatan
        else if (Auth::user()->id_tingkatan == 2) {
            $kec_kel = Kelurahan::find($id);
            if ($status == 'kecamatan') {
                $data = User::where('id_kecamatan', $id)->get();
            } elseif ($status == 'kelurahan') {
                $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 3)->get();
            } elseif ($status == 'tps') {
                $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 4)->get();
            }
        }

        return view('pengawa_table', compact('data', 'status', 'id', 'kec_kel', 'jabatan'));
    }
    // untuk admin tingkat kecamatan
    public function table_index_kecamatan($status, $id)
    {
        // dd('coab');
        $jabatan = Jabatan::get();
        $kec_kel = Kelurahan::find($id);
        if ($status == 'kecamatan') {
            $data = User::where('id_kecamatan', $id)->get();
        } elseif ($status == 'kelurahan') {
            $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 3)->get();
        } elseif ($status == 'tps') {
            $data = User::where('id_kecamatan', $id)->where('id_tingkatan', 4)->get();
        }
        return view('pengawas_table_kecamatan', compact('data', 'status', 'id', 'kec_kel', 'jabatan'));
    }

    public function show(User $user)
    {

        // dd('angsdfsd');
        $jabatan = Jabatan::get();
        $data = Informasi_awal::where('id_user', $user->id)->orderByDesc('updated_at')->paginate(10);
        $lengkapi = Informasi_awal::where('id_user', Auth::user()->id)->where('status', 'lengkapi')->orderByDesc('created_at')->get();
        $buat_tim = Informasi_awal::where('id_user', Auth::user()->id)->where('status', 'buat_tim')->orderByDesc('created_at')->get();
        $lhp = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
            ->where('id_user', $user->id)
            ->select('lhp.*', 'users.id_tingkatan', 'users.id_kecamatan')
            ->orderByDesc('lhp.created_at')->paginate();

        return view('pengawas_detail', compact('data', 'lengkapi', 'buat_tim', 'user', 'lhp', 'jabatan'));
    }

    public function edit(User $user)
    {

    }

    public function update(Request $request, User $user)
    {
        $foto = $request->file('foto');
        if ($foto) {
            session()->flash('session', 'Img');
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg'
            ]);
        }
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'tlp' => 'required',
        ]);
        if (Auth::user()->level == 'admin') {
            $data['id_jabatan'] = $request->id_jabatan;
            $data['level'] = $request->level;
        }

        if ($request->password != null) {
            $data['password'] = bcrypt($request->password);
        }
        if ($foto) {
            Storage::delete($user->foto);
            $foto_store = $foto->store('img/foto');
            $data['foto'] = $foto_store;
        }
        session()->flash('session', 'Disimpan');
        $user->update($data);
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
