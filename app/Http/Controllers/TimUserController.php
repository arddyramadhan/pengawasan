<?php

namespace App\Http\Controllers;

use App\Tim_user;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TimUserController extends Controller
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
        //
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
     * @param  \App\Tim_user  $tim_user
     * @return \Illuminate\Http\Response
     */
    public function show(Tim_user $tim_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tim_user  $tim_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Tim_user $tim_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tim_user  $tim_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tim_user $tim_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tim_user  $tim_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tim_user $tim_user)
    {
        //
    }
}
