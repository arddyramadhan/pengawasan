<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="" class="brand-link">
		<img src="{{ asset('/assets/dist/img/bawaslu.png') }}" alt="AdminLTE Logo" class="brand-image "
			style="width:40px; height: 55px;">
		<span class="brand-text font-weight-light"  style="letter-spacing: 1.5px;">Si<strong>LaHaP</strong></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
					<img src="{{ asset('storage/'.Auth::user()->foto) }}" style="height: 40px; width: 40px" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
					<a href="{{ url('/user/'.Auth::user()->id.'/detail') }}" class="d-block">{{ Auth::user()->name }}</a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
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
						<a href="{{ url('/dashboard') }}" class="nav-link {{Request::segment(1)=='dashboard' ? 'active' : ''}}" >
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					@if ((Auth::user()->level== 'admin' && Auth::user()->id_tingkatan== 1) || (Auth::user()->id_tingkatan== 1 && Auth::user()->id_jabatan <=2))
						<li class="nav-item">
							<a href="{{ url('/informasi') }}" class="nav-link {{Request::segment(1)=='informasi' ? 'active' : ''}}" >
								<i class="nav-icon fas fa-comments"></i>
								<p>Laporan Masyarakat</p>
							</a>
						</li>
					@endif

					<li class="nav-item">
						<a href="{{ url('/informasi_awal') }}" class="nav-link {{Request::segment(1)=='informasi_awal' ? 'active' : ''}}" >
							<i class="nav-icon fas fa-clipboard-check"></i>
							<p>
									Informasi Awal
									{{-- <span class="right badge badge-danger">New</span> --}}
							</p>
						</a>
					</li>

					<li class="nav-item {{Request::segment(1)=='tim' ? 'menu-is-opening menu-open' : ''}}">
						<a href="" class="nav-link {{Request::segment(1)=='tim' ? 'active' : ''}}">
							<i class="nav-icon fas fa-users"></i>
							<p>Tim Pengawasan <i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ url('/tim/pengawasan/status') }}" class="nav-link {{(Request::segment(1)=='tim' && Request::segment(2)=='pengawasan') || (Request::segment(1)=='tim' && Request::segment(3)=='pengawasan') ? 'active' : ''}}">
									<i class="far fa-circle nav-icon"></i>
									<p>Pengawasan</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('/tim/penelusuran/status') }}" class="nav-link {{(Request::segment(1)=='tim' && Request::segment(2)=='penelusuran') || (Request::segment(1)=='tim' && Request::segment(3)==null) ? 'active' : ''}}">
									<i class="far fa-circle nav-icon"></i>
									<p>Penelusuran</p>
								</a>
							</li>
						</ul>
					</li>

					<li class="nav-item {{Request::segment(1)=='lhp' ? 'menu-is-opening menu-open' : ''}}">
						<a href="" class="nav-link {{Request::segment(1)=='lhp' ? 'active' : ''}}">
						<i class=" nav-icon fas fa-file-signature"></i>
						<p>
							Laporan Hasil
							<i class="right fas fa-angle-left"></i>
						</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ url('/lhp/ada/view/pengawasan') }}" class="nav-link {{(Request::segment(1)=='lhp' && Request::segment(4)=='pengawasan') ? 'active' : ''}}">
									<i class="far fa-circle nav-icon"></i>
									<p>Pengawasan Langsung</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('/lhp/ada/view/penelusuran') }}" class="nav-link {{(Request::segment(1)=='lhp' && Request::segment(4)=='penelusuran') ? 'active' : ''}}">
									<i class="far fa-circle nav-icon"></i>
									<p>Penelusuran Inforamsi</p>
								</a>
							</li>
						</ul>
					</li>

					{{-- manajemen wilayah --}}
					@if ((Auth::user()->level=='admin' &&  Auth::user()->id_tingkatan==1) || ((Auth::user()->id_jabatan <= 2) && (Auth::user()->id_tingkatan == 1)) )
						
						<li class="nav-item {{(Request::segment(1)=='kecamatan') || (Request::segment(1)=='kelurahan') ? 'menu-is-opening menu-open' : ''}}">
							<a href="" class="nav-link  {{(Request::segment(1)=='kecamatan') || (Request::segment(1)=='kelurahan') ? 'active' : ''}}">
								<i class="nav-icon fas fa-map-marked-alt"></i>
								<p>Manajemen Wilayah <i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview">
								{{-- @if (Auth::user()->level=='admin' && Auth::user()->id_tingkatan==1) --}}
								@if (Auth::user()->id_tingkatan == 1)
									<li class="nav-item">
										<a href="{{ url('/kecamatan') }}" class="nav-link {{Request::segment(1)=='kecamatan' ? 'active' : ''}}">
											<i class="far fa-circle nav-icon"></i>
											<p>Kecamatan</p>
										</a>
									</li>
								@endif
								<li class="nav-item">
									<a href="{{ url('/kelurahan') }}" class="nav-link {{Request::segment(1)=='kelurahan' ? 'active' : ''}}">
										<i class="far fa-circle nav-icon"></i>
										<p>Kelurahan / Desa</p>
									</a>
								</li>		
							</ul>	
						</li>
					@endif
					{{-- manajemen user --}}
						@if ((Auth::user()->level=='admin' &&  Auth::user()->id_tingkatan==1) || ((Auth::user()->id_jabatan <= 2) && (Auth::user()->id_tingkatan == 1)) )
							<li class="nav-item {{(Request::segment(1)=='user') ? 'menu-is-opening menu-open' : ''}}">
								<a href="" class="nav-link {{(Request::segment(1)=='user') ? 'active' : ''}}">
								<i class="nav-icon fas fa-user-cog"></i>
								<p>
									Manajemen User
									<i class="right fas fa-angle-left"></i>
								</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="{{ url('/user/kabupaten') }}" class="nav-link {{(Request::segment(1)=='user') && (Request::segment(2)=='kabupaten') ? 'active' : ''}}">
											<i class="far fa-user nav-icon"></i>
											<p>{{Auth::user()->kabupaten->nama}}</p>
										</a>
									</li>
									<li class="nav-item {{(Request::segment(1)=='user') && (Request::segment(2)=='kecamatan') && (Request::segment(4)=='table') ? 'menu-is-opening menu-open' : ''}}">
										<a href="" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Kecamatan <i class="right fas fa-angle-left"></i></p>
										</a>
										<ul class="nav nav-treeview">
											@forelse ($kecamatan_side as $kec_side)
												@if ($kec_side->id_kabupaten_kota == Auth::user()->id_kabupaten_kota)
													<li class="nav-item">
													<a href="{{ url('/user/kecamatan/'.$kec_side->id.'/table') }}" class="nav-link">
													<i class="far fa-dot-circle nav-icon"></i>
													<p>{{$kec_side->nama}}</p>
													</a>
												</li>	
												@endif								
											@empty
											@endforelse
										</ul>
									</li>
								</ul>	
							</li>
						@endif
					
					{{-- admin kecamatan --}}
					@if( ((Auth::user()->level=='admin') && (Auth::user()->id_tingkatan == 2)) || ((Auth::user()->id_jabatan <= 2) && (Auth::user()->id_tingkatan == 2)) )
						<li class="nav-item {{(Request::segment(1)=='user' && Request::segment(2)=='kecamatan') || (Request::segment(1)=='user' && Request::segment(2)=='kelurahan') || (Request::segment(1)=='user' && Request::segment(2)=='tps') ? 'menu-is-opening menu-open' : ''}}">
							<a href="" class="nav-link {{(Request::segment(1)=='user') ? 'active' : ''}}">
							<i class="nav-icon fas fa-user-cog"></i>
							<p>
								Manajemen User
								<i class="right fas fa-angle-left"></i>
							</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ url('/user/kecamatan') }}" class="nav-link  {{(Request::segment(1)=='user') && (Request::segment(2)=='kecamatan')? 'active' : ''}}">
										<i class="far fa-user nav-icon"></i>
										<p>Kecamatan {{Auth::user()->kecamatan->nama}}</p>
									</a>
								</li>
								<li class="nav-item  {{(Request::segment(1)=='user' && Request::segment(2)=='kelurahan') || (Request::segment(1)=='user' && Request::segment(2)=='tps') ? 'menu-is-opening menu-open' : ''}}">
									<a href="" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Kelurahan - Desa <i class="right fas fa-angle-left"></i></p>
									</a>
									<ul class="nav nav-treeview"">
										@forelse ($kelurahan_side as $kel_side)
											@if ($kel_side->id_kecamatan == Auth::user()->id_kecamatan)
												<li class="nav-item">
												<a href="{{ url('/user/kelurahan/'.$kel_side->id.'/table_kecamatan') }}" class="nav-link">
												<i class="far fa-dot-circle nav-icon"></i>
												<p>{{$kel_side->nama}}</p>
												</a>
											</li>	
											@endif								
										@empty
											
										@endforelse
									</ul>
								</li>
							</ul>	
						</li>
					@endif
					
					{{-- <li class="nav-item">
						<a href="/user" class="nav-link " >
							<i class="nav-icon fas fa-user-cog"></i>
							<p>Manajemen User</p>
						</a>
					</li> --}}
					@if (Auth::user()->level=='admin' && Auth::user()->id_tingkatan==1)
						<li class="nav-item">
							<a href="/kabupaten/{{Auth::user()->id_kabupaten_kota}}" class="nav-link {{(Request::segment(1)=='kabupaten') ? 'active' : ''}}" >
								<i class="nav-icon fas fa-cogs"></i>
								<p>Pengaturan</p>
							</a>
						</li>
					@endif

					@if (Auth::user()->level=='admin' && Auth::user()->id_tingkatan==2)
						<li class="nav-item">
							<a href="/kecamatan/{{Auth::user()->id_kabupaten_kota}}" class="nav-link  {{(Request::segment(1)=='kecamatan') ? 'active' : ''}}" >
								<i class="nav-icon fas fa-cogs"></i>
								<p>Pengaturan</p>
							</a>
						</li>
					@endif
					
					<li class="nav-item">
						<a href="#" class="nav-link" data-toggle="modal" data-target="#examplelogout">
							<i class="nav-icon fas fa-sign-out-alt"></i>
							<p>
								Log Out
								{{-- <span class="right badge badge-danger">New</span> --}}
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
						<h1 class="m-0">@yield('judul')</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item">@yield('menu')</li>
							<li class="breadcrumb-item active">@yield('sub')</li>
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
						<form action="{{ url('/out') }}" method="post">
						@csrf
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
	<section class="content">