@extends('master.app')
@section('title', 'User')
@php    
    $coba = Auth::user()->id_tingkatan==1 ? 'Kecamatan '.$kec_kel->nama : $kec_kel->status.' '.$kec_kel->nama;
@endphp
@section('judul', 'Pengawas '.$coba)
@section('menu', 'Manajemen User')
@section('sub', $coba)
@section('content')



<div class="col-md-12">
    <div class="d-flex justify-content-end mb-3">
        @if (Auth::user()->level=='admin' && Auth::user()->tingkatan->id==1)
            <button type="button" data-container="body" data-toggle="modal" data-target="#addpengawas" class="btn btn-primary btn-sm ml-1"><i class="fas fa-plus"></i> Pengawas</button>
        @endif
        @if (Auth::user()->level=='admin' && Auth::user()->tingkatan->id==2)
            <button type="button" data-container="body" data-toggle="modal" data-target="#addtim" class="btn btn-primary btn-sm ml-1"><i class="fas fa-plus"></i> Kelurahan/Desa</button>
            <button type="button" data-container="body" data-toggle="modal" data-target="#addtim" class="btn btn-primary btn-sm ml-1"><i class="fas fa-plus"></i> PTPS</button>            
        @endif



    </div>
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                @if (Auth::user()->level=='admin' && Auth::user()->tingkatan->id==1)
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='kecamatan' ? 'active' : ''}}" href="/user/kecamatan/{{$id}}/table">Kecamatan</a></li>
                @endif
                <li class="nav-item"><a class="nav-link {{Request::segment(2)=='kelurahan' ? 'active' : ''}}" href="/user/kelurahan/{{$id}}/table">Kelurahan/Desa</a></li>
                <li class="nav-item"><a class="nav-link  {{Request::segment(2)=='tps' ? 'active' : ''}}" href="/user/tps/{{$id}}/table">PTPS</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content table-responsive">
                <div class="active tab-pane" id="activity">
                    <table class="table" id="myTable">
                        <thead class="">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                {{-- <th>Alamat</th> --}}
                                {{-- <th>Telephone</th> --}}
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="coba">
                            @forelse($data as $no => $item)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td class="{{$item->level=='admin' ? 'text-primary' : ''}}" >{{$item->name}}</td>
                                <td>{{$item->jabatan->nm_jabatan}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->jk=='pria' ? 'Laki-laki' : 'Perempuan'}}</td>
                                {{-- <td>{{$item->alamat}}</td> --}}
                                {{-- <td>{{$item->tlp}}</td> --}}
                                <td align="center">
                                    <a href="/user/{{$item->id}}/detail" title="Edit" class="btn text-success btn-link btn-sm "><i class="fa fa-edit"></i></a>
                                    <a href="/user/{{$item->id}}/detail" title="Detail" class="btn btn-link btn-sm "><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" align="center">
                                    <div class="alert alert-danger alert-sm">Belum ada Data</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@include('sess.flash')

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
                <form action="/user/kecamatan/store" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="name" id="" placeholder="Nama lengkap" class="form-control">
						<input type="hidden" name="id_kecamatan" id="" placeholder="Nama lengkap" value="{{$id}}" class="form-control">
						{{-- <input type="hidden" name="id_tingkatan" id="" placeholder="Nama lengkap" value="2" class="form-control"> --}}
					</div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="id_jabatan" id="" class="form-control">
                            <option disabled selected value="">Choose one!!</option>
                            @forelse ($jabatan as $jab)
                                @if (Auth::user()->id_tingkatan==1)
                                    @if ($jab->nm_jabatan != 'Desa' && $jab->nm_jabatan != 'PTPS' )
                                        <option value="{{$jab->id}}">{{$jab->nm_jabatan}}</option>
                                    @endif
                                @else
                                    <option value="{{$jab->id}}">{{$jab->nm_jabatan}}</option>
                                @endif
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
@endsection


@include('sess.scrpt_flash')

@push('link')
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> --}}
{{-- <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> --}}
@endpush

@push('scripts')
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "ordering": false,
        });
    });

</script>
@endpush
