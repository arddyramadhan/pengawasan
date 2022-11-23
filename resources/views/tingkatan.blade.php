@extends('master.app')
@section('title', 'Tingkatan')
@section('judul', 'Tingkatan')
@section('menu', 'Data')
@section('sub', 'Tingkatan')
@section('content')
<div class="card">
    {{-- <div class="card-header"> --}}
    {{-- <h3 class="card-title">Data Jabatan</h3>
        <div class="card-tools">
            <ul class="pagination pagination-sm float-right">
                <button class="btn btn-sm btn-primary">Add Data</button>
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div> --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary collapsed-card">
                <div class="card-header">
                    <h2 class="card-title">Tingkatan</h2>
                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-plus"></i> Add Data
                        </button> --}}
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <form action="/tingkatan/create" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nm_tingkatan">Nama tingkatan</label>
                            <input type="text" id="nm_tingkatan" name="nm_tingkatan" class="form-control">
                            @error('nm_tingkatan')
                                <div class="text-danger">tingkatan tidak boleh kosong</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Lainnya</label>
                            <select class="form-control" name="lainnya">
                                <option selected disabled value="">Select one</option>
                                <option value="Bawaslu">Bawaslu</option>
                                <option value="Panwaslu">Panwaslu</option>
                                <option value="Panwas">Panwas</option>
                                <option value="PTPS">PTPS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select one</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                        <label for="inputDescription">Project Description</label>
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected="" disabled="">Select one</option>
                            <option>On Hold</option>
                            <option>Canceled</option>
                            <option>Success</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Client Company</label>
                        <input type="text" id="inputClientCompany" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Project Leader</label>
                        <input type="text" id="inputProjectLeader" class="form-control">
                    </div> --}}
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
                    <th>Nama Tingkatan</th>
                    <th>Status</th>
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
                        <td>{{ $item->nm_tingkatan }}</td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            {{ $item->updated_at }}</td>
                        <td colspan="2" class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#exampleModal{{ $item->id }}">
                                Edit
                                {{-- <i class="fa fa-trash-alt"></i> --}}
                            </button>

                        </td>
                        {{-- <td>
                            <form action="/tingkatan/{{ $item->id }}/hapus" method="post">
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

@foreach($data as $no => $item2)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $item2->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $item2->nm_tingkatan }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tingkatan/{{ $item2->id }}/update" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label for="nm_tingkatan">Nama tingkatan</label>
                            <input readonly value="{{$item2->nm_tingkatan }}"
                                type="text" name="nm_tingkatan" id="nm_tingkatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Lainnya</label>
                            <select class="form-control" name="lainnya">
                                <option {{$item2->lainnya=='Bawaslu' ? 'selected' : ''}}  value="Bawaslu">Bawaslu</option>
                                <option {{$item2->lainnya=='Panwaslu' ? 'selected' : ''}} value="Panwaslu">Panwaslu</option>
                                <option {{$item2->lainnya=='Panwas' ? 'selected' : ''}} value="Panwas">Panwas</option>
                                <option {{$item2->lainnya=='PTPS' ? 'selected' : ''}} value="PTPS">PTPS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option {{$item2->status=='yes' ? 'selected' : ''}} value="yes">Yes</option>
                                <option {{$item2->status=='no' ? 'selected' : ''}} value="no">No</option>
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