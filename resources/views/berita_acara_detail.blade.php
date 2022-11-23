@extends('master.app')
@section('title', 'Berita Acara')
@section('judul', 'Berita Acara')
@section('menu', 'Berita Acara')
@section('sub', 'Detail')
@section('content')
<div class="row">
    @include('sess.flash')
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Berita Acara</h3>
                <div class="card-tools">
                    <a href="/berita_acara/{{$berita_acara->id}}/print/print" class="btn btn-tool text-primary" title="Print"><i class="fas fa-eye"></i></a>
                    <a href="/berita_acara/{{$berita_acara->id}}/download/print" class="btn btn-tool" target="_blank" title="Download"><i class="fas fa-download"></i></a>
                    <a href="/berita_acara/{{$berita_acara->id}}/print/print" class="btn btn-tool text-primary" target="_blank" title="Print"><i class="fas fa-print"></i></a>
                    <button class="btn btn-tool text-success" data-toggle="modal" data-target="#editba"><i class="fas fa-edit"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <table class="table table-borderless" width="100%">
                        <tr>
                            <td width="15%">Nama Saksi</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->nama }}</th>
                        </tr>
                        <tr>
                            <td width="15%">Tempat Lahir</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->tmpt_lahir }}</th>
                        </tr>
                        <tr>
                            <td width="15%">Tanggal Lahir</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ date('d F.Y', strtotime($berita_acara->tgl_lahir)) }}</th>
                        </tr>
                        <tr>
                            <td width="15%">Pekerjaan</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->pekerjaan }}</th>
                        </tr>
                        <tr>
                            <td width="15%">Agama</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->agama }}</th>
                        </tr>
                        <tr>
                            <td width="15%">Tempat Tinggal</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->tinggal }}</th>
                        </tr>
                        <tr>
                            <td width="15%">Informasi Awal Terkait</td>
                            <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->terkait }}</th>
                        </tr>
                        <tr>
                            <th colspan="3" width="100%"></th>
                            {{-- <th width="1%">:</th>
                            <th width="84%">{{ $berita_acara->tinggal }}</th> --}}
                        </tr>
                    </table>
                    
                </div>
            </div>
            
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>


<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
            <div class="time-label">
                @php
                    $jum_pertanyaan =0;
                    $penutup =0;
                    $status =0;
                @endphp
                @foreach($detail as $nomor => $item)
                    @php
                        ++$jum_pertanyaan;
                    @endphp
                     @if ($item->status=='penutup')
                        @php
                            $penutup++;
                            $status =1;
                        @endphp
                    @endif
                @endforeach
                {{-- <span class="bg-blue">Pertanyaan ({{$berita_acara->user->name }})</span>
                --}}
                @if ($status!=1)
                <button class="btn pertanyaan btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalScrollable">
                    <i class="fas fa-plus-circle"></i>
                    @if($jum_pertanyaan==0||$jum_pertanyaan==1)
                        Pembuka
                    @else
                        Terkait Kasus
                    @endif
                </button>
                @endif
                @if ($penutup<=3 && $jum_pertanyaan>=3)
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#penutup">
                    <i class="fas fa-times-circle"></i> Penutup</button>
                @endif
                @if (date('ymdhi', strtotime($berita_acara->selesai))!=date('ymdhi', strtotime($berita_acara->created_at)))
                <div class="btn btn-success">
					<i class="fas fa-check-circle"></i> Diselesaikan Pukul {{date('H:i', strtotime($berita_acara->selesai))}} WITA
				</div>
                @endif
            </div>

            @forelse($detail as $no => $item  )
                <div>
                    <i class="fas @if ($item->status=='pembuka')
                        bg-success
                    @elseif($item->status=='kasus')
                        bg-primary
                    @else
                        bg-danger
                    @endif">{{ ++$no }}</i>
                    <div class="timeline-item card-primary card-outline">
                        
                        <span class="time">
                            @if ($berita_acara->id_user == Auth::user()->id)
                                <button class="btn btn-tool text-success" data-toggle="modal" data-target="#pertanyaan{{$item->id}}"><i class="fas fa-edit"></i></button>
                            @else
                                <i class="fas fa-clock"></i>
                                {{ $item->created_at->diffForHumans() }}
                            @endif
                        </span>
                        <div class="timeline-body">
                            <h6 class="timeline-header text-blue text-bold">
                                {{ $berita_acara->user->name }}
                                (Pertanyaan)
                            </h6>
                            {{ $item->pertanyaan.'..?' }}
                        </div>
                        <div class="timeline-body text-right border-top">
                            <h6 class="timeline-header text-red text-bold">
                                {{ $berita_acara->nama }} (Jawaban)
                            </h6>
                            {{ $item->jawaban.'..!' }}
                        </div>
                    </div>
                </div>

            @empty
                <div>
                    <i class="fas bg-danger fa-times-circle"></i>
                    <div class="timeline-item bg-danger">
                        <div class="alert alert-dager">Belum Melakukan Wawancara kepada Saksi</div>
                        {{-- <span class="time"><i class="fas fa-clock"></i>

                            Belum melakukan wawancara
                        </span>
                        <h2 class="timeline-header text-blue text-bold">
                            Belum melakukan wawancara

                        </h2> --}}
                    </div>
                </div>
            @endforelse
            <div>
                <i class="fas fa-clock bg-secondary"></i>
                <div style="position: fixed; right: 30px; bottom:25px; z-index:2;"  class="float-right">
                    @if ($status!=1)
                        <button class="btn btn-primary btn-lg rounded-circle" data-toggle="modal" data-target="#exampleModalScrollable">
                            <i class="fas fa-plus"></i>
                            {{-- @if($jum_pertanyaan==0||$jum_pertanyaan==1)
                                Pembuka
                            @else
                                Terkait Kasus
                            @endif --}}
                        </button>
                    @endif
                    @if ($penutup<=3 && $jum_pertanyaan>=3)
                        <button class="btn btn-danger btn-lg rounded-circle" data-toggle="modal" data-target="#penutup">
                        <i class="fas fa-times"></i></button>
                        {{-- <i class="fas fa-times-circle"></i> Penutup</button> --}}
                    @endif
                    {{-- @if ($berita_acara->selesai!=$berita_acara->created_at)
                    <div class="btn btn-success">
                        <i class="fas fa-check-circle"></i> Diselesaikan Pukul {{date('H:i', strtotime($berita_acara->selesai))}} WITA</div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    @if($jum_pertanyaan==0)
                        Pertanyaan Pembuka
                    @elseif($jum_pertanyaan==1)
                        Pertanyaan Pembuka
                    @else
                        Pertanyaan Terkait Kasus
                    @endif
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/berita_acara/{{ $berita_acara->id }}/add_pertanyaan" method="post">
                    @csrf
                    @if($jum_pertanyaan==0 || $jum_pertanyaan==1 )
                        <input type="text" hidden name="status" id="" value="pembuka">
                    @else
                        <input type="text" hidden name="status" id="" value="kasus">
                    @endif

                    <div class="form-group">
                        @if($jum_pertanyaan==0)
                            <label> Pertanyaan (<span
                                    class="text-blue">{{ $berita_acara->user->name }}</span>)</label>
                            <h5>Apakah Saudara pada hari ini berada dalam kondisi sehat jasmani dan rohani untuk
                                memberikan keterangan atau jawaban terkait dengan laporan di atas..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah Saudara pada hari ini berada dalam kondisi sehat jasmani dan rohani untuk memberikan keterangan atau jawaban terkait dengan laporan di atas</textarea>
                        @elseif($jum_pertanyaan==1)
                            <label> Pertanyaan (<span
                                    class="text-blue">{{ $berita_acara->user->name }}</span>)</label>
                            {{-- hari --}}
                            @if(date('D')=='Mon')
                                @php
                                    $hari = 'Senin';
                                @endphp
                            @elseif(date('D')=='Tue')
                                @php
                                    $hari = 'Selasa';
                                @endphp
                            @elseif(date('D')=='Wed')
                                @php
                                    $hari = 'Rabu';
                                @endphp
                            @elseif(date('D')=='Thu')
                                @php
                                    $hari = 'Kamis';
                                @endphp
                            @elseif(date('D')=='Fri')
                                @php
                                    $hari = "Jum'at";
                                @endphp
                            @elseif(date('D')=='Sat')
                                @php
                                    $hari = 'Sabtu';
                                @endphp
                            @elseif(date('D')=='Sun')
                                @php
                                    $hari = 'Minggu';
                                @endphp
                            @endif

                            {{-- bulan --}}
                            @if(date('m')==1)
                                @php
                                    $bulan = 'Januari';
                                @endphp
                            @elseif(date('m')==2)
                                @php
                                    $bulan = 'Februari';
                                @endphp
                            @elseif(date('m')==3)
                                @php
                                    $bulan = 'Maret';
                                @endphp
                            @elseif(date('m')==4)
                                @php
                                    $bulan = 'April';
                                @endphp
                            @elseif(date('m')==5)
                                @php
                                    $bulan = 'Mei';
                                @endphp
                            @elseif(date('m')==6)
                                @php
                                    $bulan = 'Juni';
                                @endphp
                            @elseif(date('m')==7)
                                @php
                                    $bulan = 'Juli';
                                @endphp
                            @elseif(date('m')==8)
                                @php
                                    $bulan = 'Agustus';
                                @endphp
                            @elseif(date('m')==9)
                                @php
                                    $bulan = 'September';
                                @endphp
                            @elseif(date('m')==10)
                                @php
                                    $bulan = 'Oktober';
                                @endphp
                            @elseif(date('m')==11)
                                @php
                                    $bulan = 'November';
                                @endphp
                            @elseif(date('m')==12)
                                @php
                                    $bulan = 'Desember';
                                @endphp
                            @endif
                            <h5>Apakah pada hari ini <span class="text-red bold">{{ $hari }}</span> Tanggal <span
                                    class="text-red bold">{{ date('d').' '.$bulan.' '.date('Y') }}</span>,
                                Saudara bersedia untuk memberikan keterangan untuk memperjelas adanya informasi awal
                                terkait <span class="text-red bold">{{ $berita_acara->terkait }}</span>..?</h5>
                            {{-- <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan" cols="30"
                            class="form-control" rows="1">Apakah pada hari ini {{ $hari }} Tanggal
                            {{ date('d').' '.$bulan.' '.date('Y') }},
                            Saudara bersedia untuk memberikan keterangan untuk memperjelas adanya informasi awal terkai
                            {{ $berita_acara->terkait }}
                            </textarea> --}}
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah pada hari ini {{ $hari }} Tanggal {{ date('d').' '.$bulan.' '.date('Y') }}, Saudara bersedia untuk memberikan keterangan untuk memperjelas adanya informasi awal terkai {{$berita_acara->terkait}}</textarea>
                        @else
                            <label for="pertanyaan">Pertanyaan (<span
                                    class="text-blue">{{ $berita_acara->user->name }}</span>)</label>
                            <textarea name="pertanyaan" id="pertanyaan" placeholder="Masukan Pertanyaan terkait kasus.."
                                cols="30" class="form-control" rows="2"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" hidden name="selesai" id="" value="belum">
                        <label for="Jawaban">Jawaban (<span class="text-red">{{ $berita_acara->nama }}</span>)</label>
                        <textarea name="jawaban" id="Jawaban" placeholder="Masukan Jawaban Saksi.." cols="30"
                            class="form-control" rows="2"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->


<div class="modal fade" id="penutup" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Pertanyaan Penutup
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="/berita_acara/{{ $berita_acara->id }}/add_pertanyaan" method="post">
                    @csrf
                    <input type="text" hidden name="status" id="" value="penutup">
                    <div class="form-group">
                        <label> Pertanyaan (<span class="text-blue">{{ $berita_acara->user->name }}</span>)</label>
                        @if($penutup==0)
                            <input type="text" hidden name="selesai" id="" value="belum">
                            <h5>Apakah menurut Saudara, semua keterangan yang Saudara sampaikan sudah benar dan dapat dipertanggung jawabkan..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah menurut Saudara, semua keterangan yang Saudara sampaikan sudah benar dan dapat dipertanggung jawabkan</textarea>
                                            
                        @elseif($penutup==1)
                            <input type="text" hidden name="selesai" id="" value="belum">
                            <h5>Apakah masih ada keterangan lain atau keterangan tambahan yang ingin Saudara sampaikan..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah masih ada keterangan lain atau keterangan tambahan yang ingin Saudara sampaikan</textarea>
                        @elseif($penutup==2)
                          <input type="text" hidden name="selesai" id="" value="belum">
                            <h5>Apakah Saudara bersedia untuk memberikan keterangan kembali apabila diperlukan..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah Saudara bersedia untuk memberikan keterangan kembali apabila diperlukan</textarea>
                        @elseif($penutup==3)
                            <input type="text" hidden name="selesai" id="" value="iya">
                            <h5>Apakah Saudara dalam memberi keterangan atau jawaban merasa tertekan atau terpaksa karena tekanan oleh pemeriksa atau pihak lain..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah Saudara dalam memberi keterangan atau jawaban merasa tertekan atau terpaksa karena tekanan oleh pemeriksa atau pihak lain</textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Jawaban">Jawaban (<span class="text-red">{{ $berita_acara->nama }}</span>)</label>
                        <textarea name="jawaban" id="Jawaban" placeholder="Masukan Jawaban Saksi.." cols="30"
                            class="form-control" rows="2"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                </form>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="editba" tabindex="-1" role="dialog"
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
                <form action="/berita_acara/{{$berita_acara->id}}/edit" method="post">
                    @csrf
                    @method('patch')
                    <input type="text" name="id_tim" id="" value="{{ $berita_acara->tim->id }}" hidden>
                    <div class="form-group">
                        <label for="nama">Nama Saksi</label>
                        <input type="text" value="{{old('nama') ?? $berita_acara->nama}}" id="nama" name="nama" class="form-control">
                        @error('nama')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tmpt_lahir">Tempat Lahir</label>
                        <input type="text" value="{{old('tmpt_lahir') ?? $berita_acara->tmpt_lahir}}" id="tmpt_lahir" name="tmpt_lahir" class="form-control">
                        @error('tmpt_lahir')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" value="{{old('tgl_lahir') ?? $berita_acara->tgl_lahir}}" name="tgl_lahir" class="form-control">
                            @error('tgl_lahir')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control" id="">
                                <option {{$berita_acara->agama=='Islam' ? 'selected' : ''}} value="Islam">Islam</option>
                                <option {{$berita_acara->agama=='Kristen' ? 'selected' : ''}} value="Kristen">Kristen</option>
                                <option {{$berita_acara->agama=='Katolik' ? 'selected' : ''}} value="Katolik">Katolik</option>
                                <option {{$berita_acara->agama=='Hindu' ? 'selected' : ''}} value="Hindu">Hindu</option>
                                <option {{$berita_acara->agama=='Budha' ? 'selected' : ''}} value="Budha">Budha</option>
                            </select>
                            @error('agama')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" value="{{old('pekerjaan') ?? $berita_acara->pekerjaan}}" id="pekerjaan" name="pekerjaan" class="form-control">
                        @error('pekerjaan')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="tinggal">Tempat Tinggal</label>
                        <input type="text" value="{{old('tinggal') ?? $berita_acara->tinggal}}" id="tinggal" name="tinggal" class="form-control">
                        @error('tinggal')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_wawancara">Lokasi Wawancara</label>
                        <input type="text" value="{{old('lokasi_wawancara') ?? $berita_acara->lokasi_wawancara}}" id="lokasi_wawancara" name="lokasi_wawancara" class="form-control">
                        @error('lokasi_wawancara')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="terkait">Masalah Terkait</label>
                        <textarea id="terkait" name="terkait" class="form-control" cols="30" rows="3">{{old('terkait') ?? $berita_acara->terkait}}</textarea>
                        @error('terkait')
                            <div class="text-danger">Tidak boleh kosong</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
            </div>
        </div>
    </div>
</div>


 {{-- modal edit pertanyaan--}}
 @forelse ($detail as $items)
     <div class="modal fade" id="pertanyaan{{$items->id}}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Pertanyaan Dan Jawaban
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/berita_acara/{{$items->id}}/edit_pertanyaan" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan (<span
                                    class="text-blue">{{ $berita_acara->user->name }}</span>)</label>
                            <textarea name="pertanyaan" id="pertanyaan"
                                cols="30" class="form-control" rows="3">{{old('pertanyaan') ?? $items->pertanyaan}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Jawaban">Jawaban (<span class="text-red">{{ $berita_acara->nama }}</span>)</label>
                            <textarea name="jawaban" id="Jawaban" cols="30"
                                class="form-control" rows="3">{{old('jawaban') ?? $items->jawaban}}</textarea>
                        </div> 
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @empty
     
 @endforelse


@endsection

@include('sess.scrpt_flash')