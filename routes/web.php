<?php

use App\Jabatan;
use App\Kabupaten_kota;
use App\Pengawas;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Auth
Route::get('art/{perintah}', function ($perintah) {
    Artisan::call($perintah);
    session()->flash('session', 'Artisan');
    return redirect('/');
});

Auth::routes();
Route::post('/out', 'Auth\LoginController@logout');
Route::view('/', 'page.login');

// Dashboard
Route::get('/dashboard', 'DashboardController@index');
// Jabatan
Route::get('/jabatan', 'JabatanController@tampil');
Route::post('/jabatan/create', 'JabatanController@simpan');
Route::patch('/jabatan/{jabatan}/update', 'JabatanController@update');
Route::delete('/jabatan/{jabatan}/hapus', 'JabatanController@hapus');


// Tingkatan
Route::get('/tingkatan', 'TingkatanController@index');
Route::post('/tingkatan/create', 'TingkatanController@simpan');
Route::patch('/tingkatan/{tingkatan}/update', 'TingkatanController@update');
// Route::delete('/tingkatan/{tingkatan}/hapus', 'TingkatanController@hapus');
// Catatan
Route::get('/catatan', 'CatatanController@index');
Route::post('/catatan/create', 'CatatanController@simpan');
Route::patch('/catatan/{catatan:id}/update', 'CatatanController@update');
Route::delete('/catatan/{catatan:id}/hapus', 'CatatanController@hapus');

// Informasi
Route::get('/informasi', 'InformasiController@index');
Route::post('/informasi', 'InformasiController@store');
Route::get('/informasi/create', 'InformasiController@create');
Route::get('/informasi/{informasi}/show', 'InformasiController@show');
Route::post('/informasi/{informasi}/alihkan', 'InformasiController@alihkan');
Route::patch('/informasi/{informasi}/{sts}', 'InformasiController@updtstatus');
Route::get('/informasi/{sts}', 'InformasiController@index_status');

// Informasi_awal
Route::get('/informasi_awal', 'InformasiAwalController@index');
Route::post('/informasi_awal/buatlangsung', 'InformasiAwalController@buatlangsung');
Route::get('/informasi_awal/{status}', 'InformasiAwalController@index_status');
Route::get('/informasi_awal/create/{id}', 'InformasiAwalController@create');
Route::post('/informasi_awal/{id}/lanjutform', 'InformasiAwalController@lanjutform');
Route::patch('/informasi_awal/{id}/updatelanjutform', 'InformasiAwalController@updatelanjutform');
Route::get('/informasi_awal/{informasi_awal}/detail', 'InformasiAwalController@detail_informasi_awal');
Route::get('/informasi_awal/{informasi_awal}/bukti', 'InformasiAwalController@detail_informasi_awal');
Route::post('/informasi_awal/{informasi_awal}/add_bukti', 'InformasiAwalController@add_bukti');
Route::patch('/informasi_awal/{informasi_awal}/edit', 'InformasiAwalController@edit');
Route::patch('/informasi_awal/{informasi_awal}/addtim', 'InformasiAwalController@addtim');
Route::patch('/informasi_awal/{informasi_awal}/ijin', 'InformasiAwalController@ijin');
Route::patch('/informasi_awal/{informasi_awal}/tolak', 'InformasiAwalController@tolak');
Route::get('/informasi_awal/{informasi_awal}/print/{status}', 'InformasiAwalController@preview');

// inforami awal bukti
Route::delete('/informasi_awal_bukti/{informasi_awal_bukti}/hapus_bukti', 'InformasiAwalController@hapus_bukti');


//Tim
Route::get('/tim', 'TimController@index');
Route::patch('/tim/{tim}/edit', 'TimController@edit');
Route::get('/tim/{sts}/status', 'TimController@index_status');
Route::get('/tim/{sts}/status_kecamatan', 'TimController@index_status_kec');
Route::get('/tim/{tim}', 'TimController@show');
Route::get('/tim/{tim}/pengawasan', 'TimController@show_pengawasan');
Route::patch('/tim/{tim}/set_ketua', 'TimController@set_ketua');
Route::post('/tim/addtim/pengawasan', 'TimController@addpengawasan');



// Berita Acara
Route::post('/berita_acara/store', 'BeritaAcaraController@store');
Route::get('/berita_acara/{berita_acara}', 'BeritaAcaraController@show');
Route::patch('/berita_acara/{berita_acara}/edit', 'BeritaAcaraController@edit');
Route::patch('/berita_acara/{berita_acara_detail}/edit_pertanyaan', 'BeritaAcaraController@edit_pertanyaan');
Route::get('/berita_acara/{berita_acara}/{status}/print', 'BeritaAcaraController@preview');
// Route::get('/berita_acara/{berita_acara}/download', 'BeritaAcaraController@preview');
Route::post('/berita_acara/{id}/add_pertanyaan', 'BeritaAcaraController@add_pertanyaan');

// Laporan hasil pengawasan
// Route::get('/lhp', 'LhpController@index');
Route::get('/lhp/{tim}/create', 'LhpController@create');
Route::post('/lhp/store', 'LhpController@store');
Route::post('/lhp/{lhp}/pendapat', 'LhpController@store_pendapat');
Route::delete('/lhp/{lhp}/hapus', 'LhpController@destroy');
Route::patch('/lhp/{lhp}/sesi_selesai', 'LhpController@sesi_selesai');
Route::patch('/lhp/{lhp}/ubah_waktu_pengisian', 'LhpController@ubah_waktu_pengisian');
Route::patch('/lhp/{pendapat}/pendapat_update', 'LhpController@update_pendapat');
Route::get('/lhp/{lhp}/lanjutlhp', 'LhpController@lanjutlhp');
Route::get('/lhp/{lhp}/lanjutlhp_belum', 'LhpController@lanjutlhp_belum');
Route::get('/lhp/{lhp}/print/{status}', 'LhpController@preview');
Route::get('/lhp/{lhp}/edit', 'LhpController@editlhp');
Route::get('/lhp/{lhp}/detail', 'LhpController@detaillhp');
Route::get('/lhp/{lhp}/edit/pendukung', 'LhpController@editlhp');
Route::patch('/lhp/{lhp}/update', 'LhpController@update');
Route::patch('/lhp/{lhp}/update_belum', 'LhpController@update_belum');
Route::patch('/lhp/{lhp}/update_belum_dashboard', 'LhpController@update_belum_dashboard');
Route::get('/lhp/{dugaan}/view/{status}', 'LhpController@index');

Route::post('/lhp/saksi/add', 'LhpController@saksi_add');
Route::post('/lhp/pelaku/add', 'LhpController@pelaku_add');
Route::post('/lhp/bukti/add', 'LhpController@bukti_add');

Route::delete('/lhp/saksi/{saksi}/delete', 'LhpController@saksi_delete');
Route::delete('/lhp/pelaku/{pelaku}/delete', 'LhpController@pelaku_delete');
Route::delete('/lhp/bukti/{bukti}/delete', 'LhpController@bukti_delete');

// User
// Route::get('/user', 'UserController@index');
// Route::get('/user/{tingkatan}/create', 'UserController@index');
Route::get('/user/kabupaten', 'UserController@kabupaten_index');
Route::get('/user/kecamatan', 'UserController@kecamatan_index');
Route::post('/user/{status}/store', 'UserController@store');
Route::post('/user/{status}/store_kecamatan', 'UserController@store_kecamatan');
Route::get('/user/{user}/detail', 'UserController@show');
Route::patch('/user/{user}/edit', 'UserController@update');
Route::get('/user/{user}/detail/{status}', 'UserController@show');
// untuk admin tingkatan kabupaten
Route::get('/user/{status}/{id}/table', 'UserController@table_index');

// untuk admin tingkat kecmatan
Route::get('/user/{status}/{id}/table_kecamatan', 'UserController@table_index_kecamatan');
// Route::get('/user/{status}/{id}/table/kelurahan', 'UserController@table_index');
// Route::get('/user/{status}/{id}/table', 'UserController@table_index');



// Kabupaten_kota
Route::get('/kabupaten', 'KabupatenKotaController@index');
Route::post('/kabupaten/create', 'KabupatenKotaController@create');
Route::get('/kabupaten/{kabupaten_kota}', 'KabupatenKotaController@show');
Route::patch('/kabupaten/{kabupaten_kota}/update', 'KabupatenKotaController@update');


// Kecamatan
Route::get('/kecamatan', 'KecamatanController@index');
Route::post('/kecamatan/create', 'KecamatanController@create');
Route::get('/kecamatan/{kecamatan}', 'KecamatanController@show');
Route::get('/kecamatan/{kecamatan}/detail', 'KecamatanController@detail');
Route::get('/kecamatan/{kecamatan}/detail/{status}', 'KecamatanController@detail');
Route::patch('/kecamatan/{kecamatan}/update', 'KecamatanController@update');

// kelurahan
Route::post('/kelurahan/create', 'KelurahanController@create');
Route::get('/kelurahan', 'KelurahanController@index');
