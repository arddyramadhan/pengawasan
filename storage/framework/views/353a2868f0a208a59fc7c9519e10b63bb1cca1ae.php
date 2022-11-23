<?php $__env->startSection('title', 'Tim Penelusuran'); ?>
<?php $__env->startSection('judul', 'Detail Tim'); ?>
<?php $__env->startSection('menu', 'Tim Penelusuran'); ?>
<?php $__env->startSection('sub', 'Detail'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<?php echo $__env->make('sess/flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Detail</h3>
                <div class="card-tools">
					<?php if(Auth::user()->id==$tim->id_user): ?>
						<button class="btn btn-tool text-success" data-toggle="modal" data-target="#edittim"><i class="fas fa-edit"></i></button>
					<?php endif; ?>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">

                    <table class="table table-borderless" width="100%">
                        <tr>
                            <td width="15%">Penelusuran</td>
                            <th width="1%">:</th>
                            <th width="94%"><?php echo e($tim->nama); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Ketua Tim</td>
                            <th width="1%">:</th>
                            <th width="94%">
								
								<?php
									$sts_ketua = "<button class='btn btn-sm btn-primary' data-toggle='modal' data-target='#ketua'>Tentukan Ketua Tim</button>";
								?>
                                <?php $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->status=='ketua'): ?>
                                        <?php
											$sts_ketua = $item->user->name;
                                            break;
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php echo $sts_ketua; ?>

								
                            </th>
                        </tr>

						<tr>
                            <td width="15%">Surat Keputusan</td>
                            <th width="1%">:</th>
                            <th width="94%"><?php echo $tim->no_sk. ($tim->no_sk!=null ? '<button class="btn btn-link" data-toggle="modal" data-target="#sk"><i class="fas fa-eye"></i></button>' : ''); ?></th>
                        </tr>
						
						<?php if($tim->st_ketua != null || $tim->st_sekretaris != null): ?>
						<tr>
                            <td width="15%">Surat Tugas</td>
                            <th width="1%">:</th>
                            <th width="94%"><?php echo ($tim->st_ketua != null ? $tim->st_ketua. '( Ketua ) <button class="btn btn-link" data-toggle="modal" data-target="#st_ketua"><i class="fas fa-eye"></i></button> ' : $tim->st_sekretaris.' ( Sekretaris ) <button class="btn btn-link" data-toggle="modal" data-target="#st_sekretaris"><i class="fas fa-eye"></i></button>' ); ?></th>
                        </tr>
						<tr <?php echo e(($tim->st_ketua == null ? 'hidden' : ' ')); ?> <?php echo e(($tim->st_sekretaris == null ? 'hidden' : ' ')); ?>>
                            <td width="15%"></td>
                            <th width="1%"></th>
                            <th width="94%"><?php echo $tim->st_sekretaris.' ( Sekretaris ) <button class="btn btn-link" data-toggle="modal" data-target="#st_sekretaris"><i class="fas fa-eye"></i></button>'; ?></th>
                        </tr>
						<?php endif; ?>

						<tr>
                            <td width="15%">Waktu</td>
                            <th width="1%">:</th>
                            <th width="94%">
								<?php if($tim->selesai == null): ?>
									<?php echo e(date('d M Y', strtotime($tim->mulai))); ?>

								<?php else: ?>
									<?php echo e(date('d M Y', strtotime($tim->mulai)).' s/d '.date('d M Y', strtotime($tim->selesai))); ?>

								<?php endif; ?>
							</th>
                        </tr>
                    </table>
                    <div class="mailbox-controls text-center table-responsive">
                        <table class="table table-borderless col-md-8">
                            <thead class="">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody id="coba">
								<?php
									$no=0;
								?>
                                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->status == 'ketua'): ?>
                                        <tr>
                                            <td><?php echo e(++$no); ?></td>
                                            <td><?php echo e($item->user->name); ?></td>
                                            <td>
												<?php if(($item->user->jabatan->sebagai=='ketua') || ($item->user->jabatan->sebagai=='anggota') ): ?>
													<?php echo e($item->user->jabatan->nm_jabatan.' '.$item->user->tingkatan->lainnya.' '.$item->user->tingkatan->nm_tingkatan); ?>

												<?php else: ?>
													<?php echo e($item->user->jabatan->nm_jabatan); ?>

												<?php endif; ?>
											</td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <div class="alert alert-danger alert-sm">Ketua belum di tentukan</div>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->status == 'anggota'): ?>
										<?php if($item->user->jabatan->sebagai=='ketua'): ?>
											<tr>
												<td><?php echo e(++$no); ?></td>
												<td><?php echo e($item->user->name); ?></td>
												<td>
													<?php if(($item->user->jabatan->sebagai=='ketua') || ($item->user->jabatan->sebagai=='anggota') ): ?>
														<?php echo e($item->user->jabatan->nm_jabatan.' '.$item->user->tingkatan->lainnya.' '.$item->user->tingkatan->nm_tingkatan); ?>

													<?php else: ?>
														<?php echo e($item->user->jabatan->nm_jabatan); ?>

													<?php endif; ?>
												</td>
	                                        </tr>
										<?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <div class="alert alert-danger alert-sm">
                                                Ketua belum di tentukan
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->status == 'anggota'): ?>
										<?php if($item->user->jabatan->sebagai=='anggota'): ?>
											<tr>
												<td><?php echo e(++$no); ?></td>
												<td><?php echo e($item->user->name); ?></td>
												<td>
													<?php if(($item->user->jabatan->sebagai=='ketua') || ($item->user->jabatan->sebagai=='anggota') ): ?>
														<?php echo e($item->user->jabatan->nm_jabatan.' '.$item->user->tingkatan->lainnya.' '.$item->user->tingkatan->nm_tingkatan); ?>

													<?php else: ?>
														<?php echo e($item->user->jabatan->nm_jabatan); ?>

													<?php endif; ?>
												</td>
	                                        </tr>
										<?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <div class="alert alert-danger alert-sm">
                                                Ketua belum di tentukan
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->status == 'anggota'): ?>
										<?php if($item->user->jabatan->sebagai=='staf'): ?>
											<tr>
												<td><?php echo e(++$no); ?></td>
												<td><?php echo e($item->user->name); ?></td>
												<td>
													<?php if(($item->user->jabatan->sebagai=='ketua') || ($item->user->jabatan->sebagai=='anggota') ): ?>
														<?php echo e($item->user->jabatan->nm_jabatan.' '.$item->user->tingkatan->lainnya.' '.$item->user->tingkatan->nm_tingkatan); ?>

													<?php else: ?>
														<?php echo e($item->user->jabatan->nm_jabatan); ?>

													<?php endif; ?>
												</td>
	                                        </tr>
										<?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3" align="center">
                                            <div class="alert alert-danger alert-sm">
                                                Ketua belum di tentukan
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                

                
                <!-- /.mailbox-controls -->
                
                <!-- /.mailbox-read-message -->
            </div>
            <div class="card-footer">
				<?php
					$izin = "no";
				?>
				<?php $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $akses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($akses->id_user == Auth::user()->id): ?>
						<?php
							$izin = 'yes';
							break;
						?>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php if($izin == 'yes'): ?>	
					<div class="float-right">
						<a href="/lhp/<?php echo e($tim->id); ?>/create" class="btn btn-default"><i class="fas fa-file-signature"></i>
							Laporan Hasil Pengawasan</a>
					</div>
				<?php endif; ?>
                
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#informasiawal"><i
                        class="fas fa-file"></i> Informasi Awal </button>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<div class="card">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary collapsed-card card-outline">
                <div class="card-header">
                    <h2 class="card-title">Berita Acara</h2>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" style="font-size: 15px" data-card-widget="collapse"
                            title="Collapse">
                            <i class="fas fa-plus"></i> Buat Berita Acara
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: none;">
                    <form action="/berita_acara/store" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="text" name="id_tim" id="" value="<?php echo e($tim->id); ?>" hidden>
                        <div class="form-group">
                            <label for="nama">Nama Saksi</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="tmpt_lahir">Tempat Lahir</label>
                            <input type="text" id="tmpt_lahir" name="tmpt_lahir" class="form-control">
                            <?php $__errorArgs = ['tmpt_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="row">
							<div class="form-group col-md-6">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
								<?php $__errorArgs = ['tgl_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="text-danger">Jabatan tidak boleh kosong</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>

							<div class="form-group col-md-6">
								<label for="agama">Agama</label>
								<select name="agama" class="form-control" id="">
									<option selected disabled value="">Choose One!!</option>
									<option  value="Islam">ISLAM</option>
									<option  value="Kristen">KRISTEN</option>
									<option  value="Katolik">KATOLIK</option>
									<option  value="Hindu">HINDU</option>
									<option  value="Budha">BUDHA</option>
								</select>
								<?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="text-danger">Jabatan tidak boleh kosong</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" class="form-control">
                            <?php $__errorArgs = ['pekerjaan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="tinggal">Tempat Tinggal</label>
                            <input type="text" id="tinggal" name="tinggal" class="form-control">
                            <?php $__errorArgs = ['tinggal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_wawancara">Lokasi Wawancara</label>
                            <input type="text" id="lokasi_wawancara" name="lokasi_wawancara" class="form-control">
                            <?php $__errorArgs = ['lokasi_wawancara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="terkait">Masalah Terkait</label>
                            <textarea id="terkait" name="terkait" class="form-control" cols="30" rows="3"></textarea>
                            <?php $__errorArgs = ['terkait'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger">Jabatan tidak boleh kosong</div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                <input type="submit" value="Buat Sekarang" class="btn btn-success float-right">
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
    <div class="card-body p-0 table-responsive">
        <table class="table" width="100%">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Pewawancara</th>
                    <th>Saksi</th>
                    <th>Muali</th>
                    <th>Selesai</th>
                    <th style="text-align: center">Detail</th>
                    
                </tr>
            </thead>
            <tbody id="coba">
                <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(++$no); ?></td>
                        <td><?php echo e($item->user->name); ?></td>
                        <td>
                            
                <?php echo e($item->nama); ?>

                </td>
                <td>
                    <?php echo e($item->created_at->format('H:i')); ?>

                </td>
                <td>
                    <?php if($item->selesai==$item->created_at): ?>
                        Dalam Proses
                    <?php else: ?>
                        <?php echo e(date('H:i', strtotime($item->selesai))); ?>

                    <?php endif; ?>

                </td>
                <td align="center">
                    <a href="/berita_acara/<?php echo e($item->id); ?>" title="Detail" class="btn btn-link btn-sm">
                        <i class="fa fa-eye"></i></a>
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

<?php $__empty_1 = true; $__currentLoopData = $tim->lhp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        $ada = ' ';
        break;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php
        $ada = 'hidden';
    ?>
<?php endif; ?>

<?php if($ada != 'hidden'): ?>
	<div class="row <?php echo e($ada); ?>">
		<div class="col-md-12">
			<!-- The time line -->
			<div class="timeline">
				<!-- timeline time label -->
				<div class="time-label">
					<span class="bg-blue">Daftar Laporan Hasil</span>
				</div>

				<?php $__empty_1 = true; $__currentLoopData = $tim->lhp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div>
						<i class="fas fa-file bg-blue"></i>
						<div style="font-size: 22px ;font-family: &quot;Times New Roman&quot;"
							class="pl-5 pr-5 card timeline-item
							
								card-primary
							
							card-outline collapsed-card">
							<div class="card-header card-borderless">
								<h3 class="card-title"><span class="text-bold"><?php echo e($item->user->name); ?></span> 
									<?php if($item->dugaan == 'pleno' || $item->dugaan == 'belum'): ?>
										<span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm <?php echo e($item->dugaan=='pleno' ? 'badge-primary' : 'badge-warning'); ?> "><?php echo e($item->dugaan=='pleno' ? 'Pleno' : 'Pembuatan'); ?></span>
									<?php else: ?>
										| Dugaan
										Pelanggaran : <span
										class="right badge badge-sm <?php echo e($item->dugaan=='ada' ? 'badge-danger' : 'badge-success'); ?> text-bold"><?php echo e($item->dugaan=='ada' ? 'Ada' : 'Tidak Ada'); ?></span>
									<?php endif; ?>
								</h3>
								<div class="card-tools">
									<?php if(Auth::user()->id == $item->id_user): ?>
										<a href="/lhp/<?php echo e($item->id); ?>/edit" class="btn btn-tool text-success">
											<i class="fas fa-edit"></i>
										</a>
									<?php endif; ?>
									
									
									<a href="/lhp/<?php echo e($item->id); ?>/detail" class="btn btn-tool text-primary">
										<i class="fas fa-eye"></i>
									</a>
									<button type="button" class="btn btn-tool text-secondary" data-card-widget="collapse"
										title="Collapse">
										<i class="fas fa-plus"></i>
									</button>
								</div>
							</div>
							<div class="card-body card-borderless" style="">
								<div>
									<p class="text-bold">I. Data Pengawas Pemilihan : </p>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">a. </td>
													<td width="98%">Nama Pelaksana Tugas Pengawasan</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<?php $__empty_2 = true; $__currentLoopData = $tim->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
													<tr>
														<td width="1%"><?php echo e(++$no); ?>. </td>
														<td width="99%"><?php echo e($user->name); ?></td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

												<?php endif; ?>

											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">b. </td>
													<td width="98%">Jabatan</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<?php $__empty_2 = true; $__currentLoopData = $tim->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
													<tr>
														<td width="1%"><?php echo e(++$no); ?>. </td>
														<td width="99%">
															<?php if(($jab->jabatan->sebagai=='ketua') || ($jab->jabatan->sebagai=='anggota') ): ?>
																<?php echo e($jab->jabatan->nm_jabatan.' '.$jab->tingkatan->lainnya.' '.$jab->tingkatan->nm_tingkatan); ?>

															<?php else: ?>
																<?php echo e($jab->jabatan->nm_jabatan); ?>

															<?php endif; ?>	
														</td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

												<?php endif; ?>

											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">c. </td>
													<td width="98%">Alamat</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<?php if($sts_ketua=='ada'): ?>
													<?php $__empty_2 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $ketu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
														<?php if($ketu->status=='ketua'): ?>
															<tr>
																<td width="99%"><?php echo e($ketu->user->alamat); ?></td>
															</tr>
														<?php endif; ?>

													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
													<?php endif; ?>	
												<?php else: ?>
													<tr>
														<td width="99%"><?php echo e($item->user->alamat); ?></td>
													</tr>
												<?php endif; ?>	
											</table>
										</div>
									</div>
								</div>
								<div>
									<p class="text-bold">II. Kegiatan Pengawasan : </p>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">a. </td>
													<td width="98%">Tahapan yang di awasi</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%"><?php echo e($item->tahapan); ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">b. </td>
													<td width="98%">Bentuk Pengawasan</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">
														<?php echo e(($item->bentuk=='langsung' ? 'Langsung' : 'Tidak langsung')); ?>

													</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">c. </td>
													<td width="98%">Pihak yang diawasi</td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%"><?php echo e($item->diawasi); ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">d. </td>
													<td width="98%"></td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										
										<?php if(date('D', strtotime($item->mulai))=='Mon'): ?>
											<?php
												$hari_mulai = 'Senin';
											?>
										<?php elseif(date('D', strtotime($item->mulai))=='Tue'): ?>
											<?php
												$hari_mulai = 'Selasa';
											?>
										<?php elseif(date('D', strtotime($item->mulai))=='Wed'): ?>
											<?php
												$hari_mulai = 'Rabu';
											?>
										<?php elseif(date('D', strtotime($item->mulai))=='Thu'): ?>
											<?php
												$hari_mulai = 'Kamis';
											?>
										<?php elseif(date('D', strtotime($item->mulai))=='Fri'): ?>
											<?php
												$hari_mulai = "Jum'at";
											?>
										<?php elseif(date('D', strtotime($item->mulai))=='Sat'): ?>
											<?php
												$hari_mulai = 'Sabtu';
											?>
										<?php elseif(date('D', strtotime($item->mulai))=='Sun'): ?>
											<?php
												$hari_mulai = 'Minggu';
											?>
										<?php endif; ?>

										
										<?php if(date('m', strtotime($item->mulai))==1): ?>
											<?php
												$bulan_mulai = 'Januari';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==2): ?>
											<?php
												$bulan_mulai = 'Februari';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==3): ?>
											<?php
												$bulan_mulai = 'Maret';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==4): ?>
											<?php
												$bulan_mulai = 'April';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==5): ?>
											<?php
												$bulan_mulai = 'Mei';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==6): ?>
											<?php
												$bulan_mulai = 'Juni';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==7): ?>
											<?php
												$bulan_mulai = 'Juli';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==8): ?>
											<?php
												$bulan_mulai = 'Agustus';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==9): ?>
											<?php
												$bulan_mulai = 'September';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==10): ?>
											<?php
												$bulan_mulai = 'Oktober';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==11): ?>
											<?php
												$bulan_mulai = 'November';
											?>
										<?php elseif(date('m', strtotime($item->mulai))==12): ?>
											<?php
												$bulan_mulai = 'Desember';
											?>
										<?php endif; ?>


										
										<?php if(date('D', strtotime($item->selesai))=='Mon'): ?>
											<?php
												$hari_selesai = 'Senin';
											?>
										<?php elseif(date('D', strtotime($item->selesai))=='Tue'): ?>
											<?php
												$hari_selesai = 'Selasa';
											?>
										<?php elseif(date('D', strtotime($item->selesai))=='Wed'): ?>
											<?php
												$hari_selesai = 'Rabu';
											?>
										<?php elseif(date('D', strtotime($item->selesai))=='Thu'): ?>
											<?php
												$hari_selesai = 'Kamis';
											?>
										<?php elseif(date('D', strtotime($item->selesai))=='Fri'): ?>
											<?php
												$hari_selesai = "Jum'at";
											?>
										<?php elseif(date('D', strtotime($item->selesai))=='Sat'): ?>
											<?php
												$hari_selesai = 'Sabtu';
											?>
										<?php elseif(date('D', strtotime($item->selesai))=='Sun'): ?>
											<?php
												$hari_selesai = 'Minggu';
											?>
										<?php endif; ?>

										
										<?php if(date('m', strtotime($item->selesai))==1): ?>
											<?php
												$bulan_selesai = 'Januari';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==2): ?>
											<?php
												$bulan_selesai = 'Februari';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==3): ?>
											<?php
												$bulan_selesai = 'Maret';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==4): ?>
											<?php
												$bulan_selesai = 'April';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==5): ?>
											<?php
												$bulan_selesai = 'Mei';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==6): ?>
											<?php
												$bulan_selesai = 'Juni';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==7): ?>
											<?php
												$bulan_selesai = 'Juli';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==8): ?>
											<?php
												$bulan_selesai = 'Agustus';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==9): ?>
											<?php
												$bulan_selesai = 'September';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==10): ?>
											<?php
												$bulan_selesai = 'Oktober';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==11): ?>
											<?php
												$bulan_selesai = 'November';
											?>
										<?php elseif(date('m', strtotime($item->selesai))==12): ?>
											<?php
												$bulan_selesai = 'Desember';
											?>
										<?php endif; ?>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="25%">Hari</td>
													<td width="1%">:</td>
													<td width="74%">
														<?php if($item->selesai != null): ?>
															<?php echo e($hari_mulai.' s/d '.$hari_selesai); ?>

														<?php else: ?>
															<?php echo e($hari_mulai); ?>

														<?php endif; ?>
													</td>
												</tr>
												<tr>
													<td width="25%">Tanggal</td>
													<td width="1%">:</td>
													<td width="74%">
														<?php if($item->selesai != null): ?>
															<?php echo e(date('d', strtotime($item->mulai)).' s/d '.date('d', strtotime($item->selesai))); ?>

														<?php else: ?>
															<?php echo e(date('d', strtotime($item->mulai))); ?>

														<?php endif; ?>
													</td>
												</tr>
												<tr>
													<td width="25%">Bulan</td>
													<td width="1%">:</td>
													<td width="74%">
														<?php if($bulan_mulai != $bulan_selesai): ?>
															<?php echo e($bulan_mulai.' s/d '.$bulan_selesai); ?>

														<?php else: ?>
															<?php echo e($bulan_mulai); ?>

														<?php endif; ?>
													</td>
												</tr>
												<tr>
													<td width="25%">Tahun</td>
													<td width="1%">:</td>
													<td width="74%">
														<?php if(date('Y', strtotime($item->mulai)) == date('Y', strtotime($item->selesai))): ?>
															<?php echo e(date('Y', strtotime($item->mulai))); ?>

														<?php else: ?>
															<?php echo e(date('Y', strtotime($item->mulai)).' s/d '.date('Y', strtotime($item->selesai))); ?>

														<?php endif; ?>
													</td>
												</tr>
												<tr>
													<td width="25%">Waktu/Jam</td>
													<td width="1%">:</td>
													<td width="74%">
														<?php echo e(date('H.i', strtotime($item->mulai))); ?> Wita s/d Selesai
													</td>
												</tr>
												<tr>
													<td width="25%">Tempat/Lokasi</td>
													<td width="1%">:</td>
													<td width="74%"><?php echo e($item->lokasi); ?></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
								<div>
									<p class="text-bold">III. Uraian Hasil Pengawasan : </p>
									<div class="row">
										<div class="col-md-12 pr-4">

											<?php echo $item->uraian_hasil; ?>

										</div>
									</div>
								</div>
								<div>
									<div class="row ">
										<div class="col-md-3 mr-5 text-bold">IV. Dugaan Pelanggaran </div>
										<div class="col-md-7 ml-2 text-bold">:
											<?php echo e(($item->dugaan=='ada' ? 'Ada' : 'Tidak Ada')); ?>

										</div>
									</div>
								</div>
								<div class="text-bold">
									<p class="text-bold">V. Informasi Dugaan Pelanggaran : </p>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">a. </td>
													<td width="98%">Tempat Kejadian </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%"><?php echo e($item->tempat_kejadian); ?></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">b. </td>
													<td width="98%">Waktu Kejadian </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="99%">
													<?php if($item->waktu_kejadian != null): ?>
														<?php echo e(date('d F Y', strtotime($item->waktu_kejadian))); ?>

													<?php endif; ?>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">c. </td>
													<td width="98%">Nama Pelaku </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<?php $__empty_2 = true; $__currentLoopData = $item->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n => $pel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
													<tr>
														<td width="100%">
															<?php echo e(++$n.'. '.$pel->nama); ?></td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

												<?php endif; ?>

											</table>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<table width="100%" class="table table-sm table-borderless">
												<tr>
													<td width="1%">d. </td>
													<td width="98%">Status Pelaku </td>
													<td width="1%">:</td>
												</tr>
											</table>
										</div>
										<div class="col-md-7 ml-3">
											<table width="100%" class="table table-sm table-borderless">
												<?php $__empty_2 = true; $__currentLoopData = $item->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ns => $pel_sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
													<tr>
														<td width="100%">
															<?php echo e(++$ns.'. '.$pel_sts->status); ?>

														</td>
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

												<?php endif; ?>

											</table>
										</div>
									</div>
								</div>
								<div>
									<p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
									<div class="row">
										<div class="col-md-12 pr-4">

											<?php echo $item->uraian_dugaan; ?>

										</div>
									</div>
								</div>

								<div class="text-bold">
									<p class="text-bold">VII. Saksi - Saksi : </p>

									<?php $__empty_2 = true; $__currentLoopData = $item->saksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nsa => $sak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
										<?php
											++$nsa;
											if ($nsa ==1) {
											$alfa = 'a';
											$rom = 'I';
											}elseif ($nsa ==2) {
											$alfa = 'b';
											$rom = 'II';
											}elseif ($nsa ==3) {
											$alfa = 'c';
											$rom = 'III';
											}elseif ($nsa ==4) {
											$alfa = 'd';
											$rom = 'IV';
											}elseif ($nsa ==5) {
											$alfa = 'e';
											$rom = 'V';
											}elseif ($nsa ==6) {
											$alfa = 'f';
											$rom = 'VI';
											}elseif ($nsa ==7) {
											$alfa = 'g';
											$rom = 'VII';
											}elseif ($nsa ==8) {
											$alfa = 'h';
											$rom = 'VIII';
											}elseif ($nsa ==9) {
											$alfa = 'i';
											$rom = 'IX';
											}elseif ($nsa ==10) {
											$alfa = 'j';
											$rom = 'X';
											}
										?>
										<div class="row">
											<div class="col-md-4">
												<table width="100%" class="table table-sm table-borderless">
													<tr>
														<td width="1%"><?php echo e($alfa); ?>.</td>

														<td width="98%">Saksi <?php echo e($rom); ?> </td>
														<td width="1%">:</td>
													</tr>
												</table>
											</div>
											<div class="col-md-7 ml-3">
												<table width="100%" class="table table-sm table-borderless">
													<tr>
														<td width="99%"><?php echo e($sak->nama); ?></td>
													</tr>
												</table>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

									<?php endif; ?>

								</div>
								<div class="text-bold">
									<p class="text-bold">VIII. Bukti Pendukung : </p>

									<?php $__empty_2 = true; $__currentLoopData = $item->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nbuk => $buk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
										<?php
											++$nbuk;
											if ($nbuk ==1) {
											$alfa = 'a';
											$rom = 'I';
											}elseif ($nbuk ==2) {
											$alfa = 'b';
											$rom = 'II';
											}elseif ($nbuk ==3) {
											$alfa = 'c';
											$rom = 'III';
											}elseif ($nbuk ==4) {
											$alfa = 'd';
											$rom = 'IV';
											}elseif ($nbuk ==5) {
											$alfa = 'e';
											$rom = 'V';
											}elseif ($nbuk ==6) {
											$alfa = 'f';
											$rom = 'VI';
											}elseif ($nbuk ==7) {
											$alfa = 'g';
											$rom = 'VII';
											}elseif ($nbuk ==8) {
											$alfa = 'h';
											$rom = 'VIII';
											}elseif ($nbuk ==9) {
											$alfa = 'i';
											$rom = 'IX';
											}elseif ($nbuk ==10) {
											$alfa = 'j';
											$rom = 'X';
											}
										?>
										<div class="row">
											<div class="col-md-12">
												<table width="100%" class="table table-sm table-borderless">
													<tr>
														<td width="1%"><?php echo e($alfa); ?>.</td>

														<td width="98%"><?php echo e($buk->nama); ?> </td>
													</tr>
												</table>
											</div>
											
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>

									<?php endif; ?>

								</div>

							</div>
							<!-- /.card-body -->
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

				<?php endif; ?>

				<div>
					<i class="fas fa-clock bg-gray"></i>
				</div>
			</div>
		</div>
		<!-- /.col -->
	</div>
<?php endif; ?>



<div class="modal fade" id="edittim" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Edit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tim/<?php echo e($tim->id); ?>/edit" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <div class="form-group">
                        <label for="">Tema Penelusuran</label>
                        <input type="text" value="<?php echo e($tim->nama); ?>" name="nama" id="" placeholder="Masukan Judul Penelusuran"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Surat Keputusan</label>
                        <input type="text" name="no_sk" value="<?php echo e($tim->no_sk); ?>" id="" placeholder="Nomor Surat Keputusan" class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_sk" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Ketua (Baru)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Surat Tugas Ketua</label>
                        <input type="text" name="st_ketua"  value="<?php echo e($tim->st_ketua); ?>" id="" placeholder="Nomor Surat Tugas Ketua"
                            class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_st_ketua" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Ketua (Baru)</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Surat Tugas Sekretaris</label>
                        <input type="text" value="<?php echo e($tim->st_sekretaris); ?>" name="st_sekretaris" id="" placeholder="Nomor Surat Tugas Sekretaris"
                            class="form-control">
                        <div class="custom-file mt-1">
                            <input type="file" name="file_st_sekretaris" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">File Surat Tugas Sekretaris (Baru)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Anggota Tim</label>
                        <div class="select2-blue">
                            <select name="anggota[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Tambahkan Anggota Tim Penelusuran" data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
								<?php $__currentLoopData = $tim->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
										$coba[$no] = $item_user->id;
									?>
									<option selected value="<?php echo e($item_user->id); ?>"><?php echo e($item_user->name); ?> (<?php echo e($item_user->jabatan->nm_jabatan); ?>)
									</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $user_anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if(in_array($item->id, $coba)): ?>
									<?php else: ?>
										<option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?> (<?php echo e($item->jabatan->nm_jabatan); ?>)
										</option>
									<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Waktu Mulai</label>
                                <input type="date" value="<?php echo e(date('Y-m-d', strtotime($tim->mulai))); ?>" name="mulai" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Waktu Selesai</label>
                                <input type="date" value="<?php echo e(date('Y-m-d', strtotime($tim->selesai))); ?>" name="selesai" id="" class="form-control">
                            </div>
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


<div class="modal fade" id="masyarakat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporan Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="informasiawal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi Awal (A6)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body p-0">
                    <div class="mailbox-read-info">
                        <table class="table table-sm
                        
                        table-borderless
                        " width="100%">
                            <tr>
                                <td colspan="3" width="100%">
                                    <h5 class="text-bold">Data Pelapor</h5>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="22%">Nama Pelapor</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->informasi->nama); ?></th>
                            </tr>
                            <tr>
                                <td width="22%">Telephone</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->informasi->telp); ?></th>
                            </tr>
                            <tr>
                                <td width="22%">Alamat Pelapor</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->informasi->alamat); ?></th>
                            </tr>
                            <tr>
                                <td colspan="3" width="100%">
                                    <h5 class="text-bold">Informasi Awal</h5>
                                </td>
                            </tr>
                            <tr>
                                <td width="22%">Peristiwa</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->peristiwa); ?></th>
                            </tr>
                            <tr>
                                <td width="22%">Tempat Kejadian</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->tempat_kejadian); ?></th>
                            </tr>
                            <tr>
                                <td width="22%">Waktu/Tanggal</td>
                                <th width="1%">:</th>
                                <th width="77%">
                                    <?php echo e(date('H:i / l d F.Y', strtotime($tim->informasi_awal->waktu_tgl_kejadian))); ?>

                                    
                                </th>

                            </tr>
                            <tr>
                                <td width="22%">Nama Terlapor</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->terlapor); ?></th>
                            </tr>
                            <tr>
                                <td width="22%">Alamat Terlapor</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->alamat_terlapor); ?></th>
                            </tr>
                            <tr>
                                <td width="22%">Status</td>
                                <th width="1%">:</th>
                                <th width="77%"><?php echo e($tim->informasi_awal->status); ?></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="mailbox-read-message pl-4 pr-4">
                    <p>Uraian Singkat Kejadian,</p>

                    <p><?php echo e($tim->informasi_awal->uraian_kejadian); ?></p>

                    <p>Thanks,<br><?php echo e($tim->informasi_awal->user->name." (".$tim->informasi_awal->user->jabatan->nm_jabatan.")"); ?>

                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tentukan Ketua Tim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tim/<?php echo e($tim->id); ?>/set_ketua" method="post">
				<?php echo csrf_field(); ?>
				<?php echo method_field('patch'); ?>
					<div class="form-group">
						<select name="id_user" id="" class="form-control">
							<option selected disabled value="">Choose One! </option>
							<?php $__currentLoopData = $tim->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ketua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($ketua->id); ?>"><?php echo e($ketua->name); ?> (<?php echo e($ketua->jabatan->nm_jabatan); ?>) </option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
				
				</form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($tim->file_sk): ?>
					<embed type="application/pdf" src=" <?php echo e(asset('storage/'.$tim->file_sk)); ?> " width="100%" height="800px">
				<?php else: ?>
					<h3>File Belum Diupload..!</h3>
				<?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="st_ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Tugas Ketua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($tim->file_st_ketua): ?>
					<embed type="application/pdf" src=" <?php echo e(asset('storage/'.$tim->file_st_ketua)); ?> " width="100%" height="800px">
				<?php else: ?>
					<h3>File Belum Diupload..!</h3>
				<?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="st_sekretaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Surat Tugas Sekretaris</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if($tim->file_st_sekretaris): ?>
					<embed type="application/pdf" src=" <?php echo e(asset('storage/'.$tim->file_st_sekretaris)); ?> " width="100%" height="800px">
				<?php else: ?>
					<h3>File Belum Diupload..!</h3>
				<?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/tim_detail.blade.php ENDPATH**/ ?>