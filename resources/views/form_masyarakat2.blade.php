<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SilahApps | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" ="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="{{ asset('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="{{ asset('/assets/plugins/jqvmap/jqvmap.min.css') }}"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/summernote/summernote-bs4.min.css') }}">
     <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <main class="py-4">
            <div class="card">
                <div class="card-body row">
                    {{-- <div class="col-5 text-center d-flex align-items-center justify-content-center">
                        <div class="">
                            <h2><strong>Bawaslu</strong> Kabupaten Bone Bolango</h2>
                            <p class="lead mb-5">Mari bersama awasi pemilu<br>
                                Phone: +09000990909
                            </p>
                        </div>
                    </div> --}}
                    <div class="col-7">
                        @include('sess.flash')
                        @include('sess.scrpt_flash')
                        <form action="http://127.0.0.1:8000/api/informasi/create" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama <strong class="text-danger">*</strong> </label>
                                <input type="text"
                                    value="{{ (old('nama') ?? '') }}"
                                    name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{(old('email') ?? '')}}" name="email" id="email" class="form-control">
                                <p style="font-size: 15px;" class="text-info">Email : Untuk mendapatkan pemberitahuan langsung melalui email anda</p>
                            </div>
                            <div class="form-group">
                                <label for="ktp">NIK</label>
                                <input type="text" value="{{(old('ktp') ?? '')}}" name="ktp" id="ktp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="telp">Nomor Telfon  <strong class="text-danger">*</strong></label>
                                <input type="text" value="{{(old('telp') ?? '')}}" name="telp" id="telp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat  <strong class="text-danger">*</strong></label>
                                <input type="text" value="{{(old('alamat') ?? '')}}" name="alamat" id="alamat" class="form-control">
                            </div>
                            {{-- <div class="form-group">
                                <label for="saksi1">Saksi 1</label>
                                <input type="text" value="{{(old('saksi1') ?? '')}}" name="saksi1" id="saksi1" placeholder="Masukan Nama Saksi" class="form-control mb-1">
                                <input type="text" value="{{(old('alamat1') ?? '')}}" name="alamat1" id="alamat1" placeholder="Masukan Alamat Saksi" class="form-control">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="saksi2">Saksi 2</label>
                                <input type="text" value="{{(old('saksi2') ?? '')}}" name="saksi2" id="saksi2" placeholder="Masukan Nama Saksi" class="form-control mb-1">
                                <input type="text" value="{{(old('alamat2') ?? '')}}" name="alamat2" id="alamat2" placeholder="Masukan Alamat Saksi" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Kejadian  <strong class="text-danger">*</strong></label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                                    style="height: 100px;">{{(old('deskripsi') ?? '')}}</textarea>
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
    <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('/assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
    </script>
    <!-- ChartJS -->
    {{-- <script src="/assets/plugins/chart.js/Chart.min.js"></script> --}}
    <!-- Sparkline -->
    <script src="{{ asset('/assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    {{-- <script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script> --}}
    {{-- <script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script> --}}
    <!-- daterangepicker -->
    <script src="{{ asset('/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- <script type="text/javascript" src="/assets/savy.min.js"></script> --}}
    {{-- <script>
        $(document).ready(function(){
            $('.auto-save').savy('load');
            $( ".hapus" ).click(function() {
                $('.auto-save').savy('destroy');
            });
        });
    </script> --}}
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
        src="{{ asset('/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
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
        src="{{ asset('/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="/assets/dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('/assets/dist/js/pages/dashboard.js') }}"></script>
    <script
        src="{{ asset('/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}">
    </script>


</body>

</html>