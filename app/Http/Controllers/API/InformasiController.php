<?php

namespace App\Http\Controllers\API;

use App\Informasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMasyarakatUcapan;
use Illuminate\Support\Facades\Mail;

class InformasiController extends Controller
{

    public function create()
	{
		return view('form_masyarakat2');
	}

     public function store(Request $request){
		$data = $request->validate([
			'nama' => 'required',
			// 'ktp' => 'required',
			'telp' => 'required',
			'alamat' => 'required',
			'deskripsi' => 'required',
			'img_bukti' => 'image|mimes:png,jpg,jpeg'
		]);

		// $data['deskripsi'] = implode(',', $request->deskripsi);
		$data['ktp'] = $request->ktp;

		if (request()->file('img_bukti')) {
			$img_bukti = request()->file('img_bukti');
			$img = $img_bukti->store("img/masyarakat");
			$data['img_bukti'] = $img;
		} else {
			$data['img_bukti'] = request()->file('img_bukti');
		}
        
        $data['email'] = $request->email;
		$data['status'] = 'antrian';
		$data['tgl'] = date(now());
		$info =Informasi::create($data);
        if ($request->email) {
            Mail::to($info->email)->send(new SendMasyarakatUcapan($info));
        }
        session()->flash('session', 'Laporan_proses');
        return "<h1>Terima Kasih! Telah Melaporankan Dugaan Pelanggaran</h1>";
    }

    public function store2(Request $request)
	{
		if (request()->file('img_bukti')) {
			session()->flash('session', 'Img');
			$data = $request->validate([
				'img_bukti' => 'image|mimes:png,jpg,jpeg'
			]);
		}
		session()->flash('session', 'Kosong');
		$data = $request->validate([
			'nama' => 'required',
			// 'ktp' => 'required',
			'telp' => 'required',
			'alamat' => 'required',
			'deskripsi' => 'required',
			'img_bukti' => 'image|mimes:png,jpg,jpeg'
		]);

		// $data['deskripsi'] = implode(',', $request->deskripsi);
		$data['ktp'] = $request->ktp;

		if (request()->file('img_bukti')) {
			$img_bukti = request()->file('img_bukti');
			$img = $img_bukti->store("img/masyarakat");
			$data['img_bukti'] = $img;
		} else {
			$data['img_bukti'] = request()->file('img_bukti');
		}
		$data['saksi1'] = $request->saksi1;
		$data['alamat1'] = $request->alamat1;
		$data['saksi2'] = $request->saksi2;
		$data['alamat2'] = $request->alamat2;
		$data['status'] = 'antrian';
		$data['tgl'] = date(now());
		Informasi::create($data);
		session()->flash('session', 'Laporan_proses');
		return back();
	}
}
