@extends('master.app')
@section('title', 'Laporan Hasil Pengawasan')
@section('judul', 'Edit Laporan Hasil Pengawasan')
@section('menu', 'Laporan Hasil Pengawasan')
@section('sub', 'Edit')
@section('content')
@include('sess.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link {{Request::segment(4) ? '' : 'active'}}" href="/lhp/{{ $lhp->id }}/edit">Laporan Hasil Pengawasan</a></li>
                    @if ($lhp->dugaan == 'ada')
                        <li class="nav-item"><a class="nav-link {{Request::segment(4)=='pendukung' ? 'active' : ''}}" href="/lhp/{{ $lhp->id }}/edit/pendukung">Data Pendukung</a></li>
                        <li class="nav-item"><a class="nav-link" href="#lampiran" data-toggle="tab">Bukti Pendukung</a></li>
                    @endif
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane {{Request::segment(4) ? '' : 'active'}}" id="activity">
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
                                    value="tidak">Tidak Langsung</option>
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
                            <label for="uraian_hasil">Uraian Hasil Pengawasan</label>
                            <textarea style="height: 300px;" name="uraian_hasil" class="form-control summernote" cols="30"
                                rows="10">{{ $lhp->uraian_hasil }}</textarea>
                            @error('uraian_hasil')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Dugaan Pelanggaran</label>
                            <select name="dugaan" id="" class="form-control">
                                <option value="" disabled>Choose One</option>
                                <option
                                    {{ ($lhp->dugaan == 'ada' ? 'selected' : ' ') }}
                                    value="ada">Ada</option>
                                <option
                                    {{ ($lhp->dugaan == 'tidak' ? 'selected' : ' ') }}
                                    value="tidak">Tidak Ada</option>
                            </select>
                            @error('dugaan')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div> --}}
                        @if ($lhp->dugaan == 'ada')
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
                        @endif
                        <div class="form-group ">
                            <div class="col-md-12 mb-4 d-flex justify-content-between">
                                <div class="row">
                                    <a href="/lhp/{{$lhp->id}}/detail" class="btn btn-default mr-3 "><i class="fas fa-info"></i> Detail Laporan</a>
                                    @if ($lhp->status_lhp=='penelusuran')
                                    <a href="/tim/{{ $lhp->id_tim }}" class="btn btn-secondary "><i class="fas fa-users"></i> Detail Tim</a>
                                    @else
                                        <a href="/tim/{{$lhp->id_tim}}/pengawasan" class="btn btn-secondary "><i class="fas fa-users"></i> Detail Tim</a>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn btn-primary"><i class="fas fa-file-signature"></i> Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane {{Request::segment(4)=='pendukung' ? 'active' : ''}}" id="timeline">
                        <div class="form-group">
                            <label for=""> <span class="size-10 mb-0">Daftar Nama Pelaku </span> <span
                                    class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#pelaku">
                                    <i class="fas fa-plus"></i>
                                </span></label>
                            <table class="mt-0 ml-4 table-sm">
                                <tbody class="">
                                    @forelse($lhp->pelaku  as $no_pelaku => $item_pelaku)
                                        <tr>
                                            <td class="text-bold">{{ ++$no_pelaku }}.</td>
                                            <td class="" colspan="">{{ $item_pelaku->nama }} ({{ $item_pelaku->status }})</td>
                                            <td>
                                                <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                                    data-target="#pelaku_delete{{$item_pelaku->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                <p class="">Pelaku Belum Ditambahkan.</p>
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
                                    @php
                                        $nomrs = 0;
                                    @endphp
                                    {{-- @forelse($lhp->tim->berita_acara as $no_ba => $item_ba)
                                        <tr>
                                            <td class="text-bold">{{ ++$nomrs }}.</td>
                                            <td colspan="2">{{ $item_ba->nama }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="2"></td>
                                        </tr>
                                    @endforelse --}}
                                    @forelse($lhp->saksi  as $nos => $item)
                                        <tr>
                                            <td class="text-bold">{{ ++$nomrs }}.</td>
                                            <td colspan="">{{ $item->nama }}</td>
                                            <td>
                                                <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                                    data-target="#saksi_delete{{$item->id}}">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="2">Saksi-saksi Belum Ditambahkan</td>
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
                                    @forelse($lhp->bukti  as $no_bukti => $item_bukti)
                                        <tr>
                                            <td class="text-bold">{{ ++$no_bukti }}.</td>
                                            <td class="" colspan="">{{ $item_bukti->nama }} <span
                                                    class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                                    data-target="#bukti_delete{{$item_bukti->id}}">
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
                                                <p class="">Bukti Belum Ditambahkan</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @error('nm_saksi')
                                <div class="text-danger">Nama saksi tidak boleh kososng</div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <div class="col-md-12 mb-4 d-flex justify-content-between">
                                @if ($lhp->status_lhp=='penelusuran')
                                    <a href="/tim/{{ $lhp->id_tim }}" class="btn btn-secondary ">Kembali</a>
                                @else
                                    
                                    <a href="/tim/{{$lhp->id_tim}}/pengawasan" class="btn btn-secondary ">Kembali</a>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="lampiran">
                        <table class="table table-borderless mt-0 ml-4 table-sm" width="98%">
                            <tbody>
                                @forelse($lhp->bukti  as $no_bukti => $item_bukti)
                                    <tr>
                                        <td class="text-bold" width="2%">{{ ++$no_bukti }}.</td>
                                        <td class="text-bold" width="98%" colspan="">{{ $item_bukti->nama }}</td>

                                    </tr>
                                    @if($item_bukti->img!=null)
                                        <tr>
                                            <td></td>
                                            <td colspan="">
                                                <img width="60%" class="mb-5" src="{{ asset('storage/'.$item_bukti->img) }}" alt="">
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td></td>
                                            <td colspan="">
                                                  <p class="text-bold">Bukti Foto tidak di upload</p>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="2">
                                            <p class="">Bukti Belum Ditambahkan</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
        
    
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
                        <input type="text" placeholder="Nama Bukti" name="nama" id="nama_pelaku" class="form-control">
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

{{-- Hapus bukti --}}
@forelse ($lhp->bukti as $bukti_del)
    <div class="modal fade" id="bukti_delete{{$bukti_del->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus bukti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Hapus bukti <span class="text-danger text-bold">{{$bukti_del->nama}}</span>..??</h5>
                    <div class="form-group d-flex justify-content-end">
                        <form action="/lhp/bukti/{{$bukti_del->id}}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@empty
@endforelse



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

{{-- hapus pelaku --}}
@forelse ($lhp->pelaku as $pelaku_del)
    <div class="modal fade" id="pelaku_delete{{$pelaku_del->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pelaku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Hapus pelaku atas nama <span class="text-danger text-bold">{{$pelaku_del->nama}}</span>..??</h5>
                    <div class="form-group d-flex justify-content-end">
                        <form action="/lhp/pelaku/{{$pelaku_del->id}}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@empty
    
@endforelse

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

{{-- Hapus saksi --}}
@forelse ($lhp->saksi as $saksi_del)
    <div class="modal fade" id="saksi_delete{{$saksi_del->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus saksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Hapus saksi atas nama <span class="text-danger text-bold">{{$saksi_del->nama}}</span>..??</h5>
                    <div class="form-group d-flex justify-content-end">
                        <form action="/lhp/saksi/{{$saksi_del->id}}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@empty
@endforelse

@endsection

@include('sess.scrpt_flash')