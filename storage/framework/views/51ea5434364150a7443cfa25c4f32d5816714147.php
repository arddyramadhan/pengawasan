<?php $__env->startSection('title', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('judul', 'Edit Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('menu', 'Laporan Hasil Pengawasan'); ?>
<?php $__env->startSection('sub', 'Edit'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(4) ? '' : 'active'); ?>" href="/lhp/<?php echo e($lhp->id); ?>/edit">Laporan Hasil Pengawasan</a></li>
                    <?php if($lhp->dugaan == 'ada'): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(4)=='pendukung' ? 'active' : ''); ?>" href="/lhp/<?php echo e($lhp->id); ?>/edit/pendukung">Data Pendukung</a></li>
                        <li class="nav-item"><a class="nav-link" href="#lampiran" data-toggle="tab">Bukti Pendukung</a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane <?php echo e(Request::segment(4) ? '' : 'active'); ?>" id="activity">
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

                                    value="tidak">Tidak Langsung</option>
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
                            <label for="uraian_hasil">Uraian Hasil Pengawasan</label>
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
                        
                        <?php if($lhp->dugaan == 'ada'): ?>
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
                        <?php endif; ?>
                        <div class="form-group ">
                            <div class="col-md-12 mb-4 d-flex justify-content-between">
                                <div class="row">
                                    <a href="/lhp/<?php echo e($lhp->id); ?>/detail" class="btn btn-default mr-3 "><i class="fas fa-info"></i> Detail Laporan</a>
                                    <?php if($lhp->status_lhp=='penelusuran'): ?>
                                    <a href="/tim/<?php echo e($lhp->id_tim); ?>" class="btn btn-secondary "><i class="fas fa-users"></i> Detail Tim</a>
                                    <?php else: ?>
                                        <a href="/tim/<?php echo e($lhp->id_tim); ?>/pengawasan" class="btn btn-secondary "><i class="fas fa-users"></i> Detail Tim</a>
                                    <?php endif; ?>
                                </div>
                                
                                <button type="submit" class="btn btn-primary"><i class="fas fa-file-signature"></i> Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane <?php echo e(Request::segment(4)=='pendukung' ? 'active' : ''); ?>" id="timeline">
                        <div class="form-group">
                            <label for=""> <span class="size-10 mb-0">Daftar Nama Pelaku </span> <span
                                    class="btn btn-white btn-sm  text-primary" data-toggle="modal" data-target="#pelaku">
                                    <i class="fas fa-plus"></i>
                                </span></label>
                            <table class="mt-0 ml-4 table-sm">
                                <tbody class="">
                                    <?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_pelaku => $item_pelaku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-bold"><?php echo e(++$no_pelaku); ?>.</td>
                                            <td class="" colspan=""><?php echo e($item_pelaku->nama); ?> (<?php echo e($item_pelaku->status); ?>)</td>
                                            <td>
                                                <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                                    data-target="#pelaku_delete<?php echo e($item_pelaku->id); ?>">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="4">
                                                <p class="">Pelaku Belum Ditambahkan.</p>
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
                                    <?php
                                        $nomrs = 0;
                                    ?>
                                    
                                    <?php $__empty_1 = true; $__currentLoopData = $lhp->saksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nos => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-bold"><?php echo e(++$nomrs); ?>.</td>
                                            <td colspan=""><?php echo e($item->nama); ?></td>
                                            <td>
                                                <span class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                                    data-target="#saksi_delete<?php echo e($item->id); ?>">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">Saksi-saksi Belum Ditambahkan</td>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $lhp->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_bukti => $item_bukti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="text-bold"><?php echo e(++$no_bukti); ?>.</td>
                                            <td class="" colspan=""><?php echo e($item_bukti->nama); ?> <span
                                                    class="btn btn-white btn-sm  text-danger" data-toggle="modal"
                                                    data-target="#bukti_delete<?php echo e($item_bukti->id); ?>">
                                                    <i class="fas fa-trash"></i>
                                                </span></td>

                                        </tr>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="4">
                                                <p class="">Bukti Belum Ditambahkan</p>
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
                        <div class="form-group ">
                            <div class="col-md-12 mb-4 d-flex justify-content-between">
                                <?php if($lhp->status_lhp=='penelusuran'): ?>
                                    <a href="/tim/<?php echo e($lhp->id_tim); ?>" class="btn btn-secondary ">Kembali</a>
                                <?php else: ?>
                                    
                                    <a href="/tim/<?php echo e($lhp->id_tim); ?>/pengawasan" class="btn btn-secondary ">Kembali</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="lampiran">
                        <table class="table table-borderless mt-0 ml-4 table-sm" width="98%">
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $lhp->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no_bukti => $item_bukti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="text-bold" width="2%"><?php echo e(++$no_bukti); ?>.</td>
                                        <td class="text-bold" width="98%" colspan=""><?php echo e($item_bukti->nama); ?></td>

                                    </tr>
                                    <?php if($item_bukti->img!=null): ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="">
                                                <img width="60%" class="mb-5" src="<?php echo e(asset('storage/'.$item_bukti->img)); ?>" alt="">
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td></td>
                                            <td colspan="">
                                                  <p class="text-bold">Bukti Foto tidak di upload</p>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="2">
                                            <p class="">Bukti Belum Ditambahkan</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
        
    
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
                        <input type="text" placeholder="Nama Bukti" name="nama" id="nama_pelaku" class="form-control">
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


<?php $__empty_1 = true; $__currentLoopData = $lhp->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bukti_del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="modal fade" id="bukti_delete<?php echo e($bukti_del->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus bukti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Hapus bukti <span class="text-danger text-bold"><?php echo e($bukti_del->nama); ?></span>..??</h5>
                    <div class="form-group d-flex justify-content-end">
                        <form action="/lhp/bukti/<?php echo e($bukti_del->id); ?>/delete" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>




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


<?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelaku_del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="modal fade" id="pelaku_delete<?php echo e($pelaku_del->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pelaku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Hapus pelaku atas nama <span class="text-danger text-bold"><?php echo e($pelaku_del->nama); ?></span>..??</h5>
                    <div class="form-group d-flex justify-content-end">
                        <form action="/lhp/pelaku/<?php echo e($pelaku_del->id); ?>/delete" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    
<?php endif; ?>


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


<?php $__empty_1 = true; $__currentLoopData = $lhp->saksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saksi_del): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="modal fade" id="saksi_delete<?php echo e($saksi_del->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus saksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Hapus saksi atas nama <span class="text-danger text-bold"><?php echo e($saksi_del->nama); ?></span>..??</h5>
                    <div class="form-group d-flex justify-content-end">
                        <form action="/lhp/saksi/<?php echo e($saksi_del->id); ?>/delete" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/lhp_edit.blade.php ENDPATH**/ ?>