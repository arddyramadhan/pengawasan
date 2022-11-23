@extends('master.app')
@section('title', 'Informasi Awal')
@section('judul', 'Informasi Awal (A6)')
@section('menu', 'Informasi')
@section('sub', 'Informasi Awal')
@section('content')

<div class="row">
@php
    $sts_lengkapi = 'tidak';
    $jum_lengkapi = 0;
    $sts_buat_tim = 'tidak';
    $jum_buat_tim = 0;
@endphp
@forelse ($lengkapi as $no => $item_lengkapi)
    @if ($item_lengkapi->status=='lengkapi')
        @php
            ++$jum_lengkapi;
            $sts_lengkapi = 'ada';            
        @endphp
    @endif
@empty
@endforelse
{{-- buat tim --}}
@forelse ($buat_tim as $no => $item_buat_tim)
    @if ($item_buat_tim->status=='buat_tim')
        @php
            ++$jum_buat_tim;
            $sts_buat_tim = 'ada';            
        @endphp
    @endif
@empty  
@endforelse

@php
    $sts_alihkan = 'tidak';
    $jum_alihkan = 0;
@endphp
@forelse ($data_antrian as $no => $antri)
    @if ($antri->status=='alihkan' && $antri->alihkan->id_kecamatan == Auth::user()->id_kecamatan)
        @php
            ++$jum_alihkan;
            $sts_alihkan = 'ada';            
        @endphp
    @endif
@empty    
@endforelse


    <div class="col-md-12">
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalformA6"><i class="fas fa-plus"></i>  Informasi Awal</button>
		</div>
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
					@if ($sts_alihkan == 'ada' && Auth::user()->level=='admin' && Auth::user()->id_tingkatan==2)
                        <li class="nav-item"><a class="nav-link {{Request::segment(2)=='alihkan' ? 'active' : ''}}" href="/informasi_awal/alihkan">Perlu Ditangani <span class="right badge badge-sm badge-danger">{{$jum_alihkan}}</span></a></li>                        
                    @endif
                    @if ($sts_lengkapi == 'ada')
                        <li class="nav-item"><a class="nav-link {{Request::segment(2)=='lengkapi' ? 'active' : ''}}" href="/informasi_awal/lengkapi">Lengkapi <span class="right badge badge-sm badge-danger">{{$jum_lengkapi}}</span></a> </li>                        
                    @endif

                    <li class="nav-item"><a class="nav-link {{Request::segment(2) ? '' : 'active'}}" href="/informasi_awal">Semua</a></li>

                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='diproses' ? 'active' : ''}}" href="/informasi_awal/diproses">Diproses</a></li>
					@if ((Auth::user()->level=='admin') || ((Auth::user()->id_jabatan <= 2) && (Auth::user()->id_tingkatan <= 2)) )
						@if ($sts_buat_tim == 'ada')
							<li class="nav-item"><a class="nav-link {{Request::segment(2)=='buat_tim' ? 'active' : ''}}" href="/informasi_awal/buat_tim">Buatkan Tim <span class="right badge badge-sm badge-danger">{{$jum_buat_tim}}</span></a> </li>  
						@endif
					@endif
					<li class="nav-item"><a class="nav-link {{Request::segment(2)=='tim_dibuat' ? 'active' : ''}}" href="/informasi_awal/tim_dibuat">Tim Penelusuran</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='ditolak' ? 'active' : ''}}" href="/informasi_awal/ditolak">Ditolak</a></li>

					{{-- @if (Auth::user()->id_tingkatan==1)
                    	<li class="nav-item"><a class="nav-link {{Request::segment(2)=='tim_dibuat' ? 'active' : ''}}" href="/informasi_awal/tim_dibuat">IA Kecamatan</a></li>
					@endif --}}
                    {{-- <li class="nav-item"><a class="nav-link {{Request::segment(2)=='diproses' ? 'active' : ''}}" href="/informasi_awal/diproses">Diproses</a></li> --}}
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    {{-- antrian --}}
                    <div class="active tab-pane" id="">
						<div class="timeline">
							@php
								$nos = date('ymd');
							@endphp
								@foreach($data as $no => $item )
									@php
										if (Request::segment(2)) {
											$tgl = date('ymd', strtotime($item->updated_at));
										} else {
											$tgl = date('ymd', strtotime($item->created_at));
										}
										

									@endphp
									@if ($nos!=$tgl)
										<div class="time-label">
											@if (Request::segment(2))
												<span class="bg-red">{{ $item->updated_at->format('d F Y')}}</span>
											@else
												<span class="bg-red">{{ $item->created_at->format('d F Y')}}</span>
											@endif
										</div>
										@php
											$nos = $tgl;
										@endphp
									@elseif (date('ymd')==$tgl && $no==0)
										<div class="time-label">
											<span class="bg-red">Laporan Hari Ini</span>
										</div>
									@endif
									<div>
										<i class="fas fa-envelope bg-blue"></i>
										<div class="timeline-item">
											<span class="time"><i class="fas fa-clock"></i>
												{{-- {{$item->created_at->diffForHumans() }} --}}
												@if ($item->status=='lengkapi')
													Perlu Dilengkapi 
												@elseif($item->status=='diproses')
													Diproses pada : {{$item->updated_at->diffForHumans() }}
												@elseif($item->status=='buat_tim')
													Diplenokan : {{$item->updated_at->diffForHumans() }}
												@elseif($item->status=='tim_dibuat')
													Pembantukan Tim : {{$item->updated_at->diffForHumans() }}
												@else
													Laporan Tidak Diterima
												@endif
											</span>
											<h3 class="timeline-header"><a href=""> {{ $item->informasi->nama }}</a>
												(Kode : <span class="text-danger text-bold">IA{{sprintf("%04d", $item->id) }}</span>)
												@if($item->status == 'lengkapi')
													@if(Auth::user()->id == $item->id_user)
														(you)
													@else
														( {{ $item->user->name }} )
													@endif
												@elseif($item->informasi->status == 'ditangani')
													@if(Auth::user()->id == $item->id_user)
														(you)
													@else
														( {{ $item->user->name }} )
													@endif
												@elseif($item->informasi->status == 'diproses')
													@if(Auth::user()->id == $item->id_user)
														
													@else
														( {{ $item->user->name }} )
													@endif
												@else
													@if(Auth::user()->id == $item->id_user)
													
													@else
														( {{ $item->user->name }} )
													@endif
												@endif

											</h3>
											<div class="timeline-body">
											@if ($item->status=='lengkapi')
												{{ $item->informasi->deskripsi }}
											@else
												{{ $item->uraian_kejadian }}
											@endif
												
											</div>
											<div class="timeline-footer">
												{{-- <form action="/informasi/{{ $item->id }}/1" method="post">
														@csrf
														@method('PATCH')
														<button class="btn btn-primary btn-sm text-white" type="submit">
															<strong>Lihat</strong></button>
												</form> --}}
												@if ($item->status=='lengkapi')
													<form action="/informasi/{{ $item->id_informasi }}/1" method="post">
														@csrf
														@method('PATCH')
														{{-- <a class="btn btn-warning btn-sm">Lihat</a> --}}
														<button class="btn btn-primary btn-sm text-white" type="submit">
															<strong>Lihat</strong></button>
													</form>
												@else
													<a href="/informasi_awal/{{$item->id}}/detail" class="btn btn-primary btn-sm text-white">Lihat</a>
												@endif
											</div>
										</div>
									</div>
								@endforeach
							<div>
								<i class="fas fa-clock bg-gray"></i>
								<div class="float-right pr-3">
									{{ $data->links() }}
                                </div>
							</div>
						</div>
                    </div>

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

<div class="modal fade" id="exampleModalformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Langsung Informasi Awal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/informasi_awal/buatlangsung" method="post">
				@csrf
                <div class="form-group">
                    <label for="peristiwa">Peristiwa</label>
                    <input type="text" name="peristiwa" placeholder="Peristiwa" id="peristiwa" class="form-control">
                    {{-- <p class="text-sm text-success">Info: Wajib di isi</p> --}}
                </div>
                <div class="form-group">
                    <label for="tempat_kejadian">Tempat Kejadian</label>
                    <input type="text" name="tempat_kejadian" placeholder="Tempat Kejadian" id="tempat_kejadian"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal dan waktu kejadian <span class="text-danger text-sm">**</span></label>
                    <input type="datetime-local" name="waktu_tgl_kejadian" class="form-control">
                    <input type="datetime-local" hidden name="waktu_kejadian" class="form-control"
                        value="">
                   
                </div>
                <div class="form-group">
                    <label for="terlapor">Terlapor</label>
                    <input type="text" placeholder="Terlapor" name="terlapor" id="terlapor" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat_terlapor">Alamat Terlapor</label>
                    <input type="text" name="alamat_terlapor" placeholder="Alamat Terlapor" id="alamat_terlapor"
                        class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label>Uraian Kejadian <span class="text-danger text-sm">**</span></label>
                    <textarea class="form-control" name="uraian_kejadian" rows="4" placeholder=""></textarea>
                    {{-- <textarea class="form-control" hidden name="deskripsi" rows="4"></textarea> --}}
                </div>
                <div class="form-group">
                    <p class="text-danger">Penting : <br> ** Boleh di kososngkan jika ingin menggunakan data dari Informasi Masyarakat</p>
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
	<!-- The time line -->
	
</div>
<!-- /.col -->
</div>
@endsection