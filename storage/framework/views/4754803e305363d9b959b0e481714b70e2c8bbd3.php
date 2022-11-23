
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('judul', 'Dashboard'); ?>
<?php $__env->startSection('menu', 'Menu'); ?>
<?php $__env->startSection('sub', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
	<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if(Auth::user()->level != 'super'): ?>
      <div class="row pl-2 pr-2 mb-2">
    
        <?php $__empty_1 = true; $__currentLoopData = $notif_lhp_belum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not_lhp_blm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="94%">Terdapat <span class="text-bold">Laporan Hasil Pengawasan</span> yang <span class="text-warning text-bold">Belum</span> di Selesaikan..!</td>
                  <td width="3%" >
                    <button class='btn-link text-success btn btn-sm' data-toggle='modal' data-target='#catatan'><i class="fas fa-file-signature"></i></button>
                    
                  </td>
                  <td width="3%" >
                    <a href="/lhp/<?php echo e($not_lhp_blm->id); ?>/lanjutlhp_belum" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?>
        
        <?php $__empty_1 = true; $__currentLoopData = $notif_lhp_lanjut_uraian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not_lhp_lanjut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="95%">Terdapat <span class="text-bold">Laporan Hasil Pengawasan</span> yang harus <span class="text-danger text-bold">Dilengkapi</span> karena terdapat <span class="text-danger text-bold">Dugaan Pelanggaran..</span></td>
                  <td width="5%" >
                    <a href="/lhp/<?php echo e($not_lhp_lanjut->id); ?>/lanjutlhp" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a></td>
                </tr>
              </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?>

        
        <?php $__empty_1 = true; $__currentLoopData = $alihkan_ia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alih_ia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  
                  <td width="95%">Terdapat <span class="text-bold">Laporan Masyarakat</span> yang <span class="text-danger text-bold">Dialhikan</span>..!</td>
                  <td width="5%" >
                    <a href="/informasi/<?php echo e($alih_ia->id); ?>/show" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a></td>
                </tr>
              </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?>
        
        <?php $__empty_1 = true; $__currentLoopData = $informasi_baru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i_baru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="95%">Terdapat <span class="text-bold">Laporan Masyarakat</span> yang <span class="text-danger text-bold">Baru Masuk</span>..!</td>
                  <td width="5%" >
                  <form action="/informasi/<?php echo e($i_baru->id); ?>/1" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    
                    <button class="btn-link text-primary btn btn-sm" type="submit">
                      <i class="fas fa-eye"></i></button>
                  </form>
                </td>
                </tr>
              </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?>

        <?php $__empty_1 = true; $__currentLoopData = $ia_lengkapi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
              <table width="100%" style="" class="col-md-12 table-borderless">
                <tr>
                  <td width="95%">Terdapat <span class="text-bold">Laporan Masyarakat</span> yang harus <span class="">Ditindak Lanjuti</span> kedalam <span class="text-danger text-bold">A6 Informasi Awal</span></td>
                  <td width="5%" >
                  <form action="/informasi/<?php echo e($ia->id); ?>/1" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    
                    <button class="btn-link text-primary btn btn-sm" type="submit">
                      <i class="fas fa-eye"></i></button>
                  </form>
                </td>
                </tr>
              </table>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
        <?php endif; ?>




        
        <?php if(Auth::user()->id_jabatan <= 2): ?>
          <?php $__empty_1 = true; $__currentLoopData = $notif_lhp_pleno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not_lhp_pleno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="alert alert-light p-1 pl-2 mb-1 col-md-12 justify-content-between">
                <table width="100%" style="" class="col-md-12 table-borderless">
                  <tr>
                    <td width="95%">Terdapat <span class="text-bold">Laporan Hasil Pengawasan</span> yang perlu dilakukan <span class="text-primary text-bold">Pleno</span>..!</td>
                    <td width="5%" >
                      <a href="/lhp/<?php echo e($not_lhp_pleno->id); ?>/detail" class="btn-link text-primary btn btn-sm"><i class="fas fa-eye"></i></a></td>
                  </tr>
                </table>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              
          <?php endif; ?>
        <?php endif; ?>
      </div>
  <?php endif; ?>

    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo e($tot_lm); ?></h3>
                <p>Laporan Masyarakat</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>

              <a href="<?php echo e(Auth::user()->id_tingkatan == 1 ? url('/informasi') : url('/informasi_awal')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo e($tot_ia); ?></h3>

                <p>Informasi Awal</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard-check"></i>
              </div>
              <a href="<?php echo e(url('/informasi_awal')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo e($tot_lhp); ?></h3>

                <p>Laporan Hasil Pengawasan</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-signature"></i>
              </div>
              <a href="<?php echo e(url('/lhp/ada/view/pengawasan')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo e($tot_tim); ?></h3>

                <p>Tim Pengawasan/Penelusuran</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php echo e(url('/tim/pengawasan/status')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
            <div class="card card-info col-md-8">
                <div class="card-header">
                <h3 class="card-title">Dugaan Pelanggaran</h3>

                <div class="card-tools">
                    
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
<?php $__empty_1 = true; $__currentLoopData = $notif_lhp_belum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $not_lhp_blm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                <form action="/lhp/<?php echo e($not_lhp_blm->id); ?>/update_belum_dashboard" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="form-group">
                  <label for="uraian_hasil">Uraian Hasil Pengawasan</label>
                  <textarea id="uraian_hasil" style="height: 1000px;" name="uraian_hasil" class="form-control summernote"
                    cols="70" rows="50"><?php echo e((old('uraian_hasil') ?? $not_lhp_blm->uraian_hasil)); ?></textarea>
                    <?php $__errorArgs = ['uraian_hasil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                      <div class="text-danger">Tidak boleh kosong</div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>    
<?php endif; ?>

<?php $__env->stopSection(); ?>

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
<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/dashboard.blade.php ENDPATH**/ ?>