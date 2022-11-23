@extends('master.app')
@section('title', 'Laporan Hasil Pengawasan')
@section('judul', 'Laporan Hasil Pengawasan')
@if ($tim->status=='penelusuran')
	@section('menu', 'Tim Penelusuran')	
@else
	@section('menu', 'Pengawasan Langsung')
@endif
@section('sub', 'LHP')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Form Pengisian</h3>
                <div class="card-tools">
                    {{-- <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
<a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a> --}}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-3">
                <div class="form-group">
                    <form action="/lhp/store" method="post">
                        @csrf
                        <input hidden type="text" class="form-control" name="id_tim" id="" value="{{ $tim->id }}">
						<input hidden type="text" class="form-control" name="status_lhp" id="" value="{{ $tim->status }}">
                        <div class="form-group">
                            <label for="tahapan">Tahapan Yang Di Awasi</label>
                            <textarea id="tahapan" placeholder="Tahapan Yang Di Awasi" name="tahapan"
                                class="form-control @error('tahapan') border-danger @enderror" cols="30"
                                rows="2">{{(old('tahapan') ?? '' )}}</textarea>
                            @error('tahapan')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Bentuk Pengawasan</label>
                            <select name="bentuk" id="" class="form-control">
                                <option value="" selected disabled>Choose One</option>
                                <option value="langsung">Langsung</option>
                                <option value="tidak">Tidak Langsung</option>
                            </select>
                            @error('bentuk')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Pihak yang di awasi</label>
                            <div class="row">
                                <div class="custom-control custom-checkbox col">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                    <label for="customCheckbox2" class="custom-control-label">Custom Checkbox checked</label>
                                </div>
                                <div class="custom-control custom-checkbox col">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                    <label for="customCheckbox2" class="custom-control-label">Custom Checkbox checked</label>
                                </div>
                                <div class="custom-control custom-checkbox col">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                    <label for="customCheckbox2" class="custom-control-label">Custom Checkbox checked</label>
                                </div>
                                <div class="custom-control custom-checkbox col">
                                    <input class="custom-control-input" type="checkbox" id="customCheckbox2" checked>
                                    <label for="customCheckbox2" class="custom-control-label">Custom Checkbox checked</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="diawasi">Pihak Yang Diawasi</label>
                            <textarea id="diawasi" name="diawasi" placeholder="Pihak Yang Di Awasi" class="form-control"
                                cols="30" rows="2">{{(old('diawasi') ?? '' )}}</textarea>
                                {{-- <div class="row">
                                    <div class="col-sm-12 mb-1">
                                        
                                        <table class="table-borderless" width="100%">
                                            <tr>
                                                <td width="100%">
                                                    <div class="select2-blue">
                                                    <select name="diawasi[]" class="select2 select2-hidden-accessible" multiple="multiple" data-placeholder="Tambahkan Pihak Yang Diawasi..." data-dropdown-css-class="select2-blue" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                                        
                                                        <optgroup label="Utama">
                                                            <option value="KPU RI">KPU RI</option>
                                                            <option value="KPU Provinsi">KPU Provinsi</option>
                                                            <option value="KPU Kabupaten/Kota">KPU Kabupaten/Kota</option>
                                                            <option value="PPK">PPK</option>
                                                            <option value="PPS">PPS</option>
                                                            <option value="PPDP">PPDP</option>
                                                            <option value="KPPS">KPPS</option>
                                                            <option value="Pasangan Calon">Pasangan Calon</option>
                                                            <option value="Tim Sukses">Tim Sukses</option>
                                                            <option value="Tim Kampanye">Tim Kampanye</option>
                                                            <option value="Pelaksana Kampanye">Pelaksana Kampanye</option>
                                                            <option value="Pengurus Partai Politik">Pengurus Partai Politik</option>
                                                        </optgroup>
                                                    </select>
                                                    </div>
                                                </td>
                                                <td valign="top" width="10%">
                                                    <div class="btn btn-lg btn-link"  data-toggle="modal" data-target="#pihak"><i class="fas fa-plus-circle"></i></div>
                                                </td>
                                            </tr>
                                        
                                        </table>
                                    </div> 
                                </div> --}}
                            @error('diawasi')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="mulai">Waktu Mulai</label>
									<input type="datetime-local" value="{{date('Y-m-d\TH:i')}}" name="mulai" id="mulai" class="form-control">
									 @error('mulai')
										<div class="text-danger">Tidak boleh kosong</div>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="selesai">Waktu Selesai</label>
									<input type="datetime-local"  value="{{date('Y-m-d\TH:i')}}" name="selesai" id="selesai" class="form-control">
									 @error('selesai')
										<div class="text-danger">Tidak boleh kosong</div>
									@enderror
								</div>
							</div>
						</div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi Pengawasan</label>
                            <textarea id="lokasi" name="lokasi" placeholder="Lokasi Pengawasan" class="form-control"
                                cols="30" rows="2">{{(old('lokasi') ?? '' )}}</textarea>
                            @error('lokasi')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="uraian_hasil">Uraian Hasil Kejadian</label>
                            <textarea id="uraian_hasil" style="height: 500px;" name="uraian_hasil" class="form-control summernote"
                                cols="30" rows="10">{{(old('uraian_hasil') ?? '' )}}</textarea>
                            @error('uraian_hasil')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="">Dugaan pelanggaran</label>
                            <select name="dugaan" id="dugaan" class="form-control">
                                <option value="" selected disabled>Choose One</option>
                                <option value="ada">Ada</option>
                                <option value="tidak">Tidak ada</option>
                            </select>
                            @error('dugaan')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tempat_kejadian">Tempat Kejadian</label>
                            <input type="text" id="tempat_kejadian" placeholder="Tempat Kejadian" name="tempat_kejadian"
                                class="form-control">
                            @error('tempat_kejadian')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Waktu Kejadian</label>
                            <input type="date" name="waktu_kejadian" id="" class="form-control">
                            @error('waktu_kejadian')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pelaku <button class="btn btn-primary"><i class="fas fa-plus"></i>
                                </button></label>
                            <input type="date" name="" id="" class="form-control">
                            @error('waktu_kejadian')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="uraian_dugaan">Uraian Dugaan Pelanggaran</label>
                            <textarea style="height: 300px;" name="uraian_dugaan" class="form-control summernote"
                                cols="30" rows="10"></textarea>
                            @error('uraian_dugaan')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 m-0 card card-borderless collapsed-card shadow-none ">
                                    <div class="card-header p-0 d-flex content-justify-left">
                                        <label for=""> <span class="size-10 mr-2"> Saksi - Saksi </span> <span class="badge badge-primary" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </span></label>
                                    </div>
                                    <div class="card-body m-0  card-borderless" style="display: none;">
                                        <div class="form-group">
                                            <input type="text" placeholder="Masukan Nama Pelaku..." name="nama" id="nama" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <table class="m-0 ml-4 table-sm">
                                <tbody>
                                   
                                </tbody>
                            </table>
                            @error('waktu_kejadian')
                                <div class="text-danger">Tidak boleh kosong</div>
                            @enderror
                        </div> --}}
                    
                </div>
            </div>
            <div class="card-footer">
				@if ($tim->status=='penelusuran')
					<a href="/tim/{{$tim->id}}" class="btn btn-secondary">Kembali</a>	
				@else
					<a href="/tim/{{$tim->id}}/pengawasan" class="btn btn-secondary">Kembali</a>
				@endif
                
                <div class="float-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#masyarakat"><i
                            class="fas fa-file-signature"></i> Simpan</button>
                </div>

                    {{-- Masyarakat --}}
                    <div class="modal fade" id="masyarakat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="text-bold">Apakah Laporan Hasil Pengawasan telah <span class="text-success">Selesai</span> dibuat..?
                                        </h5>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="konfirmasi" value="Belum" class="btn btn-info">
                                    <input type="submit" name="konfirmasi" value="Selesai" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="pihak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title" id="exampleModalLabel">Pihak Lainnya</h4>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <input type="text" id="nomor" class="form-control">
                <input value="tambah" class="btn btn-sm btn-primary" data-dismiss="modal" aria-label="Close" type="button" onclick="add();" />
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
    var tampung_array = [];

    function add() {
        var masukan = document.getElementById("nomor");
        tampung_array.push(masukan.value);
        masukan.value = "";
        show();
    }

    function hapus(nilai) {

        // console.log(nilai);
    // var arr = ["orange","red","black", "orange", "white" , "orange" ];
    tampung_array.splice(nilai, 1);
    // nama_array.splice(nilai, 1);
    show();
    }

     function show() {
        var html = "";
        for (var i = 0; i < tampung_array.length; i++) {
        // html += '<option value="KPU RI">KPU RI</option>';
        // html += '<option value="KPU Provinsi">KPU Provinsi</option>';
        // html += '<option value="KPU Kabupaten/Kota">KPU Kabupaten/Kota</option>';
        // html += '<option value="PPK">PPK</option>';
        // html += '<option value="PPS">PPS</option>';
        // html += '<option value="PPDP">PPDP</option>';
        // html += '<option value="KPPS">KPPS</option>';
        // html += '<option value="Pasangan Calon">Pasangan Calon</option>';
        // html += '<option value="Tim Sukses">Tim Sukses</option>';
        // html += '<option value="Tim Kampanye">Tim Kampanye</option>';
        // html += '<option value="Pelaksana Kampanye">Pelaksana Kampanye</option>';
        // html += '<option value="Pengurus Partai Politik">Pengurus Partai Politik</option>';
        html += "<option value="+ tampung_array[i] +">" + tampung_array[i] + "</option>";

        }

        var tampil = document.getElementById("tampil");
        tampil.innerHTML = html;

    }  
    </script>
    
@endpush