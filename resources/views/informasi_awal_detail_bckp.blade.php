@extends('master.app')
@section('title', 'Informasi Awal')
@section('judul', 'Detail Informasi awal')
@section('menu', 'Informasi Awal')
@section('sub', 'Detail')
@section('content')
<div class="row">
	@include('sess.flash')
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title ml-1">Informasi Awal </h5>
                {{-- <button type="button" class="card-title btn btn-link btn-sm" data-container="body"
                    title="Delete">
                    Lihat
                </button> --}}
                <div class="card-tools">
                        @if (Auth::user()->id == $informasi_awal->id_user)
                            <a href="" class="badge badge-link text-success"data-container="body" title="Buat Form A6" data-toggle="modal" data-target="#eidtformA6"> <i class="fas fa-edit"></i> </a>
                        @else
                            <span class="mailbox-read-time float-right">{{ $informasi_awal->informasi->created_at->diffForHumans() }}</span>
                        @endif
                </div>
            </div>
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <table class="table table-sm
                    {{-- table-bordered --}}
                    table-borderless
                    " width="100%">
                        {{-- <tr>
                            <td colspan="3" width="100%"><h5>Informasi Awal</h5></td>
                        </tr> --}}
                        <tr>
                            <td width="16%">Kode Informasi</td>
                            <th width="1%">:</th>
                            <th width="83%">IA-{{sprintf("%04d", $informasi_awal->id)}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Peristiwa</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->peristiwa}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Tempat Kejadian</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->tempat_kejadian}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Waktu/Tanggal</td>
                            <th width="1%">:</th>
                            <th width="83%">{{ date('H:i / l d F.Y', strtotime($informasi_awal->waktu_tgl_kejadian))}} 
                                {{-- ({{ \Carbon\Carbon::parse($informasi_awal->waktu_tgl_kejadian)->diffForHumans() }})  --}}
                            </th>
                            
                        </tr>
                        <tr>
                            <td width="16%">Terlapor</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->terlapor}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Alamat Terlapor</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->alamat_terlapor}}</th>
                        </tr>
                        {{-- <tr>
                            <td width="16%">Status</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->status}}</th>
                        </tr> --}}
                    </table>
                </div>
            </div>
            <div class="mailbox-read-message pl-4 pr-4">
                <p>Uraian Singkat Kejadian,</p>

                <p>{{ $informasi_awal->uraian_kejadian }}</p>

                <p>Thanks,<br>{{ $informasi_awal->user->name }}</p>
            </div>
            <div class="card-footer">
                    <div class="float-right">
						@if (($informasi_awal->status!='tim_dibuat') && ($informasi_awal->status!='tolak') && ($informasi_awal->status=='buat_tim') )
							@if (Auth::user()->level == 'admin')
								<button type="button" data-container="body" data-toggle="modal" data-target="#addtim" class="btn btn-default"><i class="fas fa-users"></i> Buat Tim Penelusuran</button>
							@endif
						@endif

						@if ($informasi_awal->status=='diproses')
							@if (Auth::user()->jabatan->sebagai=='ketua' ||  Auth::user()->jabatan->sebagai=='anggota')
								<button type="button" data-container="body" data-toggle="modal" data-target="#izintim" class="btn btn-default"><i class="fas fa-lock"></i> Buatkan Tim</button>
							@endif
						@endif


						@if ($informasi_awal->status=='tim_dibuat')
							<a href="/tim/{{$informasi_awal->tim->id}}" class="btn btn-default"><i class="fas fa-users"></i> Lihat Tim Penelusuran</a>
						@endif
                    </div>
                    @if(Auth::user()->level == 'admin')
                        {{-- <button type="button" class="btn btn-default"><i clajelanlsekkseskdkejkslekjdkeklskkejelskddjeksnekkselkjeknkkelskkekjdlejsjenjjjdenjdjdelksjeljnjjelansjjnaoden dd d dsd e sdjejasjesjdsjhejdhcjjhjelsdejdjekdjjejsjeekskdkelkskejjskjekss="far fa-trash-alt"></i> Delete</button> --}}
                    @endif
                    <button data-container="body" data-toggle="modal" data-target="#exampleModalformA6" title="Informasi Masyarakat" class="btn btn-default mr-2 text-bold" ><i class="fas fas fa-comments"></i> IM-{{sprintf("%04d", $informasi_awal->informasi->id)}} </button>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#print"><i class="fas fa-print"></i> Print</button>
            </div>
        </div>
        <!-- /.cacobad -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Print</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
				<a href="/informasi_awal/{{$informasi_awal->id}}/print/halaman" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
				<a href="/informasi_awal/{{$informasi_awal->id}}/print/print" target="_blank" class="btn btn-default"><i class="fas fa-file"></i> Export Pdf</a>
				<a href="/informasi_awal/{{$informasi_awal->id}}/print/download" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Download</a>
				<a href="/informasi_awal/{{$informasi_awal->id}}/print/download" target="_blank" class="btn btn-default"><i class="fas fa-file"></i> Bukti</a>
            </div>
        </div>
    </div>
</div>

{{-- form a6 --}}
<div class="modal fade" id="exampleModalformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="mailbox-read-info">
                    <table class="table table-sm
                    {{-- table-bordered --}}
                    table-borderless
                    " width="100%">
                        {{-- <tr>
                            <td colspan="3" width="100%">
                                <h5>Informasi Masyarakat</h5>
                            </td>
                        </tr> --}}

                         <tr>
                            <td width="16%">Kode Laporan</td>
                            <th width="1%">:</th>
                            <th width="83%">IM-{{sprintf("%04d", $informasi_awal->informasi->id)}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Nama Pelapor</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->informasi->nama}}</th>
                        </tr>
                        <tr>
                            <td width="16%">No. KTP</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->informasi->ktp}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Telephone</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->informasi->telp}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Alamat Pelapor</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi_awal->informasi->alamat}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Penerimaan Laporan</td>
                            <th width="1%">:</th>
                            <th width="83%">{{ date('H:i / d F.Y', strtotime($informasi_awal->waktu_tgl_kejadian))}} 
                                {{-- ({{ \Carbon\Carbon::parse($informasi_awal->waktu_tgl_kejadian)->diffForHumans() }})  --}}
                            </th>
                            
                        </tr>
                    </table>
                </div>
                <div class="mailbox-read-message">
                    <p>Deskripsi kejadian,</p>

                    <p>{{ $informasi_awal->informasi->deskripsi }}</p>

					@if ($informasi_awal->informasi->img_bukti!=null)
						<div class="card" style="width: 100%; height: auto;">
							<span class='zoom' id='ex1' >
							<img src="{{ asset('storage/'.$informasi_awal->informasi->img_bukti) }}" class="card-img-top" alt="...">
							</span>
						</div>
					@endif
                    <p>Thanks,<br>{{ $informasi_awal->informasi->nama }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
            </div>
        </div>
    </div>
</div>




{{-- Izin tim --}}
<div class="modal fade" id="izintim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Izin Tim Penelusuran <i class="fas fa-users"></i></h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<h4>Ijinkan Pembentukan Tim Untuk Menelusuri Informasi Awal ini..? </h4>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
				<form action="/informasi_awal/{{$informasi_awal->id}}/ijin" method="post">
                    @csrf
                    @method('patch')
                	<button type="submit" class="btn btn-primary"> <i class="fas fa-lock-open"></i> Ijinkan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="eidtformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Form A6 Informasi Awal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- @if($informasi->status == 'dibaca')
                    <form action="/informasi_awal/{{ $informasi->id }}/lanjutform" method="post">
                        @csrf --}}
                        {{-- <input type="hidden" name="" value="{{$informasi->id }}">
                        --}}
                {{-- @else
                    <form action="/informasi_awal/{{ $informasi->id }}/updatelanjutform" method="post">
                        @csrf
                        @method('PATCH')
                @endif --}}
                {{-- <input type="hidden" name="id_informasi" value="{{$informasi->id }}">
                --}}  
                
                
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
                    {{-- <input type="datetime-local" hidden name="waktu_kejadian" class="form-control"
                        value="{{ $informasi->waktu_kejadian }}"> --}}
                   
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
                    {{-- <textarea class="form-control" name="uraian_kejadian" rows="4" placeholder="{{ $informasi->deskripsi }}"></textarea>
                    <textarea class="form-control" hidden name="deskripsi" rows="4">{{$informasi->deskripsi}}</textarea> --}}
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

{{-- Form add tim --}}
<div class="modal fade" id="addtim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Tim Penelusuran <i class="fas fa-users"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/informasi_awal/{{$informasi_awal->id}}/addtim" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                <div class="form-group">
                    <label for="">Tema Penelusuran</label>
                    <input type="text" name="nama" id="" placeholder="Masukan Judul Penelusuran" class="form-control">
                </div>
				<div class="form-group">
                    <label for="">Surat Keputusan</label>
                    <input type="text" name="no_sk" id="" placeholder="Nomor Surat Keputusan" class="form-control">
					<div class="custom-file mt-1">
						<input type="file" name="file_sk" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">File Surat Tugas Ketua</label>
					</div>
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
                    <select name="anggota[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Tambahkan Anggota Tim Penelusuran" data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                    @foreach($user as $item)
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
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
	<script src='/assets/jquery.zoom.js'></script>
	<script>
		$(document).ready(function(){
			$('#ex1').zoom();
			$('#ex2').zoom({ on:'grab' });
			$('#ex3').zoom({ on:'click' });			 
			$('#ex4').zoom({ on:'toggle' });
		});
	</script>
@endpush
@include('sess.scrpt_flash')
