<?php

namespace App\Http\Controllers;

use App\Alihkan;
use App\Tim;
use App\User;
use App\Informasi;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use App\Informasi_awal;
use App\Informasi_awal_bukti;
use App\Mail\SendBuatTimPenelusuran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class InformasiAwalController extends Controller
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
    

    // semua informasi awal
    public function index()
    {
        // tingkat kabupaten
        $data_antrian = Informasi::orderByDesc('created_at')->get();
        if (Auth::user()->id_tingkatan == 1) {
            if ((Auth::user()->level == 'admin') || (Auth::user()->id_jabatan <= 2)) {
                $data = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', 1)
                    ->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('created_at')->paginate(10);
                $lengkapi = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', 1)
                    ->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->where('status', 'lengkapi')
                    ->orderByDesc('created_at')->get();
                $buat_tim = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', 1)
                    ->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->where('status', 'buat_tim')
                    ->orderByDesc('created_at')->get();
                $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
                ->select('informasi.*')->where('informasi.status', 'dibaca')
                ->orderByDesc('updated_at')->paginate(10);
            } else {
                $data = Informasi_awal::where('id_user', Auth::user()->id)->orderByDesc('created_at')->paginate(10);
                $lengkapi = Informasi_awal::where('id_user', Auth::user()->id)->where('status', 'lengkapi')->orderByDesc('created_at')->get();
                $buat_tim = Informasi_awal::where('id_user', Auth::user()->id)->where('status', 'buat_tim')->orderByDesc('created_at')->get();
                $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
                    ->select('informasi.*')->where('informasi.status', 'dibaca')
                    ->orderByDesc('updated_at')->paginate(10);
            }
        
            // tingkat kecamatan
        } else {
            if ((Auth::user()->level == 'admin') || (Auth::user()->id_jabatan <= 2)) {
                $data = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan','>=', 2)
                    ->where('id_kecamatan', Auth::user()->id_kecamatan)
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kecamatan')
                    ->orderByDesc('created_at')->paginate(10);
                $lengkapi = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', '>=', 2)
                    ->where('id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('status', 'lengkapi')
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kecamatan')
                    ->orderByDesc('created_at')->get();
                $buat_tim = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', '>=', 2)
                    ->where('id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('status', 'buat_tim')
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kecamatan')
                    ->orderByDesc('created_at')->get();
                $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
                ->select('informasi.*')->where('informasi.status', 'dibaca')
                ->orderByDesc('updated_at')->paginate(10);
            } else {
                $data = Informasi_awal::where('id_user', Auth::user()->id)->orderByDesc('created_at')->paginate(10);
                $lengkapi = Informasi_awal::where('id_user', Auth::user()->id)->where('status', 'lengkapi')->orderByDesc('created_at')->get();
                $buat_tim = Informasi_awal::where('id_user', Auth::user()->id)->where('status', 'buat_tim')->orderByDesc('created_at')->get();
                $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
                    ->select('informasi.*')->where('informasi.status', 'dibaca')
                    ->orderByDesc('updated_at')->paginate(10);
            }
        }

        return view('informasi_awal', compact('data', 'lengkapi', 'buat_tim','data_antrian','alihkan'));
    }

    public function buatlangsung(Request $request)
    {

        if (request()->file('img_bukti')) {
            session()->flash('session', 'Img');
            $data_informasi = $request->validate([
                'img_bukti' => 'image|mimes:png,jpg,jpeg'
            ]);
        }
        session()->flash('session', 'Kosong');
        $data_informasi = $request->validate([
                'nama' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'deskripsi' => 'required',
                'img_bukti' => 'image|mimes:png,jpg,jpeg'
        ]);
        $data_informasi_awal = request()->validate([
            'peristiwa' => 'required',
            'tempat_kejadian' => 'required',
        ]);

        if (request()->file('img_bukti')) {
            $img_bukti = request()->file('img_bukti');
            $img = $img_bukti->store("img/masyarakat");
            $data_informasi['img_bukti'] = $img;
        } else {
            $data_informasi['img_bukti'] = request()->file('img_bukti');
        }


        // insert informasi
        $data_informasi['ktp'] = $request->ktp;
        $data_informasi['status'] = 'diproses';
        $data_informasi['saksi1'] = $request->saksi1;
        $data_informasi['alamat1'] = $request->alamat1;
        $data_informasi['waktu_kejadian'] = $request->waktu_kejadian;
        $data_informasi['deskripsi'] = $request->deskripsi;
        $data_informasi['tgl'] = date('Y-m-d');
        $informasi = Informasi::create($data_informasi);


        // insert informasi awal
        $data_informasi_awal['id_user'] = Auth::user()->id;
        $data_informasi_awal['id_informasi'] = $informasi->id;
        $data_informasi_awal['terlapor'] = request('terlapor');
        $data_informasi_awal['alamat_terlapor'] = request('alamat_terlapor');
        $data_informasi_awal['status'] = 'diproses';
        $data_informasi_awal['uraian_kejadian'] = $request->deskripsi;
        $data_informasi_awal['waktu_tgl_kejadian'] = $request->waktu_kejadian;
        Informasi_awal::create($data_informasi_awal);
        session()->flash('session', 'Laporan_proses');
        return back();

    }

    public function lanjutform($id)
    {
        session()->flash('session', 'Kosong');
        $data = request()->validate([
            'peristiwa' => 'required',
            'tempat_kejadian' => 'required',
        ]);
        if (request()->input('waktu_tgl_kejadian') == null) {
            $data['waktu_tgl_kejadian'] = request()->input('waktu_kejadian');
        } else {
            $data['waktu_tgl_kejadian'] = request()->input('waktu_tgl_kejadian');
        }

        if (request()->input('uraian_kejadian') == null) {
            $data['uraian_kejadian'] = request()->input('deskripsi');
        } else {
            $data['uraian_kejadian'] = request()->input('uraian_kejadian');
        }
        $data['id_user'] = Auth::user()->id;
        $data['id_informasi'] = $id;
        $data['terlapor'] = request('terlapor');
        $data['alamat_terlapor'] = request('alamat_terlapor');
        $data['status'] = 'diproses';
        
        Informasi_awal::create($data);
        // update status informasi
        $informasi = Informasi::find($id);
        $ubah['status'] = 'diproses';
        $informasi->update($ubah);
        session()->flash('session', 'Ditambah');
        return back();
        // return redirect('/informasi');
    }

    // informasi awal berdasarkan satatus yang di pilih
    public function index_status($status)
    {
        // admin kabupaten
        $data_antrian = Informasi::orderByDesc('created_at')->get();
        if (Auth::user()->id_tingkatan == 1) {
            if ((Auth::user()->level == 'admin') || (Auth::user()->id_jabatan <= 2)) {
                $data = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', 1)
                    ->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('status', $status)
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('updated_at')->paginate(10);
                $lengkapi = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', 1)
                    ->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('status', 'lengkapi')
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('updated_at')->get();
                $buat_tim = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', 1)
                    ->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('status', 'buat_tim')
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('updated_at')->get();
                $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
                    ->select('informasi.*')->where('informasi.status', 'dibaca')
                    ->orderByDesc('updated_at')->paginate(10);
                
            } else {
                $data = Informasi_awal::where('status', $status)->where('id_user', Auth::user()->id)->orderByDesc('updated_at')->paginate(10);
                $lengkapi = Informasi_awal::where('status', 'lengkapi')->where('id_user', Auth::user()->id)->orderByDesc('updated_at')->paginate(10);
                $buat_tim = Informasi_awal::where('status', 'buat_tim')->where('id_user', Auth::user()->id)->orderByDesc('updated_at')->paginate(10);
                $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
                    ->select('informasi.*')->where('informasi.status', 'dibaca')
                    ->orderByDesc('updated_at')->paginate(10);
            }


            // admin kecamatan
        } else {
            if ((Auth::user()->level == 'admin') || (Auth::user()->id_jabatan <= 2)) {
                $data = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', '>=', 2)
                    ->where('id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('status', $status)
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kecamatan')
                    ->orderByDesc('updated_at')->paginate(10);
                $lengkapi = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', '>=', 2)
                    ->where('id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('status', 'lengkapi')
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kecamatan')
                    ->orderByDesc('updated_at')->paginate(10);
                $buat_tim = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('id_tingkatan', '>=', 2)
                    ->where('id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('status', 'buat_tim')
                    ->select('informasi_awal.*', 'users.id_tingkatan', 'users.id_kecamatan')
                    ->orderByDesc('updated_at')->paginate(10);

                // $alihkan = Alihkan::join('informasi', 'alihkan.id_informasi', '=','informasi.id')
                // ->where('id_kecamatan', Auth::user()->id_kecamatan)
                // // ->select('alihkan.*', 'informasi.status')
                // ->where('status', 'alihkan')
                // ->orderByDesc('alihkan.updated_at')->paginate(10);
                $alihkan = Informasi::join('alihkan', 'informasi.id', '=','alihkan.id_informasi')
                ->where('alihkan.id_kecamatan', Auth::user()->id_kecamatan)
                // ->select('alihkan.*', 'informasi.status')
                ->where('informasi.status', 'alihkan')
                ->select('informasi.*', 'alihkan.id_kecamatan')
                ->orderByDesc('alihkan.updated_at')->paginate(10);

                // dd($alihkan);
            } else {
                $data = Informasi_awal::where('status', $status)->where('id_user', Auth::user()->id)->orderByDesc('updated_at')->paginate(10);
                $lengkapi = Informasi_awal::where('status', 'lengkapi')->where('id_user', Auth::user()->id)->orderByDesc('updated_at')->paginate(10);
                $buat_tim = Informasi_awal::where('status', 'buat_tim')->where('id_user', Auth::user()->id)->orderByDesc('updated_at')->paginate(10);
            }
        }

        return view('informasi_awal', compact('data', 'lengkapi', 'buat_tim', 'status', 'data_antrian','alihkan'));
    }

    public function create($id)
    {
        $informasi = Informasi::where('id', $id)->first();
        return view('lanjut_forma6', compact('informasi'));
    }

    public function preview(Informasi_awal $informasi_awal, $status)
    {
        if ($status == 'print') {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('informasi_awal_print', compact('informasi_awal'))->setPaper('a4', 'potrait');
            return $pdf->stream();
        } elseif ($status == 'download') {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('informasi_awal_print', compact('informasi_awal'))->setPaper('a4', 'potrait');
            return $pdf->download('Formulir A6 terkati ' . $informasi_awal->peristiwa . '.pdf');
        } else {
            return view('informasi_awal_print', compact('informasi_awal'));
        }
    }

    public function hapus_bukti(Informasi_awal_bukti $informasi_awal_bukti)
    {
        Storage::delete($informasi_awal_bukti->foto);
        $informasi_awal_bukti->delete();
        session()->flash('session', 'Dihapus');
        return back();
    }

    public function updatelanjutform($id)
    {
        $data = request()->validate([
            'peristiwa' => 'required',
            'tempat_kejadian' => 'required',
        ]);
        if (request()->input('waktu_tgl_kejadian') == null) {
            $data['waktu_tgl_kejadian'] = request()->input('waktu_kejadian');
        } else {
            $data['waktu_tgl_kejadian'] = request()->input('waktu_tgl_kejadian');
        }

        if (request()->input('uraian_kejadian') == null) {
            $data['uraian_kejadian'] = request()->input('deskripsi');
        } else {
            $data['uraian_kejadian'] = request()->input('uraian_kejadian');
        }

        $data['id_user'] = Auth::user()->id;
        $data['id_informasi'] = $id;
        $data['status'] = 'diproses';
        $data['terlapor'] = request('terlapor');
        $data['alamat_terlapor'] = request('alamat_terlapor');
        $informasi_awal = Informasi_awal::where('id_informasi', $id);
        $informasi_awal->update($data);
        // update status informasi
        $informasi = Informasi::find($id);
        $ubah['status'] = 'diproses';
        $informasi->update($ubah);

        // return back();
        return redirect('/informasi_awal');
    }

    public function detail_informasi_awal(Informasi_awal $informasi_awal)
    {
        $masyarakat = Informasi::where('id', $informasi_awal['id_informasi'])->first();
        if (Auth::user()->id_tingkatan == 2) {
            $user = User::where('id_tingkatan', '>=', 2)->get();
        } else {
            $user = User::where('id_tingkatan', 1)->get();
        }

        return view('informasi_awal_detail', compact('masyarakat', 'informasi_awal', 'user'));
    }

    public function addtim(Request $req, Informasi_awal $informasi_awal)
    {
        $file_sk = request()->file('file_sk');
        $file_st_ketua = request()->file('file_st_ketua');
        $file_st_sekretaris = request()->file('file_st_sekretaris');

        if ($file_sk) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_sk' => 'mimes:pdf|max:2024',
            ]);
        }

        if ($file_st_ketua) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_st_ketua' => 'mimes:pdf|max:2024'
            ]);
        }
        if ($file_st_sekretaris) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'file_st_sekretaris' => 'mimes:pdf|max:2024'
            ]);
        }

        session()->flash('session', 'Kosong');
        $data = $req->validate([
            'nama' => 'required',
            'mulai' => 'required',
        ]);
        // $data = $req->all();

        if ($informasi_awal['status'] == 'buat_tim') {
            $ubah['status'] = 'tim_dibuat';
            $informasi_awal->update($ubah);
        }
        $data['status'] = 'penelusuran';
        $data['id_user'] = Auth::user()->id;
        $data['id_informasi_awal'] = $informasi_awal['id'];
        $data['no_sk'] = request('no_sk');
        $data['st_ketua'] = request('st_ketua');
        $data['st_sekretaris'] = request('st_sekretaris');
        $data['selesai'] = request('selesai');
        if ($file_sk) {
            $sk = $file_sk->store("file/sk");
            $data['file_sk'] = $sk;
        }
        if ($file_st_ketua) {
            $st_ketua = $file_st_ketua->store("file/st_ketua");
            $data['file_st_ketua'] = $st_ketua;
        }
        if ($file_st_sekretaris) {
            $st_sekretaris = $file_st_sekretaris->store("file/st_sekretaris");
            $data['file_st_sekretaris'] = $st_sekretaris;
        }

        $tim = Tim::create($data);
        $tim->users()->attach(request('anggota'));
        session()->flash('session', 'Tim_penelusuran_dibuat');
        return back();
    }

    public function ijin(Informasi_awal $informasi_awal)
    {
        $data['status'] = 'buat_tim';
        $informasi_awal->update($data);
        $test = User::where('level', 'admin')->where('id_tingkatan', 1)->where('id_kabupaten_kota', 1)->get();

        foreach($test as $user){
            Mail::to($user->email)->send(new SendBuatTimPenelusuran($user,$informasi_awal)); 
        }
        // Mail::to($alihkan->user->email)->send(new SendAlihkanPengawas($alihkan));
        session()->flash('session', 'Ijinkan');
        return back();
    }

    public function tolak(Informasi_awal $informasi_awal)
    {
        $data['status'] = 'tolak';
        $informasi_awal->update($data);
        session()->flash('session', 'Tolak');
        return back();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Informasi_awal $informasi_awal)
    {
        //
    }

    public function edit(Informasi_awal $informasi_awal)
    {
        session()->flash('session','Koseong');
        $data = request()->validate([
            'peristiwa' => 'required',
            'tempat_kejadian' => 'required',
            'terlapor' => 'required',
            'alamat_terlapor' => 'required',
            'uraian_kejadian' => 'required',
            'waktu_tgl_kejadian' => 'required',
        ]);
        $informasi_awal->update($data);
        session()->flash('session', 'Diubah');
        return redirect('/informasi_awal/'.$informasi_awal->id.'/detail');
    }


    public function add_bukti(Request $request, Informasi_awal $informasi_awal)
    {
        if (request()->file('foto')) {
            session()->flash('session', 'Img');
            $data = $request->validate([
                    'foto' => 'image|mimes:png,jpg,jpeg'
                ]);
        }
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'nama' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg'
        ]);
        if (request()->file('foto')) {
            $foto = request()->file('foto');
            $img = $foto->store("img/informasi_awal_bukti");
            $data['foto'] = $img;
        } else {
            $data['foto'] = request()->file('foto');
        }
        $data['id_informasi_awal'] = $informasi_awal->id;
        Informasi_awal_bukti::create($data);
        session()->flash('session', 'Ditambah');
        return back();
    }

    public function update(Request $request, Informasi_awal $informasi_awal)
    {
        //
    }



    public function destroy(Informasi_awal $informasi_awal)
    {
        //
    }
}
