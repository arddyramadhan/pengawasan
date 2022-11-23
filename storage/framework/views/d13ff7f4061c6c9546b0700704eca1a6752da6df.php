
<?php $__env->startSection('title', 'Pengawas'); ?>
<?php $__env->startSection('judul', 'Pengawas'); ?>
<?php $__env->startSection('menu', 'Manajemen Pengawas'); ?>
<?php $__env->startSection('sub', 'Pengawas'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="d-flex justify-content-end mb-3">
	<button type="button" data-container="body" data-toggle="modal" data-target="#addpengawas" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</button>
</div>
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Pengawas Kabupaten
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="lead"><b><?php echo e($item->name); ?></b></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                
                                <p class="text-muted text-sm"><b>About: </b> <?php echo e($item->tingkatan->lainnya); ?> / <?php echo e(ucfirst($item->jabatan->nm_jabatan)); ?> / <?php echo e($item->tingkatan->nm_tingkatan=='Kabupaten' ? ucfirst($item->tingkatan->nm_tingkatan).' '.$item->kabupaten->nama : 'Kecamatan '.$item->kecamatan->nama); ?></p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small mb-1"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                        Alamat: <?php echo e($item->alamat); ?></li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        Phone : <?php echo e($item->tlp); ?></li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img width="500px" height="500px"  src="<?php echo e(asset('storage/'.$item->foto)); ?>" alt="user-avatar"
                                    class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#editpengawas<?php echo e($item->id); ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/user/<?php echo e($item->id); ?>/detail" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> Lihat Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                
            <?php endif; ?>

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        
        <div class="pagination justify-content-center m-0">
            <?php echo e($data->links()); ?>        
        </div>
        
    </div>
    <!-- /.card-footer -->
</div>
<!-- Button trigger modal -->



<div class="modal fade" id="addpengawas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Pengawas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/kecamatan/store_kecamatan" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="name" id="" placeholder="Nama lengkap" class="form-control">
					</div>
                    <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="id_jabatan" id="" class="form-control">
                            <option disabled value="">Choose one!!</option>
                            <?php $__empty_1 = true; $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($jab->id); ?>"><?php echo e($jab->nm_jabatan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
						<label for="">E-mail</label>
						<input type="email" name="email" id="" placeholder="Email." class="form-control">
					</div>
                    <div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" id="" placeholder="Password" class="form-control">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="">Akses</label>
								<select name="level" id="" class="form-control">
                                    <option disabled selected value="">Choose one!!</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
							</div>
							<div class="col-md-6">
								<label for="">Jenis Kelamin</label>
                                <select name="jk" id="" class="form-control">
                                    <option disabled selected value="">Choose one!!</option>
                                    <option value="pria">Laki - Laki</option>
                                    <option value="wanita">Perempuan</option>
                                </select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" name="alamat" id="" placeholder="Alamat." class="form-control">
					</div>
					<div class="form-group">
						<label for="">Telephone</label>
						<input type="text" name="tlp" id="" placeholder="Nomor Telephone" class="form-control">
					</div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose One..</label>
                        </div>
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


<?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="modal fade" id="editpengawas<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Uba Data Pengawas <?php echo e($item->id); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/user/<?php echo e($item->id); ?>/edit" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('patch'); ?>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" id="" value="<?php echo e($item->name); ?>" placeholder="Nama lengkap" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="id_jabatan" id="" class="form-control">
                                <option disabled value="">Choose one!!</option>
                                <?php $__empty_2 = true; $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <option <?php echo e($jab->id==$item->id_jabatan ? 'selected' : ''); ?> value="<?php echo e($jab->id); ?>"><?php echo e($jab->nm_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" value="<?php echo e($item->email); ?>" name="email" id="" placeholder="Email." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" placeholder="Password baru" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Akses</label>
                                    <select name="level" id="" class="form-control">
                                        <option disabled value="">Choose one!!</option>
                                        <option <?php echo e($item->level == 'admin' ? 'selected' : ''); ?> value="admin">Admin</option>
                                        <option <?php echo e($item->level == 'user' ? 'selected' : ''); ?> value="user">User</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jk" id="" class="form-control">
                                        <option disabled value="">Choose one!!</option>
                                        <option <?php echo e($item->jk == 'pria' ? 'selected' : ''); ?> value="pria">Laki - Laki</option>
                                        <option  <?php echo e($item->jk == 'wanita' ? 'selected' : ''); ?> value="wanita">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" value="<?php echo e($item->alamat); ?>" id="" placeholder="Alamat." class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Telephone</label>
                            <input type="text" name="tlp" id="" value="<?php echo e($item->tlp); ?>" placeholder="Nomor Telephone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Foto</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose One..</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    
<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/pengawas_kecamatan.blade.php ENDPATH**/ ?>