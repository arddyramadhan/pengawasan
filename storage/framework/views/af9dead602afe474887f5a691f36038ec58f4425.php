<?php $__env->startSection('title', 'Informasi Awal'); ?>
<?php $__env->startSection('judul', 'Informasi Awal (A6)'); ?>
<?php $__env->startSection('menu', 'Informasi'); ?>
<?php $__env->startSection('sub', 'Informasi Awal'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
<?php
    $sts_lengkapi = 'tidak';
    $jum_lengkapi = 0;
    $sts_buat_tim = 'tidak';
    $jum_buat_tim = 0;
?>
<?php $__empty_1 = true; $__currentLoopData = $lengkapi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item_lengkapi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if($item_lengkapi->status=='lengkapi'): ?>
        <?php
            ++$jum_lengkapi;
            $sts_lengkapi = 'ada';            
        ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>

<?php $__empty_1 = true; $__currentLoopData = $buat_tim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item_buat_tim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if($item_buat_tim->status=='buat_tim'): ?>
        <?php
            ++$jum_buat_tim;
            $sts_buat_tim = 'ada';            
        ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>  
<?php endif; ?>

<?php
    $sts_alihkan = 'tidak';
    $jum_alihkan = 0;
?>
<?php $__empty_1 = true; $__currentLoopData = $data_antrian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $antri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php if($antri->status=='alihkan' && $antri->alihkan->id_kecamatan == Auth::user()->id_kecamatan): ?>
        <?php
            ++$jum_alihkan;
            $sts_alihkan = 'ada';            
        ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>    
<?php endif; ?>


	<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-md-12">
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalformA6"><i class="fas fa-plus"></i>  Informasi Awal</button>
		</div>
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
					<?php if($sts_alihkan == 'ada' && Auth::user()->level=='admin' && Auth::user()->id_tingkatan==2): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='alihkan' ? 'active' : ''); ?>" href="/informasi_awal/alihkan">Perlu Ditangani <span class="right badge badge-sm badge-danger"><?php echo e($jum_alihkan); ?></span></a></li>                        
                    <?php endif; ?>
                    <?php if($sts_lengkapi == 'ada'): ?>
                        <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='lengkapi' ? 'active' : ''); ?>" href="/informasi_awal/lengkapi">Lengkapi <span class="right badge badge-sm badge-danger"><?php echo e($jum_lengkapi); ?></span></a> </li>                        
                    <?php endif; ?>

                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2) ? '' : 'active'); ?>" href="/informasi_awal">Semua</a></li>

                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='diproses' ? 'active' : ''); ?>" href="/informasi_awal/diproses">Diproses</a></li>
					<?php if((Auth::user()->level=='admin') || ((Auth::user()->id_jabatan <= 2) && (Auth::user()->id_tingkatan <= 2)) ): ?>
						<?php if($sts_buat_tim == 'ada'): ?>
							<li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='buat_tim' ? 'active' : ''); ?>" href="/informasi_awal/buat_tim">Buatkan Tim <span class="right badge badge-sm badge-danger"><?php echo e($jum_buat_tim); ?></span></a> </li>  
						<?php endif; ?>
					<?php endif; ?>
					<li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='tim_dibuat' ? 'active' : ''); ?>" href="/informasi_awal/tim_dibuat">Tim Penelusuran</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo e(Request::segment(2)=='ditolak' ? 'active' : ''); ?>" href="/informasi_awal/tolak">Ditolak</a></li>

					
                    
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    
					<?php if(Request::segment(2)=='alihkan'): ?>
						<div class="active tab-pane" id="">
							<div class="timeline" id="informasi" style="z-index: 1;">
								<?php
								$nos = date('ymd');
								?>
								<?php $__currentLoopData = $alihkan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
								$tgl = date('ymd', strtotime($item->created_at));
								?>
								<?php if($nos!=$tgl): ?>
								<div class="time-label">
									<span class="bg-red"><?php echo e($item->created_at->format('d F Y')); ?></span>
								</div>
								<?php
								$nos = $tgl;
								?>
								<?php elseif(date('ymd')==$tgl && $no==0): ?>
								<div class="time-label">
									<span class="bg-red">Laporan Hari Ini</span>
								</div>
								<?php endif; ?>


								<div>
									<i class="fas fa-envelope bg-blue"></i>
									<div class="timeline-item">
										<span class="time"><i class="fas fa-clock"></i><?php echo e($item->status); ?></span>
										<h3 class="timeline-header"><a href="/informasi/<?php echo e($item->id); ?>/show"> <?php echo e($item->nama); ?></a> <strong>|</strong> <span
												class="text-danger text-bold">IM-<?php echo e(sprintf("%04d", $item->id)); ?></span>
											<?php if($item->status == 'dibaca'): ?>
												 <strong>|</strong> Belum di tangani 
											<?php elseif($item->status == 'ditangani'): ?>
												<?php if(Auth::user()->id == $item->informasi_awal->user->id): ?>
												 <strong>|</strong> Ditangani : Saya
												<?php else: ?>
												 <strong>|</strong> <?php echo e($item->informasi_awal->user->name); ?>

												<?php endif; ?>
											<?php elseif($item->status == 'diproses'): ?>
												<?php if(Auth::user()->id == $item->informasi_awal->user->id): ?>
												 <strong>|</strong> Diproses : Saya
												<?php else: ?>
												  <strong>|</strong> Diproses : <?php echo e($item->informasi_awal->user->name); ?> 
												<?php endif; ?>
											<?php elseif($item->status == 'alihkan'): ?>
												 <strong>|</strong> Dialihkan : Kecamatan <?php echo e($item->alihkan->kecamatan->nama); ?>

											<?php endif; ?>
										</h3>
										<div class="timeline-body">
											<?php echo $item->deskripsi; ?>

										</div>
										<div class="timeline-footer">
											<a href="/informasi/<?php echo e($item->id); ?>/show" class="btn btn-primary btn-sm text-white">
												<strong>Lihat</strong></a>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div>
									<i class="fas fa-clock bg-gray"></i>
									<div class="float-right pr-3">
										<?php echo e($data->links()); ?>

									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<div class="active tab-pane" id="">
							<div class="timeline">
								<?php
									$nos = date('ymd');
								?>
									<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
											if (Request::segment(2)) {
												$tgl = date('ymd', strtotime($item->updated_at));
											} else {
												$tgl = date('ymd', strtotime($item->created_at));
											}
											

										?>
										<?php if($nos!=$tgl): ?>
											<div class="time-label">
												<?php if(Request::segment(2)): ?>
													<span class="bg-red"><?php echo e($item->updated_at->format('d F Y')); ?></span>
												<?php else: ?>
													<span class="bg-red"><?php echo e($item->created_at->format('d F Y')); ?></span>
												<?php endif; ?>
											</div>
											<?php
												$nos = $tgl;
											?>
										<?php elseif(date('ymd')==$tgl && $no==0): ?>
											<div class="time-label">
												<span class="bg-red">Laporan Hari Ini</span>
											</div>
										<?php endif; ?>
										<div>
											<i class="fas fa-envelope bg-blue"></i>
											<div class="timeline-item">
												<span class="time"><i class="fas fa-clock"></i>
													
													
                                            
                                               	<?php if($item->status=='lengkapi'): ?>
														Perlu Dilengkapi 
													<?php elseif($item->status=='diproses'): ?>
														Diproses pada : <?php echo e($item->updated_at->diffForHumans()); ?>

													<?php elseif($item->status=='buat_tim'): ?>
														Diplenokan : <?php echo e($item->updated_at->diffForHumans()); ?>

													<?php elseif($item->status=='tim_dibuat'): ?>
														Pembantukan Tim : <?php echo e($item->updated_at->diffForHumans()); ?>

													<?php else: ?>
														Laporan Tidak Diterima
													<?php endif; ?>
                                            
													
												</span>
												<h3 class="timeline-header"><a href=""> <?php echo e($item->informasi->nama); ?></a>
													<strong>|</strong> Kode : <span class="text-danger text-bold">IA<?php echo e(sprintf("%04d", $item->id)); ?></span>
													<?php if($item->status == 'lengkapi'): ?>
														<?php if(Auth::user()->id == $item->id_user): ?>
															<strong>|</strong> Dilengkapi : Saya
														<?php else: ?>
															 <strong>|</strong> Dilengkapi : <?php echo e($item->user->name); ?> 
														<?php endif; ?>
													<?php elseif($item->informasi->status == 'ditangani'): ?>
														<?php if(Auth::user()->id == $item->id_user): ?>
															<strong>|</strong> Ditanganni : Saya
														<?php else: ?>
															 <strong>|</strong> Ditanganni : <?php echo e($item->user->name); ?> 
														<?php endif; ?>
													<?php elseif($item->informasi->status == 'diproses'): ?>
														<?php if(Auth::user()->id == $item->id_user): ?>
															<strong>|</strong> Ditanganni : Saya
														<?php else: ?>
															<strong>|</strong> Ditanganni : <?php echo e($item->user->name); ?>

														<?php endif; ?>
													<?php else: ?>
														<?php if(Auth::user()->id == $item->id_user): ?>
														
														<?php else: ?>
															 <?php echo e($item->user->name); ?> 
														<?php endif; ?>
													<?php endif; ?>

												</h3>
												<div class="timeline-body">
												<?php if($item->status=='lengkapi'): ?>
													<?php echo $item->informasi->deskripsi; ?>

												<?php else: ?>
													<?php echo $item->uraian_kejadian; ?>

												<?php endif; ?>
													
												</div>
												<div class="timeline-footer">
													
													<?php if($item->status=='lengkapi'): ?>
														<form action="/informasi/<?php echo e($item->id_informasi); ?>/1" method="post">
															<?php echo csrf_field(); ?>
															<?php echo method_field('PATCH'); ?>
															
															<button class="btn btn-primary btn-sm text-white" type="submit">
																<strong>Lihat</strong></button>
														</form>
													<?php else: ?>
														<a href="/informasi_awal/<?php echo e($item->id); ?>/detail" class="btn btn-primary btn-sm text-white">Lihat</a>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div>
									<i class="fas fa-clock bg-gray"></i>
									<div class="float-right pr-3">
										<?php echo e($data->links()); ?>

									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
                    

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

<div class="modal fade" id="exampleModalformA6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Langsung Informasi Awal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/informasi_awal/buatlangsung" method="post">
				<?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama Pelapor</label>
                    <input type="text" name="nama" placeholder="Nama" id="nama" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="alamat">Telephon</label>
                    <input type="text" name="telp" placeholder="Telp Pelapor" id="alamat" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="ktp">No Ktp <span class="text-danger text-sm">**</span></label>
                    <input type="text" name="ktp" placeholder="No Ktp" id="ktp" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Pelapor</label>
                    <input type="text" name="alamat" placeholder="Alamat Terlapor" id="alamat" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="saksi1">Nama Saksi <span class="text-danger text-sm">**</span></label>
                    <input type="text" name="saksi1" placeholder="Nama Saksi" id="saksi1" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="alamat1">Alamat Saksi <span class="text-danger text-sm">**</span></label>
                    <input type="text" name="alamat1" placeholder="Alamat Saksi" id="alamat1" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="peristiwa">Peristiwa</label>
                    <input type="text" name="peristiwa" placeholder="Peristiwa" id="peristiwa" class="form-control">
                    
                </div>
                <div class="form-group">
                    <label for="tempat_kejadian">Tempat Kejadian</label>
                    <input type="text" name="tempat_kejadian" placeholder="Tempat Kejadian" id="tempat_kejadian"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal dan waktu kejadian <span class="text-danger text-sm">**</span></label>
                    <input type="datetime-local" value="<?php echo e(date('Y-m-d\TH:i')); ?>" name="waktu_kejadian" class="form-control">
                   
                </div>
                <div class="form-group">
                    <label for="terlapor">Terlapor <span class="text-danger text-sm">**</span></label>
                    <input type="text" placeholder="Terlapor" name="terlapor" id="terlapor" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat_terlapor">Alamat Terlapor <span class="text-danger text-sm">**</span></label>
                    <input type="text" name="alamat_terlapor" placeholder="Alamat Terlapor" id="alamat_terlapor"
                        class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label>Uraian Kejadian</label>
                    <textarea class="form-control summernote" name="deskripsi" rows="5" placeholder=""></textarea>
                    
                </div>
                <div class="form-group">
                    <p class="text-danger">Penting : <br> ** Boleh di kososngkan jika ingin menggunakan data dari Informasi Masyarakat</p>
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

<div class="col-md-12">
	<!-- The time line -->
	
</div>
<!-- /.col -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/informasi_awal.blade.php ENDPATH**/ ?>