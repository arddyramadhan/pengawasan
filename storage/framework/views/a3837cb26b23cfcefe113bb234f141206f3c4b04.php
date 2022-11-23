<?php $__env->startPush('scripts'); ?>
    <script src="/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $(function () {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            
            const varFlash = $('.flash-data').data('flash');
            if(varFlash){

                // terbaru
                // Toast.fire({
                //     icon: 'success',
                //     title: 'Laporan Anda '+ varFlash + ' di Kirimkan Dan Akan Segera Diproses'
                // })

                // lama
                if (varFlash=='Disimpan') {
                    Swal.fire({
                    title: 'Disimpan',
                    icon: 'success',
                    text : 'Data berhasil disimpan..!',
                    type: 'success'
                })
                }else if (varFlash=='Diubah') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Data Berhasil Di Perbaharui..!',
                    type: 'success'
                })
                }else if (varFlash=='Ada_pendapat') {
                    Swal.fire({
                    title: 'Oopss..!',
                    icon: 'error',
                    text : 'Pendapat Anda Sudah Terdaftar Dilaporan Ini..!',
                    type: 'error'
                })
                }else if (varFlash=='Dihapus') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Data Berhasil Di Hapus..!',
                    type: 'success'
                })
                }else if (varFlash=='Artisan') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Artisan Berhasil Di Perbaharui..!',
                    type: 'success'
                })
                }else if (varFlash=='Ditambah') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Data Berhasil Di Tambahkan..!',
                    type: 'success'
                })
                }else if(varFlash=='Kosong') {
                    Swal.fire({
                    title: 'Oopss..!',
                    icon: 'error',
                    text : 'Terdapat kolom yang tidak di isi..!',
                    type: 'error'
                })
                }else if(varFlash=='Img') {
                    Swal.fire({
                    title: 'Oopss..!',
                    icon: 'error',
                    text : 'Bukti hanya berupa Foto berukuran Maksimal 2MB..!',
                    type: 'error'
                })
                }else if(varFlash=='Laporan_proses') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Laporan Anda Akan Segera DiProses..!',
                    type: 'success'
                })
                }else if(varFlash=='Tim_penelusuran_dibuat') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Tim Untuk Penelusuran Informasi Awal Berhasil Dibuat..!',
                    type: 'success'
                })
                }else if(varFlash=='Tim_pengawasan_dibuat') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Tim/Pengawas Untuk Melakukan Pengawasan Langsung Berhasil Dibuat..!',
                    type: 'success'
                })
                }else if(varFlash=='Teruskan') {
                    Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text : 'Laporan Dari Masyarakat Akan Ditangani Oleh Pengawas Yang Dipilih..!',
                    type: 'success'
                })
                }else if(varFlash=='Ijinkan') {
                    Swal.fire({
                    title: 'Ijin Diberikan',
                    icon: 'success',
                    text : 'Laporan akan diteruskan ke Admin Untuk di tindak lanjuti..!',
                    type: 'success'
                })
                }else if(varFlash=='Tolak') {
                    Swal.fire({
                    title: 'Laporan Ditolak',
                    icon: 'success',
                    text : 'Laporan tidak akan di Proses ketahap selanjutnya..!',
                    type: 'success'
                })
                }else if(varFlash=='dua_input') {
                    Swal.fire({
                    title: 'Oops..!!',
                    icon: 'error',
                    text : 'Anda Terdeteksi Melakukan Inputan yang sama..!!',
                    type: 'error'
                })
                }else if(varFlash=='lewat_batas') {
                    Swal.fire({
                    title: 'Expired..!!',
                    icon: 'error',
                    text : 'Penyusunan Laporan Hasil Pengawasan Hanya Berlaku Selama 7 Hari..!!',
                    type: 'error'
                })
                } else {
                    
                }
                
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/sess/scrpt_flash.blade.php ENDPATH**/ ?>