<?php

namespace App\Http\Controllers;

use App\Jabatan;
use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JabatanController extends Controller
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
   public function tampil()
   {
      $data = Jabatan::get();
      // $tingkatan = Tingkatan::get();
      return view('jabatan', compact('data'));
   }

   public function simpan()
   {
      session()->flash('session', 'Kosong');
      $data = request()->validate([
         'nm_jabatan' => 'required',
         'sebagai' => 'required'
      ]);
      $data['slug'] = Str::slug(request('nm_jabatan'));
      Jabatan::create($data);
      session()->flash('session', 'Berhasil');
      return back();
   }

   public function update(Jabatan $jabatan)
   {
      $data = request()->validate([
         'nm_jabatan' => 'required',
         'sebagai' => 'required'
      ]);
      $data['slug'] = Str::slug($data['nm_jabatan']);
      $jabatan->update($data);
      return back();
   }


   public function hapus(Jabatan $jabatan)
   {
      $jabatan->delete();
      return back();
   }
}
