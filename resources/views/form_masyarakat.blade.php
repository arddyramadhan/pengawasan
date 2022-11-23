@extends('master.app')
@section('title', 'Prototype Form')
@section('judul', 'Laporan Masyarakat')
@section('menu', 'Form')
@section('sub', 'Masyarakat')
@section('content')
<div class="card">
    <div class="card-body row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
                <h2><strong>Bawaslu</strong> Kabupaten Bone Bolango</h2>
                <p class="lead mb-5">Mari bersama awasi pemilu<br>
                    Phone: +09000990909
                </p>
            </div>
        </div>
        <div class="col-7">
            @include('sess.flash')
            @include('sess.scrpt_flash')
            <form action="/informasi" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama <strong class="text-danger">*</strong> </label>
                    <input type="text" value="{{(old('nama') ?? '')}}" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{(old('email') ?? '')}}" name="email" id="email" class="form-control">
                    <p style="font-size: 15px;" class="text-info">Email : Untuk mendapatkan pemberitahuan langsung melalui email anda</p>
                </div>
                <div class="form-group">
                    <label for="ktp">NIK</label>
                    <input type="text" value="{{(old('ktp') ?? '')}}" name="ktp" id="ktp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor Telfon  <strong class="text-danger">*</strong></label>
                    <input type="text" value="{{(old('telp') ?? '')}}" name="telp" id="telp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat  <strong class="text-danger">*</strong></label>
                    <input type="text" value="{{(old('alamat') ?? '')}}" name="alamat" id="alamat" class="form-control">
                </div>
                {{-- <div class="form-group">
                    <label for="saksi1">Saksi 1</label>
                    <input type="text" value="{{(old('saksi1') ?? '')}}" name="saksi1" id="saksi1" placeholder="Masukan Nama Saksi" class="form-control mb-1">
                    <input type="text" value="{{(old('alamat1') ?? '')}}" name="alamat1" id="alamat1" placeholder="Masukan Alamat Saksi" class="form-control">
					<span class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="saksi2">Saksi 2</label>
					<input type="text" value="{{(old('saksi2') ?? '')}}" name="saksi2" id="saksi2" placeholder="Masukan Nama Saksi" class="form-control mb-1">
					<input type="text" value="{{(old('alamat2') ?? '')}}" name="alamat2" id="alamat2" placeholder="Masukan Alamat Saksi" class="form-control">
                </div> --}}
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Kejadian  <strong class="text-danger">*</strong></label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                        style="height: 100px;">{{(old('deskripsi') ?? '')}}</textarea>
                </div>
				<div class="form-group">
					<div class="custom-file">
						<input type="file" name="img_bukti" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choose One..</label>
					</div>
				</div>
                {{-- <div class="form-group">
                    <label>Deskripasi</label>
                    <div class="select2-blue">
                        <select name="deskripsi[]" class="select2 select2-hidden-accessible" multiple="multiple"
                            data-placeholder="Tambahkan Anggota Tim Penelusuran"
                            data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15"
                            tabindex="-1" aria-hidden="true">
                                <option value="arddy ramadhan">Arddy ramadhan </option>
                                <option value="lusi makalalag">lusi makalalag </option>
                                <option value="sandra lihawa">sandra lihawa </option>
                                <option value="lisa tapola">lisa tapola </option>
                                <option value="murny setyani">murny setyani </option>
                        </select>
                    </div>
                </div> --}}
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Kirim Laporan">

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
