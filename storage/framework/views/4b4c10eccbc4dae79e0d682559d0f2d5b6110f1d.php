<?php $__env->startSection('title', 'Pengawasan Langsung Kecamatan'); ?>
<?php $__env->startSection('judul', 'Pengawasan Tingkat Kecamatan'); ?>
<?php $__env->startSection('menu', 'Tim'); ?>
<?php $__env->startSection('sub', 'Pengawasan Kecamatan'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-<?php echo e(Auth::user()->id_tingkatan==1 ? 'between' : 'end'); ?> mb-3">
	<?php if(Auth::user()->id_tingkatan == 1): ?>
		<a href="/tim/pengawasan/status" type="button" data-container="body" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Tim Kabupaten</a>
	<?php endif; ?>
	<?php if(Auth::user()->level=='admin'): ?>
		<button type="button" data-container="body" data-toggle="modal" data-target="#addtim" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Pengawasan Langsung</button>
	<?php endif; ?>
</div>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card">
    <div class="card-body pt-2 table-responsive">
        <table class="table" id="myTable">
            <thead class="">
                <tr>
                    <th style="width: 5%">#</th>
                    <th width="30%" >Tema Pengawasan</th>
                    <th width="5%" >Kecamatan</th>
					<th width="45%">Angota Tim</th>
                    <th width="10%" >Status</th>
                    <th width="5%" style="text-align: center">Detail</th>
                </tr>
            </thead>
            <tbody id="coba">
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<?php if($item->user->id_tingkatan == 2): ?>
						<tr>
							<td><?php echo e(++$no); ?></td>
							<td>
								<?php echo e($item->nama); ?>

							</td>
							<td>
								<?php echo e($item->user->kecamatan->nama); ?>

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
								<a href="/tim/<?php echo e($item->id); ?>/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm">
									<i class="fa fa-eye"></i></a>
							</td>
						</tr>
					<?php endif; ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" align="center">
                            <div class="alert alert-danger alert-sm">Belum ada Data</div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>


    </div>
    <!-- /.card-body -->
</div>


<div class="modal fade" id="addtim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tim Untuk Pengawasan Langsung <i class="fas fa-users"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tim/addtim/pengawasan" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="">Tema Pengawasan</label>
						<input type="text" name="nama" id="" placeholder="Masukan Judul Pengawasan" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Surat Tugas Ketua</label>
						<input type="text" name="st_ketua" id="" placeholder="Nomor Surat Tugas Ketua" class="form-control">
						<div class="custom-file mt-1">
							<input type="file" name="file_st_ketua" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">File Surat Tugas Ketua</label>
						</div>
					</div>

					<div class="form-group">
						<label for="">Surat Tugas Sekretaris</label>
						<input type="text" name="st_sekretaris" id="" placeholder="Nomor Surat Tugas Sekretaris" class="form-control">
						<div class="custom-file mt-1">
							<input type="file" name="file_st_sekretaris" class="custom-file-input" id="customFile">
							<label class="custom-file-label" for="customFile">File Surat Tugas Sekretaris</label>
						</div>
					</div>
					<div class="form-group">
					<label>Angoota Tim</label>
					<div class="select2-blue">
						<select name="anggota[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Tambahkan Anggota Tim Pengawasan" data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
						<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?> (<?php echo e($item->jabatan->nm_jabatan); ?>)</option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
						
					</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Waktu Mulai</label>
								<input type="date" name="mulai" id="" class="form-control">
							</div>
							<div class="col-md-6">
								<label for="">Waktu Selesai</label>
								<input type="date" name="selesai" id="" class="form-control">
							</div>
						</div>
					</div>
                
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Buat Tim</button>
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
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/tim_pengawasan_kecamatan.blade.php ENDPATH**/ ?>