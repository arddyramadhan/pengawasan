<?php $__env->startSection('title', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('judul', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('menu', 'Laporan'); ?>
<?php $__env->startSection('sub', Request::segment(4)); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <?php
        $sts_pleno = 'tidak';
        $jum_pleno = 0;
    ?>
<?php $__empty_1 = true; $__currentLoopData = $data_pleno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        ++$jum_pleno;
        $sts_pleno = 'ada';            
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    
                        <?php if($sts_pleno == 'ada'): ?>                        
                            <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='pleno' ? 'active' : ''); ?>" href="/lhp/pleno/view/<?php echo e($status); ?>">Pleno Laporan <span class="right badge badge-sm badge-danger"><?php echo e($jum_pleno); ?></span></a></li>
                        <?php endif; ?>
                    
                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='ada' ? 'active' : ''); ?>" href="/lhp/ada/view/<?php echo e($status); ?>">Ada Dugaan</a> </li>
                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='tidak' ? 'active' : ''); ?>" href="/lhp/tidak/view/<?php echo e($status); ?>">Tidak Ada Dugaan</a> </li>
                    <?php if(Auth::user()->id_tingkatan == 1): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='lhp_kecamatan' ? 'active' : ''); ?>" href="/lhp/lhp_kecamatan/view/<?php echo e($status); ?>">Tingkat Kecamatan</a></li>
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
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                            <h3 class="card-title"><span class="text-bold"><?php echo e($item->user->name); ?></span>
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
                                            <?php if($item->dugaan=='ada'): ?>
                                                <div>
                                                    <p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            <?php echo $item->uraian_dugaan; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                
                                                <div>
                                                    <p class="text-bold">III. Uraian Hasil Pengawasan : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            <?php echo $item->uraian_hasil; ?>

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

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/lhp.blade.php ENDPATH**/ ?>