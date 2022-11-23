@extends('master.app')
@section('title', 'Pengawasan Langsung')
@section('judul', 'Pengawasan Langsung')
@section('menu', 'Tim')
@section('sub', 'Pengawasan')
@section('content')

<div class="d-flex justify-content-{{Auth::user()->id_tingkatan==1 ? 'between' : 'end'}} mb-3">
	@if (Auth::user()->id_tingkatan == 1)
		<a href="/tim/pengawasan/status_kecamatan" type="button" data-container="body" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Tim Kecamatan</a>
	@endif
	@if (Auth::user()->level=='admin')
		<button type="button" data-container="body" data-toggle="modal" data-target="#addtim" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Pengawasan Langsung</button>
	@endif
</div>
@include('sess.flash')
<div class="card">
    <div class="card-body pt-2 table-responsive">
        <table class="table" id="myTable">
            <thead class="">
                <tr>
                    <th style="width: 5%">#</th>
                    <th width="30%" >Tema Pengawasan</th>
					<th width="50%">Angota Tim</th>
                    <th width="10%" >Status</th>
                    <th width="5%" style="text-align: center">Detail</th>
                </tr>
            </thead>
            <tbody id="coba">
                @forelse($data as $no => $item)
					@if (Auth::user()->id_tingkatan == 1)
						<tr>
							<td>{{ ++$no }}</td>
							<td>
								{{$item->nama}}
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
								<a href="/tim/{{$item->id}}/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm">
									<i class="fa fa-eye"></i></a>
							</td>
						</tr>
					@else
						@if ($item->user->id_kecamatan == Auth::user()->id_kecamatan)
							<tr>
								<td>{{ ++$no }}</td>
								<td>
									{{$item->nama}}
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
									<a href="/tim/{{$item->id}}/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm">
										<i class="fa fa-eye"></i></a>
								</td>
							</tr>
						@endif	
					@endif
                    
                @empty
                    <tr>
                        <td colspan="5" align="center">
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
<div class="modal fade" id="addtim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tim Untuk Pengawasan Langsung <i class="fas fa-users"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tim/addtim/pengawasan" method="post" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Tema Pengawasan</label>
						<input type="text" name="nama" id="" placeholder="Masukan Judul Pengawasan" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Surat Tugas Ketua</label>
						<input type="text" name="st_ketua" id="" placeholder="Nomor Surat Tugas Ketua" class="form-control">
						<div class="custom-file mt-1">
							<input type="file" name="file_st_ketua" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">File Surat Tugas Ketua</label>
						</div>
					</div>

					<div class="form-group">
						<label for="">Surat Tugas Sekretaris</label>
						<input type="text" name="st_sekretaris" id="" placeholder="Nomor Surat Tugas Sekretaris" class="form-control">
						<div class="custom-file mt-1">
							<input type="file" name="file_st_sekretaris" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">File Surat Tugas Sekretaris</label>
						</div>
					</div>
					<div class="form-group">
					<label>Angoota Tim</label>
					<div class="select2-blue">
						<select name="anggota[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Tambahkan Anggota Tim Pengawasan" data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
						@foreach($user_anggota as $item)
							<option value="{{ $item->id }}">{{ $item->name }} ({{ $item->jabatan->nm_jabatan }})</option>
						@endforeach
						</select>
						{{-- <span>Harap menambahkan <span class="text-success">Ketua Tim</span> terlebih dahulu sebelum <span class="text-danger">Anggota Tim</span></span> --}}
					</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Waktu Mulai</label>
								<input type="date" name="mulai" id="" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Waktu Selesai</label>
								<input type="date" name="selesai" id="" class="form-control">
							</div>
						</div>
					</div>
                
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Buat Tim</button>
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