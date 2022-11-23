<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use App\Kabupaten_kota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class KabupatenKotaController extends Controller
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
        $data = Kabupaten_kota::paginate(10);
        return view('kabupaten', compact('data'));
    }

    
    public function create(Request $request)
    {
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'nama' => 'required',
            'status' => 'required'
        ]);

        Kabupaten_kota::create($data);
        session()->flash('session', 'Disimpan');
        return back();
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Kabupaten_kota $kabupaten_kota)
    {
        // dd($kabupaten_kota);
        return view('kabupaten_edit', compact('kabupaten_kota') );
    }

    
    public function edit(Request $request, Kabupaten_kota $kabupaten_kota)
    {
        
    }

    public function update(Request $request, Kabupaten_kota $kabupaten_kota)
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
            'almt_kecamatan' => 'required',
            'almt_kel_des' => 'required',
            'almt_jalan' => 'required',
        ]);
        if (request()->file('img_kop')) {
            Storage::delete($kabupaten_kota->img_kop);
            $img_kop = request()->file('img_kop');
            $img = $img_kop->store("kop/kabupaten");
            $data['img_kop'] = $img;
        }
        $data['status'] = $request->status;

        $kabupaten_kota->update($data);
        session()->flash('session', 'Laporan_proses');
        return back();
    }

    
    public function destroy(Kabupaten_kota $kabupaten_kota)
    {
        //
    }
}
