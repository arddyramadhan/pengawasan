@extends('master.app')
@section('title', 'Pengawas')
@php
    $judul = 'Detail Kecamatan '.$kecamtan->nama;
@endphp
@section('judul', $judul)
@section('menu', 'Kecamatan')
@section('sub', '')
@section('content')
@include('sess.flash')
<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img style="height: 200px; width: 200px"  class="profile-user-img img-fluid img-circle" src="{{ asset('storage/'.$kecamatan->foto) }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$kecamatan->name}}</h3>

                <p class="text-muted text-center">{{$kecamatan->jabatan->nm_jabatan}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    @php
                        $ia = 0;
                        $lhps = 0 ;
                        $penelusurans = 0 ;
                        $pengawasans = 0;
                    @endphp
                    <li class="list-group-item">
                        
                        @forelse($data as $no => $item_ia )
                            @php
                                $ia++;
                            @endphp
                        @empty
                            
                        @endforelse
                        <b>Informsi Awal</b> <a class="float-right">{{$ia}}</a>
                    </li>
                    <li class="list-group-item">
                        @forelse ($lhp as $no => $item_lhp )
                            @php
                                $lhps++;
                            @endphp
                        @empty
                            
                        @endforelse
                        <b>LHP</b> <a class="float-right">{{$lhps}}</a>
                    </li>
                    <li class="list-group-item">
                        @forelse ($kecamatan->tims as $no => $penel)
                            @if ($penel->status== 'penelusuran')
                                @php
                                    $penelusurans++;
                                @endphp
                            @elseif($penel->status== 'pengawasan')
                                @php
                                    $pengawasans++;
                                @endphp
                            @endif
                        @empty
                            
                        @endforelse
                        <b>Tim Penelusuran</b> <a class="float-right">{{$penelusurans}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Tim Pengawasan</b> <a class="float-right">{{$pengawasans}}</a>
                    </li>
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
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
                    {{$kecamatan->tingkatan->lainnya.' '.$kecamatan->tingkatan->nm_tingkatan}}
                    {{ ($kecamatan->id_tingkatan >= 2 ? 'Kecamatan '.$kecamatan->kecamatan->nama : $kecamatan->kabupaten->status.' '.$kecamatan->kabupaten->nama) }}
                     {{-- {{$kecamatan->level}} --}}
                </p>

                <hr>

                <strong><i class="fas fa-sitemap mr-1"></i> Jabatan</strong>

                <p class="text-muted">{{$kecamatan->jabatan->nm_jabatan}}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">{{$kecamatan->alamat}}</p>

                <hr>

                {{-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                    <span class="tag tag-danger">UI Design</span>
                    <span class="tag tag-success">Coding</span>
                    <span class="tag tag-info">Javascript</span>
                    <span class="tag tag-warning">PHP</span>
                    <span class="tag tag-primary">Node.js</span>
                </p>

                <hr> --}}

                {{-- <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                    neque.</p> --}}
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
                    {{-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li> --}}
                    <li class="nav-item"><a class="{{Request::segment(4) == null ? 'active' : ''}} nav-link" href="/user/{{$kecamatan->id}}/detail">Inforamsi Awal</a></li>
                    <li class="nav-item"><a class="{{Request::segment(4) == 'lhp' ? 'active' : ''}} nav-link" href="/user/{{$kecamatan->id}}/detail/lhp">Laporan Hasil Pengawasan</a></li>
                    <li class="nav-item"><a class="{{Request::segment(4) == 'tim' ? 'active' : ''}} nav-link" href="/user/{{$kecamatan->id}}/detail/tim">Tergabung Dalam tim</a></li>
                    @if ($kecamatan->id == Auth::user()->id || Auth::user()->level=='admin')
                        <li class="nav-item"><a class="{{Request::segment(4) == 'setting' ? 'active' : ''}} nav-link" href="/user/{{$kecamatan->id}}/detail/setting">Settings</a></li>                        
                    @endif
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    @if (Request::segment(4) == null)
                        <div class="active tab-pane">
                            <div class="timeline">
                                @php
                                    $nos = date('ymd');
                                @endphp
                                    @foreach($data as $no => $item )
                                        @php
                                            if (Request::segment(2)) {
                                                $tgl = date('ymd', strtotime($item->updated_at));
                                            } else {
                                                $tgl = date('ymd', strtotime($item->created_at));
                                            }
                                            

                                        @endphp
                                        @if ($nos!=$tgl)
                                            <div class="time-label">
                                                @if (Request::segment(2))
                                                    <span class="bg-red">{{ $item->updated_at->format('d F Y')}}</span>
                                                @else
                                                    <span class="bg-red">{{ $item->created_at->format('d F Y')}}</span>
                                                @endif
                                            </div>
                                            @php
                                                $nos = $tgl;
                                            @endphp
                                        @elseif (date('ymd')==$tgl && $no==0)
                                            <div class="time-label">
                                                <span class="bg-red">Laporan Hari Ini</span>
                                            </div>
                                        @endif
                                        <div>
                                            <i class="fas fa-envelope bg-blue"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="fas fa-clock"></i>
                                                    @if ($item->status=='lengkapi')
                                                        Perlu Dilengkapi 
                                                    @elseif($item->status=='diproses')
                                                        Diproses pada : {{$item->updated_at->diffForHumans() }}
                                                    @elseif($item->status=='buat_tim')
                                                        Diplenokan : {{$item->updated_at->diffForHumans() }}
                                                    @elseif($item->status=='tim_dibuat')
                                                        Pembantukan Tim : {{$item->updated_at->diffForHumans() }}
                                                    @else
                                                        Laporan Tidak Diterima
                                                    @endif
                                                </span>
                                                <h3 class="timeline-header"><a href=""> {{ $item->informasi->nama }}</a>
                                                    (Kode : <span class="text-danger text-bold">IA{{sprintf("%04d", $item->id) }}</span>)
                                                    @if($item->status == 'lengkapi')
                                                        @if(Auth::user()->id == $item->id_user)
                                                            (you)
                                                        @else
                                                            ( {{ $item->user->name }} )
                                                        @endif
                                                    @elseif($item->informasi->status == 'ditangani')
                                                        @if(Auth::user()->id == $item->id_user)
                                                            (you)
                                                        @else
                                                            ( {{ $item->user->name }} )
                                                        @endif
                                                    @elseif($item->informasi->status == 'diproses')
                                                        @if(Auth::user()->id == $item->id_user)
                                                            
                                                        @else
                                                            ( {{ $item->user->name }} )
                                                        @endif
                                                    @else
                                                        @if(Auth::user()->id == $item->id_user)
                                                        
                                                        @else
                                                            ( {{ $item->user->name }} )
                                                        @endif
                                                    @endif

                                                </h3>
                                                <div class="timeline-body">
                                                @if ($item->status=='lengkapi')
                                                    {{ $item->informasi->deskripsi }}
                                                @else
                                                    {{ $item->uraian_kejadian }}
                                                @endif
                                                    
                                                </div>
                                                <div class="timeline-footer">
                                                    @if ($item->status=='lengkapi')
                                                        <form action="/informasi/{{ $item->id_informasi }}/1" method="post">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-primary btn-sm text-white" type="submit">
                                                                <strong>Lihat</strong></button>
                                                        </form>
                                                    @else
                                                        <a href="/informasi_awal/{{$item->id}}/detail" class="btn btn-primary btn-sm text-white">Lihat</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                    <div class="float-right pr-3">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif (Request::segment(4) == 'tim')
                        <table class="table col-md-12" id="myTable">
                            <thead class="">
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th  width="30%" >Tema</th>
                                    {{-- <th></th> --}}
                                    <th  width="50%">Anggota Tim</th>
                                    <th  width="10%">Status</th>
                                    <th  width="5%" style="text-align: center">Detail</th>
                                </tr>
                            </thead>
                            <tbody id="coba">
                                @forelse($kecamatan->tims as $no => $item)
                                    <tr>
                                            <td>{{ ++$no }}</td>
                                            <td>
                                                {{$item->nama}}
                                            </td>
                                            <td>
                                                
                                                <ul class="list-inline">
                                                    @forelse ($item->tim_user as $usr)
                                                        <li class="list-inline-item">
                                                            <img alt="Avatar" class="table-avatar img-circle" title="{{$usr->user->name}}" width="50px" height="50px"  src="{{ asset('storage/'.$usr->user->foto) }}">
                                                        </li>
                                                    @empty
                                                        
                                                    @endforelse
                                                </ul>
                                            </td>
                                            <td>
                                                @if (date('Y-m-d') > date('Y-m-d', strtotime($item->selesai)))
                                                    <div class="badge badge-success">Selesai</div>
                                                @else
                                                    <div class="badge badge-warning">Dalam Proses</div>
                                                @endif
                                            </td>
                                            <td align="center">
                                                @if ($item->status=='penelusuran')
                                                    <a href="/tim/{{$item->id}}" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                                @elseif ($item->status=='pengawasan')
                                                    <a href="/tim/{{$item->id}}/pengawasan" title="Detail" class="btn btn-link text-primary btn-sm"><i class="fa fa-eye"></i></a>                                                    
                                                @endif
                                            </td>
                                        </tr> 
                                @empty
                                    <tr>
                                        <td colspan="6" align="center">
                                            <div class="alert alert-danger alert-sm">Belum ada Data</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @elseif (Request::segment(4) == 'lhp')
                        <div class="timeline" id="informasi" style="z-index: 1;">
                            @php
                            $nos = date('ymd');
                            @endphp
                            @forelse($lhp as $no => $item )
                                @php
                                $tgl = date('ymd', strtotime($item->created_at));
                                @endphp
                                @if($nos!=$tgl)
                                    <div class="time-label">
                                        <span class="bg-red">{{ $item->created_at->format('d F Y') }}</span>
                                    </div>
                                    @php
                                    $nos = $tgl;
                                    @endphp
                                @elseif(date('ymd')==$tgl && $no==0)
                                    <div class="time-label">
                                        <span class="bg-red">Laporan Hari Ini</span>
                                    </div>
                                @endif

                                <div>
                                    <i class="fas fa-file bg-blue"></i>
                                    <div style="font-size: 22px ;font-family: &quot;Times New Roman&quot;"
                                        class="pl-5 pr-5 card timeline-item {{ $item->dugaan=='ada' ? 'card-danger' : 'card-success' }} card-outline collapsed-card">
                                        <div class="card-header card-borderless">
                                            <h3 class="card-title"><span class="text-bold">Laporan Hasil {{ $item->status_lhp=='penelusuran' ? 'Penelusuran' : 'Pengawasan' }}</span> (Dugaan : <span
                                                    class="{{ $item->dugaan=='ada' ? 'text-danger' : 'text-success' }} text-bold">{{ $item->dugaan=='ada' ? 'Ada' : 'Tidak Ada' }}</span>
                                                ) </h3>
                                            <div class="card-tools">
                                                {{-- <a href="/lhp/{{$item->id}}/edit" class="btn btn-tool text-success">
                                                    <i class="fas fa-edit"></i>
                                                </a> --}}
                                                <a href="/lhp/{{$item->id}}/detail" class="btn btn-tool text-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-tool text-secondary" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body card-borderless" style="">
                                            @if ($item->dugaan=='tidak')
                                                <div>
                                                    <p class="text-bold">III. Uraian Hasil Pengawasan : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            {!! $item->uraian_hasil !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div>
                                                    <p class="text-bold">VI. Uraian Dugaan Pelanggaran : </p>
                                                    <div class="row">
                                                        <div class="col-md-12 pr-4">

                                                            {!! $item->uraian_dugaan !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            
                                            

                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                
                            @endforelse
                            <div>
                                <i class="fas fa-clock bg-gray"></i>
                                <div class="float-right pr-3">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    @elseif (Request::segment(4) == 'setting')
                        <div class="tab-pane active" id="settings">
                            <form action="/user/{{$kecamatan->id}}/edit" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" id="" value="{{$kecamatan->name}}" placeholder="Nama lengkap" class="form-control">
                                    </div>
                                </div>
                                @if (Auth::user()->level == 'admin')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10">
                                            <select name="id_jabatan" id="" class="form-control">
                                                <option disabled value="">Choose one!!</option>
                                                @forelse ($jabatan as $jab)
                                                    <option {{$jab->id==$kecamatan->id_jabatan ? 'selected' : ''}} value="{{$jab->id}}">{{$jab->nm_jabatan}}</option>
                                                @empty
                                                    
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" value="{{$kecamatan->email}}" name="email" id="" placeholder="Email." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" id="" placeholder="Password baru" class="form-control">
                                    </div>
                                </div>
                                @if (Auth::user()->level=='admin')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Akses</label>
                                        <div class="col-sm-10">
                                            <select name="level" id="" class="form-control">
                                                <option disabled value="">Choose one!!</option>
                                                <option {{$kecamatan->level == 'admin' ? 'selected' : ''}} value="admin">Admin</option>
                                                <option {{$kecamatan->level == 'user' ? 'selected' : ''}} value="user">User</option>
                                            </select>
                                        </div>
                                    </div>                                                            
                                @endif
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="jk" id="" class="form-control">
                                            <option disabled value="">Choose one!!</option>
                                            <option {{$kecamatan->jk == 'pria' ? 'selected' : ''}} value="pria">Laki - Laki</option>
                                            <option  {{$kecamatan->jk == 'wanita' ? 'selected' : ''}} value="wanita">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" value="{{$kecamatan->alamat}}" id="" placeholder="Alamat." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tlp" id="" value="{{$kecamatan->tlp}}" placeholder="Nomor Telephone" class="form-control">
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
                                {{-- <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                                </div>
                            </form>
                        </div>
                    @endif
                    

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
@endsection

@include('sess.scrpt_flash')


@push('link')
	<link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	{{-- <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> --}}
	{{-- <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> --}}
@endpush

@push('scripts')
	<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable({
				"ordering": false,
			});
		} );
	</script>
@endpush
