<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class KelurahanController extends Controller
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
        $kecamatan = Kecamatan::get();
        if (Auth::user()->id_tingkatan == 2) {
            $data = Kelurahan::where('id_kecamatan', Auth::user()->id_kecamatan)->paginate(10);
        } elseif (Auth::user()->id_tingkatan == 1) {
            $data = Kelurahan::paginate(10);
        }
        return view('kelurahan', compact('data', 'kecamatan'));
    }

    
    public function create(Request $request)
    {
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'nama' => 'required',
            'id_kecamatan' => 'required',
            'status' => 'required',
        ]);
        Kelurahan::create($data);
        session()->flash('session', 'Disimpan');
        return back();
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    public function edit(Kelurahan $kelurahan)
    {
        //
    }


    public function update(Request $request, Kelurahan $kelurahan)
    {
        //
    }


    public function destroy(Kelurahan $kelurahan)
    {
        //
    }
}
