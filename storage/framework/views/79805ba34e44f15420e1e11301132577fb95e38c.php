<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SilahApps | <?php echo $__env->yieldContent('title'); ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    
    <!-- JQVMap -->
    
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/summernote/summernote-bs4.min.css')); ?>">
     <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
	
	<?php echo $__env->yieldPushContent('link'); ?>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(url('/dashboard')); ?>" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(url('/user/'.Auth::user()->id.'/detail')); ?>" class="nav-link">Profil</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                

                <!-- Messages Dropdown Menu -->
                
                <!-- Notifications Dropdown Menu -->
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.navbar -->

        <?php if(Auth::user()->level=='super'): ?>
            <?php echo $__env->make('master.sidebar_super', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('master.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        <?php echo $__env->yieldContent('content'); ?>

    </section>
    <!-- /.content -->
</div>

        <footer class="main-footer">
            
            
          
            <span>Copyright <i class="far fa-copyright"></i> 2022 <i class="fas fa-code text-info"></i> with <i class="fas fa-heart text-danger"></i> & <i class="fas fa-coffee text-warning"></i> By <strong>Sukardi Ramadhan Dali</strong></span>
          
        
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('/assets/plugins/jquery/jquery.min.js')); ?>"></script>

    <script src="<?php echo e(asset('/assets/plugins/sweetalert2/sweetalert2.all.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('/assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ChartJS -->
    
    <!-- Sparkline -->
    <script src="<?php echo e(asset('/assets/plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- JQVMap -->
    
    
    <!-- jQuery Knob Chart -->
    
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('/assets/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/plugins/select2/js/select2.full.min.js')); ?>"></script>
    
    
    <script type="text/javascript">
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('/assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script>
        $(function () {
            $('.summernote').summernote({
                height: 200
            })
        })
    </script>

    <script>
        $(function () {
        bsCustomFileInput.init();
        });
</script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('/assets/dist/js/adminlte.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('/assets/dist/js/pages/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH E:\skripsi\app\pengawasan\resources\views/master/app.blade.php ENDPATH**/ ?>