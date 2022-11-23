<?php

namespace App\Http\Controllers;

use App\Kecamatan;
// use Barryvdh\DomPDF\PDF;
use App\Kelurahan;
// use Barryvdh\DomPDF\PDF;
use App\Tingkatan;
use App\Berita_acara;
use App\Berita_acara_detail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BeritaAcaraController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(date(now()));
        $data = $request->validate([
            'id_tim' => 'required',
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'tinggal' => 'required',
            'tgl_lahir' => 'required',
            'lokasi_wawancara' => 'required',
            'terkait' => 'required'
        ]);
        $data['selesai'] = date(now());
        $data['id_user'] = Auth::user()->id;
        Berita_acara::create($data);
        return back();
    }

    public function add_pertanyaan(Request $request, $id)
    {
        $data = request()->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'status' => 'required'
        ]);
        $data['id_berita_acara'] = $id;
        Berita_acara_detail::create($data);

        if (request('selesai') == 'iya') {
            $ba = Berita_acara::where('id', $id);
            $update_ba['selesai'] = date(now());
            $ba->update($update_ba);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita_acara  $berita_acara
     * @return \Illuminate\Http\Response
     */
    public function show(Berita_acara $berita_acara)
    {
        $detail = Berita_acara_detail::where('id_berita_acara', $berita_acara['id'])->get();
        return view('berita_acara_detail', compact('berita_acara', 'detail'));
    }

    public function preview(Berita_acara $berita_acara , $status)
    {

        $detail = Berita_acara_detail::where('id_berita_acara', $berita_acara['id'])->get();

        // view()->share('detail', $detail);
        // view()->share('berita_acara', $berita_acara);
        // $pdf = PDF::loadView('berita_acara_detail_print');
        // $pdf = PDF::loadView('berita_acara_detail_print', compact('berita_acara', 'detail'));
        
        if ($status=='print') {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('template_print', compact('berita_acara', 'detail'))->setPaper('a4', 'potrait');
            return $pdf->stream();
        }elseif($status == 'download'){
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('template_print', compact('berita_acara', 'detail'))->setPaper('a4', 'potrait');
            return $pdf->download('ba.pdf');
        }else{
            return view('template_print', compact('berita_acara', 'detail'));
        }
        



    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita_acara  $berita_acara
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,Berita_acara $berita_acara)
    {
        session()->flash('session', 'kosong');
        $data = $request->validate([
            // 'id_tim' => 'required',
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'pekerjaan' => 'required',
            'agama' => 'required',
            'tinggal' => 'required',
            'tgl_lahir' => 'required',
            'lokasi_wawancara' => 'required',
            'terkait' => 'required'
        ]);
        // $data['selesai'] = date(now());
        // $data['id_user'] = Auth::user()->id;
        session()->flash('session', 'Diubah');
        $berita_acara->update($data);
        return back();   
    }
    public function edit_pertanyaan(Request $request ,Berita_acara_detail $berita_acara_detail)
    {
        session()->flash('session', 'kosong');
        $data = $request->validate([
            // 'id_tim' => 'required',
            'pertanyaan' => 'required',
            'jawaban' => 'required'
        ]);
        session()->flash('session', 'Diubah');
        $berita_acara_detail->update($data);
        return back();   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita_acara  $berita_acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita_acara $berita_acara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita_acara  $berita_acara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita_acara $berita_acara)
    {
        //
    }
}
