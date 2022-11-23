<?php $__env->startSection('title', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('judul', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('menu', 'Tim Penelusuran'); ?>
<?php $__env->startSection('sub', 'LHP'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline  <?php echo e(($lhp->tahapan==null ? ' ' : 'collapsed-card')); ?> ">
            <div class="card-header">
                <h3 class="card-title text-bold">Uraian Hasil Kejadian</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: none;">
                <form action="/lhp/<?php echo e($lhp->id); ?>/update" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <input hidden type="text" class="form-control" name="id_tim" id="" value="<?php echo e($lhp->id_tim); ?>">
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
                            rows="1"><?php echo e($lhp->tahapan); ?></textarea>
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
                            <option value="" disabled>Choose One</option>
                            <option
                                <?php echo e(($lhp->bentuk == 'langsung' ? 'selected' : ' ')); ?>

                                value="langsung">Langsung</option>
                            <option
                                <?php echo e(($lhp->bentuk == 'tidak' ? 'selected' : ' ')); ?>

                                value="tidak">Tidak Lngsung</option>
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
                        <label for="diawasi">Pihak Yang Di Awasi</label>
                        <textarea id="diawasi" name="diawasi" placeholder="Pihak Yang Di Awasi" class="form-control"
                            cols="30" rows="1"><?php echo e($lhp->diawasi); ?></textarea>
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
                                <input type="datetime-local" value="<?php echo e(date('Y-m-d\TH:i', strtotime($lhp->mulai))); ?>" name="mulai" id="mulai" class="form-control">
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
                                <input type="datetime-local" value="<?php echo e(date('Y-m-d\TH:i', strtotime($lhp->selesai))); ?>" name="selesai" id="selesai" class="form-control">
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
                            cols="30" rows="1"><?php echo e($lhp->lokasi); ?></textarea>
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
                        <textarea style="height: 300px;" name="uraian_hasil" class="form-control summernote" cols="30"
                            rows="10"><?php echo e($lhp->uraian_hasil); ?></textarea>
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
        <!-- /.card -->
    </div>
    
    <div class="col-md-12">
        <div class="card card-danger card-outline <?php echo e(($lhp->tempat_kejadian==null ? ' ' : 'collapsed-card')); ?> ">
            <div class="card-header">
                <h3 class="card-title text-bold">Uraian Dugaan Pelanggaran</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: <?php echo e(($lhp->tempat_kejadian==null ? 'blok' : 'none' )); ?>;">
                
                <div class="form-group">
                    <label for="tempat_kejadian">Tempat Kejadian</label>
                    <input type="text" id="tempat_kejadian"
                        value="<?php echo e(old('tempat_kejadian') ?? $lhp->tempat_kejadian); ?>"
                        placeholder="Tempat Kejadian" name="tempat_kejadian" class="form-control">
                    <?php $__errorArgs = ['tempat_kejadian'];
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
                    <label for="">Waktu Kejadian</label>
                    <input type="date" name="waktu_kejadian" id=""
                        value="<?php echo e(old('waktu_kejadian') ?? $lhp->waktu_kejadian); ?>"
                        class="form-control">
                    <?php $__errorArgs = ['waktu_kejadian'];
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
                    <label for="uraian_dugaan">Uraian Dugaan Pelanggaran</label>
                    <textarea style="height: 300px;" name="uraian_dugaan" class="form-control summernote" cols="30"
                        rows="10"><?php echo e(old('uraian_dugaan') ?? $lhp->uraian_dugaan); ?></textarea>
                    <?php $__errorArgs = ['uraian_dugaan'];
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
            <div class="card-footer">
                
                <div class="float-right">
				<?php if($lhp->tempat_kejadian==null): ?>
					<button type="submit" class="btn btn-primary"><i class="fas fa-file-signature"></i> Simpan & Lanjut ke Data Pendukung</button>
                <?php else: ?> 
                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-signature"></i> Simpan Perubahan</button>
				<?php endif; ?>
                    
                </div>
            </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <?php if($lhp->tempat_kejadian!=null): ?>
        <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Data Pendukung</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <div class="form-group">
                    <label for=""> <span class="size-10 mb-0">Daftar Nama Pelaku </span> <span
                            class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#pelaku">
                            <i class="fas fa-plus"></i>
                        </span></label>
                    <table class="mt-0 ml-4 table-sm">
                        <tbody class="">
                            <?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_pelaku => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-bold"><?php echo e(++$no_pelaku); ?>.</td>
                                    <td class="" colspan=""><?php echo e($item->nama); ?> (<?php echo e($item->status); ?>)</td>
                                    <td>
                                        <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                            data-target="#pelaku">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4">
                                        <p class="">Pelaku belum di tambahkan.</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php $__errorArgs = ['nm_saksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger">Nama saksi tidak boleh kososng</div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>


                <div class="form-group">
                    <label for=""> <span class="size-10 mb-0">Daftar Nama Saksi </span> <span
                            class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#saksi">
                            <i class="fas fa-plus"></i>
                        </span></label>
                    <table class="mt-0 ml-4 table-sm">
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $lhp->tim->berita_acara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_ba => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-bold"><?php echo e(++$no_ba); ?>.</td>
                                    <td colspan="2"><?php echo e($item->nama); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td></td>
                                    <td colspan="2"></td>
                                </tr>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $lhp->saksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nos => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-bold"><?php echo e(++$nos); ?>.</td>
                                    <td colspan=""><?php echo e($item->nama); ?></td>
                                    <td>
                                        <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                            data-target="#saksi">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td></td>
                                    <td colspan="2"></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php $__errorArgs = ['nm_saksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger">Nama saksi tidak boleh kososng</div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for=""> <span class="size-10 mb-0"> Bukti Pendukung </span> <span
                            class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#bukti">
                            <i class="fas fa-plus"></i>
                        </span></label>
                    <table class="mt-0 ml-4 table-sm">
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $lhp->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_bukti => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-bold"><?php echo e(++$no_bukti); ?>.</td>
                                    <td class="" colspan=""><?php echo e($item->nama); ?> <span
                                            class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                            data-target="#pelaku">
                                            <i class="fas fa-trash"></i>
                                        </span></td>

                                </tr>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4">
                                        <p class="">Bukti belum di tambahkan</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php $__errorArgs = ['nm_saksi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger">Nama saksi tidak boleh kososng</div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
	
    <div class="col-md-12 mb-4">
		<?php if($lhp->status_lhp=='penelusuran'): ?>
			<a href="/tim/<?php echo e($lhp->id_tim); ?>" class="btn btn-secondary ">Tim <?php echo e(($lhp->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan')); ?></a>
		<?php else: ?>
			<a href="/tim/<?php echo e($lhp->id_tim); ?>/pengawasan" class="btn btn-secondary ">Tim <?php echo e(($lhp->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan')); ?></a>
		<?php endif; ?>
		
    </div>
    <?php endif; ?>

</div>



<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Bukti Pendukung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/lhp/bukti/add" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input hidden type="text" placeholder="Nama Saksi" name="id_lhp" value="<?php echo e($lhp->id); ?>"
                            class="form-control">
                        <input type="text" placeholder="Nama Pelaku" name="nama" id="nama_pelaku" class="form-control">
                        <div class="form-group mt-2">
                            <!-- <label for="customFile">Custom File</label> -->

                            <div class="custom-file">
                                <input type="file" name="img" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <input type="submit" name="konfirmasi" value="Tambahkan"
                            class="hapus btn btn-primary btn-sm mt-2 float-right">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>




<div class="modal fade" id="pelaku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Pelaku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/lhp/pelaku/add" method="post">
                        <?php echo csrf_field(); ?>
                        <input hidden type="text" placeholder="Nama Saksi" name="id_lhp" value="<?php echo e($lhp->id); ?>"
                            class="form-control">
                        <input type="text" placeholder="Nama Pelaku" name="nama" id="nama_pelaku" class="form-control">
                        <input type="text" placeholder="Status" name="status" id="status_pelaku"
                            class="form-control mt-2">
                        <input type="submit" name="konfirmasi" value="Tambahkan"
                            class="btn btn-primary btn-sm mt-2 float-right">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="saksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambahkan Saksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="/lhp/saksi/add" method="post">
                        <?php echo csrf_field(); ?>
                        <input hidden type="text" placeholder="Nama Saksi" name="id_lhp" value="<?php echo e($lhp->id); ?>"
                            class="form-control">
                        <input type="text" placeholder="Nama Saksi" name="nama" id="nm_saksi" class="form-control">
                        <input type="submit" name="konfirmasi" value="Tambahkan"
                            class="btn btn-primary btn-sm mt-1 float-right">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/lhp_penelusuran_dugaan_pelanggaran.blade.php ENDPATH**/ ?>