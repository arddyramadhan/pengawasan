@extends('master.app')
@section('title', 'Dashboard')
@section('judul', 'Dashboard')
@section('menu', 'Menu')
@section('sub', 'Dashboard')
@section('content')
<div class="container-fluid">
    
	@include('sess.flash')

  @if (Auth::user()->level != 'super')
      <div class="row pl-2 pr-2 mb-2">
    {{-- lhp --}}
        @forelse ($notif_lhp_belum as $not_lhp_blm)
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="94%">Terdapat <span class="text-bold">Laporan Hasil Pengawasan</span> yang <span class="text-warning text-bold">Belum</span> di Selesaikan..!</td>
                  <td width="3%" >
                    <button class='btn-link text-success btn btn-sm' data-toggle='modal' data-target='#catatan'><i class="fas fa-file-signature"></i></button>
                    {{-- <a href="/lhp/{{$not_lhp_blm->id}}/lanjutlhp_belum" class="btn-link text-success btn btn-sm"><i class="fas fa-file-signature"></i></a> --}}
                  </td>
                  <td width="3%" >
                    <a href="/lhp/{{$not_lhp_blm->id}}/lanjutlhp_belum" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              </table>
            </div>
        @empty
            
        @endforelse
        {{-- ada --}}
        @forelse ($notif_lhp_lanjut_uraian as $not_lhp_lanjut)
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="95%">Terdapat <span class="text-bold">Laporan Hasil Pengawasan</span> yang harus <span class="text-danger text-bold">Dilengkapi</span> karena terdapat <span class="text-danger text-bold">Dugaan Pelanggaran..</span></td>
                  <td width="5%" >
                    <a href="/lhp/{{$not_lhp_lanjut->id}}/lanjutlhp" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a></td>
                </tr>
              </table>
            </div>
        @empty
            
        @endforelse

        
        @forelse ($alihkan_ia as $alih_ia)
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  
                  <td width="95%">Terdapat <span class="text-bold">Laporan Masyarakat</span> yang <span class="text-danger text-bold">Dialhikan</span>..!</td>
                  <td width="5%" >
                    <a href="/informasi/{{ $alih_ia->id }}/show" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a></td>
                </tr>
              </table>
            </div>
        @empty
            
        @endforelse
        
        @forelse ($informasi_baru as $i_baru)
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="95%">Terdapat <span class="text-bold">Laporan Masyarakat</span> yang <span class="text-danger text-bold">Baru Masuk</span>..!</td>
                  <td width="5%" >
                  <form action="/informasi/{{ $i_baru->id }}/1" method="post">
                    @csrf
                    @method('PATCH')
                    {{-- <a class="btn btn-warning btn-sm">Lihat</a> --}}
                    <button class="btn-link text-primary btn btn-sm" type="submit">
                      <i class="fas fa-eye"></i></button>
                  </form>
                </td>
                </tr>
              </table>
            </div>
        @empty
            
        @endforelse

        @forelse ($ia_lengkapi as $ia)
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="95%">Terdapat <span class="text-bold">Laporan Masyarakat</span> yang harus <span class="">Ditindak Lanjuti</span> kedalam <span class="text-danger text-bold">A6 Informasi Awal</span></td>
                  <td width="5%" >
                  <form action="/informasi/{{ $ia->id }}/1" method="post">
                    @csrf
                    @method('PATCH')
                    {{-- <a class="btn btn-warning btn-sm">Lihat</a> --}}
                    <button class="btn-link text-primary btn btn-sm" type="submit">
                      <i class="fas fa-eye"></i></button>
                  </form>
                </td>
                </tr>
              </table>
            </div>
        @empty
            
        @endforelse




        {{-- pleno --}}
        @if (Auth::user()->id_jabatan <= 2)
          @forelse ($notif_lhp_pleno as $not_lhp_pleno)
              <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
                <table width="100%" style="" class="col-md-12 table-borderless">
                  <tr>
                    <td width="95%">Terdapat <span class="text-bold">Laporan Hasil Pengawasan</span> yang perlu dilakukan <span class="text-primary text-bold">Pleno</span>..!</td>
                    <td width="5%" >
                      <a href="/lhp/{{$not_lhp_pleno->id}}/detail" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a></td>
                  </tr>
                </table>
              </div>
          @empty
              
          @endforelse
        @endif
      </div>
  @endif

    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$tot_lm}}</h3>
                <p>Laporan Masyarakat</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>

              <a href="{{ Auth::user()->id_tingkatan == 1 ? url('/informasi') : url('/informasi_awal') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$tot_ia}}</h3>

                <p>Informasi Awal</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-check"></i>
              </div>
              <a href="{{url('/informasi_awal')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$tot_lhp}}</h3>

                <p>Laporan Hasil Pengawasan</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-signature"></i>
              </div>
              <a href="{{ url('/lhp/ada/view/pengawasan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$tot_tim}}</h3>

                <p>Tim Pengawasan/Penelusuran</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="{{ url('/tim/pengawasan/status') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
            <div class="card card-info col-md-8">
                <div class="card-header">
                <h3 class="card-title">Dugaan Pelanggaran</h3>

                <div class="card-tools">
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button> --}}
                </div>
                </div>
                <div class="card-body">
                <div class="chart">
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                </div>
                <!-- /.card-body -->
            </div>

            <div class="card card-danger col-md ml-3">
                <div class="card-header">
                <h3 class="card-title">Laporan Hasil</h3>
                    <div class="card-tools">
                        {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
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
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            
          </div>
        
        </div>    
</div>
@forelse ($notif_lhp_belum as $not_lhp_blm)
    <div class="modal fade" id="catatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Uraian Hasil Pengawasan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <form action="/lhp/{{$not_lhp_blm->id}}/update_belum_dashboard" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="uraian_hasil">Uraian Hasil Pengawasan</label>
                  <textarea id="uraian_hasil" style="height: 1000px;" name="uraian_hasil" class="form-control summernote"
                    cols="70" rows="50">{{(old('uraian_hasil') ?? $not_lhp_blm->uraian_hasil)}}</textarea>
                    @error('uraian_hasil')
                      <div class="text-danger">Tidak boleh kosong</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
          </div>
      </div>
  </div>
@empty    
@endforelse

@endsection

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
@include('sess.scrpt_flash')