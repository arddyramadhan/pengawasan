@extends('master.app')
@section('title', 'Tim Pengawasan')
@section('judul', 'Detail Tim')
@section('menu', 'Tim Pengawasan')
@section('sub', 'Detail')
@section('content')
<div class="row">
	@include('sess.flash')
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail</h3>
                <div class="card-tools">
					@if (Auth::user()->id==$tim->id_user)
						<button class="btn btn-tool text-success" data-toggle="modal" data-target="#edittim"><i class="fas fa-edit"></i></button>
					@endif
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">

                    <table class="table table-borderless" width="100%">
                        <tr>
                            <td width="15%">Penelusuran</td>
                            <th width="1%">:</th>
                            <th width="94%">{{ $tim->nama }}</th>
                        </tr>
						@php
							$sts_ketua = "tidak ada";
						@endphp
						@foreach($tim->tim_user as $item)
							@if($item->status=='ketua')
								@php
									$sts_ketua = "ada";
									break;
								@endphp
							@endif
						@endforeach
						@if ($tim->st_ketua != null || $tim->st_sekretaris != null)
						<tr>
                            <td width="15%">Surat Tugas</td>
                            <th width="1%">:</th>
                            <th width="94%">{!! ($tim->st_ketua != null ? $tim->st_ketua. '( Ketua ) <button class="btn btn-link" data-toggle="modal" data-target="#st_ketua"><i class="fas fa-file"></i></button> ' : $tim->st_sekretaris.' ( Sekretaris ) <button class="btn btn-link" data-toggle="modal" data-target="#st_sekretaris"><i class="fas fa-file"></i></button>' ) !!}</th>
                        </tr>
						<tr {{($tim->st_ketua == null ? 'hidden' : ' ')}} {{($tim->st_sekretaris == null ? 'hidden' : ' ')}}>
                            <td width="15%"></td>
                            <th width="1%"></th>
                            <th width="94%">{!!$tim->st_sekretaris.' ( Sekretaris ) <button class="btn btn-link" data-toggle="modal" data-target="#st_sekretaris"><i class="fas fa-file"></i></button>'!!}</th>
                        </tr>
						@endif

						<tr>
                            <td width="15%">Waktu</td>
                            <th width="1%">:</th>
                            <th width="94%">
								@if ($tim->selesai == null)
									{{date('d M Y', strtotime($tim->mulai))}}
								@else
									{{date('d M Y', strtotime($tim->mulai)).' s/d '.date('d M Y', strtotime($tim->selesai))}}
								@endif
							</th>
                        </tr>
						
                    </table>
                    <div class="mailbox-controls text-center table-responsive">
                        <table class="table table-borderless">
                            <thead class="">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
									@if ($tim->status == 'penelusuran')
                                    	<th>Status</th>
									@endif
                                    
                                </tr>
                            </thead>
                            <tbody id="coba">
                                @forelse($tim->tim_user as $no => $item)
                                    @if($item->status == 'ketua')
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
													@if (($item->user->jabatan->sebagai=='ketua') || ($item->user->jabatan->sebagai=='anggota') )
														{{$item->user->jabatan->nm_jabatan.' '.$item->user->tingkatan->lainnya.' '.$item->user->tingkatan->nm_tingkatan}}
													@else
														{{$item->user->jabatan->nm_jabatan}}
													@endif
												</td>
											@if  ($tim->status == 'penelusuran')
												<td>
													{{ $item->status }}
												</td>
											@endif
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" align="center">
                                            <div class="alert alert-danger alert-sm">Ketua belum di tentukan</div>
                                        </td>
                                    </tr>
                                @endforelse

                                @forelse($tim->tim_user as $no => $item)
                                    @if($item->status == 'anggota')
                                        <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
												@if (($item->user->jabatan->sebagai=='ketua') || ($item->user->jabatan->sebagai=='anggota') )
													{{$item->user->jabatan->nm_jabatan.' '.$item->user->tingkatan->lainnya.' '.$item->user->tingkatan->nm_tingkatan}}
												@else
													{{$item->user->jabatan->nm_jabatan}}
												@endif
											</td>
											@if ($tim->status == 'penelusuran')
												<td>
													{{ $item->status }}
												</td>
											@endif
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="5" align="center">
                                            <div class="alert alert-danger alert-sm">
                                                Ketua belum di tentukan
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- @if(Auth::user()->level == 'admin') --}}

                {{-- @endif --}}
                <!-- /.mailbox-controls -->
                {{-- <div class="mailbox-read-message">
                    <p>Uraian singkat kejadian,</p>
                </div> --}}
                <!-- /.mailbox-read-message -->
            </div>
            <div class="card-footer">
				@php
					$izin = "no";
				@endphp
				@foreach ($tim->tim_user as $akses)
					@if ($akses->id_user == Auth::user()->id)
						@php
							$izin = 'yes';
							break;
						@endphp
					@endif
				@endforeach
				@if ($izin == 'yes')
					<div class="float-right">
						<a href="/lhp/{{ $tim->id }}/create" class="btn btn-default"><i class="fas fa-file-signature"></i>
							Laporan Hasil Pengawasan</a>
					</div>
				@endif
                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#masyarakat"><i class="fas fa-user"></i> Laporan Masyarakat </button> --}}
                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#informasiawal"><i
                        class="fas fa-file"></i> Informasi Awal </button> --}}
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>


@forelse($tim->lhp as $item)
    @php
        $ada = ' ';
        break;
    @endphp
@empty
    @php
        $ada = 'hidden';
    @endphp
@endforelse

{{-- LHP --}}
@if ($ada != 'hidden')
	<div class="row">
		<div class="col-md-12">
			<!-- The time line -->
			<div class="timeline">
				<!-- timeline time label -->
				<div class="time-label">
					<span class="bg-blue">Laporan Hasil Pengawasan</span>
				</div>

				@forelse($tim->lhp as $item)
					<div>
						<i class="fas fa-file bg-blue"></i>
						<div style="font-size: 22px ;font-family: &quot;Times New Roman&quot;"
							class="pl-5 pr-5 card timeline-item
							{{-- @if ($item->dugaan == 'ada')
								card-danger
							@elseif ($item->dugaan == 'tidak')
								card-success
							@elseif ($item->dugaan == 'belum')
								card-warning
							@elseif ($item->dugaan == 'pleno') --}}
								card-primary
							{{-- @endif  --}}
							card-outline collapsed-card">
							<div class="card-header card-borderless">
								<h3 class="card-title"><span class="text-bold">{{ $item->user->name }}</span> 
									@if ($item->dugaan == 'pleno' || $item->dugaan == 'belum')
										<span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm {{ $item->dugaan=='pleno' ? 'badge-primary' : 'badge-warning' }} ">{{ $item->dugaan=='pleno' ? 'Pleno' : 'Pembuatan' }}</span>
									@else
										| Dugaan
										Pelanggaran : <span
										class="right badge badge-sm {{ $item->dugaan=='ada' ? 'badge-danger' : 'badge-success' }} text-bold">{{ $item->dugaan=='ada' ? 'Ada' : 'Tidak Ada' }}</span>
									@endif
								</h3>
								<div class="card-tools">
									@if (Auth::user()->id == $item->id_user)
										<a href="/lhp/{{$item->id}}/edit" class="btn btn-tool text-success">
											<i class="fas fa-edit"></i>
										</a>
									@endif
									{{-- <a href="/lhp/{{$item->id}}/download" class="btn btn-tool text-secondary">
										<i class="fas fa-download"></i>
									</a> --}}
									{{-- <a href="/lhp/{{$item->id}}/print/print" target="_blank" class="btn btn-tool text-warning">
										<i class="fas fa-print"></i>
									</a> --}}
									<a href="/lhp/{{$item->id}}/detail" class="btn btn-tool text-primary">
										<i class="fas fa-eye"></i>
									</a>
									<button type="button" class="btn btn-tool text-secondary" data-card-widget="collapse"
										title="Collapse">
										<i class="fas fa-plus"></i>
									</button>
								</div>
							</div>
							<div class="card-body card-borderless" style="">
								<div>
									<p class="text-bold">I. Data Pengawas Pemilihan : </p>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">a. </td>
													<td width="98%">Nama Pelaksana Tugas Pengawasan</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												@forelse($tim->users as $no => $user)
													<tr>
														<td width="1%">{{ ++$no }}. </td>
														<td width="99%">{{ $user->name }}</td>
													</tr>
												@empty

												@endforelse

											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">b. </td>
													<td width="98%">Jabatan</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												@forelse($tim->users as $no => $jab)
													<tr>
														<td width="1%">{{ ++$no }}. </td>
														<td width="99%">
															@if (($jab->jabatan->sebagai=='ketua') || ($jab->jabatan->sebagai=='anggota') )
																{{$jab->jabatan->nm_jabatan.' '.$jab->tingkatan->lainnya.' '.$jab->tingkatan->nm_tingkatan}}
															@else
																{{$jab->jabatan->nm_jabatan}}
															@endif	
														</td>
													</tr>
												@empty

												@endforelse

											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">c. </td>
													<td width="98%">Alamat</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												@if ($sts_ketua=='ada')
													@forelse($tim->tim_user as $no => $ketu)
														@if($ketu->status=='ketua')
															<tr>
																<td width="99%">{{ $ketu->user->alamat }}</td>
															</tr>
														@endif

													@empty
													@endforelse	
												@else
													<tr>
														<td width="99%">{{$item->user->alamat}}</td>
													</tr>
												@endif	
											</table>
										</div>
									</div>
								</div>
								<div>
									<p class="text-bold">II. Kegiatan Pengawasan : </p>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">a. </td>
													<td width="98%">Tahapan yang di awasi</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">{{ $item->tahapan }}</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">b. </td>
													<td width="98%">Bentuk Pengawasan</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">
														{{ ($item->bentuk=='langsung' ? 'Langsung' : 'Tidak langsung') }}
													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">c. </td>
													<td width="98%">Pihak yang diawasi</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">{{ $item->diawasi }}</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">d. </td>
													<td width="98%"></td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										{{-- Mulai --}}
										@if(date('D', strtotime($item->mulai))=='Mon')
											@php
												$hari_mulai = 'Senin';
											@endphp
										@elseif(date('D', strtotime($item->mulai))=='Tue')
											@php
												$hari_mulai = 'Selasa';
											@endphp
										@elseif(date('D', strtotime($item->mulai))=='Wed')
											@php
												$hari_mulai = 'Rabu';
											@endphp
										@elseif(date('D', strtotime($item->mulai))=='Thu')
											@php
												$hari_mulai = 'Kamis';
											@endphp
										@elseif(date('D', strtotime($item->mulai))=='Fri')
											@php
												$hari_mulai = "Jum'at";
											@endphp
										@elseif(date('D', strtotime($item->mulai))=='Sat')
											@php
												$hari_mulai = 'Sabtu';
											@endphp
										@elseif(date('D', strtotime($item->mulai))=='Sun')
											@php
												$hari_mulai = 'Minggu';
											@endphp
										@endif

										{{-- bulan --}}
										@if(date('m', strtotime($item->mulai))==1)
											@php
												$bulan_mulai = 'Januari';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==2)
											@php
												$bulan_mulai = 'Februari';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==3)
											@php
												$bulan_mulai = 'Maret';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==4)
											@php
												$bulan_mulai = 'April';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==5)
											@php
												$bulan_mulai = 'Mei';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==6)
											@php
												$bulan_mulai = 'Juni';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==7)
											@php
												$bulan_mulai = 'Juli';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==8)
											@php
												$bulan_mulai = 'Agustus';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==9)
											@php
												$bulan_mulai = 'September';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==10)
											@php
												$bulan_mulai = 'Oktober';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==11)
											@php
												$bulan_mulai = 'November';
											@endphp
										@elseif(date('m', strtotime($item->mulai))==12)
											@php
												$bulan_mulai = 'Desember';
											@endphp
										@endif


										{{-- Selesai --}}
										@if(date('D', strtotime($item->selesai))=='Mon')
											@php
												$hari_selesai = 'Senin';
											@endphp
										@elseif(date('D', strtotime($item->selesai))=='Tue')
											@php
												$hari_selesai = 'Selasa';
											@endphp
										@elseif(date('D', strtotime($item->selesai))=='Wed')
											@php
												$hari_selesai = 'Rabu';
											@endphp
										@elseif(date('D', strtotime($item->selesai))=='Thu')
											@php
												$hari_selesai = 'Kamis';
											@endphp
										@elseif(date('D', strtotime($item->selesai))=='Fri')
											@php
												$hari_selesai = "Jum'at";
											@endphp
										@elseif(date('D', strtotime($item->selesai))=='Sat')
											@php
												$hari_selesai = 'Sabtu';
											@endphp
										@elseif(date('D', strtotime($item->selesai))=='Sun')
											@php
												$hari_selesai = 'Minggu';
											@endphp
										@endif

										{{-- bulan --}}
										@if(date('m', strtotime($item->selesai))==1)
											@php
												$bulan_selesai = 'Januari';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==2)
											@php
												$bulan_selesai = 'Februari';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==3)
											@php
												$bulan_selesai = 'Maret';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==4)
											@php
												$bulan_selesai = 'April';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==5)
											@php
												$bulan_selesai = 'Mei';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==6)
											@php
												$bulan_selesai = 'Juni';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==7)
											@php
												$bulan_selesai = 'Juli';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==8)
											@php
												$bulan_selesai = 'Agustus';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==9)
											@php
												$bulan_selesai = 'September';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==10)
											@php
												$bulan_selesai = 'Oktober';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==11)
											@php
												$bulan_selesai = 'November';
											@endphp
										@elseif(date('m', strtotime($item->selesai))==12)
											@php
												$bulan_selesai = 'Desember';
											@endphp
										@endif
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="25%">Hari</td>
													<td width="1%">:</td>
													<td width="74%">
														@if ($item->selesai != null)
															{{$hari_mulai.' s/d '.$hari_selesai}}
														@else
															{{$hari_mulai}}
														@endif
													</td>
												</tr>
												<tr>
													<td width="25%">Tanggal</td>
													<td width="1%">:</td>
													<td width="74%">
														@if ($item->selesai != null)
															{{date('d', strtotime($item->mulai)).' s/d '.date('d', strtotime($item->selesai))}}
														@else
															{{date('d', strtotime($item->mulai))}}
														@endif
													</td>
												</tr>
												<tr>
													<td width="25%">Bulan</td>
													<td width="1%">:</td>
													<td width="74%">
														@if ($bulan_mulai != $bulan_selesai)
															{{$bulan_mulai.' s/d '.$bulan_selesai}}
														@else
															{{$bulan_mulai}}
														@endif
													</td>
												</tr>
												<tr>
													<td width="25%">Tahun</td>
													<td width="1%">:</td>
													<td width="74%">
														@if (date('Y', strtotime($item->mulai)) == date('Y', strtotime($item->selesai)))
															{{date('Y', strtotime($item->mulai))}}
														@else
															{{date('Y', strtotime($item->mulai)).' s/d '.date('Y', strtotime($item->selesai))}}
														@endif
													</td>
												</tr>
												<tr>
													<td width="25%">Waktu/Jam</td>
													<td width="1%">:</td>
													<td width="74%">
														{{date('H.i', strtotime($item->mulai))}} Wita s/d Selesai
													</td>
												</tr>
												<tr>
													<td width="25%">Tempat/Lokasi</td>
													<td width="1%">:</td>
													<td width="74%">{{$item->lokasi}}</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<p class="text-bold">III. Uraian Hasil Pengawasan : </p>
									<div class="row">
										<div class="col-md-12 pr-4">

											{!! $item->uraian_hasil !!}
										</div>
									</div>
								</div>
								<div>
									<div class="row ">
										<div class="col-md-3 mr-5 text-bold">IV. Dugaan Pelanggaran </div>
										<div class="col-md-7 ml-2 text-bold">:
											{{ ($item->dugaan=='ada' ? 'Ada' : 'Tidak Ada') }}
										</div>
									</div>
								</div>
								<div class="text-bold">
									<p class="text-bold">V. Informasi Dugaan Pelanggaran : </p>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">a. </td>
													<td width="98%">Tempat Kejadian </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">{{ $item->tempat_kejadian }}</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">b. </td>
													<td width="98%">Waktu Kejadian </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">
													@if ($item->waktu_kejadian != null)
														{{ date('d F Y', strtotime($item->waktu_kejadian)) }}
													@endif
													</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">c. </td>
													<td width="98%">Nama Pelaku </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												@forelse($item->pelaku as $n => $pel)
													<tr>
														<td width="100%">
															{{ ++$n.'. '.$pel->nama }}</td>
													</tr>
												@empty

												@endforelse

											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">d. </td>
													<td width="98%">Status Pelaku </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												@forelse($item->pelaku as $ns => $pel_sts)
													<tr>
														<td width="100%">
															{{ ++$ns.'. '.$pel_sts->status }}
														</td>
													</tr>
												@empty

												@endforelse

											</table>
										</div>
									</div>
								</div>
								<div>
									<p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
									<div class="row">
										<div class="col-md-12 pr-4">

											{!! $item->uraian_dugaan !!}
										</div>
									</div>
								</div>

								<div class="text-bold">
									<p class="text-bold">VII. Saksi - Saksi : </p>

									@forelse($item->saksi as $nsa => $sak)
										@php
											++$nsa;
											if ($nsa ==1) {
											$alfa = 'a';
											$rom = 'I';
											}elseif ($nsa ==2) {
											$alfa = 'b';
											$rom = 'II';
											}elseif ($nsa ==3) {
											$alfa = 'c';
											$rom = 'III';
											}elseif ($nsa ==4) {
											$alfa = 'd';
											$rom = 'IV';
											}elseif ($nsa ==5) {
											$alfa = 'e';
											$rom = 'V';
											}elseif ($nsa ==6) {
											$alfa = 'f';
											$rom = 'VI';
											}elseif ($nsa ==7) {
											$alfa = 'g';
											$rom = 'VII';
											}elseif ($nsa ==8) {
											$alfa = 'h';
											$rom = 'VIII';
											}elseif ($nsa ==9) {
											$alfa = 'i';
											$rom = 'IX';
											}elseif ($nsa ==10) {
											$alfa = 'j';
											$rom = 'X';
											}
										@endphp
										<div class="row">
											<div class="col-md-4">
												<table width="100%" class="table table-sm table-borderless">
													<tr>
														<td width="1%">{{$alfa}}.</td>

														<td width="98%">Saksi {{$rom}} </td>
														<td width="1%">:</td>
													</tr>
												</table>
											</div>
											<div class="col-md-7 ml-3">
												<table width="100%" class="table table-sm table-borderless">
													<tr>
														<td width="99%">{{ $sak->nama }}</td>
													</tr>
												</table>
											</div>
										</div>
									@empty

									@endforelse

								</div>
								<div class="text-bold">
									<p class="text-bold">VIII. Bukti Pendukung : </p>

									@forelse($item->bukti as $nbuk => $buk)
										@php
											++$nbuk;
											if ($nbuk ==1) {
											$alfa = 'a';
											$rom = 'I';
											}elseif ($nbuk ==2) {
											$alfa = 'b';
											$rom = 'II';
											}elseif ($nbuk ==3) {
											$alfa = 'c';
											$rom = 'III';
											}elseif ($nbuk ==4) {
											$alfa = 'd';
											$rom = 'IV';
											}elseif ($nbuk ==5) {
											$alfa = 'e';
											$rom = 'V';
											}elseif ($nbuk ==6) {
											$alfa = 'f';
											$rom = 'VI';
											}elseif ($nbuk ==7) {
											$alfa = 'g';
											$rom = 'VII';
											}elseif ($nbuk ==8) {
											$alfa = 'h';
											$rom = 'VIII';
											}elseif ($nbuk ==9) {
											$alfa = 'i';
											$rom = 'IX';
											}elseif ($nbuk ==10) {
											$alfa = 'j';
											$rom = 'X';
											}
										@endphp
										<div class="row">
											<div class="col-md-12">
												<table width="100%" class="table table-sm table-borderless">
													<tr>
														<td width="1%">{{$alfa}}.</td>

														<td width="98%">{{ $buk->nama }} </td>
													</tr>
												</table>
											</div>
											
										</div>
									@empty

									@endforelse

								</div>

							</div>
							<!-- /.card-body -->
						</div>
					</div>
				@empty

				@endforelse

				<div>
					<i class="fas fa-clock bg-gray"></i>
				</div>
			</div>
		</div>
		<!-- /.col -->
	</div>
@endif

<div class="modal fade" id="sk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($tim->file_sk)
					<embed type="application/pdf" src=" {{ asset('storage/'.$tim->file_sk) }} " width="100%" height="800px">
				@else
					<h3>File Belum Diupload..!</h3>
				@endif
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edittim" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tim/{{$tim->id}}/edit" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Tema Penelusuran</label>
                        <input type="text" value="{{$tim->nama}}" name="nama" id="" placeholder="Masukan Judul Penelusuran"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Surat Tugas Ketua</label>
                        <input type="text" name="st_ketua"  value="{{$tim->st_ketua}}" id="" placeholder="Nomor Surat Tugas Ketua"
                            class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_st_ketua" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Ketua (Baru)</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Surat Tugas Sekretaris</label>
                        <input type="text" value="{{$tim->st_sekretaris}}" name="st_sekretaris" id="" placeholder="Nomor Surat Tugas Sekretaris"
                            class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_st_sekretaris" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Sekretaris (Baru)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Anggota Tim</label>
                        <div class="select2-blue">
                            <select name="anggota[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Tambahkan Anggota Tim Penelusuran" data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
								@foreach ($tim->users as $no => $item_user)
									@php
										$coba[$no] = $item_user->id;
									@endphp
									<option selected value="{{ $item_user->id }}">{{ $item_user->name }} ({{ $item_user->jabatan->nm_jabatan }})
									</option>
								@endforeach
                                @foreach($user_anggota as $item)
									@if (in_array($item->id, $coba))
									@else
										<option value="{{ $item->id }}">{{ $item->name }} ({{ $item->jabatan->nm_jabatan }})
										</option>
									@endif
                                @endforeach
                            </select>
                            {{-- <span>Harap menambahkan <span class="text-success">Ketua Tim</span> terlebih dahulu sebelum <span class="text-danger">Anggota Tim</span></span> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Waktu Mulai</label>
                                <input type="date" value="{{date('Y-m-d', strtotime($tim->mulai))}}" name="mulai" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Waktu Selesai</label>
                                <input type="date" value="{{date('Y-m-d', strtotime($tim->selesai))}}" name="selesai" id="" class="form-control">
                            </div>
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


{{-- Surat Tugas Ketua --}}
<div class="modal fade" id="st_ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Tugas Ketua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($tim->file_st_ketua)
					<embed type="application/pdf" src=" {{ asset('storage/'.$tim->file_st_ketua) }} " width="100%" height="800px">
				@else
					<h3>File Belum Diupload..!</h3>
				@endif
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Surat Tugas Sekretaris --}}
<div class="modal fade" id="st_sekretaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Tugas Sekretaris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($tim->file_st_ketua)
					<embed type="application/pdf" src=" {{ asset('storage/'.$tim->file_st_sekretaris) }} " width="100%" height="800px">
				@else
					<h3>File Belum Diupload..!</h3>
				@endif
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@include('sess.scrpt_flash')