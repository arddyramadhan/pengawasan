<?php $__env->startSection('title', 'Tingkatan'); ?>
<?php $__env->startSection('judul', 'Tingkatan'); ?>
<?php $__env->startSection('menu', 'Data'); ?>
<?php $__env->startSection('sub', 'Tingkatan'); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    
    

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary collapsed-card">
                <div class="card-header">
                    <h2 class="card-title">Tingkatan</h2>
                    <div class="card-tools">
                        
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <form action="/tingkatan/create" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="nm_tingkatan">Nama tingkatan</label>
                            <input type="text" id="nm_tingkatan" name="nm_tingkatan" class="form-control">
                            <?php $__errorArgs = ['nm_tingkatan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">tingkatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group">
                            <label>Lainnya</label>
                            <select class="form-control" name="lainnya">
                                <option selected disabled value="">Select one</option>
                                <option value="Bawaslu">Bawaslu</option>
                                <option value="Panwaslu">Panwaslu</option>
                                <option value="Panwas">Panwas</option>
                                <option value="PTPS">PTPS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select one</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                <input type="submit" value="Create new" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </div>

    </div>
    
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Tingkatan</th>
                    <th>Status</th>
                    <th>diBuat</th>
                    <th>diUbah</th>
                    <th colspan="2" style="text-align: center">Aksi</th>
                    
                </tr>
            </thead>
            <tbody id="coba">
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(++$no); ?></td>
                        <td><?php echo e($item->nm_tingkatan); ?></td>
                        <td>
                            <?php echo e($item->status); ?>

                        </td>
                        <td>
                            <?php echo e($item->created_at); ?>

                        </td>
                        <td>
                            <?php echo e($item->updated_at); ?></td>
                        <td colspan="2" class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#exampleModal<?php echo e($item->id); ?>">
                                Edit
                                
                            </button>

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
<!-- Button trigger modal -->


<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo e($item2->id); ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e($item2->nm_tingkatan); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/tingkatan/<?php echo e($item2->id); ?>/update" method="post">
                        <?php echo method_field('patch'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="nm_tingkatan">Nama tingkatan</label>
                            <input readonly value="<?php echo e($item2->nm_tingkatan); ?>"
                                type="text" name="nm_tingkatan" id="nm_tingkatan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Lainnya</label>
                            <select class="form-control" name="lainnya">
                                <option <?php echo e($item2->lainnya=='Bawaslu' ? 'selected' : ''); ?>  value="Bawaslu">Bawaslu</option>
                                <option <?php echo e($item2->lainnya=='Panwaslu' ? 'selected' : ''); ?> value="Panwaslu">Panwaslu</option>
                                <option <?php echo e($item2->lainnya=='Panwas' ? 'selected' : ''); ?> value="Panwas">Panwas</option>
                                <option <?php echo e($item2->lainnya=='PTPS' ? 'selected' : ''); ?> value="PTPS">PTPS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option <?php echo e($item2->status=='yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e($item2->status=='no' ? 'selected' : ''); ?> value="no">No</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/tingkatan.blade.php ENDPATH**/ ?>