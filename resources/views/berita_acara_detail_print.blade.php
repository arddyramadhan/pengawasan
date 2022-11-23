<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <style>
        .{
            font-family: Cambria,"Times New Roman",serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            {{-- <div class="card-header">
                <h3 class="card-title">Berita Acara</h3>
                <div class="card-tools">
                    
                </div>
            </div> --}}
            <!-- /.card-header -->
            @if(date('D', strtotime($berita_acara->created_at))=='Mon')
                @php
                    $hari = 'Senin';
                @endphp
            @elseif(date('D', strtotime($berita_acara->created_at))=='Tue')
                @php
                    $hari = 'Selasa';
                @endphp
            @elseif(date('D', strtotime($berita_acara->created_at))=='Wed')
                @php
                    $hari = 'Rabu';
                @endphp
            @elseif(date('D', strtotime($berita_acara->created_at))=='Thu')
                @php
                    $hari = 'Kamis';
                @endphp
            @elseif(date('D', strtotime($berita_acara->created_at))=='Fri')
                @php
                    $hari = "Jum'at";
                @endphp
            @elseif(date('D', strtotime($berita_acara->created_at))=='Sat')
                @php
                    $hari = 'Sabtu';
                @endphp
            @elseif(date('D', strtotime($berita_acara->created_at))=='Sun')
                @php
                    $hari = 'Minggu';
                @endphp
            @endif

            {{-- bulan --}}
            @if(date('m', strtotime($berita_acara->created_at))==1)
                @php
                    $bulan = 'Januari';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==2)
                @php
                    $bulan = 'Februari';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==3)
                @php
                    $bulan = 'Maret';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==4)
                @php
                    $bulan = 'April';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==5)
                @php
                    $bulan = 'Mei';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==6)
                @php
                    $bulan = 'Juni';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==7)
                @php
                    $bulan = 'Juli';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==8)
                @php
                    $bulan = 'Agustus';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==9)
                @php
                    $bulan = 'September';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==10)
                @php
                    $bulan = 'Oktober';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==11)
                @php
                    $bulan = 'November';
                @endphp
            @elseif(date('m', strtotime($berita_acara->created_at))==12)
                @php
                    $bulan = 'Desember';
                @endphp
            @endif
            <div class="card-body p-0">
                    <div class="row justify-content-center">
                        <div class="col-md-10 text-left" style="">
                            --------- Pada hari ini {{$hari}} Tanggal {{date('d', strtotime($berita_acara->created_at))}} bulan {{$bulan}} tahun {{date('Y', strtotime($berita_acara->created_at))}} pukul {{date('H:i', strtotime($berita_acara->created_at))}}
                            Wita,Saya--------------
                        </div>
                    </div>
                    
                    <div class="row d-flex justify-content-center mt-4 mb-4"style=";">
                        <div class="col-md-10">
                        {{-- <p class="">..........................................</p> --}}
                            <div class="col-md-12" style="border-bottom: 3px dotted black"></div>
                            <div class="d-flex justify-content-center">
                                <p class="bg-white text-bold" style="position: absolute; top:-33px">: <u>{{strtoupper($berita_acara->user->name)}}</u> :</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10 text-left" style="">
                            Jabatan sebagai 
                                @forelse ($berita_acara->tim->tim_user as $tem)
                                    @if ($tem->id_user == $berita_acara->id_user)
                                        {{($tem->status == 'ketua' ? 'Ketua' : 'Anggota')}}
                                    @endif
                                @empty
                                @endforelse
                            Tim Penelusuran, pada Badan Pengawas Pemilihan Kabupaten Bone Bolango,    berdasarkan    Surat    Tugas  nomor : @if ($berita_acara->user->jabatan->sebagai=='staf')
								{{$berita_acara->tim->st_sekretaris}}
							@else
								{{$berita_acara->tim->st_ketua}}
							@endif tanggal 09 Oktober 2020, bersama :-------------
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mt-5 mb-4"style=";">
                        <div class="col-md-10">
                        {{-- <p class="">..........................................</p> --}}
                            <div class="col-md-12" style="border-bottom: 3px dotted black"></div>
                            <div class="d-flex justify-content-center">
                                <p class="bg-white text-bold" style="position: absolute; top:-33px">: <u>{{strtoupper($berita_acara->nama)}}</u> :</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10 text-left" style="">
                            @php
                                $date1 = new DateTime(date('Y-m-d', strtotime($berita_acara->tgl_lahir)));
                                $date2 = new DateTime(date('Y-m-d'));
                                $interval = $date1->diff($date2);
                            @endphp
                            Dilahirkan di {{$berita_acara->tmpt_lahir}} tanggal 5  Bulan Juli Tahun 1982 (umur {{$interval->y}} Tahun), pekerjaan {{$berita_acara->pekerjaan}} Agama: {{$berita_acara->agama}} Kewarganegaraan Indonesia, tempat tinggal di {{$berita_acara->tinggal}}
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-10 text-left" style="">
                            Ia <span class="text-bold">(<u>{{$berita_acara->nama}}</u>)</span> didengar keterangannya, untuk memperjelas adanya informasi awal terkait {{$berita_acara->terkait}}-----------------------------------------------------------------------------
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-10 text-left" style="">
                            Atas pertanyaan Saya/Kami, yang bersangkutan menjawab serta menerangkan sebagai berikut:
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-10 text-left" style="">
                            PERTANYAAN:
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-10 text-left" style="">
                            <table class="table-borderless ml-0 p-0" width="100%">
                                <tr>
                                    <td colspan="2" align="left">Pertanyaan Pembuka</td>
                                </tr>
                                @php
                                    $no=0;
                                @endphp
                                @forelse ($berita_acara->detail_berita_acara as $item)
                                    @if ($item->status=='pembuka')
                                    <tr>
                                        <td valign="top" width="5%">{{++$no}}.</td>
                                        <td width="95%">{{$item->pertanyaan}}?------------</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>..........{{$no}}. Jawaban). {{$item->jawaban}} ------------</td>
                                    </tr>
                                    @endif
                                @empty
                                    
                                @endforelse
                            </table>

                            <table class="table-borderless ml-0 p-0 mt-4" width="100%">
                                <tr>
                                    <td colspan="2" align="left">Pertanyaan Isi (Berkaitan dengan Kasus)*</td>
                                </tr>
                                @forelse ($berita_acara->detail_berita_acara as $kasus)
                                    @if ($kasus->status=='kasus')
                                    <tr>
                                        <td valign="top" width="5%">{{++$no}}.</td>
                                        <td width="95%">{{$kasus->pertanyaan}}?------------</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>..........{{$no}}. Jawaban). {{$kasus->jawaban}} ------------</td>
                                    </tr>
                                    @endif
                                @empty
                                    
                                @endforelse
                            </table>

                            <table class="table-borderless ml-0 p-0 mt-4" width="100%">
                                <tr>
                                    <td colspan="2" align="left">Pertanyaan Penutup</td>
                                </tr>
                                @forelse ($berita_acara->detail_berita_acara as $penutup)
                                    @if ($penutup->status=='penutup')
                                    <tr>
                                        <td valign="top" width="5%">{{++$no}}.</td>
                                        <td width="95%">{{$penutup->pertanyaan}}?------------</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>..........{{$no}}. Jawaban). {{$penutup->jawaban}} ------------</td>
                                    </tr>
                                    @endif
                                @empty
                                    
                                @endforelse
                            </table>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3 mb-5 pb-5">
                        <div class="col-md-10 text-right" style="">
                            YANG MEMBERI KETERANGAN,
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3 mb-5">
                        <div class="col-md-10 text-right" style="">
                            (<span class="text-bold">{{strtoupper($berita_acara->nama)}}</span>)
                        </div>
                    </div>


                    @if(date('D', strtotime($berita_acara->selesai))=='Mon')
                        @php
                            $hari2 = 'Senin';
                        @endphp
                    @elseif(date('D', strtotime($berita_acara->selesai))=='Tue')
                        @php
                            $hari2 = 'Selasa';
                        @endphp
                    @elseif(date('D', strtotime($berita_acara->selesai))=='Wed')
                        @php
                            $hari2 = 'Rabu';
                        @endphp
                    @elseif(date('D', strtotime($berita_acara->selesai))=='Thu')
                        @php
                            $hari2 = 'Kamis';
                        @endphp
                    @elseif(date('D', strtotime($berita_acara->selesai))=='Fri')
                        @php
                            $hari2 = "Jum'at";
                        @endphp
                    @elseif(date('D', strtotime($berita_acara->selesai))=='Sat')
                        @php
                            $hari2 = 'Sabtu';
                        @endphp
                    @elseif(date('D', strtotime($berita_acara->selesai))=='Sun')
                        @php
                            $hari2 = 'Minggu';
                        @endphp
                    @endif

                    {{-- bulan --}}
                    @if(date('m', strtotime($berita_acara->selesai))==1)
                        @php
                            $bulan2 = 'Januari';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==2)
                        @php
                            $bulan2 = 'Februari';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==3)
                        @php
                            $bulan2 = 'Maret';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==4)
                        @php
                            $bulan2 = 'April';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==5)
                        @php
                            $bulan2 = 'Mei';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==6)
                        @php
                            $bulan2 = 'Juni';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==7)
                        @php
                            $bulan2 = 'Juli';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==8)
                        @php
                            $bulan2 = 'Agustus';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==9)
                        @php
                            $bulan2 = 'September';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==10)
                        @php
                            $bulan2 = 'Oktober';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==11)
                        @php
                            $bulan2 = 'November';
                        @endphp
                    @elseif(date('m', strtotime($berita_acara->selesai))==12)
                        @php
                            $bulan2 = 'Desember';
                        @endphp
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-10 text-left" style="">
                            --------- Demikian berita acara ini dibuat dengan sebenar-benarnya, kemudian ditutup dan ditanda tangani di {{$berita_acara->lokasi_wawancara}} , pada Pukul {{date('H:i', strtotime($berita_acara->selesai))}} wita,  hari {{$hari2}} tanggal {{date('d', strtotime($berita_acara->selesai))}} {{$bulan2}} Tahun {{date('Y', strtotime($berita_acara->selesai))}} 	
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-5 pb-5">
                        <div class="col-md-10 text-right" style="">
                            YANG MEMINTA KETERANGAN,
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-5">
                        <div class="col-md-10 text-right" style="">
                            (<span class="text-bold">{{strtoupper($berita_acara->user->name)}}</span>)
                        </div>
                    </div>  
            </div>
        </div>
    </div>
</div>

    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>

