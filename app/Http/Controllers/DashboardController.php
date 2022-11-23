<?php

namespace App\Http\Controllers;

use App\Alihkan;
use App\Informasi;
use App\Informasi_awal;
use App\Lhp;
use App\User;
use App\Pengawas;
use App\Kecamatan;
use App\Kelurahan;
use App\Tim;
use App\Tingkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
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
        if (Auth::user()->level != 'super') {
            if (Auth::user()->id_tingkatan == 1) {
                $tot_lm = Informasi::count();
                $tot_ia = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->whereYear('informasi_awal.created_at', '=', date('Y'))
                    ->count();
                $tot_lhp = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $tot_tim = Tim::join('users', 'tim.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->whereYear('tim.created_at', '=', date('Y'))
                    ->count();


                $lhp_ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'ada')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $lhp_tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'tidak')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'pleno')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $lhp_belum = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'belum')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();

                // dd($lhp_);

                // dd($tot_tim);
                $dugaan = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                    ->groupBy('bulan')
                    ->orderBy('lhp.created_at')
                    ->get();

                $ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'ada')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                    ->groupBy('bulan')
                    ->orderBy('lhp.created_at')
                    ->get();

                $tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'tidak')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                    ->groupBy('bulan')
                    ->orderBy('lhp.created_at')
                    ->get();

                $notif_lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('dugaan', 'pleno')
                    ->select('lhp.id')
                    ->orderBy('id', 'asc')
                    ->limit(5)
                    ->get();
                
            } else {
                $tot_lm = Informasi::count();
                $tot_ia = Informasi_awal::join('users', 'informasi_awal.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->whereYear('informasi_awal.created_at', '=', date('Y'))
                    ->count();
                $tot_lhp = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $tot_tim = Tim::join('users', 'tim.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->whereYear('tim.created_at', '=', date('Y'))
                    ->count();


                $lhp_ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'ada')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $lhp_tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'tidak')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'pleno')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();
                $lhp_belum = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'belum')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->count();


                $dugaan = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                    ->groupBy('bulan')
                    ->orderBy('lhp.created_at')
                    ->get();

                $ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'ada')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                    ->groupBy('bulan')
                    ->orderBy('lhp.created_at')
                    ->get();


                $tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'tidak')
                    ->whereYear('lhp.created_at', '=', date('Y'))
                    ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                    ->groupBy('bulan')
                    ->orderBy('lhp.created_at')
                    ->get();
                    
                $notif_lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                    ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                    ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                    ->where('users.id_kecamatan', Auth::user()->id_kecamatan)
                    ->where('dugaan', 'pleno')
                    ->select('lhp.id')
                    ->orderBy('id', 'asc')
                    ->limit(5)
                    ->get();
            }
        } else {
            $tot_lm = Informasi::count();
            $tot_ia = Informasi_awal::count();
            $tot_lhp = Lhp::count();
            $tot_tim = Tim::count();


            $lhp_ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'ada')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->count();
            $lhp_tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'tidak')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->count();
            $lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'pleno')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->count();
            $lhp_belum = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'belum')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->count();

            $dugaan = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                ->groupBy('bulan')
                ->orderBy('lhp.created_at')
                ->get();

            $ada = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'ada')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                ->groupBy('bulan')
                ->orderBy('lhp.created_at')
                ->get();


            $tidak = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('dugaan', 'tidak')
                ->whereYear('lhp.created_at', '=', date('Y'))
                ->select([DB::raw('count(lhp.id) as jumlah'), DB::raw('EXTRACT(MONTH from lhp.created_at) as bulan')])
                ->groupBy('bulan')
                ->orderBy('lhp.created_at')
                ->get();

            $notif_lhp_pleno = Lhp::join('users', 'lhp.id_user', '=', 'users.id')
                ->where('users.id_tingkatan', Auth::user()->id_tingkatan)
                ->where('users.id_kabupaten_kota', Auth::user()->id_kabupaten_kota)
                ->where('dugaan', 'pleno')
                ->select('lhp.id')
                ->orderBy('id', 'asc')
                ->limit(5)
                ->get();
        }

        $notif_lhp_belum = Lhp::where('id_user', Auth::user()->id)
        ->where('dugaan', 'belum')
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();
        $notif_lhp_lanjut_uraian = Lhp::where('id_user', Auth::user()->id)
        ->where('dugaan', 'ada')
        ->where('status', 'belum')
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();
        

        $ia_lengkapi = Informasi_awal::join('informasi', 'informasi_awal.id_informasi', '=', 'informasi.id')
        ->where('informasi_awal.status', 'lengkapi')
        ->where('id_user', Auth::user()->id)
        ->select('informasi.id', 'informasi.nama')
        ->orderBy('id', 'asc')
        ->limit(1)
        ->get();

        // dd($ia_lengkapi);
        $informasi_baru = Informasi::where('status','antrian')
        ->orderBy('id', 'asc')
        ->limit(1)
        ->get();
        
        $alihkan_ia = Alihkan::join('informasi', 'alihkan.id_informasi', '=', 'informasi.id')
        ->where('id_kecamatan', Auth::user()->id_kecamatan)
        ->where('status','alihkan')
        ->orderBy('alihkan.id', 'asc')
        ->limit(1)
        ->get();
        
        return view('dashboard', compact('alihkan_ia','informasi_baru','ia_lengkapi','notif_lhp_lanjut_uraian','notif_lhp_pleno','notif_lhp_belum','dugaan', 'tidak', 'ada', 'tot_lm', 'tot_ia', 'tot_lhp', 'tot_tim', 'lhp_ada', 'lhp_tidak', 'lhp_pleno', 'lhp_belum'));
    }
}
