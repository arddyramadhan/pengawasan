@extends('master.app')
@section('title', 'Pengawas')
@section('judul', 'Pengawas')
@section('menu', 'Manajemen Pengawas')
@section('sub', 'Pengawas')
@section('content')
@include('sess.flash')
<div class="d-flex justify-content-end mb-3">
	<button type="button" data-container="body" data-toggle="modal" data-target="#addpengawas" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button>
</div>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            @forelse ($data as $item)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Pengawas Kabupaten
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="lead"><b>{{$item->name}}</b></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                
                                <p class="text-muted text-sm"><b>About: </b> {{$item->tingkatan->lainnya}} / {{ucfirst($item->jabatan->nm_jabatan)}} / {{$item->tingkatan->nm_tingkatan=='Kabupaten' ? ucfirst($item->tingkatan->nm_tingkatan).' '.$item->kabupaten->nama : 'Kecamatan '.$item->kecamatan->nama}}</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Alamat: {{$item->alamat}}</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone : {{$item->tlp}}</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img width="500px" height="500px"  src="{{ asset('storage/'.$item->foto) }}" alt="user-avatar"
                                    class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#editpengawas{{$item->id}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/user/{{$item->id}}/detail" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Lihat Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {{-- <nav aria-label="Contacts Page Navigation"> --}}
        <div class="pagination justify-content-center m-0">
            {{$data->links()}}        
        </div>
        {{-- </nav> --}}
    </div>
    <!-- /.card-footer -->
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}


<div class="modal fade" id="addpengawas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Pengawas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/kecamatan/store_kecamatan" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="name" id="" placeholder="Nama lengkap" class="form-control">
					</div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="id_jabatan" id="" class="form-control">
                            <option disabled value="">Choose one!!</option>
                            @forelse ($jabatan as $jab)
                                <option value="{{$jab->id}}">{{$jab->nm_jabatan}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
						<label for="">E-mail</label>
						<input type="email" name="email" id="" placeholder="Email." class="form-control">
					</div>
                    <div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" id="" placeholder="Password" class="form-control">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Akses</label>
								<select name="level" id="" class="form-control">
                                    <option disabled selected value="">Choose one!!</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
							</div>
							<div class="col-md-6">
								<label for="">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-control">
                                    <option disabled selected value="">Choose one!!</option>
                                    <option value="pria">Laki - Laki</option>
                                    <option value="wanita">Perempuan</option>
                                </select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" name="alamat" id="" placeholder="Alamat." class="form-control">
					</div>
					<div class="form-group">
						<label for="">Telephone</label>
						<input type="text" name="tlp" id="" placeholder="Nomor Telephone" class="form-control">
					</div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose One..</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- edit --}}
@forelse ($data as $item)
    <div class="modal fade" id="editpengawas{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Uba Data Pengawas {{$item->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/{{$item->id}}/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" id="" value="{{$item->name}}" placeholder="Nama lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="id_jabatan" id="" class="form-control">
                                <option disabled value="">Choose one!!</option>
                                @forelse ($jabatan as $jab)
                                    <option {{$jab->id==$item->id_jabatan ? 'selected' : ''}} value="{{$jab->id}}">{{$jab->nm_jabatan}}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" value="{{$item->email}}" name="email" id="" placeholder="Email." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" placeholder="Password baru" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Akses</label>
                                    <select name="level" id="" class="form-control">
                                        <option disabled value="">Choose one!!</option>
                                        <option {{$item->level == 'admin' ? 'selected' : ''}} value="admin">Admin</option>
                                        <option {{$item->level == 'user' ? 'selected' : ''}} value="user">User</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control">
                                        <option disabled value="">Choose one!!</option>
                                        <option {{$item->jk == 'pria' ? 'selected' : ''}} value="pria">Laki - Laki</option>
                                        <option  {{$item->jk == 'wanita' ? 'selected' : ''}} value="wanita">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" value="{{$item->alamat}}" id="" placeholder="Alamat." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Telephone</label>
                            <input type="text" name="tlp" id="" value="{{$item->tlp}}" placeholder="Nomor Telephone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose One..</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    
@endforelse


@endsection

@include('sess.scrpt_flash')
