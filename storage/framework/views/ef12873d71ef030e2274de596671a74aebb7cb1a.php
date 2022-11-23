<?php $__env->startSection('title', 'Prototype Form'); ?>
<?php $__env->startSection('judul', 'Laporan Masyarakat'); ?>
<?php $__env->startSection('menu', 'Form'); ?>
<?php $__env->startSection('sub', 'Masyarakat'); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body row">
        <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
                <h2><strong>Bawaslu</strong> Kabupaten Bone Bolango</h2>
                <p class="lead mb-5">Mari bersama awasi pemilu<br>
                    Phone: +09000990909
                </p>
            </div>
        </div>
        <div class="col-7">
            <?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form action="/informasi" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama <strong class="text-danger">*</strong> </label>
                    <input type="text" value="<?php echo e((old('nama') ?? '')); ?>" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?php echo e((old('email') ?? '')); ?>" name="email" id="email" class="form-control">
                    <p style="font-size: 15px;" class="text-info">Email : Untuk mendapatkan pemberitahuan langsung melalui email anda</p>
                </div>
                <div class="form-group">
                    <label for="ktp">NIK</label>
                    <input type="text" value="<?php echo e((old('ktp') ?? '')); ?>" name="ktp" id="ktp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telp">Nomor Telfon  <strong class="text-danger">*</strong></label>
                    <input type="text" value="<?php echo e((old('telp') ?? '')); ?>" name="telp" id="telp" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat  <strong class="text-danger">*</strong></label>
                    <input type="text" value="<?php echo e((old('alamat') ?? '')); ?>" name="alamat" id="alamat" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Kejadian  <strong class="text-danger">*</strong></label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                        style="height: 100px;"><?php echo e((old('deskripsi') ?? '')); ?></textarea>
                </div>
				<div class="form-group">
					<div class="custom-file">
						<input type="file" name="img_bukti" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choose One..</label>
					</div>
				</div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Kirim Laporan">

                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/form_masyarakat.blade.php ENDPATH**/ ?>