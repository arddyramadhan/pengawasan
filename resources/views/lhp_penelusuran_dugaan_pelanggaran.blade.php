@extends('master.app')
@section('title', 'Laporan Hasil Pengawasan')
@section('judul', 'Laporan Hasil Pengawasan')
@section('menu', 'Tim Penelusuran')
@section('sub', 'LHP')
@section('content')
@include('sess.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline  {{($lhp->tahapan==null ? ' ' : 'collapsed-card')}} ">
            <div class="card-header">
                <h3 class="card-title text-bold">Uraian Hasil Kejadian</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <form action="/lhp/{{ $lhp->id }}/update" method="post">
                    @csrf
                    @method('patch')
                    <input hidden type="text" class="form-control" name="id_tim" id="" value="{{ $lhp->id_tim }}">
                    <div class="form-group">
                        <label for="tahapan">Tahapan Yang Di Awasi</label>
                        <textarea id="tahapan" placeholder="Tahapan Yang Di Awasi" name="tahapan"
                            class="form-control @error('tahapan') border-danger @enderror" cols="30"
                            rows="1">{{ $lhp->tahapan }}</textarea>
                        @error('tahapan')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Bentuk Pengawasan</label>
                        <select name="bentuk" id="" class="form-control">
                            <option value="" disabled>Choose One</option>
                            <option
                                {{ ($lhp->bentuk == 'langsung' ? 'selected' : ' ') }}
                                value="langsung">Langsung</option>
                            <option
                                {{ ($lhp->bentuk == 'tidak' ? 'selected' : ' ') }}
                                value="tidak">Tidak Lngsung</option>
                        </select>
                        @error('bentuk')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diawasi">Pihak Yang Di Awasi</label>
                        <textarea id="diawasi" name="diawasi" placeholder="Pihak Yang Di Awasi" class="form-control"
                            cols="30" rows="1">{{ $lhp->diawasi }}</textarea>
                        @error('diawasi')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mulai">Waktu Mulai</label>
                                <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($lhp->mulai))}}" name="mulai" id="mulai" class="form-control">
                                    @error('mulai')
                                    <div class="text-danger">Tidak boleh kosong</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selesai">Waktu Selesai</label>
                                <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($lhp->selesai))}}" name="selesai" id="selesai" class="form-control">
                                    @error('selesai')
                                    <div class="text-danger">Tidak boleh kosong</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi">Lokasi Pengawasan</label>
                        <textarea id="lokasi" name="lokasi" placeholder="Lokasi Pengawasan" class="form-control"
                            cols="30" rows="1">{{ $lhp->lokasi }}</textarea>
                        @error('lokasi')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="uraian_hasil">Uraian Hasil Kejadian</label>
                        <textarea style="height: 300px;" name="uraian_hasil" class="form-control summernote" cols="30"
                            rows="10">{{ $lhp->uraian_hasil }}</textarea>
                        @error('uraian_hasil')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    
    <div class="col-md-12">
        <div class="card card-danger card-outline {{($lhp->tempat_kejadian==null ? ' ' : 'collapsed-card')}} ">
            <div class="card-header">
                <h3 class="card-title text-bold">Uraian Dugaan Pelanggaran</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: {{($lhp->tempat_kejadian==null ? 'blok' : 'none' )}};">
                {{-- <div class="form-group">
                    <label for="">Dugaan Pelanggaran</label>
                    <select name="dugaan" id="" class="form-control">
                        <option value="" disabled>Choose One</option>
                        <option
                            {{ ($lhp->dugaan == 'ada' ? 'selected' : ' ') }}
                            value="ada">Ada Dugaan Pelanggaran</option>
                        <option
                            {{ ($lhp->dugaan == 'tidak' ? 'selected' : ' ') }}
                            value="tidak">Tidak Ada Dugaan Pelanggaran</option>
                    </select>
                    @error('dugaan')
                        <div class="text-danger">Tidak boleh kosong</div>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label for="tempat_kejadian">Tempat Kejadian</label>
                    <input type="text" id="tempat_kejadian"
                        value="{{ old('tempat_kejadian') ?? $lhp->tempat_kejadian }}"
                        placeholder="Tempat Kejadian" name="tempat_kejadian" class="form-control">
                    @error('tempat_kejadian')
                        <div class="text-danger">Tidak boleh kosong</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Waktu Kejadian</label>
                    <input type="date" name="waktu_kejadian" id=""
                        value="{{ old('waktu_kejadian') ?? $lhp->waktu_kejadian }}"
                        class="form-control">
                    @error('waktu_kejadian')
                        <div class="text-danger">Tidak boleh kosong</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="uraian_dugaan">Uraian Dugaan Pelanggaran</label>
                    <textarea style="height: 300px;" name="uraian_dugaan" class="form-control summernote" cols="30"
                        rows="10">{{ old('uraian_dugaan') ?? $lhp->uraian_dugaan }}</textarea>
                    @error('uraian_dugaan')
                        <div class="text-danger">Tidak boleh kosong</div>
                    @enderror
                </div>

                
                
            </div>
            <div class="card-footer">
                {{-- <a href="/tim/{{ $lhp->id_tim }}" class="btn btn-secondary">Kembali</a> --}}
                <div class="float-right">
				@if ($lhp->tempat_kejadian==null)
					<button type="submit" class="btn btn-primary"><i class="fas fa-file-signature"></i> Simpan & Lanjut ke Data Pendukung</button>
                @else 
                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-signature"></i> Simpan Perubahan</button>
				@endif
                    
                </div>
            </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    @if ($lhp->tempat_kejadian!=null)
        <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Data Pendukung</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <div class="form-group">
                    <label for=""> <span class="size-10 mb-0">Daftar Nama Pelaku </span> <span
                            class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#pelaku">
                            <i class="fas fa-plus"></i>
                        </span></label>
                    <table class="mt-0 ml-4 table-sm">
                        <tbody class="">
                            @forelse($lhp->pelaku  as $no_pelaku => $item)
                                <tr>
                                    <td class="text-bold">{{ ++$no_pelaku }}.</td>
                                    <td class="" colspan="">{{ $item->nama }} ({{ $item->status }})</td>
                                    <td>
                                        <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                            data-target="#pelaku">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <p class="">Pelaku belum di tambahkan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @error('nm_saksi')
                        <div class="text-danger">Nama saksi tidak boleh kososng</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for=""> <span class="size-10 mb-0">Daftar Nama Saksi </span> <span
                            class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#saksi">
                            <i class="fas fa-plus"></i>
                        </span></label>
                    <table class="mt-0 ml-4 table-sm">
                        <tbody>
                            @forelse($lhp->tim->berita_acara as $no_ba => $item)
                                <tr>
                                    <td class="text-bold">{{ ++$no_ba }}.</td>
                                    <td colspan="2">{{ $item->nama }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td colspan="2"></td>
                                </tr>
                            @endforelse
                            @forelse($lhp->saksi  as $nos => $item)
                                <tr>
                                    <td class="text-bold">{{ ++$nos }}.</td>
                                    <td colspan="">{{ $item->nama }}</td>
                                    <td>
                                        <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                            data-target="#saksi">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td colspan="2"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @error('nm_saksi')
                        <div class="text-danger">Nama saksi tidak boleh kososng</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""> <span class="size-10 mb-0"> Bukti Pendukung </span> <span
                            class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#bukti">
                            <i class="fas fa-plus"></i>
                        </span></label>
                    <table class="mt-0 ml-4 table-sm">
                        <tbody>
                            @forelse($lhp->bukti  as $no_bukti => $item)
                                <tr>
                                    <td class="text-bold">{{ ++$no_bukti }}.</td>
                                    <td class="" colspan="">{{ $item->nama }} <span
                                            class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                            data-target="#pelaku">
                                            <i class="fas fa-trash"></i>
                                        </span></td>

                                </tr>
                                {{-- @if($item->img!=null)
                                    <tr>
                                        <td></td>
                                        <td colspan="">
                                            <img src="/" alt="">
                                        </td>
                                    </tr>
                                @endif --}}
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <p class="">Bukti belum di tambahkan</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @error('nm_saksi')
                        <div class="text-danger">Nama saksi tidak boleh kososng</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
	
    <div class="col-md-12 mb-4">
		@if ($lhp->status_lhp=='penelusuran')
			<a href="/tim/{{ $lhp->id_tim }}" class="btn btn-secondary ">Tim {{($lhp->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan')}}</a>
		@else
			<a href="/tim/{{$lhp->id_tim}}/pengawasan" class="btn btn-secondary ">Tim {{($lhp->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan')}}</a>
		@endif
		
    </div>
    @endif

</div>


{{-- bukti --}}
<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Bukti Pendukung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/lhp/bukti/add" method="post" enctype="multipart/form-data">
                        @csrf
                        <input hidden type="text" placeholder="Nama Saksi" name="id_lhp" value="{{ $lhp->id }}"
                            class="form-control">
                        <input type="text" placeholder="Nama Pelaku" name="nama" id="nama_pelaku" class="form-control">
                        <div class="form-group mt-2">
                            <!-- <label for="customFile">Custom File</label> -->

                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <input type="submit" name="konfirmasi" value="Tambahkan"
                            class="hapus btn btn-primary btn-sm mt-2 float-right">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>



{{-- Pelaku --}}
<div class="modal fade" id="pelaku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Pelaku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/lhp/pelaku/add" method="post">
                        @csrf
                        <input hidden type="text" placeholder="Nama Saksi" name="id_lhp" value="{{ $lhp->id }}"
                            class="form-control">
                        <input type="text" placeholder="Nama Pelaku" name="nama" id="nama_pelaku" class="form-control">
                        <input type="text" placeholder="Status" name="status" id="status_pelaku"
                            class="form-control mt-2">
                        <input type="submit" name="konfirmasi" value="Tambahkan"
                            class="btn btn-primary btn-sm mt-2 float-right">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Saksi --}}
<div class="modal fade" id="saksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Saksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/lhp/saksi/add" method="post">
                        @csrf
                        <input hidden type="text" placeholder="Nama Saksi" name="id_lhp" value="{{ $lhp->id }}"
                            class="form-control">
                        <input type="text" placeholder="Nama Saksi" name="nama" id="nm_saksi" class="form-control">
                        <input type="submit" name="konfirmasi" value="Tambahkan"
                            class="btn btn-primary btn-sm mt-1 float-right">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@include('sess.scrpt_flash')