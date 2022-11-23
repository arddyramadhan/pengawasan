
<?php $__env->startSection('title', 'Kecamatan'); ?>
<?php $__env->startSection('judul', 'Detail Kecamatan'); ?>
<?php $__env->startSection('menu', 'Kecamatan'); ?>
<?php $__env->startSection('sub', 'Detail'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img style="height: 200px; width: 200px" class="profile-user-img img-fluid img-circle"
                        src="<?php echo e(asset('/assets/dist/img/bawaslu.png')); ?>" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Kecamatan <?php echo e($kecamatan->nama); ?></h3>

                

                

                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo e($tot_pengawas); ?></h3>
                <p>Pengguna</p>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>

            <a href="<?php echo e(url('/user/kecamatan/'.$kecamatan->id.'/table')); ?>"
                class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo e($tot_ia); ?></h3>

                <p>Informasi Awal</p>
            </div>
            <div class="icon">
                <i class="fa fa-clipboard-check"></i>
            </div>
            <a href="<?php echo e(url('/informasi_awal')); ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?php echo e($tot_lhp); ?></h3>

                <p>Laporan Hasil Pengawasan</p>
            </div>
            <div class="icon">
                <i class="fa fa-file-signature"></i>
            </div>
            <a href="<?php echo e(url('/lhp/ada/view/pengawasan')); ?>" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?php echo e($tot_tim); ?></h3>

                <p>Tim Pengawasan/Penelusuran</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo e(url('/tim/pengawasan/status')); ?>" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
        
<!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="<?php echo e(Request::segment(4) == null ? 'active' : ''); ?> nav-link"
                        href="/kecamatan/<?php echo e($kecamatan->id); ?>/detail">Dashboard</a></li>
                <li class="nav-item"><a class="<?php echo e(Request::segment(4) == 'informasi' ? 'active' : ''); ?> nav-link"
                        href="/kecamatan/<?php echo e($kecamatan->id); ?>/detail/informasi">Informasi Awal</a></li>
                <li class="nav-item"><a class="<?php echo e(Request::segment(4) == 'lhp' ? 'active' : ''); ?> nav-link"
                        href="/kecamatan/<?php echo e($kecamatan->id); ?>/detail/lhp">Laporan Hasil Pengawasan</a></li>
                <li class="nav-item"><a class="<?php echo e(Request::segment(4) == 'tim' ? 'active' : ''); ?> nav-link"
                        href="/kecamatan/<?php echo e($kecamatan->id); ?>/detail/tim">Tim</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <?php if(Request::segment(4) == null): ?>
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
                <?php elseif(Request::segment(4) == 'informasi'): ?>
                <div class="active tab-pane">
                    <div class="timeline">
                        <?php
                            $nos = date('ymd');
                        ?>
                            <?php $__currentLoopData = $informasi_awal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if (Request::segment(2)) {
                                        $tgl = date('ymd', strtotime($item->updated_at));
                                    } else {
                                        $tgl = date('ymd', strtotime($item->created_at));
                                    }
                                    

                                ?>
                                <?php if($nos!=$tgl): ?>
                                    <div class="time-label">
                                        <?php if(Request::segment(2)): ?>
                                            <span class="bg-red"><?php echo e($item->updated_at->format('d F Y')); ?></span>
                                        <?php else: ?>
                                            <span class="bg-red"><?php echo e($item->created_at->format('d F Y')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                        $nos = $tgl;
                                    ?>
                                <?php elseif(date('ymd')==$tgl && $no==0): ?>
                                    <div class="time-label">
                                        <span class="bg-red">Laporan Hari Ini</span>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            <?php if($item->status=='lengkapi'): ?>
                                                Perlu Dilengkapi 
                                            <?php elseif($item->status=='diproses'): ?>
                                                Diproses pada : <?php echo e($item->updated_at->diffForHumans()); ?>

                                            <?php elseif($item->status=='buat_tim'): ?>
                                                Diplenokan : <?php echo e($item->updated_at->diffForHumans()); ?>

                                            <?php elseif($item->status=='tim_dibuat'): ?>
                                                Pembantukan Tim : <?php echo e($item->updated_at->diffForHumans()); ?>

                                            <?php else: ?>
                                                Laporan Tidak Diterima
                                            <?php endif; ?>
                                        </span>
                                        <h3 class="timeline-header"><a href=""> <?php echo e($item->informasi->nama); ?></a> <strong>|</strong> Kode : <span class="text-danger text-bold">IA<?php echo e(sprintf("%04d", $item->id)); ?></span>
                                            <?php if($item->status == 'lengkapi'): ?>
                                                <?php if(Auth::user()->id == $item->id_user): ?>
                                                    <strong>|</strong> Perlu Ditangani
                                                <?php else: ?>
                                                    <strong>|</strong> Perlu Ditangani 
                                                <?php endif; ?>
                                            <?php elseif($item->informasi->status == 'ditangani'): ?>
                                                <?php if(Auth::user()->id == $item->id_user): ?>
                                                    <strong>|</strong> Ditangani
                                                <?php else: ?>
                                                    <strong>|</strong> Ditangani 
                                                <?php endif; ?>
                                            <?php elseif($item->informasi->status == 'diproses'): ?>
                                                <?php if(Auth::user()->id == $item->id_user): ?>
                                                    <strong>|</strong> Diproses
                                                <?php else: ?>
                                                    <strong>|</strong> Diproses 
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Auth::user()->id == $item->id_user): ?>
                                                
                                                <?php else: ?>
                                                    <strong>|</strong> <?php echo e($item->user->name); ?> 
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </h3>
                                        <div class="timeline-body">
                                        <?php if($item->status=='lengkapi'): ?>
                                            <?php echo e($item->informasi->deskripsi); ?>

                                        <?php else: ?>
                                            <?php echo e($item->uraian_kejadian); ?>

                                        <?php endif; ?>
                                            
                                        </div>
                                        <div class="timeline-footer">
                                            <?php if($item->status=='lengkapi'): ?>
                                                <form action="/informasi/<?php echo e($item->id_informasi); ?>/1" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button class="btn btn-primary btn-sm text-white" type="submit">
                                                        <strong>Lihat</strong></button>
                                                </form>
                                            <?php else: ?>
                                                <a href="/informasi_awal/<?php echo e($item->id); ?>/detail" class="btn btn-primary btn-sm text-white">Lihat</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                            <div class="float-right pr-3">
                                <?php echo e($informasi_awal->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif(Request::segment(4) == 'lhp'): ?>
                <div class="timeline" id="informasi" style="z-index: 1;">
                    <?php
                    $nos = date('ymd');
                    ?>
                    <?php $__empty_1 = true; $__currentLoopData = $lhp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                        $tgl = date('ymd', strtotime($item->created_at));
                        ?>
                        <?php if($nos!=$tgl): ?>
                            <div class="time-label">
                                <span class="bg-red"><?php echo e($item->created_at->format('d F Y')); ?></span>
                            </div>
                            <?php
                            $nos = $tgl;
                            ?>
                        <?php elseif(date('ymd')==$tgl && $no==0): ?>
                            <div class="time-label">
                                <span class="bg-red">Laporan Hari Ini</span>
                            </div>
                        <?php endif; ?>

                        <div>
                            <i class="fas fa-file bg-blue"></i>
                            <div style="font-size: 22px ;font-family: &quot;Times New Roman&quot;"
                                class="pl-5 pr-5 card timeline-item 
                                <?php if($item->dugaan == 'ada'): ?>
                                    card-danger
                                <?php elseif($item->dugaan == 'tidak'): ?>
                                    card-success
                                <?php elseif($item->dugaan == 'belum'): ?>
                                    card-warning
                                <?php elseif($item->dugaan == 'pleno'): ?>
                                    card-primary
                                <?php endif; ?> 
                                card-outline collapsed-card">
                                <div class="card-header card-borderless">
                                    <h3 class="card-title"><span class="text-bold">Laporan Hasil <?php echo e($item->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan'); ?></span> 
                                    <?php if($item->dugaan == 'pleno' || $item->dugaan == 'belum'): ?>
                                        <span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm <?php echo e($item->dugaan=='pleno' ? 'badge-primary' : 'badge-warning'); ?> "><?php echo e($item->dugaan=='pleno' ? 'Pleno' : 'Penyusunan'); ?></span>
                                    <?php else: ?>
                                        | Dugaan
                                        Pelanggaran : <span
                                        class="right badge badge-sm <?php echo e($item->dugaan=='ada' ? 'badge-danger' : 'badge-success'); ?> text-bold"><?php echo e($item->dugaan=='ada' ? 'Ada' : 'Tidak Ada'); ?></span>
                                    <?php endif; ?>
                                    </h3>
                                    <div class="card-tools">
                                        
                                        <a href="/lhp/<?php echo e($item->id); ?>/detail" class="btn btn-tool text-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-tool text-secondary" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body card-borderless" style="">
                                    <?php if($item->dugaan=='tidak'): ?>
                                        <div>
                                            <p class="text-bold">III. Uraian Hasil Pengawasan : </p>
                                            <div class="row">
                                                <div class="col-md-12 pr-4">

                                                    <?php echo $item->uraian_hasil; ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div>
                                            <p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
                                            <div class="row">
                                                <div class="col-md-12 pr-4">

                                                    <?php echo $item->uraian_dugaan; ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    
                                    

                                </div>
                            </div>
                        </div>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                    <?php endif; ?>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                        <div class="float-right pr-3">
                            <?php echo e($lhp->links()); ?>

                        </div>
                    </div>
                </div>

                <?php elseif(Request::segment(4) == 'tim'): ?>
                <table class="table col-md-12" id="myTable">
                    <thead class="">
                        <tr>
                            <th style="width: 5%">#</th>
                            <th  width="30%" >Tema</th>
                            
                            <th  width="50%">Anggota Tim</th>
                            <th  width="10%">Status</th>
                            <th  width="5%" style="text-align: center">Detail</th>
                        </tr>
                    </thead>
                    <tbody id="coba">
                        <?php $__empty_1 = true; $__currentLoopData = $user->tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                    <td><?php echo e(++$no); ?></td>
                                    <td>
                                        <?php echo e($item->nama); ?>

                                    </td>
                                    <td>
                                        
                                        <ul class="list-inline">
                                            <?php $__empty_2 = true; $__currentLoopData = $item->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar img-circle" title="<?php echo e($usr->user->name); ?>" width="50px" height="50px"  src="<?php echo e(asset('storage/'.$usr->user->foto)); ?>">
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                
                                            <?php endif; ?>
                                        </ul>
                                    </td>
                                    <td align="center">
                                        <?php if($item->status == 'penelusuran'): ?>
                                            <div class="badge badge-info">Penelusuran</div>
                                        <?php else: ?>
                                            <div class="badge badge-warning">Pengawasan</div>
                                        <?php endif; ?>
                                        <?php if(date('Y-m-d') > date('Y-m-d', strtotime($item->selesai))): ?>
                                            <div class="badge badge-success">Selesai</div>
                                        <?php else: ?>
                                            <div class="badge badge-warning">Dalam Proses</div>
                                        <?php endif; ?>
                                    </td>
                                    <td align="center">
                                        <?php if($item->status=='penelusuran'): ?>
                                            <a href="/tim/<?php echo e($item->id); ?>" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                        <?php elseif($item->status=='pengawasan'): ?>
                                            <a href="/tim/<?php echo e($item->id); ?>/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                        <?php endif; ?>
                                    </td>
                                </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" align="center">
                                    <div class="alert alert-danger alert-sm">Belum ada Data</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php endif; ?>


            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startPush('link'); ?>
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">


<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "ordering": false,
        });
    });

</script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/assets/plugins/chart.js/Chart.min.js')); ?>"></script>
    <script>
  $(function () {
   
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : [
          // 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober','November','Desember'
        <?php $__currentLoopData = $dugaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            '<?php echo e(date('F', strtotime($item->bulan))); ?>', 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
              <?php $__currentLoopData = $tidak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($item->jumlah); ?>,
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
              <?php $__currentLoopData = $ada; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($item->jumlah); ?>,
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          data: [<?php echo e($lhp_ada); ?>,<?php echo e($lhp_tidak); ?>,<?php echo e($lhp_belum); ?>,<?php echo e($lhp_pleno); ?>],
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/kecamatans_detail.blade.php ENDPATH**/ ?>