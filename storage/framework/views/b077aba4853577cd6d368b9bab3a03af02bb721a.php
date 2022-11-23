<?php $__env->startSection('title', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('judul', 'Laporan Hasil Pengawasan'); ?>
<?php if($tim->status=='penelusuran'): ?>
	<?php $__env->startSection('menu', 'Tim Penelusuran'); ?>	
<?php else: ?>
	<?php $__env->startSection('menu', 'Pengawasan Langsung'); ?>
<?php endif; ?>
<?php $__env->startSection('sub', 'LHP'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Form Pengisian</h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3">
                <div class="form-group">
                    <form action="/lhp/store" method="post">
                        <?php echo csrf_field(); ?>
                        <input hidden type="text" class="form-control" name="id_tim" id="" value="<?php echo e($tim->id); ?>">
						<input hidden type="text" class="form-control" name="status_lhp" id="" value="<?php echo e($tim->status); ?>">
                        <div class="form-group">
                            <label for="tahapan">Tahapan Yang Di Awasi</label>
                            <textarea id="tahapan" placeholder="Tahapan Yang Di Awasi" name="tahapan"
                                class="form-control <?php $__errorArgs = ['tahapan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" cols="30"
                                rows="2"><?php echo e((old('tahapan') ?? '' )); ?></textarea>
                            <?php $__errorArgs = ['tahapan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Bentuk Pengawasan</label>
                            <select name="bentuk" id="" class="form-control">
                                <option value="" selected disabled>Choose One</option>
                                <option value="langsung">Langsung</option>
                                <option value="tidak">Tidak Langsung</option>
                            </select>
                            <?php $__errorArgs = ['bentuk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="diawasi">Pihak Yang Diawasi</label>
                            <textarea id="diawasi" name="diawasi" placeholder="Pihak Yang Di Awasi" class="form-control"
                                cols="30" rows="2"><?php echo e((old('diawasi') ?? '' )); ?></textarea>
                                
                            <?php $__errorArgs = ['diawasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="mulai">Waktu Mulai</label>
									<input type="datetime-local" value="<?php echo e(date('Y-m-d\TH:i')); ?>" name="mulai" id="mulai" class="form-control">
									 <?php $__errorArgs = ['mulai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="text-danger">Tidak boleh kosong</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="selesai">Waktu Selesai</label>
									<input type="datetime-local"  value="<?php echo e(date('Y-m-d\TH:i')); ?>" name="selesai" id="selesai" class="form-control">
									 <?php $__errorArgs = ['selesai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
										<div class="text-danger">Tidak boleh kosong</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							</div>
						</div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi Pengawasan</label>
                            <textarea id="lokasi" name="lokasi" placeholder="Lokasi Pengawasan" class="form-control"
                                cols="30" rows="2"><?php echo e((old('lokasi') ?? '' )); ?></textarea>
                            <?php $__errorArgs = ['lokasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="uraian_hasil">Uraian Hasil Kejadian</label>
                            <textarea id="uraian_hasil" style="height: 500px;" name="uraian_hasil" class="form-control summernote"
                                cols="30" rows="10"><?php echo e((old('uraian_hasil') ?? '' )); ?></textarea>
                            <?php $__errorArgs = ['uraian_hasil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                    
                </div>
            </div>
            <div class="card-footer">
				<?php if($tim->status=='penelusuran'): ?>
					<a href="/tim/<?php echo e($tim->id); ?>" class="btn btn-secondary">Kembali</a>	
				<?php else: ?>
					<a href="/tim/<?php echo e($tim->id); ?>/pengawasan" class="btn btn-secondary">Kembali</a>
				<?php endif; ?>
                
                <div class="float-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#masyarakat"><i
                            class="fas fa-file-signature"></i> Simpan</button>
                </div>

                    
                    <div class="modal fade" id="masyarakat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="text-bold">Apakah Laporan Hasil Pengawasan telah <span class="text-success">Selesai</span> dibuat..?
                                        </h5>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="konfirmasi" value="Belum" class="btn btn-info">
                                    <input type="submit" name="konfirmasi" value="Selesai" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="pihak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title" id="exampleModalLabel">Pihak Lainnya</h4>
                
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <input type="text" id="nomor" class="form-control">
                <input value="tambah" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close" type="button" onclick="add();" />
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
    var tampung_array = [];

    function add() {
        var masukan = document.getElementById("nomor");
        tampung_array.push(masukan.value);
        masukan.value = "";
        show();
    }

    function hapus(nilai) {

        // console.log(nilai);
    // var arr = ["orange","red","black", "orange", "white" , "orange" ];
    tampung_array.splice(nilai, 1);
    // nama_array.splice(nilai, 1);
    show();
    }

     function show() {
        var html = "";
        for (var i = 0; i < tampung_array.length; i++) {
        // html += '<option value="KPU RI">KPU RI</option>';
        // html += '<option value="KPU Provinsi">KPU Provinsi</option>';
        // html += '<option value="KPU Kabupaten/Kota">KPU Kabupaten/Kota</option>';
        // html += '<option value="PPK">PPK</option>';
        // html += '<option value="PPS">PPS</option>';
        // html += '<option value="PPDP">PPDP</option>';
        // html += '<option value="KPPS">KPPS</option>';
        // html += '<option value="Pasangan Calon">Pasangan Calon</option>';
        // html += '<option value="Tim Sukses">Tim Sukses</option>';
        // html += '<option value="Tim Kampanye">Tim Kampanye</option>';
        // html += '<option value="Pelaksana Kampanye">Pelaksana Kampanye</option>';
        // html += '<option value="Pengurus Partai Politik">Pengurus Partai Politik</option>';
        html += "<option value="+ tampung_array[i] +">" + tampung_array[i] + "</option>";

        }

        var tampil = document.getElementById("tampil");
        tampil.innerHTML = html;

    }  
    </script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/lhp_penelusuran.blade.php ENDPATH**/ ?>