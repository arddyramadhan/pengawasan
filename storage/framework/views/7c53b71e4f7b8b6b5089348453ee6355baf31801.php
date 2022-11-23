<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="" class="brand-link">
		<img src="<?php echo e(asset('/assets/dist/img/bawaslu.png')); ?>" alt="AdminLTE Logo" class="brand-image "
			style="width:40px; height: 55px;">
		<span class="brand-text font-weight-light"  style="letter-spacing: 1.5px;">Si<strong>LaHaP</strong></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
					<img src="<?php echo e(asset('storage/'.Auth::user()->foto)); ?>" style="height: 40px; width: 40px" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
					<a href="<?php echo e(url('/user/'.Auth::user()->id.'/detail')); ?>" class="d-block"><?php echo e(Auth::user()->name); ?></a>
			</div>
		</div>

		<!-- SidebarSearch Formjndjejdeksndjsdhdjelsk -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
					<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-sidebar">
							<i class="fas fa-search fa-fw"></i>
						</button>
					</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item">
						<a href="<?php echo e(url('/dashboard')); ?>" class="nav-link <?php echo e(Request::segment(1)=='dashboard' ? 'active' : ''); ?>" >
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo e(url('/jabatan')); ?>" class="nav-link <?php echo e(Request::segment(1)=='jabatan' ? 'active' : ''); ?>" >
							
							<i class="nav-icon fas fa-solid fa-network-wired"></i>
							<p>Jabatan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo e(url('/tingkatan')); ?>" class="nav-link <?php echo e(Request::segment(1)=='tingkatan' ? 'active' : ''); ?>" >
							
							<i class="nav-icon fa-solid fas fa-list-ol"></i>
							
							<p>Tingkatan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo e(url('/kabupaten')); ?>" class="nav-link <?php echo e(Request::segment(1)=='kabupaten' ? 'active' : ''); ?>" >
							
							<i class="nav-icon fas fa-map-marked-alt"></i>
							
							<p>Manajemen Wilayah</p>
						</a>
					</li>
					
					
						<?php if((Auth::user()->level=='super' &&  Auth::user()->id_tingkatan==1) || ((Auth::user()->id_jabatan <= 2) && (Auth::user()->id_tingkatan == 1)) ): ?>
							<li class="nav-item <?php echo e((Request::segment(1)=='user') ? 'menu-is-opening menu-open' : ''); ?>">
								<a href="" class="nav-link <?php echo e((Request::segment(1)=='user') ? 'active' : ''); ?>">
								<i class="nav-icon fas fa-user-cog"></i>
								<p>
									Manajemen User
									<i class="right fas fa-angle-left"></i>
								</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?php echo e(url('/user/kabupaten')); ?>" class="nav-link <?php echo e((Request::segment(1)=='user') && (Request::segment(2)=='kabupaten') ? 'active' : ''); ?>">
											<i class="far fa-user nav-icon"></i>
											<p><?php echo e(Auth::user()->kabupaten->nama); ?></p>
										</a>
									</li>
                                    
									
								</ul>	
							</li>
						<?php endif; ?>
					
					
					<li class="nav-item">
						<a href="#" class="nav-link" data-toggle="modal" data-target="#examplelogout">
							<i class="nav-icon fas fa-sign-out-alt"></i>
							<p>
								Log Out
								
							</p>
						</a>
					</li>



			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0"><?php echo $__env->yieldContent('judul'); ?></h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><?php echo $__env->yieldContent('menu'); ?></li>
							<li class="breadcrumb-item active"><?php echo $__env->yieldContent('sub'); ?></li>
						</ol>
					</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
<div class="modal fade" id="examplelogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="<?php echo e(url('/out')); ?>" method="post">
							<?php echo csrf_field(); ?>
							<h5>Apakah anda yakin ingin keluar..?</h5>
					</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-danger">Logout</button>
						</form>
					</div>
			</div>
		</div>
	</div>
	<!-- Main content -->
	<section class="content"><?php /**PATH E:\skripsi\app\pengawasan\resources\views/master/sidebar_super.blade.php ENDPATH**/ ?>