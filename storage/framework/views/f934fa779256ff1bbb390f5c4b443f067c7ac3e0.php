<?php $__env->startSection('title', 'Informasi Masyarakat'); ?>
<?php $__env->startSection('judul', 'Informasi Masyarakat'); ?>
<?php $__env->startSection('menu', 'Informasi Masyarakat'); ?>
<?php $__env->startSection('sub', 'Detail'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail informasi</h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <table class="table table-sm
                    
                    table-borderless
                    " width="100%">
                        
                        <tr>
                            <td width="16%">Kode Laporan</td>
                            <th width="1%">:</th>
                            <th width="83%">IM-<?php echo e(sprintf("%04d", $informasi->id)); ?></th>
                        </tr>
                        <tr>
                            <td width="16%">Nama Pelapor</td>
                            <th width="1%">:</th>
                            <th width="83%"><?php echo e($informasi->nama); ?></th>
                        </tr>
                        <tr>
                            <td width="16%">NIK</td>
                            <th width="1%">:</th>
                            <th width="83%"><?php echo e($informasi->ktp); ?></th>
                        </tr>
                        <tr>
                            <td width="16%">Telephone</td>
                            <th width="1%">:</th>
                            <th width="83%"><?php echo e($informasi->telp); ?>

                                
                            </th>

                        </tr>
                        <tr>
                            <td width="16%">Alamat</td>
                            <th width="1%">:</th>
                            <th width="83%"><?php echo e($informasi->alamat); ?></th>
                        </tr>
                        
                    </table>
                </div>
                
                <div class="mailbox-controls with-border text-center">
                    <div class="btn-group">
                        <?php if(Auth::user()->level == 'admin'): ?>
                        
                        <?php endif; ?>
                        <?php if($informasi->status != 'diproses'): ?>
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Buat Form A6"
                            data-toggle="modal" data-target="#exampleModalformA6">
                            <i class="fas fa-clipboard-check"></i>
                            </button>
                        <?php endif; ?>
                        <?php if(($informasi->status=='dibaca' || $informasi->status=='alihkan') && (Auth::user()->level=='admin' && Auth::user()->id_tingkatan <=2 )): ?> 
                            <button type="button" class="btn btn-default btn-sm" data-container="body" title="Tambahkan Pengawas" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-user-plus"></i> </button>
                        <?php endif; ?>

                    </div>
                    <?php if($informasi->status == 'dibaca' && Auth::user()->level=='admin' &&
                    Auth::user()->id_tingkatan==1): ?>
                    <button type="button" class="btn btn-default btn-sm" title="Alihkan" data-toggle="modal"
                        data-target="#alihkan">
                        <i class="fas fa-share"></i>
                    </button>
                    <?php endif; ?>
                </div>
                
                <!-- /.mailbox-controls -->
                <div class="mailbox-read-message pl-4 pr-4">
                    <p>Uraian singkat kejadian,</p>

                    <p><?php echo e($informasi->deskripsi); ?></p>

                    <?php if($informasi->img_bukti!=null): ?>
                    <div class="card ml-3" style="width: 60%; height: auto;">
                        <span class='zoom' id='ex1'>
                            <img src="<?php echo e(asset('storage/'.$informasi->img_bukti)); ?>" class="card-img-top" alt="...">
                        </span>
                    </div>
                    <?php endif; ?>
                    <p>Thanks,<br><?php echo e($informasi->nama); ?></p>
                </div>


                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
                <div class="float-right">
                    <?php if($informasi->status != 'diproses'): ?>
                    <button type="button" class="btn btn-default" data-toggle="modal"
                        data-target="#exampleModalformA6"><i class="fas fa-clipboard-check"></i> Buatkan Informasi
                        Awal</button>
                    <?php endif; ?>
                    <?php if(($informasi->status == 'dibaca' || $informasi->status == 'alihkan') &&
                    (Auth::user()->level=='admin' && Auth::user()->id_tingkatan ==1 )): ?>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"><i
                            class="fas fa-user-plus"></i> Tambahakan
                        Pengawas</button>
                    <?php endif; ?>
                    <?php if($informasi->status == 'diproses'): ?>
                    <a href="/informasi_awal/<?php echo e($informasi->informasi_awal->id); ?>/detail" class="btn btn-default"><i
                            class="fas fa-eye"></i> Lihat Form A6</a>
                    <?php endif; ?>
                    <?php if($informasi->status == 'dibaca' && Auth::user()->level=='admin' && Auth::user()->id_tingkatan==1): ?>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#alihkan"><i
                            class="fas fa-share"></i> Alihkan</button>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>



    
    

    <div class="modal fade" id="alihkan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alihkan Ke Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/informasi/<?php echo e($informasi->id); ?>/alihkan" method="post">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group">
                            <label for="inputStatus">Alihkan</label>
                            <select class="form-control" name="id_kecamatan">
                                <option selected disabled value="">Choose One!!</option>
                                <?php $__currentLoopData = $alih; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"> Kecamatan <?php echo e($item->nama); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan Pengawas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Pengawas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/informasi/<?php echo e($informasi->id); ?>/2" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        
                        <div class="form-group">
                            <label for="inputStatus">Teruskan</label>
                            <select class="form-control" name="id_user">
                                <option selected disabled value="">Choose One!!</option>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::user()->id_tingkatan == 1): ?>
                                <?php if($item->id_tingkatan==Auth::user()->id_tingkatan): ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>

                                    (<?php echo e($item->jabatan->nm_jabatan); ?>)</option>
                                <?php endif; ?>
                                <?php else: ?>
                                <?php if(($item->id_tingkatan==Auth::user()->id_tingkatan) &&
                                ($item->id_kecamatan==Auth::user()->id_kecamatan)): ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>

                                    (<?php echo e($item->jabatan->nm_jabatan); ?>)</option>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan Pengawas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="exampleModalformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Form A6 Informasi Awal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if($informasi->status == 'dibaca'): ?>
                    <form action="/informasi_awal/<?php echo e($informasi->id); ?>/lanjutform" method="post">
                        <?php echo csrf_field(); ?>
                        
                        <?php else: ?>
                        <form action="/informasi_awal/<?php echo e($informasi->id); ?>/updatelanjutform" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <?php endif; ?>
                            


                            <div class="form-group">
                                <label for="peristiwa">Peristiwa</label>
                                <input type="text" name="peristiwa" placeholder="Peristiwa" id="peristiwa"
                                    class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="tempat_kejadian">Tempat Kejadian</label>
                                <input type="text" name="tempat_kejadian" placeholder="Tempat Kejadian"
                                    id="tempat_kejadian" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal dan waktu kejadian <span class="text-danger text-sm">**</span></label>
                                <input type="datetime-local" name="waktu_tgl_kejadian" class="form-control">
                                <input type="datetime-local" hidden name="waktu_kejadian" class="form-control"
                                    value="<?php echo e($informasi->waktu_kejadian); ?>">

                            </div>
                            <div class="form-group">
                                <label for="terlapor">Terlapor</label>
                                <input type="text" placeholder="Terlapor" name="terlapor" id="terlapor"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_terlapor">Alamat Terlapor</label>
                                <input type="text" name="alamat_terlapor" placeholder="Alamat Terlapor"
                                    id="alamat_terlapor" class="form-control">
                            </div>
                            <div class="form-group mb-4">
                                <label>Uraian Kejadian <span class="text-danger text-sm">**</span></label>
                                <textarea class="form-control summernote" name="uraian_kejadian" rows="4"
                                    placeholder="<?php echo e($informasi->deskripsi); ?>"></textarea>
                                <textarea class="form-control" hidden name="deskripsi"
                                    rows="4"><?php echo e($informasi->deskripsi); ?></textarea>
                            </div>
                            <div class="form-group">
                                <p class="text-danger">Penting : <br> ** Boleh di kososngkan jika ingin menggunakan data
                                    dari Informasi Masyarakat</p>
                            </div>
                </div>
                <div class="modal-footer">

                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('scripts'); ?>
    <script src='/assets/jquery.zoom.js'></script>
    <script>
        $(document).ready(function () {
            $('#ex1').zoom();
            $('#ex2').zoom({
                on: 'grab'
            });
            $('#ex3').zoom({
                on: 'click'
            });
            $('#ex4').zoom({
                on: 'toggle'
            });
        });

    </script>
    <?php $__env->stopPush(); ?>

    <?php echo $__env->make('sess/flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/detail_laporan_masyarakat.blade.php ENDPATH**/ ?>