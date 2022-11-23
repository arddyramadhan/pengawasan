<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    
    
    
    <style>
        *{
            font-family: "Bookman Old Style", serif;
        }
    </style>
</head>

<body>
<div class="row pl-5 pr-5" style="padding: 0px 10px 0px 10px ">

    
    <div class="row">
        <img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/img/cop/bawaslu.png')))); ?>" width="220px" height="90px" alt="">
    </div>
    <div class="row">
        <table>
            <tr>
                <td style="font-size: 13px"><i> Jln. Danau Perintis No 04 Desa Boludawa <br>Kecamatan Suwawa Kabupaten Bone Bolango <br>Email : bawaslubonebolango@gmail.com</i></td>
            </tr>
        </table>
    </div>
    <hr style="border: 2px solid black;">
    <div class="row" style="padding: 10px 20px 0px 20px; font-size: 18px">
        
        <div class="row">
            <table width="100%">
                <tr>
                    <td style="" align="right">Formulir Model A.6.1</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="" align="center">BERITA ACARA KETERANGAN INFORMASI AWAL</td>
                </tr>
            </table>
        </div>
        <?php if(date('D', strtotime($berita_acara->created_at))=='Mon'): ?>
                <?php
                    $hari = 'Senin';
                ?>
            <?php elseif(date('D', strtotime($berita_acara->created_at))=='Tue'): ?>
                <?php
                    $hari = 'Selasa';
                ?>
            <?php elseif(date('D', strtotime($berita_acara->created_at))=='Wed'): ?>
                <?php
                    $hari = 'Rabu';
                ?>
            <?php elseif(date('D', strtotime($berita_acara->created_at))=='Thu'): ?>
                <?php
                    $hari = 'Kamis';
                ?>
            <?php elseif(date('D', strtotime($berita_acara->created_at))=='Fri'): ?>
                <?php
                    $hari = "Jum'at";
                ?>
            <?php elseif(date('D', strtotime($berita_acara->created_at))=='Sat'): ?>
                <?php
                    $hari = 'Sabtu';
                ?>
            <?php elseif(date('D', strtotime($berita_acara->created_at))=='Sun'): ?>
                <?php
                    $hari = 'Minggu';
                ?>
            <?php endif; ?>

            
            <?php if(date('m', strtotime($berita_acara->created_at))==1): ?>
                <?php
                    $bulan = 'Januari';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==2): ?>
                <?php
                    $bulan = 'Februari';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==3): ?>
                <?php
                    $bulan = 'Maret';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==4): ?>
                <?php
                    $bulan = 'April';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==5): ?>
                <?php
                    $bulan = 'Mei';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==6): ?>
                <?php
                    $bulan = 'Juni';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==7): ?>
                <?php
                    $bulan = 'Juli';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==8): ?>
                <?php
                    $bulan = 'Agustus';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==9): ?>
                <?php
                    $bulan = 'September';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==10): ?>
                <?php
                    $bulan = 'Oktober';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==11): ?>
                <?php
                    $bulan = 'November';
                ?>
            <?php elseif(date('m', strtotime($berita_acara->created_at))==12): ?>
                <?php
                    $bulan = 'Desember';
                ?>
            <?php endif; ?>

             <div class="row" style="margin-top: 20px; ">
                <table width="100%">
                    <tr>
                        <td style="text-align: justify" align="">--------- Pada hari ini <?php echo e($hari); ?> Tanggal <?php echo e(date('d', strtotime($berita_acara->created_at))); ?> bulan <?php echo e($bulan); ?> tahun <?php echo e(date('Y', strtotime($berita_acara->created_at))); ?> pukul <?php echo e(date('H:i', strtotime($berita_acara->created_at))); ?> Wita ,Saya--------------</td>
                    </tr>
                </table>
            </div>
            

            <div class="row" style="margin-top: 15px">
                <table width="100%">
                    <tr>
                        
                        <p class="row" style="border-bottom: 2px dotted balck; position: relative; text-align: center"><span style="font-weight: bold;border-bottom: 3px solid black; top: -22px ; position: absolute;left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%)">:<?php echo e(strtoupper($berita_acara->user->name)); ?>:</span></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row" style="text-align: justify">
                Jabatan sebagai 
                    <?php $__empty_1 = true; $__currentLoopData = $berita_acara->tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($tem->id_user == $berita_acara->id_user): ?>
                            <?php echo e(($tem->status == 'ketua' ? 'Ketua' : 'Anggota')); ?>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                Tim Penelusuran, pada Badan Pengawas Pemilihan Kabupaten Bone Bolango,    berdasarkan    Surat    Tugas  nomor : <?php if($berita_acara->user->jabatan->sebagai=='staf'): ?>
                    <?php echo e($berita_acara->tim->st_sekretaris); ?>

                <?php else: ?>
                    <?php echo e($berita_acara->tim->st_ketua); ?>

                <?php endif; ?> tanggal 09 Oktober 2020, bersama :-------------
            </div>
            <div class="row" style="text-align: justify; margin-top: 15px">
                Jabatan sebagai <?php echo e($berita_acara->user->jabatan->nm_jabatan); ?>, pada Badan Pengawas Pemilihan Kabupaten Bone Bolango tersebut di atas, telah meminta keterangan dalam rangka penelusuran informasi awal, dari seorang yang bernama: :-------------
            </div>
            <div class="row" style="margin-top: 15px">
                <table width="100%">
                    <tr>
                        
                        <p class="row" style="border-bottom: 2px dotted balck; position: relative; text-align: center"><span style="font-weight: bold;border-bottom: 3px solid black; top: -22px ; position: absolute;left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%)">:<?php echo e(strtoupper($berita_acara->nama)); ?>:</span></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row" style="text-align: justify; margin-top: 5px">
                <?php
                    $date1 = new DateTime(date('Y-m-d', strtotime($berita_acara->tgl_lahir)));
                    $date2 = new DateTime(date('Y-m-d'));
                    $interval = $date1->diff($date2);
                ?>
                Dilahirkan di <?php echo e($berita_acara->tmpt_lahir); ?> tanggal 5  Bulan Juli Tahun 1982 (umur <?php echo e($interval->y); ?> Tahun), pekerjaan <?php echo e($berita_acara->pekerjaan); ?> Agama: <?php echo e($berita_acara->agama); ?> Kewarganegaraan Indonesia, tempat tinggal di <?php echo e($berita_acara->tinggal); ?>

            </div>
            <div class="row" style="text-align: justify; margin-top: 15px">
                Ia <span>(<u style="font-weight: bold;"><?php echo e(strtoupper($berita_acara->nama)); ?></u>)</span> didengar keterangannya, untuk memperjelas adanya informasi awal terkait <?php echo e($berita_acara->terkait); ?>-----------------------------------------------------------------------------
            </div>
            <div class="row" style="text-align: justify; margin-top:15px">
                Atas pertanyaan Saya/Kami, yang bersangkutan menjawab serta menerangkan sebagai berikut:
            </div>
            <div class="row" style="text-align: left; margin-top:15px">
                PERTANYAAN:
            </div>
            <div class="row" style="text-align: justify; margin-top:15px">
                <table class="table-borderless ml-0 p-0" width="100%">
                    <tr>
                        <td colspan="2" align="left">Pertanyaan Pembuka</td>
                    </tr>
                    <?php
                        $no=0;
                    ?>
                    <?php $__empty_1 = true; $__currentLoopData = $berita_acara->detail_berita_acara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->status=='pembuka'): ?>
                        <tr>
                            <td valign="top" width="5%"><?php echo e(++$no); ?>.</td>
                            <td width="95%"><?php echo e($item->pertanyaan); ?>?------------</td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>..........<?php echo e($no); ?>. Jawaban). <?php echo e($item->jawaban); ?> ------------</td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                    <?php endif; ?>
                </table>

                <table class="table-borderless ml-0 p-0 mt-4" width="100%">
                    <tr>
                        <td colspan="2" style="padding-top: 10px" align="left">Pertanyaan Isi (Berkaitan dengan Kasus)*</td>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $berita_acara->detail_berita_acara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kasus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($kasus->status=='kasus'): ?>
                        <tr>
                            <td valign="top" width="5%"><?php echo e(++$no); ?>.</td>
                            <td width="95%"><?php echo e($kasus->pertanyaan); ?>?------------</td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>..........<?php echo e($no); ?>. Jawaban). <?php echo e($kasus->jawaban); ?> ------------</td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                    <?php endif; ?>
                </table>

                <table class="table-borderless ml-0 p-0 mt-4" width="100%">
                    <tr>
                        <td colspan="2" style="padding-top: 10px" align="left">Pertanyaan Penutup</td>
                    </tr>
                    <?php $__empty_1 = true; $__currentLoopData = $berita_acara->detail_berita_acara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penutup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($penutup->status=='penutup'): ?>
                        <tr>
                            <td valign="top" width="5%"><?php echo e(++$no); ?>.</td>
                            <td width="95%"><?php echo e($penutup->pertanyaan); ?>?------------</td>
                        </tr>
                        <tr>
                            <td>  </td>
                            <td>..........<?php echo e($no); ?>. Jawaban). <?php echo e($penutup->jawaban); ?> ------------</td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                    <?php endif; ?>
                </table>
            </div>
            <div class="row"  style="text-align:right; margin-top:20px">
                YANG MEMBERI KETERANGAN,
            </div>

            <div class="row"  style="text-align:right; margin-top:90px">
                (<span class="text-bold"><?php echo e(strtoupper($berita_acara->nama)); ?></span>)
            </div>
            <?php if(date('D', strtotime($berita_acara->selesai))=='Mon'): ?>
                        <?php
                            $hari2 = 'Senin';
                        ?>
                    <?php elseif(date('D', strtotime($berita_acara->selesai))=='Tue'): ?>
                        <?php
                            $hari2 = 'Selasa';
                        ?>
                    <?php elseif(date('D', strtotime($berita_acara->selesai))=='Wed'): ?>
                        <?php
                            $hari2 = 'Rabu';
                        ?>
                    <?php elseif(date('D', strtotime($berita_acara->selesai))=='Thu'): ?>
                        <?php
                            $hari2 = 'Kamis';
                        ?>
                    <?php elseif(date('D', strtotime($berita_acara->selesai))=='Fri'): ?>
                        <?php
                            $hari2 = "Jum'at";
                        ?>
                    <?php elseif(date('D', strtotime($berita_acara->selesai))=='Sat'): ?>
                        <?php
                            $hari2 = 'Sabtu';
                        ?>
                    <?php elseif(date('D', strtotime($berita_acara->selesai))=='Sun'): ?>
                        <?php
                            $hari2 = 'Minggu';
                        ?>
                    <?php endif; ?>

                    
                    <?php if(date('m', strtotime($berita_acara->selesai))==1): ?>
                        <?php
                            $bulan2 = 'Januari';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==2): ?>
                        <?php
                            $bulan2 = 'Februari';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==3): ?>
                        <?php
                            $bulan2 = 'Maret';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==4): ?>
                        <?php
                            $bulan2 = 'April';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==5): ?>
                        <?php
                            $bulan2 = 'Mei';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==6): ?>
                        <?php
                            $bulan2 = 'Juni';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==7): ?>
                        <?php
                            $bulan2 = 'Juli';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==8): ?>
                        <?php
                            $bulan2 = 'Agustus';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==9): ?>
                        <?php
                            $bulan2 = 'September';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==10): ?>
                        <?php
                            $bulan2 = 'Oktober';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==11): ?>
                        <?php
                            $bulan2 = 'November';
                        ?>
                    <?php elseif(date('m', strtotime($berita_acara->selesai))==12): ?>
                        <?php
                            $bulan2 = 'Desember';
                        ?>
                    <?php endif; ?>


                    <div class="row"  style="text-align:justify; margin-top:25px">
                        --------- Demikian berita acara ini dibuat dengan sebenar-benarnya, kemudian ditutup dan ditanda tangani di <?php echo e($berita_acara->lokasi_wawancara); ?> , pada Pukul <?php echo e(date('H:i', strtotime($berita_acara->selesai))); ?> wita,  hari <?php echo e($hari2); ?> tanggal <?php echo e(date('d', strtotime($berita_acara->selesai))); ?> <?php echo e($bulan2); ?> Tahun <?php echo e(date('Y', strtotime($berita_acara->selesai))); ?>......	
                    </div>
                    <div class="row"  style="text-align:right; margin-top:20px">
                        YANG MEMINTA KETERANGAN,
                    </div>

                    <div class="row"  style="text-align:right; margin-top:90px">
                        (<span class="text-bold"><?php echo e(strtoupper($berita_acara->user->name)); ?></span>)
                    </div>
                    
            
    </div>
</div>
    

    
    

    
    

</body>

</html>

<?php /**PATH E:\skripsi\app\pengawasan\resources\views/template_print.blade.php ENDPATH**/ ?>