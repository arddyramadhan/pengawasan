<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TingkatanController extends Controller
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
        $data = Tingkatan::get();
        return view('tingkatan', compact('data'));
    }

    public function simpan()
    {
        $data = request()->validate([
            'nm_tingkatan' => 'required',
            'lainnya' => 'required',
            'status' => 'required'
        ]);
        Tingkatan::create($data);
        return back();
    }

    public function update(Request $request, Tingkatan $tingkatan)
    {
        // $reque = request();
        // dd(request('lainnya'));
        $data = request()->validate([
            // 'nm_tingkatan' => 'required',
            'lainnya' => 'required',
            'status' => 'required'
        ]);
        $tingkatan->update($data);
        return back();
    }

    public function hapus(Tingkatan $tingkatan)
    {
        $tingkatan->delete();
        return back();
    }
}
