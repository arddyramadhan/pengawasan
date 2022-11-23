
<?php $__env->startSection('title', 'Pengawas'); ?>
<?php $__env->startSection('judul', 'Profil Pengguna'); ?>
<?php $__env->startSection('menu', 'Pengaturan'); ?>
<?php $__env->startSection('sub', 'Pengawas'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sess.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-3">


        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img style="height: 200px; width: 200px"  class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('storage/'.$user->foto)); ?>"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo e($user->name); ?></h3>

                <p class="text-muted text-center"><?php echo e($user->jabatan->nm_jabatan); ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <?php
                        $ia = 0;
                        $lhps = 0 ;
                        $penelusurans = 0 ;
                        $pengawasans = 0;
                    ?>
                    <li class="list-group-item">
                        
                        <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item_ia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $ia++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
                        <?php endif; ?>
                        <b>Informasi Awal</b> <a class="float-right"><?php echo e($ia); ?></a>
                    </li>
                    <li class="list-group-item">
                        <?php $__empty_1 = true; $__currentLoopData = $lhp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item_lhp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $lhps++;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
                        <?php endif; ?>
                        <b>LHP</b> <a class="float-right"><?php echo e($lhps); ?></a>
                    </li>
                    <li class="list-group-item">
                        <?php $__empty_1 = true; $__currentLoopData = $user->tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $penel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php if($penel->status== 'penelusuran'): ?>
                                <?php
                                    $penelusurans++;
                                ?>
                            <?php elseif($penel->status== 'pengawasan'): ?>
                                <?php
                                    $pengawasans++;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
                        <?php endif; ?>
                        <b>Tim Penelusuran</b> <a class="float-right"><?php echo e($penelusurans); ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Tim Pengawasan</b> <a class="float-right"><?php echo e($pengawasans); ?></a>
                    </li>
                </ul>

                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tentang Saya</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-hotel mr-1"></i> Lembaga</strong>

                <p class="text-muted">
                    <?php echo e($user->tingkatan->lainnya.' '.$user->tingkatan->nm_tingkatan); ?>

                    <?php echo e(($user->id_tingkatan >= 2 ? 'Kecamatan '.$user->kecamatan->nama : $user->kabupaten->status.' '.$user->kabupaten->nama)); ?>

                     
                </p>

                <hr>

                <strong><i class="fas fa-sitemap mr-1"></i> Jabatan</strong>

                <p class="text-muted"><?php echo e($user->jabatan->nm_jabatan); ?></p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted"><?php echo e($user->alamat); ?></p>

                <hr>

                

                
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    
                    <li class="nav-item"><a class="<?php echo e(Request::segment(4) == null ? 'active' : ''); ?> nav-link" href="/user/<?php echo e($user->id); ?>/detail">Inforamsi Awal</a></li>
                    <li class="nav-item"><a class="<?php echo e(Request::segment(4) == 'lhp' ? 'active' : ''); ?> nav-link" href="/user/<?php echo e($user->id); ?>/detail/lhp">Laporan Hasil Pengawasan</a></li>
                    <li class="nav-item"><a class="<?php echo e(Request::segment(4) == 'tim' ? 'active' : ''); ?> nav-link" href="/user/<?php echo e($user->id); ?>/detail/tim">Tergabung Dalam tim</a></li>
                    <?php if($user->id == Auth::user()->id || Auth::user()->level=='admin'): ?>
                        <li class="nav-item"><a class="<?php echo e(Request::segment(4) == 'setting' ? 'active' : ''); ?> nav-link" href="/user/<?php echo e($user->id); ?>/detail/setting">Settings</a></li>                        
                    <?php endif; ?>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <?php if(Request::segment(4) == null): ?>
                        <div class="active tab-pane">
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
                                                <h3 class="timeline-header"><a href=""> <?php echo e($item->informasi->nama); ?></a> <strong>|</strong> Kode : <span class="text-danger text-bold">IA<?php echo e(sprintf("%04d", $item->id)); ?></span>
                                                    <?php if($item->status == 'lengkapi'): ?>
                                                        <?php if(Auth::user()->id == $item->id_user): ?>
                                                            <strong>|</strong> Perlu Ditangani
                                                        <?php else: ?>
                                                            <strong>|</strong> Perlu Ditangani 
                                                        <?php endif; ?>
                                                    <?php elseif($item->informasi->status == 'ditangani'): ?>
                                                        <?php if(Auth::user()->id == $item->id_user): ?>
                                                            <strong>|</strong> Ditangani
                                                        <?php else: ?>
                                                            <strong>|</strong> Ditangani 
                                                        <?php endif; ?>
                                                    <?php elseif($item->informasi->status == 'diproses'): ?>
                                                        <?php if(Auth::user()->id == $item->id_user): ?>
                                                            <strong>|</strong> Diproses
                                                        <?php else: ?>
                                                            <strong>|</strong> Diproses 
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if(Auth::user()->id == $item->id_user): ?>
                                                        
                                                        <?php else: ?>
                                                            <strong>|</strong> <?php echo e($item->user->name); ?> 
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                </h3>
                                                <div class="timeline-body">
                                                <?php if($item->status=='lengkapi'): ?>
                                                    <?php echo e($item->informasi->deskripsi); ?>

                                                <?php else: ?>
                                                    <?php echo e($item->uraian_kejadian); ?>

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
                    <?php elseif(Request::segment(4) == 'tim'): ?>
                        <table class="table col-md-12" id="myTable">
                            <thead class="">
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th  width="30%" >Tema</th>
                                    
                                    <th  width="50%">Anggota Tim</th>
                                    <th  width="10%">Status</th>
                                    <th  width="5%" style="text-align: center">Detail</th>
                                </tr>
                            </thead>
                            <tbody id="coba">
                                <?php $__empty_1 = true; $__currentLoopData = $user->tims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                            <td><?php echo e(++$no); ?></td>
                                            <td>
                                                <?php echo e($item->nama); ?>

                                            </td>
                                            <td>
                                                
                                                <ul class="list-inline">
                                                    <?php $__empty_2 = true; $__currentLoopData = $item->tim_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                        <li class="list-inline-item">
                                                            <img alt="Avatar" class="table-avatar img-circle" title="<?php echo e($usr->user->name); ?>" width="50px" height="50px"  src="<?php echo e(asset('storage/'.$usr->user->foto)); ?>">
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                        
                                                    <?php endif; ?>
                                                </ul>
                                            </td>
                                            <td align="center">
                                                <?php if($item->status == 'penelusuran'): ?>
                                                    <div class="badge badge-info">Penelusuran</div>
                                                <?php else: ?>
                                                    <div class="badge badge-warning">Pengawasan</div>
                                                <?php endif; ?>
                                                <?php if(date('Y-m-d') > date('Y-m-d', strtotime($item->selesai))): ?>
                                                    <div class="badge badge-success">Selesai</div>
                                                <?php else: ?>
                                                    <div class="badge badge-warning">Dalam Proses</div>
                                                <?php endif; ?>
                                            </td>
                                            <td align="center">
                                                <?php if($item->status=='penelusuran'): ?>
                                                    <a href="/tim/<?php echo e($item->id); ?>" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                                <?php elseif($item->status=='pengawasan'): ?>
                                                    <a href="/tim/<?php echo e($item->id); ?>/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                                <?php endif; ?>
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
                    <?php elseif(Request::segment(4) == 'lhp'): ?>
                        <div class="timeline" id="informasi" style="z-index: 1;">
                            <?php
                            $nos = date('ymd');
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $lhp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                    <i class="fas fa-file bg-blue"></i>
                                    <div style="font-size: 22px ;font-family: &quot;Times New Roman&quot;"
                                        class="pl-5 pr-5 card timeline-item 
                                        <?php if($item->dugaan == 'ada'): ?>
                                            card-danger
                                        <?php elseif($item->dugaan == 'tidak'): ?>
                                            card-success
                                        <?php elseif($item->dugaan == 'belum'): ?>
                                            card-warning
                                        <?php elseif($item->dugaan == 'pleno'): ?>
                                            card-primary
                                        <?php endif; ?> 
                                        card-outline collapsed-card">
                                        <div class="card-header card-borderless">
                                            <h3 class="card-title"><span class="text-bold">Laporan Hasil <?php echo e($item->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan'); ?></span> 
                                            <?php if($item->dugaan == 'pleno' || $item->dugaan == 'belum'): ?>
                                                <span class="text-bold">|</span> Tahapan : <span class="right badge badge-sm <?php echo e($item->dugaan=='pleno' ? 'badge-primary' : 'badge-warning'); ?> "><?php echo e($item->dugaan=='pleno' ? 'Pleno' : 'Penyusunan'); ?></span>
                                            <?php else: ?>
                                                | Dugaan
                                                Pelanggaran : <span
                                                class="right badge badge-sm <?php echo e($item->dugaan=='ada' ? 'badge-danger' : 'badge-success'); ?> text-bold"><?php echo e($item->dugaan=='ada' ? 'Ada' : 'Tidak Ada'); ?></span>
                                            <?php endif; ?>
                                            </h3>
                                            <div class="card-tools">
                                                
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
                                            <?php if($item->dugaan=='tidak'): ?>
                                                <div>
                                                    <p class="text-bold">III. Uraian Hasil Pengawasan : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            <?php echo $item->uraian_hasil; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div>
                                                    <p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            <?php echo $item->uraian_dugaan; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                            <?php endif; ?>
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                                <div class="float-right pr-3">
                                    <?php echo e($lhp->links()); ?>

                                </div>
                            </div>
                        </div>
                    <?php elseif(Request::segment(4) == 'setting'): ?>
                        <div class="tab-pane active" id="settings">
                            <form action="/user/<?php echo e($user->id); ?>/edit" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('patch'); ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="" value="<?php echo e($user->name); ?>" placeholder="Nama lengkap" class="form-control">
                                    </div>
                                </div>
                                <?php if(Auth::user()->level == 'admin'): ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select name="id_jabatan" id="" class="form-control">
                                                <option disabled value="">Choose one!!</option>
                                                <?php $__empty_1 = true; $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option <?php echo e($jab->id==$user->id_jabatan ? 'selected' : ''); ?> value="<?php echo e($jab->id); ?>"><?php echo e($jab->nm_jabatan); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" value="<?php echo e($user->email); ?>" name="email" id="" placeholder="Email." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" id="" placeholder="Password baru" class="form-control">
                                    </div>
                                </div>
                                <?php if(Auth::user()->level=='admin'): ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Akses</label>
                                        <div class="col-sm-10">
                                            <select name="level" id="" class="form-control">
                                                <option disabled value="">Choose one!!</option>
                                                <option <?php echo e($user->level == 'admin' ? 'selected' : ''); ?> value="admin">Admin</option>
                                                <option <?php echo e($user->level == 'user' ? 'selected' : ''); ?> value="user">User</option>
                                            </select>
                                        </div>
                                    </div>                                                            
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="jk" id="" class="form-control">
                                            <option disabled value="">Choose one!!</option>
                                            <option <?php echo e($user->jk == 'pria' ? 'selected' : ''); ?> value="pria">Laki - Laki</option>
                                            <option  <?php echo e($user->jk == 'wanita' ? 'selected' : ''); ?> value="wanita">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" value="<?php echo e($user->alamat); ?>" id="" placeholder="Alamat." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tlp" id="" value="<?php echo e($user->tlp); ?>" placeholder="Nomor Telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Masukan Foto Baru..</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                    

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sess.scrpt_flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startPush('link'); ?>
	<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	
	
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable({
				"ordering": false,
			});
		} );
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\skripsi\app\pengawasan\resources\views/pengawas_detail.blade.php ENDPATH**/ ?>