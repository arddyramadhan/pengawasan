<?php

namespace App\Http\Controllers;

use App\Pengawas;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PengawasController extends Controller
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
        $data = Pengawas::get();
        return view('pengawas', compact('data'));
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
     * @param  \App\Pengawas  $pengawas
     * @return \Illuminate\Http\Response
     */
    public function show(Pengawas $pengawas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengawas  $pengawas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengawas $pengawas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengawas  $pengawas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengawas $pengawas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengawas  $pengawas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengawas $pengawas)
    {
        //
    }
}
