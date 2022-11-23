@extends('master.app')
@section('title', 'Kecamatan')
@section('judul', 'Detail Kecamatan')
@section('menu', 'Kecamatan')
@section('sub', 'Detail')
@section('content')
@include('sess.flash')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img style="height: 200px; width: 200px" class="profile-user-img img-fluid img-circle"
                        src="{{ asset('/assets/dist/img/bawaslu.png') }}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Kecamatan {{$kecamatan->nama}}</h3>

                {{-- <p class="text-muted text-center">{{$kecamatan->jabatan->nm_jabatan}}</p> --}}

                {{-- <ul class="list-group list-group-unbordered mb-3">
                    @php
                        $ia = 0;
                        $lhps = 0 ;
                        $penelusurans = 0 ;
                        $pengawasans = 0;
                    @endphp
                    <li class="list-group-item">
                        
                        @forelse($data as $no => $item_ia )
                            @php
                                $ia++;
                            @endphp
                        @empty
                            
                        @endforelse
                        <b>Informsi Awal</b> <a class="float-right">{{$ia}}</a>
                </li>
                <li class="list-group-item">
                    @forelse ($lhp as $no => $item_lhp )
                    @php
                    $lhps++;
                    @endphp
                    @empty

                    @endforelse
                    <b>LHP</b> <a class="float-right">{{$lhps}}</a>
                </li>
                <li class="list-group-item">
                    @forelse ($user->tims as $no => $penel)
                    @if ($penel->status== 'penelusuran')
                    @php
                    $penelusurans++;
                    @endphp
                    @elseif($penel->status== 'pengawasan')
                    @php
                    $pengawasans++;
                    @endphp
                    @endif
                    @empty

                    @endforelse
                    <b>Tim Penelusuran</b> <a class="float-right">{{$penelusurans}}</a>
                </li>
                <li class="list-group-item">
                    <b>Tim Pengawasan</b> <a class="float-right">{{$pengawasans}}</a>
                </li>
                </ul> --}}

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$tot_pengawas}}</h3>
                <p>Pengguna</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

            <a href="{{url('/user/kecamatan/'.$kecamatan->id.'/table')}}"
                class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$tot_ia}}</h3>

                <p>Informasi Awal</p>
            </div>
            <div class="icon">
                <i class="fa fa-clipboard-check"></i>
            </div>
            <a href="{{url('/informasi_awal')}}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$tot_lhp}}</h3>

                <p>Laporan Hasil Pengawasan</p>
            </div>
            <div class="icon">
                <i class="fa fa-file-signature"></i>
            </div>
            <a href="{{ url('/lhp/ada/view/pengawasan') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$tot_tim}}</h3>

                <p>Tim Pengawasan/Penelusuran</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('/tim/pengawasan/status') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
        {{-- <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-hotel mr-1"></i> Lembaga</strong>

                <p class="text-muted">
                    {{$user->tingkatan->lainnya.' '.$user->tingkatan->nm_tingkatan}}
        {{ ($user->id_tingkatan >= 2 ? 'Kecamatan '.$user->kecamatan->nama : $user->kabupaten->status.' '.$user->kabupaten->nama) }}
        </p>

        <hr>

        <strong><i class="fas fa-sitemap mr-1"></i> Jabatan</strong>

        <p class="text-muted">{{$user->jabatan->nm_jabatan}}</p>

        <hr>

        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

        <p class="text-muted">{{$user->alamat}}</p>

        <hr>
    </div>
    <!-- /.card-body -->
</div> --}}
<!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="{{Request::segment(4) == null ? 'active' : ''}} nav-link"
                        href="/kecamatan/{{$kecamatan->id}}/detail">Dashboard</a></li>
                <li class="nav-item"><a class="{{Request::segment(4) == 'informasi' ? 'active' : ''}} nav-link"
                        href="/kecamatan/{{$kecamatan->id}}/detail/informasi">Informasi Awal</a></li>
                <li class="nav-item"><a class="{{Request::segment(4) == 'lhp' ? 'active' : ''}} nav-link"
                        href="/kecamatan/{{$kecamatan->id}}/detail/lhp">Laporan Hasil Pengawasan</a></li>
                <li class="nav-item"><a class="{{Request::segment(4) == 'tim' ? 'active' : ''}} nav-link"
                        href="/kecamatan/{{$kecamatan->id}}/detail/tim">Tim</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                @if (Request::segment(4) == null)
                <div class="active tab-pane">
                    <div class="row">
                        <div class="card card-info col-md-12">
                            <div class="card-header">
                                <h3 class="card-title">Dugaan Pelanggaran</h3>

                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card card-danger col-md-12">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Hasil</h3>
                                <div class="card-tools">
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- AREA CHART -->
                            <div class="card card-primary hidden">
                                <div class="card-header">
                                    <h3 class="card-title">Area Chart</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="areaChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>

                    </div>
                </div>
                @elseif (Request::segment(4) == 'informasi')
                <div class="active tab-pane">
                    <div class="timeline">
                        @php
                            $nos = date('ymd');
                        @endphp
                            @foreach($informasi_awal as $no => $item )
                                @php
                                    if (Request::segment(2)) {
                                        $tgl = date('ymd', strtotime($item->updated_at));
                                    } else {
                                        $tgl = date('ymd', strtotime($item->created_at));
                                    }
                                    

                                @endphp
                                @if ($nos!=$tgl)
                                    <div class="time-label">
                                        @if (Request::segment(2))
                                            <span class="bg-red">{{ $item->updated_at->format('d F Y')}}</span>
                                        @else
                                            <span class="bg-red">{{ $item->created_at->format('d F Y')}}</span>
                                        @endif
                                    </div>
                                    @php
                                        $nos = $tgl;
                                    @endphp
                                @elseif (date('ymd')==$tgl && $no==0)
                                    <div class="time-label">
                                        <span class="bg-red">Laporan Hari Ini</span>
                                    </div>
                                @endif
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            @if ($item->status=='lengkapi')
                                                Perlu Dilengkapi 
                                            @elseif($item->status=='diproses')
                                                Diproses pada : {{$item->updated_at->diffForHumans() }}
                                            @elseif($item->status=='buat_tim')
                                                Diplenokan : {{$item->updated_at->diffForHumans() }}
                                            @elseif($item->status=='tim_dibuat')
                                                Pembantukan Tim : {{$item->updated_at->diffForHumans() }}
                                            @else
                                                Laporan Tidak Diterima
                                            @endif
                                        </span>
                                        <h3 class="timeline-header"><a href=""> {{ $item->informasi->nama }}</a> <strong>|</strong> Kode : <span class="text-danger text-bold">IA{{sprintf("%04d", $item->id) }}</span>
                                            @if($item->status == 'lengkapi')
                                                @if(Auth::user()->id == $item->id_user)
                                                    <strong>|</strong> Perlu Ditangani
                                                @else
                                                    <strong>|</strong> Perlu Ditangani 
                                                @endif
                                            @elseif($item->informasi->status == 'ditangani')
                                                @if(Auth::user()->id == $item->id_user)
                                                    <strong>|</strong> Ditangani
                                                @else
                                                    <strong>|</strong> Ditangani 
                                                @endif
                                            @elseif($item->informasi->status == 'diproses')
                                                @if(Auth::user()->id == $item->id_user)
                                                    <strong>|</strong> Diproses
                                                @else
                                                    <strong>|</strong> Diproses 
                                                @endif
                                            @else
                                                @if(Auth::user()->id == $item->id_user)
                                                
                                                @else
                                                    <strong>|</strong> {{ $item->user->name }} 
                                                @endif
                                            @endif

                                        </h3>
                                        <div class="timeline-body">
                                        @if ($item->status=='lengkapi')
                                            {{ $item->informasi->deskripsi }}
                                        @else
                                            {{ $item->uraian_kejadian }}
                                        @endif
                                            
                                        </div>
                                        <div class="timeline-footer">
                                            @if ($item->status=='lengkapi')
                                                <form action="/informasi/{{ $item->id_informasi }}/1" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button class="btn btn-primary btn-sm text-white" type="submit">
                                                        <strong>Lihat</strong></button>
                                                </form>
                                            @else
                                                <a href="/informasi_awal/{{$item->id}}/detail" class="btn btn-primary btn-sm text-white">Lihat</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                            <div class="float-right pr-3">
                                {{ $informasi_awal->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                @elseif (Request::segment(4) == 'lhp')
                <div class="timeline" id="informasi" style="z-index: 1;">
                    @php
                    $nos = date('ymd');
                    @endphp
                    @forelse($lhp as $no => $item )
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
                                    <h3 class="card-title"><span class="text-bold">Laporan Hasil {{ $item->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan' }}</span> 
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
                                    @if ($item->dugaan=='tidak')
                                        <div>
                                            <p class="text-bold">III. Uraian Hasil Pengawasan : </p>
                                            <div class="row">
                                                <div class="col-md-12 pr-4">

                                                    {!! $item->uraian_hasil !!}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div>
                                            <p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
                                            <div class="row">
                                                <div class="col-md-12 pr-4">

                                                    {!! $item->uraian_dugaan !!}
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
                            {{ $lhp->links() }}
                        </div>
                    </div>
                </div>

                @elseif (Request::segment(4) == 'tim')
                <table class="table col-md-12" id="myTable">
                    <thead class="">
                        <tr>
                            <th style="width: 5%">#</th>
                            <th  width="30%" >Tema</th>
                            {{-- <th></th> --}}
                            <th  width="50%">Anggota Tim</th>
                            <th  width="10%">Status</th>
                            <th  width="5%" style="text-align: center">Detail</th>
                        </tr>
                    </thead>
                    <tbody id="coba">
                        @forelse($user->tims as $no => $item)
                            <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>
                                        {{$item->nama}}
                                    </td>
                                    <td>
                                        
                                        <ul class="list-inline">
                                            @forelse ($item->tim_user as $usr)
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar img-circle" title="{{$usr->user->name}}" width="50px" height="50px"  src="{{ asset('storage/'.$usr->user->foto) }}">
                                                </li>
                                            @empty
                                                
                                            @endforelse
                                        </ul>
                                    </td>
                                    <td align="center">
                                        @if ($item->status == 'penelusuran')
                                            <div class="badge badge-info">Penelusuran</div>
                                        @else
                                            <div class="badge badge-warning">Pengawasan</div>
                                        @endif
                                        @if (date('Y-m-d') > date('Y-m-d', strtotime($item->selesai)))
                                            <div class="badge badge-success">Selesai</div>
                                        @else
                                            <div class="badge badge-warning">Dalam Proses</div>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if ($item->status=='penelusuran')
                                            <a href="/tim/{{$item->id}}" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                        @elseif ($item->status=='pengawasan')
                                            <a href="/tim/{{$item->id}}/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                        @endif
                                    </td>
                                </tr> 
                        @empty
                            <tr>
                                <td colspan="6" align="center">
                                    <div class="alert alert-danger alert-sm">Belum ada Data</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @endif


            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
@endsection

@include('sess.scrpt_flash')


@push('link')
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> --}}
{{-- <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> --}}
@endpush

@push('scripts')
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "ordering": false,
        });
    });

</script>
@endpush
@push('scripts')
    <script src="{{ asset('/assets/plugins/chart.js/Chart.min.js') }}"></script>
    <script>
  $(function () {
   
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [
          // 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober','November','Desember'
        @foreach ($dugaan as $item)
            '{{date('F', strtotime($item->bulan))}}', 
        @endforeach
    ],
      datasets: [
        {
          label               : 'Tidak Ada Dugaan',
          backgroundColor     : '#00a65a',
          borderColor         : '#00a65a',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : '#00a65a',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#00a65a',
          data                : [ 
              @foreach ($tidak as $item)
                  {{$item->jumlah}},
              @endforeach
          ]
        },
        {
          label               : 'Ada Dugaan',
          backgroundColor     : '#dc3545',
          borderColor         : '#dc3545',
          pointRadius         : false,
          pointColor          : '#dc3545',
          pointStrokeColor    : '#dc3545',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: '#dc3545',
          data                : [
              @foreach ($ada as $item)
                  {{$item->jumlah}},
              @endforeach
          ]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Ada Dugaan',
          'Tidak Ada Dugaan',
          'Dalam Proses',
          'Pleno',
      ],
      datasets: [
        {
          data: [{{$lhp_ada}},{{$lhp_tidak}},{{$lhp_belum}},{{$lhp_pleno}}],
          backgroundColor : ['#dc3545', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    
  })
</script>
@endpush