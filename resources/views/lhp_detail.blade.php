@extends('master.app')
@section('title', 'Laporan Hasil')
@section('judul', 'Detail Laporan Hasil '.$lhp->status_lhp)
@section('menu', 'Laporan Hasil')
@section('sub', 'Detail LHP')
@section('content')
<div class="row">
	@include('sess.flash')
    <div class="col-md-12">
        <div class="card card-primary card-outline">
			@php
				$sts_ketua='tidak';
				$alm_ketua = '';
			@endphp
			@forelse ($tim->tim_user as $user)
				@if ($user->status=='ketua')
					@php
						$sts_ketua = 'ada';
						$alm_ketua = $user->user->alamat;
					@endphp
				@endif
			@empty
				
			@endforelse
            <div class="card-body p-0">		
				<div class="card-header card-borderless">
					<h3 class="card-title"><span class="text-bold">{{ $lhp->user->name }}</span>
						 @if ($lhp->dugaan == 'pleno' || $lhp->dugaan == 'belum')
							<span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm {{ $lhp->dugaan=='pleno' ? 'badge-primary' : 'badge-warning' }} ">{{ $lhp->dugaan=='pleno' ? 'Pleno' : 'Pembuatan' }}</span>
						@else
							| Dugaan
							Pelanggaran : <span
							class="right badge badge-sm {{ $lhp->dugaan=='ada' ? 'badge-danger' : 'badge-success' }} text-bold">{{ $lhp->dugaan=='ada' ? 'Ada' : 'Tidak Ada' }}</span>
							@if ($lhp->status == 'selesai')
							<span class="right badge badge-success badge-sm ">Diselesaikan</span>
							@endif
							{{-- <span class="btn btn-tool btn-lg text-success"><i class="fas fa-check-circle"></i></span> --}}
						@endif
					</h3>
					<div class="card-tools">
						@if ($lhp->id_user == Auth::user()->id)
							@if ($lhp->dugaan=='belum')
								<a href="/lhp/{{$lhp->id}}/lanjutlhp_belum" class="btn btn-tool text-success">
									<i class="fas fa-edit"></i>
								</a>
							@else
								<a href="/lhp/{{$lhp->id}}/edit" class="btn btn-tool text-success">
									<i class="fas fa-edit"></i>
								</a>
							@endif

                            @if ($lhp->status== 'belum')
                                <button class='btn btn-sm btn-tool text-danger' data-toggle='modal' data-target='#hapus'><i class="fas fa-trash"></i></button>
                            @endif
							
						@endif
						{{-- <a href="/lhp/{{$lhp->id}}/download" class="btn btn-tool text-secondary">
							<i class="fas fa-download"></i>
						</a> --}}
						<button class='btn btn-sm btn-tool text-success' data-toggle='modal' data-target='#batas_waktu'><i class="fas fa-history"></i></button>

						<button class='btn btn-sm btn-tool text-warning' data-toggle='modal' data-target='#ketua'><i class="fas fa-print"></i></button>
						{{-- <a href="/lhp/{{$lhp->id}}/print/print" target="_blank" class="btn btn-tool text-warning">
							<i class="fas fa-print"></i>
						</a> --}}
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
												{{-- {{ $jab->jabatan->nm_jabatan }} --}}
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
											<td width="99%">{{$lhp->user->alamat}}</td>
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
										<td width="99%">{{ $lhp->tahapan }}</td>
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
											{{ ($lhp->bentuk=='langsung' ? 'Langsung' : 'Tidak langsung') }}
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
										<td width="99%">{{ $lhp->diawasi }}</td>
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
							@if(date('D', strtotime($lhp->mulai))=='Mon')
								@php
									$hari_mulai = 'Senin';
								@endphp
							@elseif(date('D', strtotime($lhp->mulai))=='Tue')
								@php
									$hari_mulai = 'Selasa';
								@endphp
							@elseif(date('D', strtotime($lhp->mulai))=='Wed')
								@php
									$hari_mulai = 'Rabu';
								@endphp
							@elseif(date('D', strtotime($lhp->mulai))=='Thu')
								@php
									$hari_mulai = 'Kamis';
								@endphp
							@elseif(date('D', strtotime($lhp->mulai))=='Fri')
								@php
									$hari_mulai = "Jum'at";
								@endphp
							@elseif(date('D', strtotime($lhp->mulai))=='Sat')
								@php
									$hari_mulai = 'Sabtu';
								@endphp
							@elseif(date('D', strtotime($lhp->mulai))=='Sun')
								@php
									$hari_mulai = 'Minggu';
								@endphp
							@endif

							{{-- bulan --}}
							@if(date('m', strtotime($lhp->mulai))==1)
								@php
									$bulan_mulai = 'Januari';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==2)
								@php
									$bulan_mulai = 'Februari';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==3)
								@php
									$bulan_mulai = 'Maret';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==4)
								@php
									$bulan_mulai = 'April';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==5)
								@php
									$bulan_mulai = 'Mei';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==6)
								@php
									$bulan_mulai = 'Juni';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==7)
								@php
									$bulan_mulai = 'Juli';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==8)
								@php
									$bulan_mulai = 'Agustus';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==9)
								@php
									$bulan_mulai = 'September';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==10)
								@php
									$bulan_mulai = 'Oktober';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==11)
								@php
									$bulan_mulai = 'November';
								@endphp
							@elseif(date('m', strtotime($lhp->mulai))==12)
								@php
									$bulan_mulai = 'Desember';
								@endphp
							@endif


							{{-- Selesai --}}
							@if(date('D', strtotime($lhp->selesai))=='Mon')
								@php
									$hari_selesai = 'Senin';
								@endphp
							@elseif(date('D', strtotime($lhp->selesai))=='Tue')
								@php
									$hari_selesai = 'Selasa';
								@endphp
							@elseif(date('D', strtotime($lhp->selesai))=='Wed')
								@php
									$hari_selesai = 'Rabu';
								@endphp
							@elseif(date('D', strtotime($lhp->selesai))=='Thu')
								@php
									$hari_selesai = 'Kamis';
								@endphp
							@elseif(date('D', strtotime($lhp->selesai))=='Fri')
								@php
									$hari_selesai = "Jum'at";
								@endphp
							@elseif(date('D', strtotime($lhp->selesai))=='Sat')
								@php
									$hari_selesai = 'Sabtu';
								@endphp
							@elseif(date('D', strtotime($lhp->selesai))=='Sun')
								@php
									$hari_selesai = 'Minggu';
								@endphp
							@endif

							{{-- bulan --}}
							@if(date('m', strtotime($lhp->selesai))==1)
								@php
									$bulan_selesai = 'Januari';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==2)
								@php
									$bulan_selesai = 'Februari';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==3)
								@php
									$bulan_selesai = 'Maret';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==4)
								@php
									$bulan_selesai = 'April';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==5)
								@php
									$bulan_selesai = 'Mei';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==6)
								@php
									$bulan_selesai = 'Juni';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==7)
								@php
									$bulan_selesai = 'Juli';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==8)
								@php
									$bulan_selesai = 'Agustus';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==9)
								@php
									$bulan_selesai = 'September';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==10)
								@php
									$bulan_selesai = 'Oktober';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==11)
								@php
									$bulan_selesai = 'November';
								@endphp
							@elseif(date('m', strtotime($lhp->selesai))==12)
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
											@if ($lhp->selesai != null)
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
											@if ($lhp->selesai != null)
												{{date('d', strtotime($lhp->mulai)).' s/d '.date('d', strtotime($lhp->selesai))}}
											@else
												{{date('d', strtotime($lhp->mulai))}}
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
											@if (date('Y', strtotime($lhp->mulai)) == date('Y', strtotime($lhp->selesai)))
												{{date('Y', strtotime($lhp->mulai))}}
											@else
												{{date('Y', strtotime($lhp->mulai)).' s/d '.date('Y', strtotime($lhp->selesai))}}
											@endif
										</td>
									</tr>
									<tr>
										<td width="25%">Waktu/Jam</td>
										<td width="1%">:</td>
										<td width="74%">
											{{date('H.i', strtotime($lhp->mulai))}} Wita s/d Selesai
										</td>
									</tr>
									<tr>
										<td width="25%">Tempat/Lokasi</td>
										<td width="1%">:</td>
										<td width="74%">{{$lhp->lokasi}}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div>
						<p class="text-bold">III. Uraian Hasil Pengawasan : </p>
						<div class="row">
							<div class="col-md-12 pr-4">
								{!! $lhp->uraian_hasil !!}
							</div>
						</div>
					</div>
					<div>
						<div class="row ">
							<div class="col-md-3 mr-5 text-bold">IV. Dugaan Pelanggaran </div>
							<div class="col-md-7 ml-2 text-bold">:
								{{ ($lhp->dugaan=='ada' || $lhp->dugaan=='tidak' ? $lhp->dugaan=='ada' ? ' Ada' : ' Tidak Ada' : 'Dalam Proses') }}
								{{-- @if ($lhp->dugaan == 'belum' || $lhp->dugaan == 'pleno')
									
								@else
									
								@endif --}}
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
										<td width="99%">{{ $lhp->tempat_kejadian }}</td>
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
										@if ($lhp->waktu_kejadian != null)
											{{ date('d F Y', strtotime($lhp->waktu_kejadian)) }}
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
									@forelse($lhp->pelaku as $n => $pel)
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
									@forelse($lhp->pelaku as $ns => $pel_sts)
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

								{!! $lhp->uraian_dugaan !!}
							</div>
						</div>
					</div>

					<div class="text-bold">
						<p class="text-bold">VII. Saksi - Saksi : </p>

						@forelse($lhp->saksi as $nsa => $sak)
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

						@forelse($lhp->bukti as $nbuk => $buk)
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
						
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
	<div>
		{{-- <i class="fas fa-clock bg-secondary"></i> --}}
		<div style="position: fixed; right: 30px; bottom:25px; z-index:2;"  class="float-right">
			@if ($lhp->tim->status =='penelusuran')
				<a href="/tim/{{$lhp->tim->id}}" class="btn btn-secondary btn-lg img-circle">
				<i class="fas fa-users"></i></a>
			@else
				<a href="/tim/{{$lhp->tim->id}}/pengawasan" class="btn btn-secondary btn-lg img-circle">
				<i class="fas fa-users"></i></a>
			@endif
				<button class="btn btn-info btn-lg rounded-circle" data-toggle="modal" data-target="#list"><i class="fas fa-list"></i></button>
				@if ((Auth::user()->id_jabatan<=2 && Auth::user()->id_tingkatan <=2))
					@if (Auth::user()->id_tingkatan<2 && $lhp->user->id_tingkatan<2)
						<button class="btn btn-primary btn-lg rounded-circle" data-toggle="modal" data-target="#tanggapan"><i class="fas fa-paper-plane"></i></button>
					@endif
					@if (Auth::user()->id_tingkatan>=2 && $lhp->user->id_tingkatan>=2)
						<button class="btn btn-primary btn-lg rounded-circle" data-toggle="modal" data-target="#tanggapan"><i class="fas fa-paper-plane"></i></button>
					@endif
				@endif
				@if (Auth::user()->id == $lhp->id_user)
					@if (($lhp->dugaan == 'ada' && $lhp->tempat_kejadian==null) || ($lhp->dugaan == 'ada' && $lhp->waktu_kejadian==null) || ($lhp->dugaan == 'ada' && $lhp->uraian_dugaan==null))
		                    <a href="/lhp/{{$lhp->id}}/lanjutlhp" class="btn btn-danger btn-lg img-circle">
							<i class="fas fa-file-medical"></i></a>
					@endif
					@if ($lhp->dugaan=='belum')
						<a href="/lhp/{{$lhp->id}}/lanjutlhp_belum" class="btn btn-warning btn-lg img-circle"><i class="fas fa-file-import"></i></a>
					@endif

					@if (($lhp->status=='belum') && ($lhp->dugaan=='ada'))				
						<button class="btn btn-success btn-lg rounded-circle"  data-toggle="modal" data-target="#konfirm"><i class="fas fa-check"></i></button>
					@endif
				@endif
		</div>
	</div>
</div>

<div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendapat Laporan Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				@forelse ($lhp->pendapat as $item_pendapat)
					<div class="card card-light card-outline collapsed-card">
						<div class="card-header">
							<h5 class="card-title"><strong class="text-primary">{{$item_pendapat->user->name}}</strong>
							| Pelanggaran : <span
							class="right badge badge-sm {{ $item_pendapat->status=='ada' ? 'badge-danger' : 'badge-success' }} text-bold">{{ $item_pendapat->status=='ada' ? 'Ada' : 'Tidak Ada' }}</span>
							</h5>
							<div class="card-tools">
								@if (Auth::user()->id == $item_pendapat->id_user )
									<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
										<i class="fas fa-pen"></i>
									</button>
								@endif
							</div>
						</div>
						<div class="card-body" style="display: none;">
							<form action="/lhp/{{$item_pendapat->id}}/pendapat_update" method="post">
								@method('patch')
								@csrf
								<div class="form-group">
									<label for="nama">Degaan Pelanggaran</label>
									{{-- <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control"> --}}
									<select name="status" id="" class="form-control">
										<option disabled value="">Choose One!</option>
										<option {{$item_pendapat->status == 'ada' ? 'selected' : ''}} value="ada">Ada</option>
										<option {{$item_pendapat->status == 'tidak' ? 'selected' : ''}} value="tidak">Tidak</option>
									</select>
								</div>
								<div class="form-group">
									<label for="isi">Uraian Pendapat</label>
									<textarea id="isi" style="height: 1000px;" name="isi" class="form-control summernote"
										cols="70" rows="50">{{(old('isi') ?? $item_pendapat->isi )}}</textarea>
									@error('isi')
										<div class="text-danger">Tidak boleh kosong</div>
									@enderror
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
								</div>
							</form>
						</div>
						<div class="card-header">
							{!!$item_pendapat->isi!!}
						</div>
					</div>
				@empty
					<div class="alert alert-info row">Laporan hasil ini belum di lakukan pleno..!</div>
				@endforelse
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="konfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="text-bold">Yakin ingin <span class="text-bold text-success">Menyelesaikan Sesi</span> untuk Laporan hasil pengawasan ini..?</h5>
			</div>
			<div class="row justify-content-center mb-3">
				{{-- <input type="submit" name="konfirmasi" value="Belum" class="mr-1 btn btn-info"> --}}
				<form action="/lhp/{{$lhp->id}}/sesi_selesai" method="post">
					@csrf
					@method('PATCH')
					<button class="btn btn-success" type="submit">Selesaikan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendapat Laporan Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/lhp/{{$lhp->id}}/pendapat" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Degaan Pelanggaran</label>
                    {{-- <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control"> --}}
					<select name="status" id="" class="form-control">
						<option selected disabled value="">Choose One!</option>
						<option value="ada">Ada</option>
						<option value="tidak">Tidak</option>
					</select>
                </div>
				<div class="form-group">
					<label for="isi">Uraian Pendapat</label>
					<textarea id="isi" style="height: 1000px;" name="isi" class="form-control summernote"
						cols="70" rows="50">{{(old('isi') ?? '' )}}</textarea>
					@error('isi')
						<div class="text-danger">Tidak boleh kosong</div>
					@enderror
				</div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Berikan Pendapat</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Print | Export | Preview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
				<a href="/lhp/{{$lhp->id}}/print/halaman" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
				<a href="/lhp/{{$lhp->id}}/print/print" target="_blank" class="btn btn-default"><i class="fas fa-file"></i> Export Pdf</a>
				<a href="/lhp/{{$lhp->id}}/print/download" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Download</a>
				<a href="/lhp/{{$lhp->id}}/print/mobile" class="btn btn-default"><i class="fas fa-mobile-alt"></i> Preview</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="batas_waktu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Waktu Pengisian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
				<form action="/lhp/{{$lhp->id}}/ubah_waktu_pengisian" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($lhp->batas_waktu_pengisian))}}" name="batas_waktu_pengisian" class="form-control">
                    </div>
                    <div class="form-group">
                        <center>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <center> <h4>Anda yakin ingin <strong class="text-danger">Menghapus</strong> Laporan Hasil Pengawasan ini..??</h4> </center>
                <br>
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" aria-label="Close">Tidak</button>
                <form action="/lhp/{{$lhp->id}}/hapus" method="post">
                @csrf
                @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">Ya Hapus</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
@include('sess.scrpt_flash')