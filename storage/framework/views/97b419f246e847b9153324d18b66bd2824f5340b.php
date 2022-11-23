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


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <main class="py-4">
            <div class="card">
                <div class="card-body row">
                    
                    <div class="col-7">
                        <?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <form action="http://127.0.0.1:8000/api/informasi/create" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama">Nama <strong class="text-danger">*</strong> </label>
                                <input type="text"
                                    value="<?php echo e((old('nama') ?? '')); ?>"
                                    name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="<?php echo e((old('email') ?? '')); ?>" name="email" id="email" class="form-control">
                                <p style="font-size: 15px;" class="text-info">Email : Untuk mendapatkan pemberitahuan langsung melalui email anda</p>
                            </div>
                            <div class="form-group">
                                <label for="ktp">NIK</label>
                                <input type="text" value="<?php echo e((old('ktp') ?? '')); ?>" name="ktp" id="ktp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telfon  <strong class="text-danger">*</strong></label>
                                <input type="text" value="<?php echo e((old('telp') ?? '')); ?>" name="telp" id="telp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat  <strong class="text-danger">*</strong></label>
                                <input type="text" value="<?php echo e((old('alamat') ?? '')); ?>" name="alamat" id="alamat" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Kejadian  <strong class="text-danger">*</strong></label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                                    style="height: 100px;"><?php echo e((old('deskripsi') ?? '')); ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="img_bukti" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose One..</label>
                                </div>
                            </div>
                            
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Kirim Laporan">

                    </div>
                    </form>
                </div>
            </div>
    </div>
    
    </main>

    </section>
    <!-- /.content -->
    </div>




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
    <script src="<?php echo e(asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>">
    </script>
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
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="<?php echo e(asset('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>">
    </script>
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
    <script
        src="<?php echo e(asset('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('/assets/dist/js/adminlte.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('/assets/dist/js/pages/dashboard.js')); ?>"></script>
    <script
        src="<?php echo e(asset('/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>">
    </script>


</body>

</html><?php /**PATH E:\skripsi\app\pengawasan\resources\views/form_masyarakat2.blade.php ENDPATH**/ ?>