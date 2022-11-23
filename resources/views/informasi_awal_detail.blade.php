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
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link {{Request::segment(3)=='detail' ? 'active' : ''}}" href="{{ url('/informasi_awal/'.$informasi_awal->id.'/detail') }}">Detail Informasi
                            Awal</a></li>
                        <li class="nav-item"><a class="nav-link  {{Request::segment(3)=='bukti' ? 'active' : ''}}" href="{{ url('/informasi_awal/'.$informasi_awal->id.'/bukti') }}">Bukti Awal</a></li>
                        @if ((Auth::user()->id== $informasi_awal->id_user) || Auth::user()->level=='admin')
                        <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab">Ubah Informasi Awal</a></li>
                    @endif
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class=" {{Request::segment(3)=='detail' ? 'active' : ''}} tab-pane" id="activity">
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <table class="table table-sm table-borderless" width="100%">
                                    <tr>
                                        <td width="20%">Kode Informasi</td>
                                        <th width="1%">:</th>
                                        <th width="79%">IA-{{sprintf("%04d", $informasi_awal->id)}}</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Penerima Informasi</td>
                                        <th width="1%">:</th>
                                        <th width="79%">{{$informasi_awal->user->name}}</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Peristiwa</td>
                                        <th width="1%">:</th>
                                        <th width="79%">{{$informasi_awal->peristiwa}}</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tempat Kejadian</td>
                                        <th width="1%">:</th>
                                        <th width="79%">{{$informasi_awal->tempat_kejadian}}</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Waktu/Tanggal</td>
                                        <th width="1%">:</th>
                                        <th width="79%">
                                            {{ date('H:i / l d F.Y', strtotime($informasi_awal->waktu_tgl_kejadian))}}
                                            {{-- ({{ \Carbon\Carbon::parse($informasi_awal->waktu_tgl_kejadian)->diffForHumans() }})
                                            --}}
                                        </th>

                                    </tr>
                                    <tr>
                                        <td width="20%">Terlapor</td>
                                        <th width="1%">:</th>
                                        <th width="79%">{{$informasi_awal->terlapor}}</th>
                                    </tr>
                                    <tr>
                                        <td width="20%">Alamat Terlapor</td>
                                        <th width="1%">:</th>
                                        <th width="79%">{{$informasi_awal->alamat_terlapor}}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="mailbox-read-message pl-4 pr-4">
                            <p>Uraian Singkat Kejadian,</p>

                            <p>{!! $informasi_awal->uraian_kejadian !!}</p>

                            <p>Thanks,<br>{{ $informasi_awal->user->name }}</p>
                        </div>
                    </div>
                    {{-- Bukti --}}
                    <div class="tab-pane  {{Request::segment(3)=='bukti' ? 'active' : ''}}" id="bukti">
                        <div class="mailbox-read-message pl-4 pr-4">
                            <span class="card-title">List Bukti-Bukti Awal</span>
                            <div class="card-tools">
                                @if ((Auth::user()->level=='admin') || $informasi_awal->id_user==Auth::user()->id)
                                    <a href="" class="badge badge-link ml-1" data-container="body" title="Buat Form A6"
                                        data-toggle="modal" data-target="#eidtformA6"> <i class="fas fa-plus"></i> Tambah</a>
                                @endif
                            </div>
                        </div>
                        <div class="mailbox-read-message pl-4 pr-4">
                            <div class="form-group mb-4">
                                @php
                                    $no = 0;
                                @endphp
                                @if ($informasi_awal->informasi->img_bukti != null)
                                    <span class="text-bold">{{++$no}}. Bukti Foto dugaan pelanggaran yang di laporkan ke dalam aplikasi silahap</span><i class="fa fa-trash"></i>
                                    <img class="mt-2 ml-3" src="{{ asset('storage/'.$informasi_awal->informasi->img_bukti) }}" width="60%" alt="">                                    
                                @endif
                            </div>
                            @forelse ($informasi_awal->informasi_awal_bukti as $bukti)
                                <div class="form-group mb-4">
                                    <span class="text-bold">{{++$no}}. {{$bukti->nama}}</span>
                                    @if ((Auth::user()->level=='admin') || $informasi_awal->id_user==Auth::user()->id)    
                                        <div data-toggle="modal" data-target="#hapus_bukti{{$bukti->id}}" class="btn btn-link btn-sm text-danger"><i class="fa fa-trash"></i></div>
                                    @endif

                                    <img class="mt-2 ml-3" src="{{ asset('storage/'.$bukti->foto) }}" width="60%" alt="">
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    {{-- Edit --}}
                    <div class="tab-pane" id="edit">
                        <div class="mailbox-read-message pl-4 pr-4">
                            <form action="/informasi_awal/{{ $informasi_awal->id }}/edit" method="post">
                                @csrf
                                @method('PATCH')
                                {{-- <input type="hidden" name="id_informasi" value="{{$informasi->id }}"> --}}
                                <div class="form-group">
                                    <label for="peristiwa">Peristiwa</label>
                                    <input type="text" name="peristiwa" placeholder="Peristiwa" id="peristiwa" value="{{$informasi_awal->peristiwa}}" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <label for="tempat_kejadian">Tempat Kejadian</label>
                                    <input type="text" name="tempat_kejadian" placeholder="Tempat Kejadian" value="{{$informasi_awal->tempat_kejadian}}" id="tempat_kejadian"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal dan waktu kejadian <span class="text-danger text-sm">**</span></label>
                                    <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($informasi_awal->waktu_tgl_kejadian))}}" name="waktu_tgl_kejadian" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="terlapor">Terlapor</label>
                                    <input type="text" value="{{$informasi_awal->terlapor}}" placeholder="Terlapor" name="terlapor" id="terlapor" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_terlapor">Alamat Terlapor</label>
                                    <input type="text" value="{{$informasi_awal->alamat_terlapor}}" name="alamat_terlapor" placeholder="Alamat Terlapor" id="alamat_terlapor"
                                        class="form-control">
                                </div>
                                <div class="form-group mb-4">
                                    <label>Uraian Kejadian <span class="text-danger text-sm">**</span></label>
                                    <textarea class="form-control summernote" name="uraian_kejadian" rows="4" placeholder="{{ $informasi_awal->uraian_kejadian }}">{{ $informasi_awal->uraian_kejadian }}</textarea>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class=" col-md-12 btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan Perubaan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- card footer --}}
            <div class="card-footer">
                <div class="float-right">
                    @if (($informasi_awal->status!='tim_dibuat') && ($informasi_awal->status!='tolak') &&
                    ($informasi_awal->status=='buat_tim') )
                        @if (Auth::user()->level == 'admin')
                        <button type="button" data-container="body" data-toggle="modal" data-target="#addtim"
                            class="btn btn-default"><i class="fas fa-users"></i> Buat Tim Penelusuran</button>
                        @endif
                    @endif

                    @if (($informasi_awal->status=='diproses') || $informasi_awal->status=='tolak' )
                        @if (Auth::user()->jabatan->sebagai=='ketua' ||
                        Auth::user()->jabatan->sebagai=='anggota')
                        <button type="button" data-container="body" data-toggle="modal" data-target="#izintim"
                            class="btn btn-primary"><i class="fas fa-paper-plane"></i> Tindakan</button>
                        @endif
                    @endif


                    @if ($informasi_awal->status=='tim_dibuat')
                    <a href="/tim/{{$informasi_awal->tim->id}}" class="btn btn-default"><i
                            class="fas fa-users"></i>
                        Lihat Tim Penelusuran</a>
                    @endif
                </div>
                @if(Auth::user()->level == 'admin')
                {{-- <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button> --}}
                @endif
                <button data-container="body" data-toggle="modal" data-target="#exampleModalformA6"
                    title="Informasi Masyarakat" class="btn btn-default mr-2 text-bold"><i
                        class="fas fas fa-comments"></i>
                    IM-{{sprintf("%04d", $informasi_awal->informasi->id)}}
                </button>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#print"><i
                        class="fas fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>


@forelse ($informasi_awal->informasi_awal_bukti as $item_bukti)
    <div class="modal fade" id="hapus_bukti{{$item_bukti->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> Hapus Bukti</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <h5>Yakin Ingin Menghapus Bukti Ini..?</h5>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="/informasi_awal_bukti/{{$item_bukti->id}}/hapus_bukti" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    
@endforelse

<div class="modal fade" id="eidtformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Bukti Pendunkung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/informasi_awal/{{ $informasi_awal->id }}/add_bukti" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Bukti</label>
                    <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
					<div class="custom-file">
						<input type="file" name="foto" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choose One..</label>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Print | Export |  Preview (mobile)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <a href="/informasi_awal/{{$informasi_awal->id}}/print/halaman" target="_blank"
                    class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <a href="/informasi_awal/{{$informasi_awal->id}}/print/print" target="_blank" class="btn btn-default"><i
                        class="fas fa-file"></i> Export Pdf</a>
                <a href="/informasi_awal/{{$informasi_awal->id}}/print/download" target="_blank"
                    class="btn btn-default"><i class="fas fa-download"></i> Download</a>
                <a href="/informasi_awal/{{$informasi_awal->id}}/print/preview"
                    class="btn btn-default"><i class="fas fa-mobile-alt"></i> Preview</a>
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
                                {{-- ({{ \Carbon\Carbon::parse($informasi_awal->waktu_tgl_kejadian)->diffForHumans() }})
                                --}}
                            </th>

                        </tr>
                    </table>
                </div>
                <div class="mailbox-read-message">
                    <p>Deskripsi kejadian,</p>

                    <p>{{ $informasi_awal->informasi->deskripsi }}</p>

                    @if ($informasi_awal->informasi->img_bukti!=null)
                    <div class="card" style="width: 100%; height: auto;">
                        <span class='zoom' id='ex1'>
                            <img src="{{ asset('storage/'.$informasi_awal->informasi->img_bukti) }}"
                                class="card-img-top" alt="...">
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
<div class="modal fade" id="izintim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel">Izin Tim Penelusuran <i class="fas fa-users"></i></h5> --}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4><strong class="text-danger">Tolak</strong> Laporan Atau <strong class="text-success">Ijinkan</strong> Pembentukan Tim Untuk Menelusuri Informasi Awal ini..?</h4>
                <div class="d-flex justify-content-center">
                    {{-- <button class="btn btn-secondary mr-3" data-dismiss="modal">Close</button> --}}
                    <form action="/informasi_awal/{{$informasi_awal->id}}/tolak" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-danger text-bold mr-3"> <i class="fas fa-times-circle"></i> Tolak</button>
                    </form>
                    <form action="/informasi_awal/{{$informasi_awal->id}}/ijin" method="post">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn  text-bold btn-success"> <i class="fas fa-users"></i> Ijinkan</button>
                    </form>
                </div>
            </div>
            {{-- <div class="modal-footer text-center">
            </div> --}}
        </div>
    </div>
</div>

{{-- Form add tim --}}
<div class="modal fade" id="addtim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Tim Penelusuran <i class="fas fa-users"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/informasi_awal/{{$informasi_awal->id}}/addtim" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="">Tema Penelusuran</label>
                        <input type="text" name="nama" id="" placeholder="Masukan Judul Penelusuran"
                            class="form-control">
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
                        <input type="text" name="st_ketua" id="" placeholder="Nomor Surat Tugas Ketua"
                            class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_st_ketua" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Ketua</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Surat Tugas Sekretaris</label>
                        <input type="text" name="st_sekretaris" id="" placeholder="Nomor Surat Tugas Sekretaris"
                            class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_st_sekretaris" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Sekretaris</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Anggota Tim</label>
                        <div class="select2-blue">
                            <select name="anggota[]" class="select2 select2-hidden-accessible" multiple="multiple"
                                data-placeholder="Tambahkan Anggota Tim Penelusuran"
                                data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15"
                                tabindex="-1" aria-hidden="true">
                                @foreach($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} ({{ $item->jabatan->nm_jabatan }})
                                    </option>
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
    $(document).ready(function () {
        $('#ex1').zoom();
        $('#ex2').zoom({
            on: 'grab'
        });
        $('#ex3').zoom({
            on: 'click'
        });
        $('#ex4').zoom({
            on: 'toggle'
        });
    });

</script>
@endpush
@include('sess.scrpt_flash')
