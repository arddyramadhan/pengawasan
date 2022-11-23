@extends('master.app')
@section('title', 'Kecamatan')
@section('judul', 'Kecamatan')
@section('menu', 'Manajemen Wilayah')
@section('sub', 'Kecamatan')
@section('content')

<div class="d-flex justify-content-end mb-3">
	<button type="button" data-container="body" data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button>
</div>
@include('sess.flash')
<div class="card">
    <div class="card-body pt-2 table-responsive">
        <table class="table" id="myTable">
            <thead class="">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
					<th>Kabupaten/Kota</th>
					<th>Alamat</th>
					<th>Di Buat</th>
                    <th style="text-align: center">Detail</th>
                </tr>
            </thead>
            <tbody id="coba">
                @forelse($data as $no => $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>
                            {{$item->nama}}
                        </td>
                        <td>
                            {{ucfirst($item->kabupaten->status)}} {{$item->kabupaten->nama}}
                        </td>
						<td>
							{{$item->almt_jalan}} {{$item->almt_kel_des}} Kecamatan {{$item->almt_kecamatan}} {{ucfirst($item->status)}} {{$item->nama}}
						</td>
                        <td>
                            {{ $item->created_at->format('d F Y') }}
                        </td>
						<td align="center">
							<a href="/kecamatan/{{$item->id}}/detail" title="Detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i></a>
                        </td>
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

{{-- Form add tim --}}
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kecamatan {{Auth::user()->id_kabupaten_kota}} <i class="fas fa-users"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kecamatan/create" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="nama" id="" placeholder="Contoh : Suwawa" class="form-control">
					</div>
					<div class="form-group" {{Auth::user()->level!='super' ? 'hidden' : '' }}>
						<label for="">Kabupaten - Kota</label>
                        <select name="id_kabupaten_kota" id="" class="form-control">

                            @if (Auth::user()->level=='super')
                                <option selected disabled value="">Choose One!!</option>    
                                @forelse ($kabupaten as $kab)
                                    <option value="{{$kab->id}}">{{$kab->nama}}</option>
                                @empty
                                    
                                @endforelse
                            @else
                                @forelse ($kabupaten as $kab)
                                    <option {{Auth::user()->id_kabupaten_kota==$kab->id ? 'selected' : '' }}  value="{{$kab->id}}">{{$kab->nama}}</option>
                                @empty
                                    
                                @endforelse
                            @endif
                        </select>
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
		$(document).ready( function () {
			$('#myTable').DataTable({
				"ordering": false,
			});
		} );
	</script>
@endpush