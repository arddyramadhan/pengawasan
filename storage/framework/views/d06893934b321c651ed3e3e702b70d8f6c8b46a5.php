<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    
    
    
    <style type="text/css" media="print">
       
        *{
            font-family: "Bookman Old Style", serif;
        }
        .coba *{
            /* font-size: 4.2333mm */
            /* padding: 10px 0px 10px 0px;  */
            font-size: 15px
        }

    </style>
   
</head>

<body>
<div class="row pl-4 pr-4" style="padding: 0px 10px 0px 10px ">

    
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
    <div class="row coba" style="">
        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="font-weight: bold" align="center">FORMULIR MODEL A</td>
                    
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top:0px ">
            <table width="100%">
                <tr>
                    <td style="font-weight: bold" align="center">LAPORAN HASIL PENGAWASAN PEMILU</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 30px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">I.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Data Pengawas Pemilihan : </th>
                </tr>
                
            </table>
            <table width="100%" style="">
                <?php
                    $no_pelaksana = 0 ;
                    $sts_ketua='tidak';
                    $alm_ketua = '';
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='ketua'): ?>
                        <?php
                            $sts_ketua = 'ada';
                            $alm_ketua = $user->user->alamat;
                        ?>
                        <tr>
                            <td width="4%" align="left"></td>
                            <td width="45%" colspan=""><?php echo e(($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')); ?></td>
                            <td width="1%"><?php echo e(($no_pelaksana==0 ? ':' : '')); ?></td>
                            <td width="1%"><?php echo e(++$no_pelaksana); ?>.</td>
                            <td width="48%"> <?php echo e($user->user->name); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='ketua'): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_pelaksana==0 ? ':' : '')); ?></td>
                                <td width="1%"><?php echo e(++$no_pelaksana); ?>.</td>
                                <td width="48%"> <?php echo e($user->user->name); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='anggota'): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_pelaksana==0 ? ':' : '')); ?></td>
                                <td width="1%"><?php echo e(++$no_pelaksana); ?>.</td>
                                <td width="48%"> <?php echo e($user->user->name); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>


                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if(strpos($user->user->jabatan->nm_jabatan, 'Koordinator')): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_pelaksana==0 ? ':' : '')); ?></td>
                                <td width="1%"><?php echo e(++$no_pelaksana); ?>.</td>
                                <td width="48%"> <?php echo e($user->user->name); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='staf'): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_pelaksana==0 ? ':' : '')); ?></td>
                                <td width="1%"><?php echo e(++$no_pelaksana); ?>.</td>
                                <td width="48%"> <?php echo e($user->user->name); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
            </table>
            <table width="100%" style="">
                
                <?php
                    $no_jabatan = 0 ;
                ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='ketua'): ?>
                        <tr>
                            <td width="4%" align="left"></td>
                            <td width="45%" colspan=""><?php echo e(($no_jabatan==0 ? 'b. Jabatan' : '')); ?></td>
                            <td width="1%"><?php echo e(($no_jabatan==0 ? ':' : '')); ?></td>
                            <td width="1%"><?php echo e(++$no_jabatan); ?>.</td>
                            <td width="48%"> 
                                
                                <?php if($user->user->id_tingkatan >= 2): ?>
                                    <?php echo e($user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->sebagai.' Kecamatan '.$user->user->kecamatan->nama); ?>

                                <?php else: ?>
                                    <?php echo e($user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->sebagai.' '.$user->user->kabupaten->status.' '.$user->user->kabupaten->nama); ?>

                                <?php endif; ?>
                                
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='ketua'): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_jabatan==0 ? 'b. Jabatan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_jabatan==0 ? ':' : '')); ?></td>
                                <td valign="top" width="1%"><?php echo e(++$no_jabatan); ?>.</td>
                                <td width="48%"> 
                                <?php if($user->user->id_tingkatan >= 2): ?>
                                    <?php echo e($user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' Kecamatan '.$user->user->kecamatan->nama); ?>

                                <?php else: ?>
                                    <?php echo e($user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' '.($user->user->kabupaten->status == 'kabupaten' ? 'Kabupaten' : 'Kota').' '.$user->user->kabupaten->nama); ?>

                                <?php endif; ?>    
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='anggota'): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_jabatan==0 ? 'b. Jabatan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_jabatan==0 ? ':' : '')); ?></td>
                                <td valign="top" width="1%"><?php echo e(++$no_jabatan); ?>.</td>
                                <td width="48%"> 
                                    <?php if($user->user->id_tingkatan >= 2): ?>
                                        <?php echo e($user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' Kecamatan '.$user->user->kecamatan->nama); ?>

                                    <?php else: ?>
                                        <?php echo e($user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' '.($user->user->kabupaten->status == 'kabupaten' ? 'Kabupaten' : 'Kota').' '.$user->user->kabupaten->nama); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if(strpos($user->user->jabatan->nm_jabatan, 'Koordinator')): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_jabatan==0 ? 'b. Jabatan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_jabatan==0 ? ':' : '')); ?></td>
                                <td valign="top" width="1%"><?php echo e(++$no_jabatan); ?>.</td>
                                <td width="48%"> 
                                    <?php if($user->user->id_tingkatan >= 2): ?>
                                        <?php echo e($user->user->jabatan->nm_jabatan); ?>

                                        
                                    <?php else: ?>
                                        
                                        <?php echo e($user->user->jabatan->nm_jabatan); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='staf'): ?>
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan=""><?php echo e(($no_jabatan==0 ? 'b. Jabatan' : '')); ?></td>
                                <td width="1%"><?php echo e(($no_jabatan==0 ? ':' : '')); ?></td>
                                <td valign="top" width="1%"><?php echo e(++$no_jabatan); ?>.</td>
                                <td width="48%">
                                    <?php if($user->user->id_tingkatan >= 2): ?>
                                        <?php echo e($user->user->jabatan->nm_jabatan); ?>

                                        
                                    <?php else: ?>
                                        <?php echo e($user->user->jabatan->nm_jabatan); ?>

                                        
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
            </table>

            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">b. Alamat</td>
                    <td width="1%"  valign="top">:</td>
                    
                    <td width="48%" style="text-align: justify">
                        <?php if($sts_ketua == 'ada'): ?>
                            <?php echo e($alm_ketua); ?>

                        <?php else: ?>
                            <?php echo e($lhp->user->alamat); ?> 
                        <?php endif; ?>
                    </td>
                </tr>
            </table>


        </div>
        <div style="margin-top: 30px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">II.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Kegiatan Pengawasan : </th>
                </tr>
                
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">a. Tahapan yang di awasi</td>
                    <td width="1%"  valign="top">:</td>
                    
                    <td width="48%" style="text-align: justify">
                        <?php echo e($lhp->tahapan); ?>

                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">b. Bentuk Pengawasan</td>
                    <td width="1%"  valign="top">:</td>
                    
                    <td width="48%" style="text-align: justify">
                        <?php if($lhp->bentuk=='tidak'): ?>
                            Tidak Langsung
                        <?php else: ?>
                            Langsung
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">c. Pihak yang di awasi</td>
                    <td width="1%"  valign="top">:</td>
                    
                    <td width="48%" style="text-align: justify">
                        <?php echo e($lhp->diawasi); ?>

                    </td>
                </tr>
            </table>

            <?php if(date('D', strtotime($lhp->mulai))=='Mon'): ?>
                <?php
                    $hari_mulai = 'Senin';
                ?>
            <?php elseif(date('D', strtotime($lhp->mulai))=='Tue'): ?>
                <?php
                    $hari_mulai = 'Selasa';
                ?>
            <?php elseif(date('D', strtotime($lhp->mulai))=='Wed'): ?>
                <?php
                    $hari_mulai = 'Rabu';
                ?>
            <?php elseif(date('D', strtotime($lhp->mulai))=='Thu'): ?>
                <?php
                    $hari_mulai = 'Kamis';
                ?>
            <?php elseif(date('D', strtotime($lhp->mulai))=='Fri'): ?>
                <?php
                    $hari_mulai = "Jum'at";
                ?>
            <?php elseif(date('D', strtotime($lhp->mulai))=='Sat'): ?>
                <?php
                    $hari_mulai = 'Sabtu';
                ?>
            <?php elseif(date('D', strtotime($lhp->mulai))=='Sun'): ?>
                <?php
                    $hari_mulai = 'Minggu';
                ?>
            <?php endif; ?>

            
            <?php if(date('m', strtotime($lhp->mulai))==1): ?>
                <?php
                    $bulan_mulai = 'Januari';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==2): ?>
                <?php
                    $bulan_mulai = 'Februari';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==3): ?>
                <?php
                    $bulan_mulai = 'Maret';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==4): ?>
                <?php
                    $bulan_mulai = 'April';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==5): ?>
                <?php
                    $bulan_mulai = 'Mei';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==6): ?>
                <?php
                    $bulan_mulai = 'Juni';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==7): ?>
                <?php
                    $bulan_mulai = 'Juli';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==8): ?>
                <?php
                    $bulan_mulai = 'Agustus';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==9): ?>
                <?php
                    $bulan_mulai = 'September';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==10): ?>
                <?php
                    $bulan_mulai = 'Oktober';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==11): ?>
                <?php
                    $bulan_mulai = 'November';
                ?>
            <?php elseif(date('m', strtotime($lhp->mulai))==12): ?>
                <?php
                    $bulan_mulai = 'Desember';
                ?>
            <?php endif; ?>


            
            <?php if(date('D', strtotime($lhp->selesai))=='Mon'): ?>
                <?php
                    $hari_selesai = 'Senin';
                ?>
            <?php elseif(date('D', strtotime($lhp->selesai))=='Tue'): ?>
                <?php
                    $hari_selesai = 'Selasa';
                ?>
            <?php elseif(date('D', strtotime($lhp->selesai))=='Wed'): ?>
                <?php
                    $hari_selesai = 'Rabu';
                ?>
            <?php elseif(date('D', strtotime($lhp->selesai))=='Thu'): ?>
                <?php
                    $hari_selesai = 'Kamis';
                ?>
            <?php elseif(date('D', strtotime($lhp->selesai))=='Fri'): ?>
                <?php
                    $hari_selesai = "Jum'at";
                ?>
            <?php elseif(date('D', strtotime($lhp->selesai))=='Sat'): ?>
                <?php
                    $hari_selesai = 'Sabtu';
                ?>
            <?php elseif(date('D', strtotime($lhp->selesai))=='Sun'): ?>
                <?php
                    $hari_selesai = 'Minggu';
                ?>
            <?php endif; ?>

            
            <?php if(date('m', strtotime($lhp->selesai))==1): ?>
                <?php
                    $bulan_selesai = 'Januari';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==2): ?>
                <?php
                    $bulan_selesai = 'Februari';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==3): ?>
                <?php
                    $bulan_selesai = 'Maret';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==4): ?>
                <?php
                    $bulan_selesai = 'April';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==5): ?>
                <?php
                    $bulan_selesai = 'Mei';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==6): ?>
                <?php
                    $bulan_selesai = 'Juni';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==7): ?>
                <?php
                    $bulan_selesai = 'Juli';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==8): ?>
                <?php
                    $bulan_selesai = 'Agustus';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==9): ?>
                <?php
                    $bulan_selesai = 'September';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==10): ?>
                <?php
                    $bulan_selesai = 'Oktober';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==11): ?>
                <?php
                    $bulan_selesai = 'November';
                ?>
            <?php elseif(date('m', strtotime($lhp->selesai))==12): ?>
                <?php
                    $bulan_selesai = 'Desember';
                ?>
            <?php endif; ?>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">d.</td>
                    <td width="1%"  valign="top">:</td>
                    
                    <td width="18%" style="text-align: justify">
                        Hari
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify">
                         <?php if($lhp->selesai != null): ?>
                            <?php echo e($hari_mulai.' s/d '.$hari_selesai); ?>

                        <?php else: ?>
                            <?php echo e($hari_mulai); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    
                    <td width="18%" style="text-align: justify">
                        Tanggal
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        <?php if($lhp->selesai != null): ?>
                            <?php echo e(date('d', strtotime($lhp->mulai)).' s/d '.date('d', strtotime($lhp->selesai))); ?>

                        <?php else: ?>
                            <?php echo e(date('d', strtotime($lhp->mulai))); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    
                    <td width="18%" style="text-align: justify">
                        Bulan
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        <?php if($bulan_mulai != $bulan_selesai): ?>
                            <?php echo e($bulan_mulai.' s/d '.$bulan_selesai); ?>

                        <?php else: ?>
                            <?php echo e($bulan_mulai); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    
                    <td width="18%" style="text-align: justify">
                        Tahun
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        <?php if(date('Y', strtotime($lhp->mulai)) == date('Y', strtotime($lhp->selesai))): ?>
                            <?php echo e(date('Y', strtotime($lhp->mulai))); ?>

                        <?php else: ?>
                            <?php echo e(date('Y', strtotime($lhp->mulai)).' s/d '.date('Y', strtotime($lhp->selesai))); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    
                    <td width="18%" valign="top" style="text-align: justify">
                        Waktu/Jam
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        <?php echo e(date('H.i', strtotime($lhp->mulai))); ?> Wita s/d Selesai
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    
                    <td width="18%" valign="top" style="text-align: justify">
                        Tempat/Lokasi
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                     <?php echo e($lhp->lokasi); ?>

                    </td>
                </tr>
            </table>
            


        </div>
        <div style="margin-top: 30px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">III.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Uraian Hasil Pengawasan : </th>
                </tr>
                
            </table>
            <div class="row">
                <?php echo $lhp->uraian_hasil; ?>

            </div>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="93%" colspan=""  valign="top" align="justify"></td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">IV.</th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px">DUGAAN PELANGGARAN  </th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px">: <?php echo e(($lhp->dugaan=='ada' ? 'Ada' : 'Tidak Ada')); ?> </th>
                </tr>
            </table>
        </div>

        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">V. </th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px"><span style="padding-left: 5px">INFORMASI DUGAAN PELANGGARAN</span></th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px"></th>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <th width="4%" align="left" valign="top"></th>
                    <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px">a. Tempat Kejadian</span></th>
                    <th width="1%"  valign="top">:</th>
            
                    <th width="48%" style="text-align: justify">
                        <?php echo e($lhp->tempat_kejadian); ?>

                    </th>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <th width="4%" align="left" valign="top"></th>
                    <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px">b. Waktu Kejadian</span></th>
                    <th width="1%"  valign="top">:</th>
            
                    <th width="48%" style="text-align: justify">
                        <?php if($lhp->waktu_kejadian != null): ?>
                            <?php echo e(date('d F Y', strtotime($lhp->waktu_kejadian))); ?>

                        <?php endif; ?>
                    </th>
                </tr>
            </table>
            <table width="100%">
                <?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n => $pelaku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px"><?php echo e($n==0 ? 'c. Nama Pelaku' : ' '); ?></span></th>
                        <th width="1%"  valign="top"><?php echo e($n==0 ? ':' : ' '); ?></th>
                
                        <th width="48%" style="text-align: justify">
                            <?php echo e(++$n.'. '.$pelaku->nama); ?>

                        </th>
                    </tr>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                
            </table>
            <table width="100%">
                <?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ns => $pelaku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px"><?php echo e($ns==0 ? 'd. Status Pelaku' : ' '); ?></span></th>
                        <th width="1%"  valign="top"><?php echo e($ns==0 ? ':' : ' '); ?></th>
                
                        <th width="48%" style="text-align: justify">
                            <?php echo e(++$ns.'. '.$pelaku->status); ?>

                        </th>
                    </tr>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                
            </table>
            
        </div>
        <div style="margin-top: 10px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">VI.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Uraian Dugaan Pengawasan : </th>
                </tr>
                
            </table>
            <div class="row">
                <?php echo $lhp->uraian_dugaan; ?>

            </div>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="93%" colspan=""  valign="top" align="justify"></td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">VII. </th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px"><span style="padding-left: 0px">SAKSI - SAKSI</span></th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px"></th>
                </tr>
            </table>
            <table width="100%">
                <?php $__empty_1 = true; $__currentLoopData = $lhp->saksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nsa => $saksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    ++$nsa;
                    if ($nsa ==1) {
                    $alfa = 'a';
                    $rom = 'I';
                    }elseif ($nsa ==2) {
                    $alfa = 'b';
                    $rom = 'II';
                    }elseif ($nsa ==3) {
                    $alfa = 'c';
                    $rom = 'III';
                    }elseif ($nsa ==4) {
                    $alfa = 'd';
                    $rom = 'IV';
                    }elseif ($nsa ==5) {
                    $alfa = 'e';
                    $rom = 'V';
                    }elseif ($nsa ==6) {
                    $alfa = 'f';
                    $rom = 'VI';
                    }elseif ($nsa ==7) {
                    $alfa = 'g';
                    $rom = 'VII';
                    }elseif ($nsa ==8) {
                    $alfa = 'h';
                    $rom = 'VIII';
                    }elseif ($nsa ==9) {
                    $alfa = 'i';
                    $rom = 'IX';
                    }elseif ($nsa ==10) {
                    $alfa = 'j';
                    $rom = 'X';
                    }
                ?>
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 15px "><?php echo e($alfa); ?>. Saksi <?php echo e($rom); ?></span></th>
                        <th width="1%"  valign="top">:</th>
                
                        <th width="48%" style="text-align: justify">
                            <?php echo e($saksi->nama); ?>

                        </th>
                    </tr>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                
            </table>
        </div>
        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">VIII. </th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px"><span style="padding-left: 0px">BUKTI PENDUKUNG</span></th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px"></th>
                </tr>
            </table>
            <table width="100%" style="margin-top: 0px">
                <?php $__empty_1 = true; $__currentLoopData = $lhp->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nbuk => $bukti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        ++$nbuk;
                        if ($nbuk ==1) {
                        $alfa = 'a';
                        $rom = 'I';
                        }elseif ($nbuk ==2) {
                        $alfa = 'b';
                        $rom = 'II';
                        }elseif ($nbuk ==3) {
                        $alfa = 'c';
                        $rom = 'III';
                        }elseif ($nbuk ==4) {
                        $alfa = 'd';
                        $rom = 'IV';
                        }elseif ($nbuk ==5) {
                        $alfa = 'e';
                        $rom = 'V';
                        }elseif ($nbuk ==6) {
                        $alfa = 'f';
                        $rom = 'VI';
                        }elseif ($nbuk ==7) {
                        $alfa = 'g';
                        $rom = 'VII';
                        }elseif ($nbuk ==8) {
                        $alfa = 'h';
                        $rom = 'VIII';
                        }elseif ($nbuk ==9) {
                        $alfa = 'i';
                        $rom = 'IX';
                        }elseif ($nbuk ==10) {
                        $alfa = 'j';
                        $rom = 'X';
                        }
                    ?>
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="80%" colspan="" align="left"  valign="top"><span style="padding-left: 10px ;padding-top: 10px "><?php echo e($alfa); ?>. <?php echo e($bukti->nama); ?></span></th>
                        
                    </tr>    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                
            </table>
        </div>
        <div style="margin-top: 20px">
                


            <table width="100%" style="font-weight: bold">
                <tr>
                    <td style="width: auto"></td>
                    <td align="center" style="width: 50%;">
                        Bone Bolango, <?php echo e($lhp->created_at->format('d F Y')); ?>

                        <br>
                        Pengawas</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"></td>
                </tr>

                

                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='ketua'): ?>
                        <tr>
                            <td style="width: auto"></td>
                            <td align="center" style="width: 50%;"><u><?php echo e($user->user->name); ?></u> <br> <?php echo e(ucfirst($user->user->jabatan->sebagai)); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 30px"></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>

                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='ketua'): ?>
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u><?php echo e($user->user->name); ?></u> <br> <?php echo e(ucfirst($user->user->jabatan->sebagai)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='anggota'): ?>
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u><?php echo e($user->user->name); ?></u> <br> <?php echo e(ucfirst($user->user->jabatan->sebagai)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>
                
                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if(strpos($user->user->jabatan->nm_jabatan, 'Koordinator')): ?>
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u><?php echo e($user->user->name); ?></u> <br> <?php echo e(ucfirst($user->user->jabatan->sebagai)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>

                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($user->status=='anggota'): ?>
                        <?php if($user->user->jabatan->sebagai=='staf'): ?>
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u><?php echo e($user->user->name); ?></u> <br> <?php echo e(ucfirst($user->user->jabatan->sebagai)); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    
                <?php endif; ?>

                
            </table>


                
                
        </div>
        
                    
            
    </div>
</div>
    
        <script>
            window.print();
        </script>
    

    
    

    
    

</body>

</html>

<?php /**PATH E:\skripsi\app\pengawasan\resources\views/lhp_print.blade.php ENDPATH**/ ?>