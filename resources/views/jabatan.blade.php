@extends('master.app')
@section('title', 'Dashboard')
@section('judul', 'Jabatan')
@section('menu', 'Data')
@section('sub', 'Jabatan')
@section('content')
<div class="card">
	
@include('sess.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary collapsed-card">
                <div class="card-header">
                    <h2 class="card-title">Jabatan</h2>
                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i> Add Data
                        </button> --}}
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <form action="/jabatan/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nm_jabatan">Nama Jabatan</label>
                            <input type="text" id="nm_jabatan" name="nm_jabatan" class="form-control">
                            @error('nm_jabatan')
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            @enderror
                        </div>
						<div class="form-group"control>
                            <label for="">Jabatan Sebagai</label>
                            <select class="form-control" name="sebagai" >
                                <option disabled selected value="">Choose one!</option>
                                <option value="ketua">Ketua</option>
                                <option value="anggota">Anggota</option>
                                <option value="staf">Staf</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                <input type="submit" value="Create new" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>

    </div>
    {{-- </div> --}}
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Jabatan</th>
                    <th>Sebagai</th>
                    <th>diBuat</th>
                    <th>diUbah</th>
                    <th colspan="2" style="text-align: center">Aksi</th>
                    {{-- <th style="width: 40px"> <i class="fa fa-trash"></i> </th> --}}
                </tr>
            </thead>
            <tbody id="coba">
                @forelse($data as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->nm_jabatan }}</td>
                        <td>
                            @if ($item->sebagai=='desa')
                                Pengawas Desa
                            @elseif ($item->sebagai=='tps')
                                Pengawas TPS
                            @else
                                {{ucwords($item->sebagai)}}
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td colspan="2" class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#exampleModal{{ $item->id }}">
                                Edit
                                {{-- <i class="fa fa-trash-alt"></i> --}}
                            </button>

                        </td>
                        {{-- <td>
                            <form action="/jabatan/{{ $item->slug }}/hapus" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                            </form>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" align="center">
                            <div class="alert alert-danger alert-sm">Belum ada Data</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>


    </div>
    <!-- /.card-body -->
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}

@foreach($data as $no => $item)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $item->nm_jabatan }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/jabatan/{{$item->id}}/update" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nm_jabatan">Nama Jabatan</label>
                            <input value="{{ old('nm_jabatan') ?? $item->nm_jabatan }}"
                                type="text" name="nm_jabatan" id="nm_jabatan" class="form-control">
                        </div>
						
                        <div class="form-group">
                            <label for="inputStatus">Sebagai</label>
                            <select class="form-control" name="sebagai">
                            <option {{$item->sebagai=='ketua' ? 'selected' : ''}} value="ketua">Ketua</option>
                            <option {{$item->sebagai=='anggota' ? 'selected' : ''}} value="anggota">Anggota</option>
                            <option {{$item->sebagai=='staf' ? 'selected' : ''}} value="staf">Staf</option>
                            <option {{$item->sebagai=='desa' ? 'selected' : ''}} value="desa">Pengawas Desa</option>
                            <option {{$item->sebagai=='tps' ? 'selected' : ''}} value="tps">Pengawas TPS</option>

                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach


{{-- 
<script type="text/javascript">
var otomatis = setInterval(
function ()
{
$('#coba').load('table_jabatan').fadeIn("slow");
}, 1000);
</script> --}}
{{-- <div id="div"><?php include"isi.php"; ?></div> --}}
@endsection
@include('sess.scrpt_flash')