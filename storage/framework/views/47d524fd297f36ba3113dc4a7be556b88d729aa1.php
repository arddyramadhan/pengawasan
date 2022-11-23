<?php $__env->startSection('title', 'User'); ?>
<?php    
    $coba = Auth::user()->id_tingkatan==1 ? 'Kecamatan '.$kec_kel->nama : $kec_kel->status.' '.$kec_kel->nama;
?>
<?php $__env->startSection('judul', 'Pengawas '.$coba); ?>
<?php $__env->startSection('menu', 'Manajemen User'); ?>
<?php $__env->startSection('sub', $coba); ?>
<?php $__env->startSection('content'); ?>



<div class="col-md-12">
    <div class="d-flex justify-content-end mb-3">
        <?php if(Auth::user()->level=='admin' && Auth::user()->tingkatan->id==2): ?>
            <button type="button" data-container="body" data-toggle="modal" data-target="#<?php echo e($status); ?>" class="btn btn-primary btn-sm ml-1"><i class="fas fa-plus"></i> Tambah </button>      
        <?php endif; ?>
    </div>
    <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='kelurahan' ? 'active' : ''); ?>" href="/user/kelurahan/<?php echo e($id); ?>/table_kecamatan">Kelurahan/Desa</a></li>
                <li class="nav-item"><a class="nav-link  <?php echo e(Request::segment(2)=='tps' ? 'active' : ''); ?>" href="/user/tps/<?php echo e($id); ?>/table_kecamatan">PTPS</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content table-responsive">
                <div class="active tab-pane" id="activity">
                    <table class="table" id="myTable">
                        <thead class="">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Telephone</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="coba">
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(++$no); ?></td>
                                <td class="<?php echo e($item->level=='admin' ? 'text-primary' : ''); ?>" ><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->jk=='pria' ? 'Laki-laki' : 'Perempuan'); ?></td>
                                <td><?php echo e($item->alamat); ?></td>
                                <td><?php echo e($item->tlp); ?></td>
                                <td align="center">
                                    <a href="/user/<?php echo e($item->id); ?>/detail" title="Detail" class="btn btn-link btn-sm "><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" align="center">
                                    <div class="alert alert-danger alert-sm">Belum ada Data</div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="modal fade" id="kelurahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Pengawas Kelurahan - Desa </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/kelurahan/store_kecamatan" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="name" id="" placeholder="Nama lengkap" class="form-control">
						<input type="hidden" name="id_kelurahan" id="" placeholder="Nama lengkap" value="<?php echo e($id); ?>" class="form-control">
                        <select hidden name="id_jabatan" id="" class="form-control">
                            <option selected value="9">Desa</option>
                        </select>
                        <select hidden name="level" id="" class="form-control">
                            <option selected value="user">User</option>
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
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option disabled selected value="">Choose one!!</option>
                            <option value="pria">Laki - Laki</option>
                            <option value="wanita">Perempuan</option>
                        </select>
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

<div class="modal fade" id="tps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Pengawas TPS </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/tps/store_kecamatan" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<div class="form-group">
						<label for="">Nama</label>
						<input type="text" name="name" id="" placeholder="Nama lengkap" class="form-control">
						<input type="hidden" name="id_kelurahan" id="" placeholder="Nama lengkap" value="<?php echo e($id); ?>" class="form-control">
                        <select hidden name="id_jabatan" id="" class="form-control">
                            <option selected value="10">TPS</option>
                        </select>
                        <select hidden name="level" id="" class="form-control">
                            <option selected value="user">User</option>
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
                        <label for="">Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option disabled selected value="">Choose one!!</option>
                            <option value="pria">Laki - Laki</option>
                            <option value="wanita">Perempuan</option>
                        </select>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('link'); ?>
<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">


<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "ordering": false,
        });
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/pengawas_table_kecamatan.blade.php ENDPATH**/ ?>