<?php $__env->startSection('title', 'Laporan Masyarakat'); ?>
<?php $__env->startSection('judul', 'Laporan Masyarakat'); ?>
<?php $__env->startSection('menu', 'Informasi'); ?>
<?php $__env->startSection('sub', 'Laporan Masyarakat'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
<?php
    $sts_antrian = 'tidak';
    $jum_antrian = 0;
    $sts_alihkan = 'tidak';
    $jum_alihkan = 0;
?>
<?php $__empty_1 = true; $__currentLoopData = $data_antrian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $antri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if($antri->status=='antrian'): ?>
        <?php
            ++$jum_antrian;
            $sts_antrian = 'ada';            
        ?>
    <?php elseif($antri->status=='alihkan'): ?>
        <?php
            ++$jum_alihkan;
            $sts_alihkan = 'ada';            
        ?>
    <?php endif; ?>
    
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    
<?php endif; ?>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <?php if($sts_antrian == 'ada'): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='antrian' ? 'active' : ''); ?>" href="/informasi/antrian">Masuk <span class="right badge badge-sm badge-danger"><?php echo e($jum_antrian); ?></span></a> </li>                        
                    <?php endif; ?>

                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2) ? '' : 'active'); ?>" href="/informasi">Semua</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='dibaca' ? 'active' : ''); ?>" href="/informasi/dibaca">Dibaca</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='diproses' ? 'active' : ''); ?>" href="/informasi/diproses">Diproses</a></li>
                    <?php if($sts_alihkan == 'ada'): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='alihkan' ? 'active' : ''); ?>" href="/informasi/alihkan">Dialihkan <span class="right badge badge-sm badge-danger"><?php echo e($jum_alihkan); ?></span></a></li>                        
                    <?php endif; ?>
                    
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    
                    <div class="active tab-pane" id="">
                        <div class="timeline" id="informasi" style="z-index: 1;">
                            <?php
                            $nos = date('ymd');
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i>
                                            <?php if($item->status == 'antrian'): ?>
                                                Laporan Masuk
                                            <?php else: ?>
                                                <?php echo e($item->status); ?>

                                            <?php endif; ?>
                                             <?php echo e($item->updated_at->diffForHumans()); ?>

                                            
                                            </span>
                                        <h3 class="timeline-header"><a href="/informasi/<?php echo e($item->id); ?>/show"> <?php echo e($item->nama); ?> </a> <strong>|</strong> Kode :  <span
                                                class="text-danger text-bold">IM-<?php echo e(sprintf("%04d", $item->id)); ?></span>
                                            <?php if($item->status == 'dibaca'): ?>
                                                 <strong>|</strong> Belum di tangani
                                            <?php elseif($item->status == 'ditangani'): ?>
                                                <?php if(Auth::user()->id == $item->informasi_awal->user->id): ?>
                                                 <strong>|</strong> Ditangani : Saya
                                                <?php else: ?>
                                                <strong>|</strong> Ditangani : <?php echo e($item->informasi_awal->user->name); ?> 
                                                <?php endif; ?>
                                            <?php elseif($item->status == 'diproses'): ?>
                                                <?php if(Auth::user()->id == $item->informasi_awal->user->id): ?>
                                                <strong>|</strong> Diproses : Saya
                                                <?php else: ?>
                                                <strong>|</strong> Diproses : <?php echo e($item->informasi_awal->user->name); ?> 
                                                <?php endif; ?>
                                            <?php elseif($item->status == 'alihkan'): ?>
                                                <strong>|</strong> Dialihkan : Kecamatan <?php echo e($item->alihkan->kecamatan->nama); ?>

                                            <?php endif; ?>
                                        </h3>
                                        <div class="timeline-body">
                                            <?php echo e($item->deskripsi); ?>

                                        </div>
                                        <div class="timeline-footer">
                                            <a href="/informasi/<?php echo e($item->id); ?>/show" class="btn btn-primary btn-sm text-white">
                                                <strong>Lihat</strong></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                                <div class="float-right pr-3">
                                    <?php echo e($data->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>









    <div class="col-md-12">
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/informasi_masyarakat.blade.php ENDPATH**/ ?>