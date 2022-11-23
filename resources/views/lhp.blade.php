@extends('master.app')
@section('title', 'Laporan Hasil Pengawasan')
@section('judul', 'Laporan Hasil Pengawasan')
@section('menu', 'Laporan')
@section('sub', Request::segment(4))
@section('content')

<div class="row">
    @php
        $sts_pleno = 'tidak';
        $jum_pleno = 0;
    @endphp
@forelse ($data_pleno as $item)
    @php
        ++$jum_pleno;
        $sts_pleno = 'ada';            
    @endphp
@empty
@endforelse
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    {{-- @if (Auth::user()->id_jabatan <= 2) --}}
                        @if ($sts_pleno == 'ada')                        
                            <li class="nav-item"><a class="nav-link {{Request::segment(2)=='pleno' ? 'active' : ''}}" href="/lhp/pleno/view/{{$status}}">Pleno Laporan <span class="right badge badge-sm badge-danger">{{$jum_pleno}}</span></a></li>
                        @endif
                    {{-- @endif --}}
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='ada' ? 'active' : ''}}" href="/lhp/ada/view/{{$status}}">Ada Dugaan</a> </li>
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='tidak' ? 'active' : ''}}" href="/lhp/tidak/view/{{$status}}">Tidak Ada Dugaan</a> </li>
                    @if (Auth::user()->id_tingkatan == 1)
                        <li class="nav-item"><a class="nav-link {{Request::segment(2)=='lhp_kecamatan' ? 'active' : ''}}" href="/lhp/lhp_kecamatan/view/{{$status}}">Tingkat Kecamatan</a></li>
                    @endif
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
                            @forelse($data as $no => $item )
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
                                    <i class="fas fa-file bg-blue"></i>
                                    <div style="font-size: 22px ;font-family: &quot;Times New Roman&quot;"
                                        class="pl-5 pr-5 card timeline-item 
                                        @if ($item->dugaan == 'ada')
                                            card-danger
                                        @elseif ($item->dugaan == 'tidak')
                                            card-success
                                        @elseif ($item->dugaan == 'belum')
                                            card-warning
                                        @elseif ($item->dugaan == 'pleno')
                                            card-primary
                                        @endif 
                                        card-outline collapsed-card">
                                        <div class="card-header card-borderless">
                                            <h3 class="card-title"><span class="text-bold">{{ $item->user->name }}</span>
                                                @if ($item->dugaan == 'pleno' || $item->dugaan == 'belum')
                                                    <span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm {{ $item->dugaan=='pleno' ? 'badge-primary' : 'badge-warning' }} ">{{ $item->dugaan=='pleno' ? 'Pleno' : 'Penyusunan' }}</span>
                                                @else
                                                    | Dugaan
                                                    Pelanggaran : <span
                                                    class="right badge badge-sm {{ $item->dugaan=='ada' ? 'badge-danger' : 'badge-success' }} text-bold">{{ $item->dugaan=='ada' ? 'Ada' : 'Tidak Ada' }}</span>
                                                @endif
                                            </h3>
                                            <div class="card-tools">
                                                {{-- <a href="/lhp/{{$item->id}}/edit" class="btn btn-tool text-success">
                                                    <i class="fas fa-edit"></i>
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
                                            @if ($item->dugaan=='ada')
                                                <div>
                                                    <p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            {!! $item->uraian_dugaan !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                
                                                <div>
                                                    <p class="text-bold">III. Uraian Hasil Pengawasan : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            {!! $item->uraian_hasil !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
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
