<?php $__env->startSection('title', 'Kecamatan'); ?>
<?php $__env->startSection('judul', 'Kecamatan'); ?>
<?php $__env->startSection('menu', 'Manajemen Wilayah'); ?>
<?php $__env->startSection('sub', 'Kecamatan'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-end mb-3">
	<button type="button" data-container="body" data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data</button>
</div>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card">
    <div class="card-body pt-2 table-responsive">
        <table class="table" id="myTable">
            <thead class="">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
					<th>Kabupaten/Kota</th>
					<th>Alamat</th>
					<th>Di Buat</th>
                    <th style="text-align: center">Detail</th>
                </tr>
            </thead>
            <tbody id="coba">
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(++$no); ?></td>
                        <td>
                            <?php echo e($item->nama); ?>

                        </td>
                        <td>
                            <?php echo e(ucfirst($item->kabupaten->status)); ?> <?php echo e($item->kabupaten->nama); ?>

                        </td>
						<td>
							<?php echo e($item->almt_jalan); ?> <?php echo e($item->almt_kel_des); ?> Kecamatan <?php echo e($item->almt_kecamatan); ?> <?php echo e(ucfirst($item->status)); ?> <?php echo e($item->nama); ?>

						</td>
                        <td>
                            <?php echo e($item->created_at->format('d F Y')); ?>

                        </td>
						<td align="center">
							<a href="/kecamatan/<?php echo e($item->id); ?>/detail" title="Detail" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
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


<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kecamatan <?php echo e(Auth::user()->id_kabupaten_kota); ?> <i class="fas fa-users"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kecamatan/create" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="nama" id="" placeholder="Contoh : Suwawa" class="form-control">
					</div>
					<div class="form-group" <?php echo e(Auth::user()->level!='super' ? 'hidden' : ''); ?>>
						<label for="">Kabupaten - Kota</label>
                        <select name="id_kabupaten_kota" id="" class="form-control">

                            <?php if(Auth::user()->level=='super'): ?>
                                <option selected disabled value="">Choose One!!</option>    
                                <?php $__empty_1 = true; $__currentLoopData = $kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($kab->id); ?>"><?php echo e($kab->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                <?php endif; ?>
                            <?php else: ?>
                                <?php $__empty_1 = true; $__currentLoopData = $kabupaten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option <?php echo e(Auth::user()->id_kabupaten_kota==$kab->id ? 'selected' : ''); ?>  value="<?php echo e($kab->id); ?>"><?php echo e($kab->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                <?php endif; ?>
                            <?php endif; ?>
                        </select>
					</div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/kecamatan.blade.php ENDPATH**/ ?>