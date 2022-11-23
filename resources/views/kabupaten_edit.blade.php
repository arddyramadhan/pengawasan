@extends('master.app')
@section('title', 'Pengaturan')
@section('judul', 'Pengaturan Kabupaten')
@section('menu', 'Pengaturan')
@section('sub', 'Edit')
@section('content')
<div class="card">
    <div class="card-body row">
        <div class="col-12">
            @include('sess.flash')
            <form action="/kabupaten/{{$kabupaten_kota->id}}/update" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" value="{{(old('nama') ?? $kabupaten_kota->nama)}}" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama">Status</label>
                    <select name="" class="form-control" id="" disabled>
                        <option {{$kabupaten_kota->status=='kabupaten' ? 'selected' : ''}} value="kabupaten">Kabupaten</option>
                        <option {{$kabupaten_kota->status=='kota' ? 'selected' : ''}} value="kota">Kota</option>
                    </select>
                </div>
                <div class="form-group">
                    <br>
                    <div class="d-flex justify-content-center">
                        <label for="">Alamat</label>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kecamatan</label>
                            <input type="text" placeholder="Contoh : Suwawa" value="{{(old('ktp') ?? $kabupaten_kota->almt_kecamatan)}}" name="almt_kecamatan" id="ktp" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Kelurahan/Desa</label>
                            <input type="text" placeholder="Contoh : Boludawa" value="{{(old('ktp') ?? $kabupaten_kota->almt_kel_des)}}" name="almt_kel_des" id="ktp" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="">Jalan</label>
                            <input type="text" placeholder="Contoh : Suwawa" value="{{(old('ktp') ?? $kabupaten_kota->almt_jalan)}}" name="almt_jalan" id="ktp" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Kop Surat</label>
					<div class="custom-file">
						<input type="file" name="img_kop" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Kop Surat..</label>
                        <span class="text-danger">Kosongkan jika tidak ingin merubah kop surat</span>
					</div>
				</div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@include('sess.scrpt_flash')