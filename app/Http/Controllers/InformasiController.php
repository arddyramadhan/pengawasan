<?php

namespace App\Http\Controllers;

use App\Alihkan;
use App\User;
use App\Pengawas;
use App\Informasi;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use App\Informasi_awal;
use App\Mail\SendAlihkan;
use App\Mail\SendAlihkanPengawas;
use App\Mail\SendMasyarakatUcapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Null_;

class InformasiController extends Controller
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
		// $data = Informasi::where('YEAR(tgl)', date('Y'))->groupBy('MONTH(tgl)')->get();
		// where('created_at', '>=', 'DATE_ADD("created_at", INTERVAL 7 DAY)')->orderByDesc('created_at')->paginate(10);
		$data = Informasi::orderByDesc('created_at')->paginate(10);
		$data_antrian = Informasi::orderByDesc('created_at')->get();
		return view('informasi_masyarakat', compact('data', 'data_antrian'));
	}
	public function index_status($sts)
	{
		// $data = Informasi::where('YEAR(tgl)', date('Y'))->groupBy('MONTH(tgl)')->get();
		$data = Informasi::where('status', $sts)->orderByDesc('created_at')->paginate(10);
		$data_antrian = Informasi::orderByDesc('created_at')->get();
		// $informasi_awal= Informasi_awal::get();

		// dd($data);
		return view('informasi_masyarakat', compact('data', 'data_antrian'));
	}

	public function create()
	{
		return view('form_masyarakat');
	}
    
	public function store(Request $request)
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
		$data['email'] = $request->email;
		$data['status'] = 'antrian';
		$data['tgl'] = date(now());
		$info = Informasi::create($data);
        
        if ($request->email) {
            Mail::to($info->email)->send(new SendMasyarakatUcapan($info));
        }
		session()->flash('session', 'Laporan_proses');
		return back();
	}

	public function show(Informasi $informasi)
	{
		$user = User::where('level', 'user')->get();
		$alih = Kecamatan::where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->get();
		$status = 'dibaca';
		$data = request()->all();
		if ($informasi['status']  == 'antrian') {
			$data['status'] = $status;
			$informasi->update($data);
		}
		return view('detail_laporan_masyarakat', compact('informasi', 'user', 'alih'));
	}


	public function alihkan(Request $request, Informasi $informasi)
	{
		session()->flash('session', 'Kosong');
		$data = $request->validate([
			'id_kecamatan' => 'required'
		]);
		$data['id_user'] = Auth::user()->id;
		$data['id_informasi'] = $informasi->id;
		$alihkan = Alihkan::create($data);
		$informasi->update(['status' => 'alihkan']);
        Mail::to($alihkan->kecamatan->email)->send(new SendAlihkan($alihkan));
		session()->flash('session', 'Teruskan');
		return back();
	}

	public function update(Request $request, Informasi $informasi)
	{
		//
	}

	public function destroy(Informasi $informasi)
	{
		//
	}

	public function updtstatus(Informasi $informasi, $sts)
	{
		$alih = Kecamatan::where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->get();
		$user = User::where('level', 'user')->get();
		if ($sts == 1) {
			$status = 'dibaca';
			$data = request()->all();
			if ($informasi['status']  == 'antrian') {
				$data['status'] = $status;
				$informasi->update($data);
			}
		} elseif ($sts == 2) {
			$status = 'ditangani';
			$data = request()->all();
			session()->flash('session', 'Kosong');
			$forma6 = request()->validate([
				'id_user' => 'required'
			]);
			if (($informasi['status']  == 'dibaca') || ($informasi['status']  == 'alihkan')) {
				$data['status'] = $status;
				$informasi->update($data);
			}
			$forma6['id_informasi'] = $informasi['id'];
			$forma6['status'] = 'lengkapi';
			$alihkan= Informasi_awal::create($forma6);
            Mail::to($alihkan->user->email)->send(new SendAlihkanPengawas($alihkan));
			session()->flash('session', 'Teruskan');
		} elseif ($sts == 3) {
			$status = 'diproses';
			$data = request()->all();
			if ($informasi['status']  == 'ditangani') {
				$data['status'] = $status;
				$informasi->update($data);
			}
			// return view('detail_laporan_masyarakat', compact('informasi', 'user'));
		} else {
			$status = 'Ditolak';
		}
		return view('detail_laporan_masyarakat', compact('informasi', 'user', 'alih'));
	}
}
