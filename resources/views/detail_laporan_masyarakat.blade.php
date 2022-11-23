@extends('master.app')
@section('title', 'Informasi Masyarakat')
@section('judul', 'Informasi Masyarakat')
@section('menu', 'Informasi Masyarakat')
@section('sub', 'Detail')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail informasi</h3>
                <div class="card-tools">
                    {{-- <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a> --}}
                </div>
            </div>
            <!-- /.card-header -->
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
                            <td width="16%">Kode Laporan</td>
                            <th width="1%">:</th>
                            <th width="83%">IM-{{sprintf("%04d", $informasi->id)}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Nama Pelapor</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi->nama}}</th>
                        </tr>
                        <tr>
                            <td width="16%">NIK</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi->ktp}}</th>
                        </tr>
                        <tr>
                            <td width="16%">Telephone</td>
                            <th width="1%">:</th>
                            <th width="83%">{{ $informasi->telp}}
                                {{-- ({{ \Carbon\Carbon::parse($informasi->waktu_tgl_kejadian)->diffForHumans() }}) --}}
                            </th>

                        </tr>
                        <tr>
                            <td width="16%">Alamat</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi->alamat}}</th>
                        </tr>
                        {{-- <tr>
                            <td width="16%">Status</td>
                            <th width="1%">:</th>
                            <th width="83%">{{$informasi->status}}</th>
                        </tr> --}}
                    </table>
                </div>
                {{-- @if(Auth::user()->level == 'admin') --}}
                <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        @if(Auth::user()->level == 'admin')
                        {{-- <button type="button" class="btn btn-default btn-sm" data-container="body"
                                        title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button> --}}
                        @endif
                        @if($informasi->status != 'diproses')
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Buat Form A6"
                            data-toggle="modal" data-target="#exampleModalformA6">
                            <i class="fas fa-clipboard-check"></i>
                            </button>
                        @endif
                        @if(($informasi->status=='dibaca' || $informasi->status=='alihkan') && (Auth::user()->level=='admin' && Auth::user()->id_tingkatan <=2 )) 
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Tambahkan Pengawas" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button>
                        @endif

                    </div>
                    @if ($informasi->status == 'dibaca' && Auth::user()->level=='admin' &&
                    Auth::user()->id_tingkatan==1)
                    <button type="button" class="btn btn-default btn-sm" title="Alihkan" data-toggle="modal"
                        data-target="#alihkan">
                        <i class="fas fa-share"></i>
                    </button>
                    @endif
                </div>
                {{-- @endif --}}
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message pl-4 pr-4">
                    <p>Uraian singkat kejadian,</p>

                    <p>{{ $informasi->deskripsi }}</p>

                    @if ($informasi->img_bukti!=null)
                    <div class="card ml-3" style="width: 60%; height: auto;">
                        <span class='zoom' id='ex1'>
                            <img src="{{ asset('storage/'.$informasi->img_bukti) }}" class="card-img-top" alt="...">
                        </span>
                    </div>
                    @endif
                    <p>Thanks,<br>{{ $informasi->nama }}</p>
                </div>


                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
                <div class="float-right">
                    @if($informasi->status != 'diproses')
                    <button type="button" class="btn btn-default" data-toggle="modal"
                        data-target="#exampleModalformA6"><i class="fas fa-clipboard-check"></i> Buatkan Informasi
                        Awal</button>
                    @endif
                    @if(($informasi->status == 'dibaca' || $informasi->status == 'alihkan') &&
                    (Auth::user()->level=='admin' && Auth::user()->id_tingkatan ==1 ))
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"><i
                            class="fas fa-user-plus"></i> Tambahakan
                        Pengawas</button>
                    @endif
                    @if($informasi->status == 'diproses')
                    <a href="/informasi_awal/{{$informasi->informasi_awal->id}}/detail" class="btn btn-default"><i
                            class="fas fa-eye"></i> Lihat Form A6</a>
                    @endif
                    @if($informasi->status == 'dibaca' && Auth::user()->level=='admin' && Auth::user()->id_tingkatan==1)
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#alihkan"><i
                            class="fas fa-share"></i> Alihkan</button>
                    @endif
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
{{-- </div> --}}


    {{-- Tambah pengawas --}}
    {{-- @if (Auth::user()->level='admin' && Auth::user()->id_tingkatan==1) --}}

    <div class="modal fade" id="alihkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alihkan Ke Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/informasi/{{ $informasi->id }}/alihkan" method="post">
                        @csrf
                        {{-- <input type="hidden" name="id_informasi" value="{{$informasi->id }}">
                        --}}
                        <div class="form-group">
                            <label for="inputStatus">Alihkan</label>
                            <select class="form-control" name="id_kecamatan">
                                <option selected disabled value="">Choose One!!</option>
                                @foreach($alih as $item)
                                <option value="{{ $item->id }}"> Kecamatan {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan Pengawas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- @endif --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Pengawas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/informasi/{{ $informasi->id }}/2" method="post">
                        @csrf
                        @method('PATCH')
                        {{-- <input type="hidden" name="id_informasi" value="{{$informasi->id }}">
                        --}}
                        <div class="form-group">
                            <label for="inputStatus">Teruskan</label>
                            <select class="form-control" name="id_user">
                                <option selected disabled value="">Choose One!!</option>
                                @foreach($user as $item)
                                @if (Auth::user()->id_tingkatan == 1)
                                @if ($item->id_tingkatan==Auth::user()->id_tingkatan)
                                <option value="{{ $item->id }}">{{ $item->name }}
                                    ({{ $item->jabatan->nm_jabatan }})</option>
                                @endif
                                @else
                                @if (($item->id_tingkatan==Auth::user()->id_tingkatan) &&
                                ($item->id_kecamatan==Auth::user()->id_kecamatan))
                                <option value="{{ $item->id }}">{{ $item->name }}
                                    ({{ $item->jabatan->nm_jabatan }})</option>
                                @endif
                                @endif
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan Pengawas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- form a6 --}}
    <div class="modal fade" id="exampleModalformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    @if($informasi->status == 'dibaca')
                    <form action="/informasi_awal/{{ $informasi->id }}/lanjutform" method="post">
                        @csrf
                        {{-- <input type="hidden" name="" value="{{$informasi->id }}">
                        --}}
                        @else
                        <form action="/informasi_awal/{{ $informasi->id }}/updatelanjutform" method="post">
                            @csrf
                            @method('PATCH')
                            @endif
                            {{-- <input type="hidden" name="id_informasi" value="{{$informasi->id }}">
                            --}}


                            <div class="form-group">
                                <label for="peristiwa">Peristiwa</label>
                                <input type="text" name="peristiwa" placeholder="Peristiwa" id="peristiwa"
                                    class="form-control">
                                {{-- <p class="text-sm text-success">Info: Wajib di isi</p> --}}
                            </div>
                            <div class="form-group">
                                <label for="tempat_kejadian">Tempat Kejadian</label>
                                <input type="text" name="tempat_kejadian" placeholder="Tempat Kejadian"
                                    id="tempat_kejadian" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal dan waktu kejadian <span class="text-danger text-sm">**</span></label>
                                <input type="datetime-local" name="waktu_tgl_kejadian" class="form-control">
                                <input type="datetime-local" hidden name="waktu_kejadian" class="form-control"
                                    value="{{ $informasi->waktu_kejadian }}">

                            </div>
                            <div class="form-group">
                                <label for="terlapor">Terlapor</label>
                                <input type="text" placeholder="Terlapor" name="terlapor" id="terlapor"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_terlapor">Alamat Terlapor</label>
                                <input type="text" name="alamat_terlapor" placeholder="Alamat Terlapor"
                                    id="alamat_terlapor" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label>Uraian Kejadian <span class="text-danger text-sm">**</span></label>
                                <textarea class="form-control summernote" name="uraian_kejadian" rows="4"
                                    placeholder="{{ $informasi->deskripsi }}"></textarea>
                                <textarea class="form-control" hidden name="deskripsi"
                                    rows="4">{{$informasi->deskripsi}}</textarea>
                            </div>
                            <div class="form-group">
                                <p class="text-danger">Penting : <br> ** Boleh di kososngkan jika ingin menggunakan data
                                    dari Informasi Masyarakat</p>
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

    @include('sess/flash')
    @include('sess.scrpt_flash')
