@extends('master.app')
@section('title', 'Laporan Masyarakat')
@section('judul', 'Laporan Masyarakat')
@section('menu', 'Informasi')
@section('sub', 'Laporan Masyarakat')
@section('content')

<div class="row">
@php
    $sts_antrian = 'tidak';
    $jum_antrian = 0;
    $sts_alihkan = 'tidak';
    $jum_alihkan = 0;
@endphp
@forelse ($data_antrian as $no => $antri)
    @if ($antri->status=='antrian')
        @php
            ++$jum_antrian;
            $sts_antrian = 'ada';            
        @endphp
    @elseif ($antri->status=='alihkan')
        @php
            ++$jum_alihkan;
            $sts_alihkan = 'ada';            
        @endphp
    @endif
    
@empty
    
@endforelse

{{-- {{ date('d-m-y', strtotime('+5 days', time())) }} --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    @if ($sts_antrian == 'ada')
                        <li class="nav-item"><a class="nav-link {{Request::segment(2)=='antrian' ? 'active' : ''}}" href="/informasi/antrian">Masuk <span class="right badge badge-sm badge-danger">{{$jum_antrian}}</span></a> </li>                        
                    @endif

                    <li class="nav-item"><a class="nav-link {{Request::segment(2) ? '' : 'active'}}" href="/informasi">Semua</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='dibaca' ? 'active' : ''}}" href="/informasi/dibaca">Dibaca</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='diproses' ? 'active' : ''}}" href="/informasi/diproses">Diproses</a></li>
                    @if ($sts_alihkan == 'ada')
                        <li class="nav-item"><a class="nav-link {{Request::segment(2)=='alihkan' ? 'active' : ''}}" href="/informasi/alihkan">Dialihkan <span class="right badge badge-sm badge-danger">{{$jum_alihkan}}</span></a></li>                        
                    @endif
                    {{-- <li class="nav-item"><a class="nav-link {{Request::segment(2)=='diproses' ? 'active' : ''}}" href="/informasi/ditolak">Ditolak</a></li> --}}
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    {{-- antrian --}}
                    <div class="active tab-pane" id="">
                        <div class="timeline" id="informasi" style="z-index: 1;">
                            @php
                            $nos = date('ymd');
                            @endphp
                            @foreach($data as $no => $item )
                                @php
                                $tgl = date('ymd', strtotime($item->created_at));
                                @endphp
                                @if($nos!=$tgl)
                                    <div class="time-label">
                                        <span class="bg-red">{{ $item->created_at->format('d F Y') }}</span>
                                    </div>
                                    @php
                                    $nos = $tgl;
                                    @endphp
                                @elseif(date('ymd')==$tgl && $no==0)
                                    <div class="time-label">
                                        <span class="bg-red">Laporan Hari Ini</span>
                                    </div>
                                @endif
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            @if ($item->status == 'antrian')
                                                Laporan Masuk
                                            @else
                                                {{$item->status}}
                                            @endif
                                             {{$item->updated_at->diffForHumans()}}
                                            {{-- @if ($item->status == 'dibaca' && date('d-m-y', time($item->created_at)) <= date('d-m-y', strtotime('+7 days', time($item->created_at))))
                                                ditolak
                                            @else
                                                {{ $item->status }}
                                            @endif --}}
                                            </span>
                                        <h3 class="timeline-header"><a href="/informasi/{{ $item->id }}/show"> {{ $item->nama }} </a> <strong>|</strong> Kode :  <span
                                                class="text-danger text-bold">IM-{{ sprintf("%04d", $item->id) }}</span>
                                            @if($item->status == 'dibaca')
                                                 <strong>|</strong> Belum di tangani
                                            @elseif($item->status == 'ditangani')
                                                @if(Auth::user()->id == $item->informasi_awal->user->id)
                                                 <strong>|</strong> Ditangani : Saya
                                                @else
                                                <strong>|</strong> Ditangani : {{ $item->informasi_awal->user->name }} 
                                                @endif
                                            @elseif($item->status == 'diproses')
                                                @if(Auth::user()->id == $item->informasi_awal->user->id)
                                                <strong>|</strong> Diproses : Saya
                                                @else
                                                <strong>|</strong> Diproses : {{ $item->informasi_awal->user->name }} 
                                                @endif
                                            @elseif($item->status == 'alihkan')
                                                <strong>|</strong> Dialihkan : Kecamatan {{ $item->alihkan->kecamatan->nama }}
                                            @endif
                                        </h3>
                                        <div class="timeline-body">
                                            {{ $item->deskripsi }}
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="/informasi/{{ $item->id }}/show" class="btn btn-primary btn-sm text-white">
                                                <strong>Lihat</strong></a>
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
                    {{-- <div class="{{Request::segment(2)=='antrian' ? 'active' : ''}} tab-pane" id="">
                        
                    </div> --}}
                    {{-- semua --}}
                    {{-- <div class="{{Request::segment(2) ? '' : 'active'}} tab-pane" id="">
                        
                    </div> --}}
                    {{-- dibaca --}}
                    {{-- <div class="{{Request::segment(2)=='dibaca' ? 'active' : ''}} tab-pane" id="">

                    </div> --}}
                    {{-- diproses --}}
                    {{-- <div class="{{Request::segment(2)=='diproses' ? 'active' : ''}} tab-pane" id="">

                    </div> --}}
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>









    <div class="col-md-12">
        
    </div>
</div>
@endsection
