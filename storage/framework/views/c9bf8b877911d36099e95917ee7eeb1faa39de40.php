<?php $__env->startSection('title', 'Tim Penelusuran Informasi'); ?>
<?php $__env->startSection('judul', 'Tim Penelusuran Informasi'); ?>
<?php $__env->startSection('menu', 'Tim Pengawasan'); ?>
<?php $__env->startSection('sub', 'Penelusuran'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-<?php echo e(Auth::user()->id_tingkatan==1 ? 'between' : 'end'); ?> mb-3">
	<?php if(Auth::user()->id_tingkatan == 1): ?>
		<a href="/tim/penelusuran/status_kecamatan" type="button" data-container="body" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Tim Kecamatan</a>
	<?php endif; ?>
</div>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card">
    <div class="card-body pt-2 table-responsive">
        <table class="table col-md-12" id="myTable">
            <thead class="">
                <tr>
                    <th style="width: 5%">#</th>
                    <th  width="30%" >Tema Penelusuran</th>
                    
					<th  width="50%">Anggota Tim</th>
                    <th  width="10%">Status</th>
                    <th  width="5%" style="text-align: center">Detail</th>
                </tr>
            </thead>
            <tbody id="coba">
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if(Auth::user()->id_tingkatan == 1): ?>
                       <tr>
                            <td><?php echo e(++$no); ?></td>
                            
                            <td>
                                <?php echo e($item->nama); ?>

                            </td>
                            <td>
                                
                                <ul class="list-inline">
                                    <?php $__empty_2 = true; $__currentLoopData = $item->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar img-circle" title="<?php echo e($usr->user->name); ?>" width="50px" height="50px"  src="<?php echo e(asset('storage/'.$usr->user->foto)); ?>">
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        
                                    <?php endif; ?>
                                </ul>
                            </td>
                            <td>
                                <?php if(date('Y-m-d') > date('Y-m-d', strtotime($item->selesai))): ?>
                                    <div class="badge badge-success">Selesai</div>
                                <?php else: ?>
                                    <div class="badge badge-warning">Dalam Proses</div>
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <a href="/tim/<?php echo e($item->id); ?>" title="Detail" class="btn btn-link text-primary btn-sm">
                                    <i class="fa fa-eye"></i></a>
                            </td>
                        </tr> 
                    <?php else: ?>
                        <?php if($item->user->id_kecamatan == Auth::user()->id_kecamatan): ?>
                            <tr>
                                <td><?php echo e(++$no); ?></td>
                                <td><?php echo e($item->informasi_awal->peristiwa); ?></td>
                                
                                <td>
                                    
                                    <ul class="list-inline">
                                        <?php $__empty_2 = true; $__currentLoopData = $item->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar img-circle" title="<?php echo e($usr->user->name); ?>" width="50px" height="50px"  src="<?php echo e(asset('storage/'.$usr->user->foto)); ?>">
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                            
                                        <?php endif; ?>
                                    </ul>
                                </td>
                                <td>
                                    <?php if(date('Y-m-d') > date('Y-m-d', strtotime($item->selesai))): ?>
                                        <div class="badge badge-success">Selesai</div>
                                    <?php else: ?>
                                        <div class="badge badge-warning">Dalam Proses</div>
                                    <?php endif; ?>
                                </td>
                                <td align="center">
                                    <a href="/tim/<?php echo e($item->id); ?>" title="Detail" class="btn btn-link text-primary btn-sm">
                                        <i class="fa fa-eye"></i></a>
                                </td>
                            </tr> 
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" align="center">
                            <div class="alert alert-danger alert-sm">Belum ada Data</div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


    </div>
    <!-- /.card-body -->
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('link'); ?>
	<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	
	
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable({
				"ordering": false,
			});
		} );
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/tim.blade.php ENDPATH**/ ?>