<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    
    
    
    <style>
        .page_break { 
            page-break-before: always;
            margin-bottom: 50px;
        }

        *{
            font-family: "Bookman Old Style", serif;
            
        }

        table{
            font-size: 16px;
            /* font-size: 4.2333mm; */
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
                <td style="font-size: 13px"><i> Jln. <?php echo e($informasi_awal->user->kabupaten->almt_jalan.' '.$informasi_awal->user->kabupaten->almt_kel_des); ?> <br>Kecamatan <?php echo e($informasi_awal->user->kabupaten->almt_kecamatan.' '. ucfirst($informasi_awal->user->kabupaten->status).' '.$informasi_awal->user->kabupaten->nama); ?> <br>Email : bawaslubonebolango@gmail.com</i></td>
            </tr>
        </table>
    </div>
    <hr style="border: 2px solid black;">
    <div class="row" style="padding: 10px 20px 0px 20px; font-size: 18px">
        
        <div class="row">
            <table width="100%">
                <tr>
                    <td style="" align="right">Formulir Model A.6</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="" align="center"><u>INFORMASI AWAL</u></td>
                </tr>
            </table>
        </div>

        <div class="row" style="margin-top: 20px ">
            
            
            <table width="60%" style="margin-left: 30%">
                <tr>
                    <td style="" align="left" width="40%">Nasional</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> Indonesia</td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Provinsi</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> Gorontalo</td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Kabupaten/Kota</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> <?php echo e($informasi_awal->user->kabupaten->nama); ?></td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Kecamatan</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> <?php echo e($informasi_awal->user->kabupaten->almt_kecamatan); ?></td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Kelurahan/Desa</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> <?php echo e($informasi_awal->user->kabupaten->almt_kel_des); ?></td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 25px ">
            <table width="100%">
                <tr>
                    <th valign="top" width="3%">1.</th>
                    <th width="1%"></th>
                    <td>Telah ditemukan Informasi Awal yang berasal dari : <span style="font-weight: bold"><?php echo e($informasi_awal->informasi->nama); ?></span>  </td>

                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 15px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%">2.</th>
                    <th width="1%"></th>
                    <td>Informasi adanya dugaan pelanggaran Pemilihan berupa:  </td>

                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">a. </td>
                    <td valign="top" width="30%">Peristiwa</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto"><?php echo e($informasi_awal->peristiwa); ?></td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">b. </td>
                    <td valign="top" width="30%">Tempat Kejdian</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto"><?php echo e($informasi_awal->tempat_kejadian); ?></td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">c. </td>
                    <td valign="top" width="30%">Tanggal Kejadian</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto"><?php echo e(date('d-F-Y', strtotime($informasi_awal->waktu_tgl_kejadian))); ?></td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">d. </td>
                    <td valign="top" width="30%">Waktu Kejadian</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto"><?php echo e(date('H:i', strtotime($informasi_awal->waktu_tgl_kejadian))); ?> Wita</td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">e. </td>
                    <td valign="top" width="30%">Terlapor</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto"><?php echo e($informasi_awal->terlapor); ?></td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">f. </td>
                    <td valign="top" width="30%">Alamat Terlapor</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto"><?php echo e($informasi_awal->alamat_terlapor); ?></td>

                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 15px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%">3.</th>
                    <th width="1%"></th>
                    <td>Bukti-Bukti Awal :  </td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    
                    <?php
                        $no = 0;
                    ?>
                    <?php if($informasi_awal->informasi->img_bukti != null): ?>
                        <td width="2%" valign="top"><?php echo e(++$no); ?>.</td>
                        <td width="88%">Bukti Foto dugaan pelanggaran yang di laporkan ke dalam aplikasi silahap.</td>
                    <?php endif; ?>
                </tr>
                <?php $__empty_1 = true; $__currentLoopData = $informasi_awal->informasi_awal_bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th valign="top"  width="3%"></th>
                        <th width="1%"></th>
                        <td width="2%" valign="top"><?php echo e(++$no); ?>.</td>
                        <td width="88%" valign="top"> <?php echo e($item->nama); ?>.</td>
                    </tr>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
                <?php endif; ?>
                
            </table>
        </div>
        <div class="row" style="margin-top: 15px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%">4.</th>
                    <th width="1%"></th>
                    <td>Uraian Singkat Dugaan Pelanggaran :  </td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="96%" valign="top" align="justify"> <?php echo $informasi_awal->uraian_kejadian; ?> </td>
                </tr>
            </table>
        </div>

        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="width: auto"></td>
                    <td align="center" style="width: 40%;">Penerima Informasi Awal</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"></td>
                </tr>
                <tr>
                    <td style="width: auto"></td>
                    <td align="center" style="width: 40%;"><u style="font-weight: bold"><?php echo e($informasi_awal->user->name); ?></u></td>
                </tr>
                
            </table>
        </div>
            
    </div>
</div>


<?php $__empty_1 = true; $__currentLoopData = $informasi_awal->informasi_awal_bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buktis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        $tampil = 'ada';
        break;
    ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php
        $tampil = 'tidak';
    ?>
<?php endif; ?>
    
<?php if($tampil == 'ada'): ?>
    <?php if((Request::segment(4) == 'halaman') || (Request::segment(4) == 'preview')): ?>
        <div class="page_break"></div>
        <br>
        <div class="row" style="margin-top: 10px; margin-bottom: 10px">
            <table width="100%">
                <tr>
                    <td style="" align="center"><u>INFORMASI AWAL</u></td>
                </tr>
            </table>
        </div>
        <div class="row pl-5 pr-5" style="padding: 0px 10px 0px 10px; margin-bottom: 10px ">
            <div class="row" style="padding: 10px 20px 0px 20px; font-size: 18px">
                <div class="mailbox-read-message pl-4 pr-4">
                    <div class="form-group mb-4">
                        <?php
                            $no = 0;
                        ?>
                        <?php if($informasi_awal->informasi->img_bukti != null): ?>
                            <span style="margin-bottom: 10px" class="text-bold"><?php echo e(++$no); ?>. Bukti foto dugaan pelanggaran yang di upload langsung kedalam Sistem informasi laporan hasil pengawasan (SILAHAPS).</span>
                            <br>
                            <img style="margin-bottom: 10px; margin-top: 10px" class="mt-2 ml-3" src="<?php echo e(asset('storage/'.$informasi_awal->informasi->img_bukti)); ?>" width="70%" alt="">
                        <?php endif; ?>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $informasi_awal->informasi_awal_bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bukti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div style="margin-top: 20px">
                            <span style="margin-bottom: 10px"><?php echo e(++$no); ?>. <?php echo e($bukti->nama); ?>. </span>
                            <br>
                            <img  style="margin-bottom: 10px; margin-top: 10px" src="data:image/jpeg;data:image/jpg;data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('storage/'.$bukti->foto)))); ?>" width="70%" alt="">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>    
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php if(Request::segment(4) == 'halaman'): ?>
    <script>
        window.print();
    </script>
<?php endif; ?>

    
    

    
    

</body>

</html>

<?php /**PATH E:\skripsi\app\pengawasan\resources\views/informasi_awal_print.blade.php ENDPATH**/ ?>