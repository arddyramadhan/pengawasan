<?php $__env->startSection('title', 'Laporan Hasil'); ?>
<?php $__env->startSection('judul', 'Detail Laporan Hasil '.$lhp->status_lhp); ?>
<?php $__env->startSection('menu', 'Laporan Hasil'); ?>
<?php $__env->startSection('sub', 'Detail LHP'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
	<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-md-12">
        <div class="card card-primary card-outline">
			<?php
				$sts_ketua='tidak';
				$alm_ketua = '';
			?>
			<?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<?php if($user->status=='ketua'): ?>
					<?php
						$sts_ketua = 'ada';
						$alm_ketua = $user->user->alamat;
					?>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				
			<?php endif; ?>
            <div class="card-body p-0">		
				<div class="card-header card-borderless">
					<h3 class="card-title"><span class="text-bold"><?php echo e($lhp->user->name); ?></span>
						 <?php if($lhp->dugaan == 'pleno' || $lhp->dugaan == 'belum'): ?>
							<span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm <?php echo e($lhp->dugaan=='pleno' ? 'badge-primary' : 'badge-warning'); ?> "><?php echo e($lhp->dugaan=='pleno' ? 'Pleno' : 'Pembuatan'); ?></span>
						<?php else: ?>
							| Dugaan
							Pelanggaran : <span
							class="right badge badge-sm <?php echo e($lhp->dugaan=='ada' ? 'badge-danger' : 'badge-success'); ?> text-bold"><?php echo e($lhp->dugaan=='ada' ? 'Ada' : 'Tidak Ada'); ?></span>
							<?php if($lhp->status == 'selesai'): ?>
							<span class="right badge badge-success badge-sm ">Diselesaikan</span>
							<?php endif; ?>
							
						<?php endif; ?>
					</h3>
					<div class="card-tools">
						<?php if($lhp->id_user == Auth::user()->id): ?>
							<?php if($lhp->dugaan=='belum'): ?>
								<a href="/lhp/<?php echo e($lhp->id); ?>/lanjutlhp_belum" class="btn btn-tool text-success">
									<i class="fas fa-edit"></i>
								</a>
							<?php else: ?>
								<a href="/lhp/<?php echo e($lhp->id); ?>/edit" class="btn btn-tool text-success">
									<i class="fas fa-edit"></i>
								</a>
							<?php endif; ?>

                            <?php if($lhp->status== 'belum'): ?>
                                <button class='btn btn-sm btn-tool text-danger' data-toggle='modal' data-target='#hapus'><i class="fas fa-trash"></i></button>
                            <?php endif; ?>
							
						<?php endif; ?>
						
						<button class='btn btn-sm btn-tool text-success' data-toggle='modal' data-target='#batas_waktu'><i class="fas fa-history"></i></button>

						<button class='btn btn-sm btn-tool text-warning' data-toggle='modal' data-target='#ketua'><i class="fas fa-print"></i></button>
						
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
									<?php $__empty_1 = true; $__currentLoopData = $tim->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td width="1%"><?php echo e(++$no); ?>. </td>
											<td width="99%"><?php echo e($user->name); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

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
									<?php $__empty_1 = true; $__currentLoopData = $tim->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

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
										<?php $__empty_1 = true; $__currentLoopData = $tim->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $ketu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<?php if($ketu->status=='ketua'): ?>
												<tr>
													<td width="99%"><?php echo e($ketu->user->alamat); ?></td>
												</tr>
											<?php endif; ?>

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<?php endif; ?>	
									<?php else: ?>
										<tr>
											<td width="99%"><?php echo e($lhp->user->alamat); ?></td>
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
										<td width="99%"><?php echo e($lhp->tahapan); ?></td>
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
											<?php echo e(($lhp->bentuk=='langsung' ? 'Langsung' : 'Tidak langsung')); ?>

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
										<td width="99%"><?php echo e($lhp->diawasi); ?></td>
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
							
							<?php if(date('D', strtotime($lhp->mulai))=='Mon'): ?>
								<?php
									$hari_mulai = 'Senin';
								?>
							<?php elseif(date('D', strtotime($lhp->mulai))=='Tue'): ?>
								<?php
									$hari_mulai = 'Selasa';
								?>
							<?php elseif(date('D', strtotime($lhp->mulai))=='Wed'): ?>
								<?php
									$hari_mulai = 'Rabu';
								?>
							<?php elseif(date('D', strtotime($lhp->mulai))=='Thu'): ?>
								<?php
									$hari_mulai = 'Kamis';
								?>
							<?php elseif(date('D', strtotime($lhp->mulai))=='Fri'): ?>
								<?php
									$hari_mulai = "Jum'at";
								?>
							<?php elseif(date('D', strtotime($lhp->mulai))=='Sat'): ?>
								<?php
									$hari_mulai = 'Sabtu';
								?>
							<?php elseif(date('D', strtotime($lhp->mulai))=='Sun'): ?>
								<?php
									$hari_mulai = 'Minggu';
								?>
							<?php endif; ?>

							
							<?php if(date('m', strtotime($lhp->mulai))==1): ?>
								<?php
									$bulan_mulai = 'Januari';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==2): ?>
								<?php
									$bulan_mulai = 'Februari';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==3): ?>
								<?php
									$bulan_mulai = 'Maret';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==4): ?>
								<?php
									$bulan_mulai = 'April';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==5): ?>
								<?php
									$bulan_mulai = 'Mei';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==6): ?>
								<?php
									$bulan_mulai = 'Juni';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==7): ?>
								<?php
									$bulan_mulai = 'Juli';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==8): ?>
								<?php
									$bulan_mulai = 'Agustus';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==9): ?>
								<?php
									$bulan_mulai = 'September';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==10): ?>
								<?php
									$bulan_mulai = 'Oktober';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==11): ?>
								<?php
									$bulan_mulai = 'November';
								?>
							<?php elseif(date('m', strtotime($lhp->mulai))==12): ?>
								<?php
									$bulan_mulai = 'Desember';
								?>
							<?php endif; ?>


							
							<?php if(date('D', strtotime($lhp->selesai))=='Mon'): ?>
								<?php
									$hari_selesai = 'Senin';
								?>
							<?php elseif(date('D', strtotime($lhp->selesai))=='Tue'): ?>
								<?php
									$hari_selesai = 'Selasa';
								?>
							<?php elseif(date('D', strtotime($lhp->selesai))=='Wed'): ?>
								<?php
									$hari_selesai = 'Rabu';
								?>
							<?php elseif(date('D', strtotime($lhp->selesai))=='Thu'): ?>
								<?php
									$hari_selesai = 'Kamis';
								?>
							<?php elseif(date('D', strtotime($lhp->selesai))=='Fri'): ?>
								<?php
									$hari_selesai = "Jum'at";
								?>
							<?php elseif(date('D', strtotime($lhp->selesai))=='Sat'): ?>
								<?php
									$hari_selesai = 'Sabtu';
								?>
							<?php elseif(date('D', strtotime($lhp->selesai))=='Sun'): ?>
								<?php
									$hari_selesai = 'Minggu';
								?>
							<?php endif; ?>

							
							<?php if(date('m', strtotime($lhp->selesai))==1): ?>
								<?php
									$bulan_selesai = 'Januari';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==2): ?>
								<?php
									$bulan_selesai = 'Februari';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==3): ?>
								<?php
									$bulan_selesai = 'Maret';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==4): ?>
								<?php
									$bulan_selesai = 'April';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==5): ?>
								<?php
									$bulan_selesai = 'Mei';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==6): ?>
								<?php
									$bulan_selesai = 'Juni';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==7): ?>
								<?php
									$bulan_selesai = 'Juli';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==8): ?>
								<?php
									$bulan_selesai = 'Agustus';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==9): ?>
								<?php
									$bulan_selesai = 'September';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==10): ?>
								<?php
									$bulan_selesai = 'Oktober';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==11): ?>
								<?php
									$bulan_selesai = 'November';
								?>
							<?php elseif(date('m', strtotime($lhp->selesai))==12): ?>
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
											<?php if($lhp->selesai != null): ?>
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
											<?php if($lhp->selesai != null): ?>
												<?php echo e(date('d', strtotime($lhp->mulai)).' s/d '.date('d', strtotime($lhp->selesai))); ?>

											<?php else: ?>
												<?php echo e(date('d', strtotime($lhp->mulai))); ?>

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
											<?php if(date('Y', strtotime($lhp->mulai)) == date('Y', strtotime($lhp->selesai))): ?>
												<?php echo e(date('Y', strtotime($lhp->mulai))); ?>

											<?php else: ?>
												<?php echo e(date('Y', strtotime($lhp->mulai)).' s/d '.date('Y', strtotime($lhp->selesai))); ?>

											<?php endif; ?>
										</td>
									</tr>
									<tr>
										<td width="25%">Waktu/Jam</td>
										<td width="1%">:</td>
										<td width="74%">
											<?php echo e(date('H.i', strtotime($lhp->mulai))); ?> Wita s/d Selesai
										</td>
									</tr>
									<tr>
										<td width="25%">Tempat/Lokasi</td>
										<td width="1%">:</td>
										<td width="74%"><?php echo e($lhp->lokasi); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div>
						<p class="text-bold">III. Uraian Hasil Pengawasan : </p>
						<div class="row">
							<div class="col-md-12 pr-4">
								<?php echo $lhp->uraian_hasil; ?>

							</div>
						</div>
					</div>
					<div>
						<div class="row ">
							<div class="col-md-3 mr-5 text-bold">IV. Dugaan Pelanggaran </div>
							<div class="col-md-7 ml-2 text-bold">:
								<?php echo e(($lhp->dugaan=='ada' || $lhp->dugaan=='tidak' ? $lhp->dugaan=='ada' ? ' Ada' : ' Tidak Ada' : 'Dalam Proses')); ?>

								
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
										<td width="99%"><?php echo e($lhp->tempat_kejadian); ?></td>
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
										<?php if($lhp->waktu_kejadian != null): ?>
											<?php echo e(date('d F Y', strtotime($lhp->waktu_kejadian))); ?>

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
									<?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n => $pel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td width="100%">
												<?php echo e(++$n.'. '.$pel->nama); ?></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

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
									<?php $__empty_1 = true; $__currentLoopData = $lhp->pelaku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ns => $pel_sts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td width="100%">
												<?php echo e(++$ns.'. '.$pel_sts->status); ?>

											</td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

									<?php endif; ?>

								</table>
							</div>
						</div>
					</div>
					<div>
						<p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
						<div class="row">
							<div class="col-md-12 pr-4">

								<?php echo $lhp->uraian_dugaan; ?>

							</div>
						</div>
					</div>

					<div class="text-bold">
						<p class="text-bold">VII. Saksi - Saksi : </p>

						<?php $__empty_1 = true; $__currentLoopData = $lhp->saksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nsa => $sak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

						<?php endif; ?>

					</div>
					<div class="text-bold">
						<p class="text-bold">VIII. Bukti Pendukung : </p>

						<?php $__empty_1 = true; $__currentLoopData = $lhp->bukti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nbuk => $buk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

						<?php endif; ?>

					</div>

				</div>
						
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
	<div>
		
		<div style="position: fixed; right: 30px; bottom:25px; z-index:2;"  class="float-right">
			<?php if($lhp->tim->status =='penelusuran'): ?>
				<a href="/tim/<?php echo e($lhp->tim->id); ?>" class="btn btn-secondary btn-lg img-circle">
				<i class="fas fa-users"></i></a>
			<?php else: ?>
				<a href="/tim/<?php echo e($lhp->tim->id); ?>/pengawasan" class="btn btn-secondary btn-lg img-circle">
				<i class="fas fa-users"></i></a>
			<?php endif; ?>
				<button class="btn btn-info btn-lg rounded-circle" data-toggle="modal" data-target="#list"><i class="fas fa-list"></i></button>
				<?php if((Auth::user()->id_jabatan<=2 && Auth::user()->id_tingkatan <=2)): ?>
					<?php if(Auth::user()->id_tingkatan<2 && $lhp->user->id_tingkatan<2): ?>
						<button class="btn btn-primary btn-lg rounded-circle" data-toggle="modal" data-target="#tanggapan"><i class="fas fa-paper-plane"></i></button>
					<?php endif; ?>
					<?php if(Auth::user()->id_tingkatan>=2 && $lhp->user->id_tingkatan>=2): ?>
						<button class="btn btn-primary btn-lg rounded-circle" data-toggle="modal" data-target="#tanggapan"><i class="fas fa-paper-plane"></i></button>
					<?php endif; ?>
				<?php endif; ?>
				<?php if(Auth::user()->id == $lhp->id_user): ?>
					<?php if(($lhp->dugaan == 'ada' && $lhp->tempat_kejadian==null) || ($lhp->dugaan == 'ada' && $lhp->waktu_kejadian==null) || ($lhp->dugaan == 'ada' && $lhp->uraian_dugaan==null)): ?>
		                    <a href="/lhp/<?php echo e($lhp->id); ?>/lanjutlhp" class="btn btn-danger btn-lg img-circle">
							<i class="fas fa-file-medical"></i></a>
					<?php endif; ?>
					<?php if($lhp->dugaan=='belum'): ?>
						<a href="/lhp/<?php echo e($lhp->id); ?>/lanjutlhp_belum" class="btn btn-warning btn-lg img-circle"><i class="fas fa-file-import"></i></a>
					<?php endif; ?>

					<?php if(($lhp->status=='belum') && ($lhp->dugaan=='ada')): ?>				
						<button class="btn btn-success btn-lg rounded-circle"  data-toggle="modal" data-target="#konfirm"><i class="fas fa-check"></i></button>
					<?php endif; ?>
				<?php endif; ?>
		</div>
	</div>
</div>

<div class="modal fade" id="list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendapat Laporan Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<?php $__empty_1 = true; $__currentLoopData = $lhp->pendapat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_pendapat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<div class="card card-light card-outline collapsed-card">
						<div class="card-header">
							<h5 class="card-title"><strong class="text-primary"><?php echo e($item_pendapat->user->name); ?></strong>
							| Pelanggaran : <span
							class="right badge badge-sm <?php echo e($item_pendapat->status=='ada' ? 'badge-danger' : 'badge-success'); ?> text-bold"><?php echo e($item_pendapat->status=='ada' ? 'Ada' : 'Tidak Ada'); ?></span>
							</h5>
							<div class="card-tools">
								<?php if(Auth::user()->id == $item_pendapat->id_user ): ?>
									<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
										<i class="fas fa-pen"></i>
									</button>
								<?php endif; ?>
							</div>
						</div>
						<div class="card-body" style="display: none;">
							<form action="/lhp/<?php echo e($item_pendapat->id); ?>/pendapat_update" method="post">
								<?php echo method_field('patch'); ?>
								<?php echo csrf_field(); ?>
								<div class="form-group">
									<label for="nama">Degaan Pelanggaran</label>
									
									<select name="status" id="" class="form-control">
										<option disabled value="">Choose One!</option>
										<option <?php echo e($item_pendapat->status == 'ada' ? 'selected' : ''); ?> value="ada">Ada</option>
										<option <?php echo e($item_pendapat->status == 'tidak' ? 'selected' : ''); ?> value="tidak">Tidak</option>
									</select>
								</div>
								<div class="form-group">
									<label for="isi">Uraian Pendapat</label>
									<textarea id="isi" style="height: 1000px;" name="isi" class="form-control summernote"
										cols="70" rows="50"><?php echo e((old('isi') ?? $item_pendapat->isi )); ?></textarea>
									<?php $__errorArgs = ['isi'];
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
								<div class="form-group text-right">
									<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
								</div>
							</form>
						</div>
						<div class="card-header">
							<?php echo $item_pendapat->isi; ?>

						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<div class="alert alert-info row">Laporan hasil ini belum di lakukan pleno..!</div>
				<?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="konfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h5 class="text-bold">Yakin ingin <span class="text-bold text-success">Menyelesaikan Sesi</span> untuk Laporan hasil pengawasan ini..?</h5>
			</div>
			<div class="row justify-content-center mb-3">
				
				<form action="/lhp/<?php echo e($lhp->id); ?>/sesi_selesai" method="post">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PATCH'); ?>
					<button class="btn btn-success" type="submit">Selesaikan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tanggapan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pendapat Laporan Hasil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/lhp/<?php echo e($lhp->id); ?>/pendapat" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Degaan Pelanggaran</label>
                    
					<select name="status" id="" class="form-control">
						<option selected disabled value="">Choose One!</option>
						<option value="ada">Ada</option>
						<option value="tidak">Tidak</option>
					</select>
                </div>
				<div class="form-group">
					<label for="isi">Uraian Pendapat</label>
					<textarea id="isi" style="height: 1000px;" name="isi" class="form-control summernote"
						cols="70" rows="50"><?php echo e((old('isi') ?? '' )); ?></textarea>
					<?php $__errorArgs = ['isi'];
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
            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Berikan Pendapat</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ketua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Print | Export | Preview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
				<a href="/lhp/<?php echo e($lhp->id); ?>/print/halaman" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
				<a href="/lhp/<?php echo e($lhp->id); ?>/print/print" target="_blank" class="btn btn-default"><i class="fas fa-file"></i> Export Pdf</a>
				<a href="/lhp/<?php echo e($lhp->id); ?>/print/download" target="_blank" class="btn btn-default"><i class="fas fa-download"></i> Download</a>
				<a href="/lhp/<?php echo e($lhp->id); ?>/print/mobile" class="btn btn-default"><i class="fas fa-mobile-alt"></i> Preview</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="batas_waktu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Waktu Pengisian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer d-flex justify-content-center">
				<form action="/lhp/<?php echo e($lhp->id); ?>/ubah_waktu_pengisian" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <div class="form-group">
                        <input type="datetime-local" value="<?php echo e(date('Y-m-d\TH:i', strtotime($lhp->batas_waktu_pengisian))); ?>" name="batas_waktu_pengisian" class="form-control">
                    </div>
                    <div class="form-group">
                        <center>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <center> <h4>Anda yakin ingin <strong class="text-danger">Menghapus</strong> Laporan Hasil Pengawasan ini..??</h4> </center>
                <br>
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" aria-label="Close">Tidak</button>
                <form action="/lhp/<?php echo e($lhp->id); ?>/hapus" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                    <button type="submit" class="btn btn-sm btn-danger">Ya Hapus</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/lhp_detail.blade.php ENDPATH**/ ?>