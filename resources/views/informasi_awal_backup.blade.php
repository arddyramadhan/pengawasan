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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
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
										$tgl = date('ymd', strtotime($item->created_at));
									@endphp
									@if ($nos!=$tgl)
										<div class="time-label">
											<span class="bg-red">{{ $item->created_at->format('d F Y')}}</span>
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
													Dalam Proses
												@elseif($item->status=='buat_tim')
													Buatkan Tim
												@elseif($item->status=='tim_dibuat')
													Tim Penelusuran
												@else
													Laporan Tidak Diterima
												@endif
											</span>
											<h3 class="timeline-header"><a href="#"> {{ $item->informasi->nama }}</a>
												(<span class="text-danger text-bold">IA-{{sprintf("%04d", $item->id) }}</span>)
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



<div class="col-md-12">
	<!-- The time line -->
	
</div>
<!-- /.col -->
</div>
@endsection