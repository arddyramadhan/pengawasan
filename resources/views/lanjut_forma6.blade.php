@extends('master.app')
@section('title', 'Informasi Awal')
@section('judul', 'Informasi Awal')
@section('menu', 'Informasi')
@section('sub', 'Informasi Awal')
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
            <form action="/informasi" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Name</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ktp">No. KTP</label>
                    <input type="text" name="ktp" id="ktp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telp">No. Telephone</label>
                    <input type="text" name="telp" id="telp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Kejadian</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                        style="height: 136px;"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send message">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection