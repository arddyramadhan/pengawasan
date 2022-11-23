<?php $__env->startSection('title', 'Berita Acara'); ?>
<?php $__env->startSection('judul', 'Berita Acara'); ?>
<?php $__env->startSection('menu', 'Berita Acara'); ?>
<?php $__env->startSection('sub', 'Detail'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Berita Acara</h3>
                <div class="card-tools">
                    <a href="/berita_acara/<?php echo e($berita_acara->id); ?>/print/print" class="btn btn-tool text-primary" title="Print"><i class="fas fa-eye"></i></a>
                    <a href="/berita_acara/<?php echo e($berita_acara->id); ?>/download/print" class="btn btn-tool" target="_blank" title="Download"><i class="fas fa-download"></i></a>
                    <a href="/berita_acara/<?php echo e($berita_acara->id); ?>/print/print" class="btn btn-tool text-primary" target="_blank" title="Print"><i class="fas fa-print"></i></a>
                    <button class="btn btn-tool text-success" data-toggle="modal" data-target="#editba"><i class="fas fa-edit"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <table class="table table-borderless" width="100%">
                        <tr>
                            <td width="15%">Nama Saksi</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e($berita_acara->nama); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Tempat Lahir</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e($berita_acara->tmpt_lahir); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Tanggal Lahir</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e(date('d F.Y', strtotime($berita_acara->tgl_lahir))); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Pekerjaan</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e($berita_acara->pekerjaan); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Agama</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e($berita_acara->agama); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Tempat Tinggal</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e($berita_acara->tinggal); ?></th>
                        </tr>
                        <tr>
                            <td width="15%">Informasi Awal Terkait</td>
                            <th width="1%">:</th>
                            <th width="84%"><?php echo e($berita_acara->terkait); ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" width="100%"></th>
                            
                        </tr>
                    </table>
                    
                </div>
            </div>
            
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>


<div class="row">
    <div class="col-md-12">
        <!-- The time line -->
        <div class="timeline">
            <div class="time-label">
                <?php
                    $jum_pertanyaan =0;
                    $penutup =0;
                    $status =0;
                ?>
                <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nomor => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        ++$jum_pertanyaan;
                    ?>
                     <?php if($item->status=='penutup'): ?>
                        <?php
                            $penutup++;
                            $status =1;
                        ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php if($status!=1): ?>
                <button class="btn pertanyaan btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalScrollable">
                    <i class="fas fa-plus-circle"></i>
                    <?php if($jum_pertanyaan==0||$jum_pertanyaan==1): ?>
                        Pembuka
                    <?php else: ?>
                        Terkait Kasus
                    <?php endif; ?>
                </button>
                <?php endif; ?>
                <?php if($penutup<=3 && $jum_pertanyaan>=3): ?>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#penutup">
                    <i class="fas fa-times-circle"></i> Penutup</button>
                <?php endif; ?>
                <?php if(date('ymdhi', strtotime($berita_acara->selesai))!=date('ymdhi', strtotime($berita_acara->created_at))): ?>
                <div class="btn btn-success">
					<i class="fas fa-check-circle"></i> Diselesaikan Pukul <?php echo e(date('H:i', strtotime($berita_acara->selesai))); ?> WITA
				</div>
                <?php endif; ?>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div>
                    <i class="fas <?php if($item->status=='pembuka'): ?>
                        bg-success
                    <?php elseif($item->status=='kasus'): ?>
                        bg-primary
                    <?php else: ?>
                        bg-danger
                    <?php endif; ?>"><?php echo e(++$no); ?></i>
                    <div class="timeline-item card-primary card-outline">
                        
                        <span class="time">
                            <?php if($berita_acara->id_user == Auth::user()->id): ?>
                                <button class="btn btn-tool text-success" data-toggle="modal" data-target="#pertanyaan<?php echo e($item->id); ?>"><i class="fas fa-edit"></i></button>
                            <?php else: ?>
                                <i class="fas fa-clock"></i>
                                <?php echo e($item->created_at->diffForHumans()); ?>

                            <?php endif; ?>
                        </span>
                        <div class="timeline-body">
                            <h6 class="timeline-header text-blue text-bold">
                                <?php echo e($berita_acara->user->name); ?>

                                (Pertanyaan)
                            </h6>
                            <?php echo e($item->pertanyaan.'..?'); ?>

                        </div>
                        <div class="timeline-body text-right border-top">
                            <h6 class="timeline-header text-red text-bold">
                                <?php echo e($berita_acara->nama); ?> (Jawaban)
                            </h6>
                            <?php echo e($item->jawaban.'..!'); ?>

                        </div>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div>
                    <i class="fas bg-danger fa-times-circle"></i>
                    <div class="timeline-item bg-danger">
                        <div class="alert alert-dager">Belum Melakukan Wawancara kepada Saksi</div>
                        
                    </div>
                </div>
            <?php endif; ?>
            <div>
                <i class="fas fa-clock bg-secondary"></i>
                <div style="position: fixed; right: 30px; bottom:25px; z-index:2;"  class="float-right">
                    <?php if($status!=1): ?>
                        <button class="btn btn-primary btn-lg rounded-circle" data-toggle="modal" data-target="#exampleModalScrollable">
                            <i class="fas fa-plus"></i>
                            
                        </button>
                    <?php endif; ?>
                    <?php if($penutup<=3 && $jum_pertanyaan>=3): ?>
                        <button class="btn btn-danger btn-lg rounded-circle" data-toggle="modal" data-target="#penutup">
                        <i class="fas fa-times"></i></button>
                        
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    <?php if($jum_pertanyaan==0): ?>
                        Pertanyaan Pembuka
                    <?php elseif($jum_pertanyaan==1): ?>
                        Pertanyaan Pembuka
                    <?php else: ?>
                        Pertanyaan Terkait Kasus
                    <?php endif; ?>
                </h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/berita_acara/<?php echo e($berita_acara->id); ?>/add_pertanyaan" method="post">
                    <?php echo csrf_field(); ?>
                    <?php if($jum_pertanyaan==0 || $jum_pertanyaan==1 ): ?>
                        <input type="text" hidden name="status" id="" value="pembuka">
                    <?php else: ?>
                        <input type="text" hidden name="status" id="" value="kasus">
                    <?php endif; ?>

                    <div class="form-group">
                        <?php if($jum_pertanyaan==0): ?>
                            <label> Pertanyaan (<span
                                    class="text-blue"><?php echo e($berita_acara->user->name); ?></span>)</label>
                            <h5>Apakah Saudara pada hari ini berada dalam kondisi sehat jasmani dan rohani untuk
                                memberikan keterangan atau jawaban terkait dengan laporan di atas..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah Saudara pada hari ini berada dalam kondisi sehat jasmani dan rohani untuk memberikan keterangan atau jawaban terkait dengan laporan di atas</textarea>
                        <?php elseif($jum_pertanyaan==1): ?>
                            <label> Pertanyaan (<span
                                    class="text-blue"><?php echo e($berita_acara->user->name); ?></span>)</label>
                            
                            <?php if(date('D')=='Mon'): ?>
                                <?php
                                    $hari = 'Senin';
                                ?>
                            <?php elseif(date('D')=='Tue'): ?>
                                <?php
                                    $hari = 'Selasa';
                                ?>
                            <?php elseif(date('D')=='Wed'): ?>
                                <?php
                                    $hari = 'Rabu';
                                ?>
                            <?php elseif(date('D')=='Thu'): ?>
                                <?php
                                    $hari = 'Kamis';
                                ?>
                            <?php elseif(date('D')=='Fri'): ?>
                                <?php
                                    $hari = "Jum'at";
                                ?>
                            <?php elseif(date('D')=='Sat'): ?>
                                <?php
                                    $hari = 'Sabtu';
                                ?>
                            <?php elseif(date('D')=='Sun'): ?>
                                <?php
                                    $hari = 'Minggu';
                                ?>
                            <?php endif; ?>

                            
                            <?php if(date('m')==1): ?>
                                <?php
                                    $bulan = 'Januari';
                                ?>
                            <?php elseif(date('m')==2): ?>
                                <?php
                                    $bulan = 'Februari';
                                ?>
                            <?php elseif(date('m')==3): ?>
                                <?php
                                    $bulan = 'Maret';
                                ?>
                            <?php elseif(date('m')==4): ?>
                                <?php
                                    $bulan = 'April';
                                ?>
                            <?php elseif(date('m')==5): ?>
                                <?php
                                    $bulan = 'Mei';
                                ?>
                            <?php elseif(date('m')==6): ?>
                                <?php
                                    $bulan = 'Juni';
                                ?>
                            <?php elseif(date('m')==7): ?>
                                <?php
                                    $bulan = 'Juli';
                                ?>
                            <?php elseif(date('m')==8): ?>
                                <?php
                                    $bulan = 'Agustus';
                                ?>
                            <?php elseif(date('m')==9): ?>
                                <?php
                                    $bulan = 'September';
                                ?>
                            <?php elseif(date('m')==10): ?>
                                <?php
                                    $bulan = 'Oktober';
                                ?>
                            <?php elseif(date('m')==11): ?>
                                <?php
                                    $bulan = 'November';
                                ?>
                            <?php elseif(date('m')==12): ?>
                                <?php
                                    $bulan = 'Desember';
                                ?>
                            <?php endif; ?>
                            <h5>Apakah pada hari ini <span class="text-red bold"><?php echo e($hari); ?></span> Tanggal <span
                                    class="text-red bold"><?php echo e(date('d').' '.$bulan.' '.date('Y')); ?></span>,
                                Saudara bersedia untuk memberikan keterangan untuk memperjelas adanya informasi awal
                                terkait <span class="text-red bold"><?php echo e($berita_acara->terkait); ?></span>..?</h5>
                            
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah pada hari ini <?php echo e($hari); ?> Tanggal <?php echo e(date('d').' '.$bulan.' '.date('Y')); ?>, Saudara bersedia untuk memberikan keterangan untuk memperjelas adanya informasi awal terkai <?php echo e($berita_acara->terkait); ?></textarea>
                        <?php else: ?>
                            <label for="pertanyaan">Pertanyaan (<span
                                    class="text-blue"><?php echo e($berita_acara->user->name); ?></span>)</label>
                            <textarea name="pertanyaan" id="pertanyaan" placeholder="Masukan Pertanyaan terkait kasus.."
                                cols="30" class="form-control" rows="2"></textarea>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" hidden name="selesai" id="" value="belum">
                        <label for="Jawaban">Jawaban (<span class="text-red"><?php echo e($berita_acara->nama); ?></span>)</label>
                        <textarea name="jawaban" id="Jawaban" placeholder="Masukan Jawaban Saksi.." cols="30"
                            class="form-control" rows="2"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->


<div class="modal fade" id="penutup" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">
                    Pertanyaan Penutup
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="/berita_acara/<?php echo e($berita_acara->id); ?>/add_pertanyaan" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="text" hidden name="status" id="" value="penutup">
                    <div class="form-group">
                        <label> Pertanyaan (<span class="text-blue"><?php echo e($berita_acara->user->name); ?></span>)</label>
                        <?php if($penutup==0): ?>
                            <input type="text" hidden name="selesai" id="" value="belum">
                            <h5>Apakah menurut Saudara, semua keterangan yang Saudara sampaikan sudah benar dan dapat dipertanggung jawabkan..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah menurut Saudara, semua keterangan yang Saudara sampaikan sudah benar dan dapat dipertanggung jawabkan</textarea>
                                            
                        <?php elseif($penutup==1): ?>
                            <input type="text" hidden name="selesai" id="" value="belum">
                            <h5>Apakah masih ada keterangan lain atau keterangan tambahan yang ingin Saudara sampaikan..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah masih ada keterangan lain atau keterangan tambahan yang ingin Saudara sampaikan</textarea>
                        <?php elseif($penutup==2): ?>
                          <input type="text" hidden name="selesai" id="" value="belum">
                            <h5>Apakah Saudara bersedia untuk memberikan keterangan kembali apabila diperlukan..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah Saudara bersedia untuk memberikan keterangan kembali apabila diperlukan</textarea>
                        <?php elseif($penutup==3): ?>
                            <input type="text" hidden name="selesai" id="" value="iya">
                            <h5>Apakah Saudara dalam memberi keterangan atau jawaban merasa tertekan atau terpaksa karena tekanan oleh pemeriksa atau pihak lain..?</h5>
                            <textarea name="pertanyaan" hidden id="pertanyaan" placeholder="Masukan Pertanyaan"
                                cols="30" class="form-control"
                                rows="1">Apakah Saudara dalam memberi keterangan atau jawaban merasa tertekan atau terpaksa karena tekanan oleh pemeriksa atau pihak lain</textarea>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="Jawaban">Jawaban (<span class="text-red"><?php echo e($berita_acara->nama); ?></span>)</label>
                        <textarea name="jawaban" id="Jawaban" placeholder="Masukan Jawaban Saksi.." cols="30"
                            class="form-control" rows="2"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Pertanyaan</button>
                </form>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="editba" tabindex="-1" role="dialog"
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
                <form action="/berita_acara/<?php echo e($berita_acara->id); ?>/edit" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                    <input type="text" name="id_tim" id="" value="<?php echo e($berita_acara->tim->id); ?>" hidden>
                    <div class="form-group">
                        <label for="nama">Nama Saksi</label>
                        <input type="text" value="<?php echo e(old('nama') ?? $berita_acara->nama); ?>" id="nama" name="nama" class="form-control">
                        <?php $__errorArgs = ['nama'];
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
                        <label for="tmpt_lahir">Tempat Lahir</label>
                        <input type="text" value="<?php echo e(old('tmpt_lahir') ?? $berita_acara->tmpt_lahir); ?>" id="tmpt_lahir" name="tmpt_lahir" class="form-control">
                        <?php $__errorArgs = ['tmpt_lahir'];
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
                        <div class="form-group col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl_lahir" value="<?php echo e(old('tgl_lahir') ?? $berita_acara->tgl_lahir); ?>" name="tgl_lahir" class="form-control">
                            <?php $__errorArgs = ['tgl_lahir'];
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
                        <div class="form-group col-md-6">
                            <label for="agama">Agama</label>
                            <select name="agama" class="form-control" id="">
                                <option <?php echo e($berita_acara->agama=='Islam' ? 'selected' : ''); ?> value="Islam">Islam</option>
                                <option <?php echo e($berita_acara->agama=='Kristen' ? 'selected' : ''); ?> value="Kristen">Kristen</option>
                                <option <?php echo e($berita_acara->agama=='Katolik' ? 'selected' : ''); ?> value="Katolik">Katolik</option>
                                <option <?php echo e($berita_acara->agama=='Hindu' ? 'selected' : ''); ?> value="Hindu">Hindu</option>
                                <option <?php echo e($berita_acara->agama=='Budha' ? 'selected' : ''); ?> value="Budha">Budha</option>
                            </select>
                            <?php $__errorArgs = ['agama'];
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
                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" value="<?php echo e(old('pekerjaan') ?? $berita_acara->pekerjaan); ?>" id="pekerjaan" name="pekerjaan" class="form-control">
                        <?php $__errorArgs = ['pekerjaan'];
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
                        <label for="tinggal">Tempat Tinggal</label>
                        <input type="text" value="<?php echo e(old('tinggal') ?? $berita_acara->tinggal); ?>" id="tinggal" name="tinggal" class="form-control">
                        <?php $__errorArgs = ['tinggal'];
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
                        <label for="lokasi_wawancara">Lokasi Wawancara</label>
                        <input type="text" value="<?php echo e(old('lokasi_wawancara') ?? $berita_acara->lokasi_wawancara); ?>" id="lokasi_wawancara" name="lokasi_wawancara" class="form-control">
                        <?php $__errorArgs = ['lokasi_wawancara'];
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
                        <label for="terkait">Masalah Terkait</label>
                        <textarea id="terkait" name="terkait" class="form-control" cols="30" rows="3"><?php echo e(old('terkait') ?? $berita_acara->terkait); ?></textarea>
                        <?php $__errorArgs = ['terkait'];
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
            </div>
        </div>
    </div>
</div>


 
 <?php $__empty_1 = true; $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
     <div class="modal fade" id="pertanyaan<?php echo e($items->id); ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">
                        Edit Pertanyaan Dan Jawaban
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/berita_acara/<?php echo e($items->id); ?>/edit_pertanyaan" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('patch'); ?>
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan (<span
                                    class="text-blue"><?php echo e($berita_acara->user->name); ?></span>)</label>
                            <textarea name="pertanyaan" id="pertanyaan"
                                cols="30" class="form-control" rows="3"><?php echo e(old('pertanyaan') ?? $items->pertanyaan); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="Jawaban">Jawaban (<span class="text-red"><?php echo e($berita_acara->nama); ?></span>)</label>
                            <textarea name="jawaban" id="Jawaban" cols="30"
                                class="form-control" rows="3"><?php echo e(old('jawaban') ?? $items->jawaban); ?></textarea>
                        </div> 
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
     
 <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/berita_acara_detail.blade.php ENDPATH**/ ?>