<?php

namespace App\Http\Controllers;

use App\Lhp;
use App\Tim;
use App\Bukti;
use App\Informasi_awal;
use App\Saksi;
use App\Pelaku;
use App\Kecamatan;
use App\Kelurahan;
use App\Mail\SendLhpDugaan;
use App\Mail\SendLhpPleno;
use App\Pendapat;
use App\Tingkatan;
use App\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class LhpController extends Controller
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

    public function index($dugaan,  $status)
    {
        // dd($dugaan.' '.$status);
        if (Auth::user()->id_tingkatan == 1) {
            if ($dugaan == 'lhp_kecamatan') {
                $data_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('dugaan', 'pleno')
                    ->where('status_lhp', $status)
                    ->where('users.id_tingkatan', 1)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->select('lhp.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('lhp.created_at')->get();

                $data = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('status_lhp', $status)
                    ->where('users.id_tingkatan', '>=', 2)
                    ->orderByDesc('lhp.created_at')
                    ->select('lhp.*', 'users.id_tingkatan')
                    ->paginate();
                return view('lhp', compact('data', 'status', 'dugaan', 'data_pleno'));
            } else {
                $data_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('dugaan', 'pleno')
                    ->where('status_lhp', $status)
                    ->where('users.id_tingkatan', 1)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->select('lhp.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('lhp.created_at')->get();

                $data = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('dugaan', $dugaan)
                    ->where('status_lhp', $status)
                    ->where('users.id_tingkatan', 1)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->select('lhp.*', 'users.id_tingkatan', 'users.id_kabupaten_kota')
                    ->orderByDesc('lhp.created_at')->paginate();
                return view('lhp', compact('data', 'status', 'dugaan', 'data_pleno'));
            }
        } else {
            $data_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'pleno')
                ->where('status_lhp', $status)
                ->where('users.id_tingkatan', '>=', 2)
                ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                ->select('lhp.*', 'users.id_tingkatan', 'users.id_kecamatan')
                ->orderByDesc('lhp.created_at')->get();

            $data = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', $dugaan)
                ->where('status_lhp', $status)
                ->where('users.id_tingkatan', '>=', 2)
                ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                ->select('lhp.*', 'users.id_tingkatan', 'users.id_kecamatan')
                ->orderByDesc('lhp.created_at')->paginate();
            return view('lhp', compact('data', 'status', 'dugaan', 'data_pleno'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tim $tim)
    {
        return view('lhp_penelusuran', compact('tim'));
    }

    public function store_pendapat(Request $request, Lhp $lhp)
    {
        $pendapat = Pendapat::where('id_lhp', $lhp->id)->where('id_user', Auth::user()->id)->first();
        if ($pendapat) {
            session()->flash('session', 'Ada_pendapat');
            return back();
        } else {
            if ((Auth::user()->id_tingkatan <= 1)) {
                $jum_komisioner = User::where('id_tingkatan', Auth::user()->id_tingkatan)->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->where('id_jabatan', '<=', 2)->count();
            } else {
                $jum_komisioner = User::where('id_tingkatan', Auth::user()->id_tingkatan)->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->where('id_kecamatan', Auth::user()->id_kecamatan)->where('id_jabatan', '<=', 2)->count();
            }
            session()->flash('session', 'Kososng');
            $data = $request->validate([
                'status' => 'required'
            ]);
            $data['isi'] = $request->isi;
            $data['id_lhp'] = $lhp->id;
            $data['id_user'] = Auth::user()->id;
            Pendapat::create($data);
            $jum_pendapat = Pendapat::where('id_lhp', $lhp->id)->count();
            $dugaan_ada = Pendapat::where('id_lhp', $lhp->id)->where('status', 'ada')->count();
            $dugaan_tidak = Pendapat::where('id_lhp', $lhp->id)->where('status', 'tidak')->count();

            if ($jum_pendapat == $jum_komisioner) {
                if ($dugaan_ada == $dugaan_tidak) {
                    $lhp_updt['dugaan'] = 'pleno';
                } else {
                    if ($dugaan_ada > $dugaan_tidak) {
                        $lhp_updt['dugaan'] = 'ada';
                        Mail::to($lhp->user->email)->send(new SendLhpDugaan($lhp)); 
                    } else {
                        $lhp_updt['dugaan'] = 'tidak';
                        $lhp_updt['status'] = 'selesai';
                    }
                }
                $lhp->update($lhp_updt);
            }
            session()->flash('session', 'Ditambah');
            return back();
        }
    }

    public function update_pendapat(Request $request, Pendapat $pendapat)
    {

        $jum_komisioner = 0;
        $komisioner = User::where('id_tingkatan', Auth::user()->id_tingkatan)->get();
        foreach ($komisioner as $item) {
            if ((Auth::user()->id_tingkatan <= 1) && (Auth::user()->id_kabupaten_kota == $item->id_kabupaten_kota) && ($item->id_jabatan <= 2)) {
                ++$jum_komisioner;
            } elseif ((Auth::user()->id_tingkatan > 1) && (Auth::user()->id_kecamatan == $item->id_kecamatan) && ($item->id_jabatan <= 2)) {
                ++$jum_komisioner;
            }
        }
        session()->flash('session', 'Kososng');
        $data = $request->validate([
            'isi' => 'required',
            'status' => 'required'
        ]);
        $data['id_user'] = Auth::user()->id;
        $pendapat->update($data);

        $jum_pendapat = 0;
        $dugaan_ada = 0;
        $dugaan_tidak = 0;
        foreach (Pendapat::where('id_lhp', $pendapat->id_lhp)->get() as $item_pendapat) {
            ++$jum_pendapat;
            if ($item_pendapat->status == 'ada') {
                ++$dugaan_ada;
            } else {
                ++$dugaan_tidak;
            }
        }

        if ($jum_pendapat == $jum_komisioner) {
            if ($dugaan_ada == $dugaan_tidak) {
                $lhp_updt['dugaan'] = 'pleno';
            } else {
                if ($dugaan_ada > $dugaan_tidak) {
                    $lhp_updt['dugaan'] = 'ada';
                } else {
                    $lhp_updt['dugaan'] = 'tidak';
                    $lhp_updt['status'] = 'selesai';
                }
            }
            $lhp = Lhp::where('id', $pendapat->id_lhp)->first();
            $lhp->update($lhp_updt);
        }
        session()->flash('session', 'Ditambah');
        return back();
    }

    public function sesi_selesai(Request $request, Lhp $lhp)
    {
        $data['status'] = 'selesai';
        $lhp->update($data);
        session()->flash('session', 'Disimpan');
        return back();
    }

    public function ubah_waktu_pengisian(Request $request, Lhp $lhp)
    {
        // dd($lhp->id);
        $data['batas_waktu_pengisian'] = $request->batas_waktu_pengisian;
        $lhp->update($data);
        session()->flash('session', 'Diubah');
        return back();
    }

    public function store(Request $request)
    {
        if (request('status_lhp')=='penelusuran') {
            $batas = Tim::join('informasi_awal', 'tim.id_informasi_awal', '=', 'informasi_awal.id')
            ->where('tim.id', request('id_tim'))
            ->select('informasi_awal.*')
            ->orderByDesc('informasi_awal.created_at')->first();
        } else {
            $batas = Tim::find(request('id_tim'));
        }

        if (request('konfirmasi') == 'Belum') {
            $data = $request->validate([
                // 'tahapan' => 'required',
                'bentuk' => 'required',
                // 'diawasi' => 'required',
                // 'mulai' => 'required',
                // 'status_lhp' => 'required',
                // 'selesai' => 'required',
                // 'lokasi' => 'required',
                // 'uraian_hasil' => 'required',
            ]);
            $data['tahapan'] = request('tahapan');
            // $data['bentuk'] = request('bentuk');
            $data['diawasi'] = request('diawasi');
            $data['mulai'] = request('mulai');
            $data['status_lhp'] = request('status_lhp');
            $data['selesai'] = request('selesai');
            $data['lokasi'] = request('lokasi');
            $data['uraian_hasil'] = request('uraian_hasil');
            $data['dugaan'] = 'belum';
            $data['id_tim'] = request('id_tim');
            $data['id_user'] = Auth::user()->id;

            

            // if (request('status_lhp')=='penelusuran') {
            //     $batas = Tim::join('informasi_awal', 'tim.id_informasi_awal', '=', 'informasi_awal.id')
            //     ->where('tim.id', request('id_tim'))
            //     ->select('informasi_awal.*')
            //     ->orderByDesc('informasi_awal.created_at')->first();
            // } else {
            //     $batas = Tim::find(request('id_tim'));
            // }
            // dd($batas);

            // if (date('Y-m-d', strtotime('now')) >= date('Y-m-d', strtotime('+7 days', strtotime($lhp->batas_waktu_pengisian)))) {
            //     session()->flash('session', 'lewat_batas');
            // } else {
            //     $lhp->update($data);
            //     session()->flash('session', 'Diubah');
            // }
            
            $data['batas_waktu_pengisian'] = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($batas->created_at)));
            
            

            if (Lhp::where('id_user', $data['id_user'])->where('uraian_hasil', $data['uraian_hasil'])->where('tahapan', $data['tahapan'])->where('diawasi', $data['diawasi'])->exists()) {
                session()->flash('session', 'dua_input');
            }else {
                Lhp::create($data);
                session()->flash('session', 'Disimpan');
            }
            if ($data['status_lhp'] == 'penelusuran') {
                return redirect('/tim/' . $data['id_tim']);
            } else {
                return redirect('/tim/' . $data['id_tim'] . '/pengawasan');
            }
        } else {
            session()->flash('session', 'Kosong');
            $data = $request->validate([
                'tahapan' => 'required',
                'bentuk' => 'required',
                'diawasi' => 'required',
                'mulai' => 'required',
                'status_lhp' => 'required',
                'selesai' => 'required',
                'lokasi' => 'required',
                'uraian_hasil' => 'required',
            ]);
            $data['dugaan'] = 'pleno';
            $data['id_tim'] = request('id_tim');
            $data['id_user'] = Auth::user()->id;

            $data['batas_waktu_pengisian'] = date('Y-m-d H:i:s', strtotime('+7 days', strtotime($batas->created_at)));

            if (Lhp::where('id_user', $data['id_user'])->where('uraian_hasil', $data['uraian_hasil'])->where('tahapan', $data['tahapan'])->where('diawasi', $data['diawasi'])->exists()) {
                session()->flash('session', 'dua_input');
            }else {
                $lhp = Lhp::create($data);
                if ((Auth::user()->id_tingkatan <= 1)) {
                    $jum_komisioner = User::where('id_tingkatan', Auth::user()->id_tingkatan)->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->where('id_jabatan', '<=', 2)->get();
                } else {
                    $jum_komisioner = User::where('id_tingkatan', Auth::user()->id_tingkatan)->where('id_kabupaten_kota', Auth::user()->id_kabupaten_kota)->where('id_kecamatan', Auth::user()->id_kecamatan)->where('id_jabatan', '<=', 2)->get();
                }

                foreach($jum_komisioner as $user){
                    Mail::to($user->email)->send(new SendLhpPleno($user,$lhp)); 
                }

                session()->flash('session', 'Disimpan');
            }

            
            if ($data['status_lhp'] == 'penelusuran') {
                return redirect('/tim/' . $data['id_tim']);
            } else {
                return redirect('/tim/' . $data['id_tim'] . '/pengawasan');
            }
            // $id_lhp = $lhp->id;
            // return redirect('/lhp/' . $id_lhp . '/lanjutlhp');
        }
    }

    public function show(Lhp $lhp)
    {
    }

  
    public function lanjutlhp(Lhp $lhp)
    {
        return view('lhp_penelusuran_dugaan_pelanggaran', compact('lhp'));
    }

    public function lanjutlhp_belum(Lhp $lhp)
    {
        return view('lhp_belum', compact('lhp'));
    }

    public function editlhp(Lhp $lhp)
    {
        return view('lhp_edit', compact('lhp'));
    }
    public function preview(Lhp $lhp, $status)
    {
        // dd($status);
        $tim = Tim::where('id', $lhp->id_tim)->first();
        // dd($tim->id);
        // view()->share('detail', $detail);
        // view()->share('berita_acara', $berita_acara);
        // $pdf = PDF::loadView('berita_acara_detail_print');
        // $pdf = PDF::loadView('berita_acara_detail_print', compact('berita_acara', 'detail'));

        // $urut_jab = Lhp::join('tim', 'lhp.id_tim', '=', 'tim.id')
        //     ->join('users', 'tim.id_user', '=', 'users.id')
        //     ->join('jabatan', 'users.id_jabatan', '=', 'jabatan.id')
        //     ->where('lhp.id', $lhp->id)
        //     ->select('users.name', 'lhp.id', 'jabatan.*')
        //     ->orderBy('jabatan.id', 'Asc')->get();

        if ($status == 'print') {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('lhp_print', compact('lhp', 'tim'))->setPaper('a4', 'potrait');
            return $pdf->stream();
        } elseif ($status == 'download') {
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('lhp_print', compact('lhp', 'tim'))->setPaper('a4', 'potrait');
            return $pdf->download('LHP_' . $lhp->tahapan . '.pdf');
        } else {
            return view('lhp_print', compact('lhp', 'tim'));
        }
    }

    public function detaillhp(Lhp $lhp)
    {
        $tim = Tim::where('id', $lhp->id_tim)->first();
        // dd($lhp);
        return view('lhp_detail', compact('lhp', 'tim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lhp  $lhp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lhp $lhp)
    {
        // dd(date('Y-m-d', strtotime('+5 days', strtotime($lhp->batas_waktu_pengisian))));
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'tahapan' => 'required',
            'bentuk' => 'required',
            'diawasi' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'lokasi' => 'required',
            'uraian_hasil' => 'required',
            // 'dugaan' => 'required',
        ]);

        $data['tempat_kejadian'] = $request->tempat_kejadian;
        $data['waktu_kejadian'] = $request->waktu_kejadian;
        $data['uraian_dugaan'] = $request->uraian_dugaan;

        if (date('Y-m-d', strtotime('now')) >= date('Y-m-d', strtotime($lhp->batas_waktu_pengisian))) {
            session()->flash('session', 'lewat_batas');
        } else {
            $lhp->update($data);
            session()->flash('session', 'Diubah');
        }
        

        return back();
    }

    public function update_belum(Request $request, Lhp $lhp)
    {
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            // 'tahapan' => 'required',
            'bentuk' => 'required',
            // 'diawasi' => 'required',
            // 'mulai' => 'required',
            // 'status_lhp' => 'required',
            // 'selesai' => 'required',
            // 'lokasi' => 'required',
            // 'uraian_hasil' => 'required',
        ]);
        $data['tahapan'] = request('tahapan');
        // $data['bentuk'] = request('bentuk');
        $data['diawasi'] = request('diawasi');
        $data['mulai'] = request('mulai');
        // $data['status_lhp'] = request('status_lhp');
        $data['selesai'] = request('selesai');
        $data['lokasi'] = request('lokasi');
        $data['uraian_hasil'] = request('uraian_hasil');
        if (request('konfirmasi') == 'Belum') {
            $data['dugaan'] = 'belum';
        } else {
            $data['dugaan'] = 'pleno';
        }
        if (date('Y-m-d', strtotime('now')) >= date('Y-m-d', strtotime($lhp->batas_waktu_pengisian))) {
            session()->flash('session', 'lewat_batas');
        } else {
            $lhp->update($data);
            session()->flash('session', 'Diubah');
        }
        return redirect('/lhp/' . $lhp->id . '/detail');
    }


    public function update_belum_dashboard(Request $request, Lhp $lhp)
    {
        session()->flash('session', 'Kosong');
        $data = $request->validate([
            'uraian_hasil' => 'required',
        ]);
        // if (request('konfirmasi') == 'Belum') {
        //     $data['dugaan'] = 'belum';
        // } else {
        //     $data['dugaan'] = 'pleno';
        // }
        $lhp->update($data);
        session()->flash('session', 'Diubah');
        return redirect('/dashboard');
    }


    public function saksi_add(Request $req)
    {
        $data = $req->validate([
            'nama' => 'required'
        ]);
        $data['id_lhp'] = $req->id_lhp;
        Saksi::create($data);
        return back();
    }

    public function saksi_delete(Saksi $saksi)
    {
        $saksi->delete();
        session()->flash('session', 'Dihapus');
        return back();
    }

    public function pelaku_add(Request $req)
    {
        $data = $req->validate([
            'nama' => 'required',
            'status' => 'required'
        ]);
        $data['id_lhp'] = $req->id_lhp;
        Pelaku::create($data);
        return back();
    }

    public function pelaku_delete(Pelaku $pelaku)
    {
        $pelaku->delete();
        session()->flash('session', 'Dihapus');
        return back();
    }

    public function bukti_add(Request $req)
    {
        $img = request()->file('img');
        // dd($img);
        if ($img) {
            session()->flash('session', 'Img');
            $data = $req->validate([
                'img' => 'mimes:png,jpg,jpeg|max:2048'
            ]);
        }
        session()->flash('session', 'Kosong');
        $data = $req->validate([
            'nama' => 'required',
            'img' => 'mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($img) {
            $img_store = $img->store('img/bukti_lhp');
            $data['img'] = $img_store;
        }
        session()->flash('session', 'Berhasil');
        $data['id_lhp'] = $req->id_lhp;
        Bukti::create($data);
        return back();
    }

    public function bukti_delete(Bukti $bukti)
    {
        if ($bukti->img != null) {
            Storage::delete($bukti->img);
        }
        $bukti->delete();
        session()->flash('session', 'Dihapus');
        return back();
    }
    
    public function destroy(Lhp $lhp)
    {
        
        $status_lhp = $lhp->status_lhp;
        $id_tim = $lhp->id_tim;
        $lhp->delete();
        session()->flash('session', 'Dihapus');
        if ($status_lhp == 'penelusuran') {
            return redirect('/tim/' . $id_tim);
        } else {
            return redirect('/tim/' . $id_tim . '/pengawasan');
        }
    }
}
