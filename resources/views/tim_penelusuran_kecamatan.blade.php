@extends('master.app')
@section('title', 'Tim Penelusuran Kecamatan')
@section('judul', 'Tim Penelusuran Kecamatan')
@section('menu', 'Tim Pengawasan')
@section('sub', 'Penelusuran')
@section('content')

<div class="d-flex justify-content-{{Auth::user()->id_tingkatan==1 ? 'between' : 'end'}} mb-3">
	@if (Auth::user()->id_tingkatan == 1)
		<a href="/tim/penelusuran/status" type="button" data-container="body" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Tim Kabupaten</a>
	@endif
</div>
@include('sess.flash')
<div class="card">
    <div class="card-body pt-2 table-responsive">
        <table class="table col-md-12" id="myTable">
            <thead class="">
                <tr>
                    <th style="width: 5%">#</th>
                    <th  width="30%" >Peristiwa</th>
                    <th width="5%" >Kecamatan</th>
					<th width="45%">Angota Tim</th>
                    <th  width="10%">Status</th>
                    <th  width="5%" style="text-align: center">Detail</th>
                </tr>
            </thead>
            <tbody id="coba">
                @forelse($data as $no => $item)
                    @if ($item->user->id_tingkatan == 2)
                       <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->informasi_awal->peristiwa }}</td>
                            <td>
								{{$item->user->kecamatan->nama}}
							</td>
                            <td>
                                {{-- @php
                                    $ketua="Ketua tim Belum di tentukan";
                                    foreach ($item->tim_user as $value) {
                                        if ($value->status=='ketua') {
                                            $ketua = $value->user->name;
                                            break;
                                        }
                                    }
                                    echo $ketua;
                                @endphp --}}
                                <ul class="list-inline">
                                    @forelse ($item->tim_user as $usr)
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar img-circle" title="{{$usr->user->name}}" width="50px" height="50px"  src="{{ asset('storage/'.$usr->user->foto) }}">
                                        </li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </td>
                            <td>
                                @if (date('Y-m-d') > date('Y-m-d', strtotime($item->selesai)))
                                    <div class="badge badge-success">Selesai</div>
                                @else
                                    <div class="badge badge-warning">Dalam Proses</div>
                                @endif
                            </td>
                            <td align="center">
                                <a href="/tim/{{$item->id}}" title="Detail" class="btn btn-link text-primary btn-sm">
                                    <i class="fa fa-eye"></i></a>
                            </td>
                        </tr> 
                    
                    @endif
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
@endsection


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