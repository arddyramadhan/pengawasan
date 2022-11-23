<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <style>
        *{
            font-family: "Bookman Old Style", serif;
        }
    </style>
</head>

<body>
<div class="row pl-5 pr-5" style="padding: 0px 10px 0px 10px ">

    {{-- <img src="<?php echo asset('storage/img/cop/bawaslu.png')?>" width="100px" height="100px" alt=""> --}}
    <div class="row">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/img/cop/bawaslu.png'))) }}" width="220px" height="90px" alt="">
    </div>
    <div class="row">
        <table>
            <tr>
                <td style="font-size: 13px"><i> Jln. Danau Perintis No 04 Desa Boludawa <br>Kecamatan Suwawa Kabupaten Bone Bolango <br>Email : bawaslubonebolango@gmail.com</i></td>
            </tr>
        </table>
    </div>
    <hr style="border: 2px solid black;">
    <div class="row" style="padding: 10px 20px 0px 20px; font-size: 18px">
        {{-- <div class="row">
            <table width="100%">
                <tr>
                    <td style="" align="right">Formulir Model A.6.1</td>
                </tr>
            </table>
        </div> --}}
        <div class="row">
            <table width="100%">
                <tr>
                    <td style="" align="right">Formulir Model A.6.1</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="" align="center">BERITA ACARA KETERANGAN INFORMASI AWAL</td>
                </tr>
            </table>
        </div>
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

             <div class="row" style="margin-top: 20px; ">
                <table width="100%">
                    <tr>
                        <td style="text-align: justify" align="">--------- Pada hari ini {{$hari}} Tanggal {{date('d', strtotime($berita_acara->created_at))}} bulan {{$bulan}} tahun {{date('Y', strtotime($berita_acara->created_at))}} pukul {{date('H:i', strtotime($berita_acara->created_at))}} Wita ,Saya--------------</td>
                    </tr>
                </table>
            </div>
            {{-- <div class="row" style="margin-top: 20px; text-align: center">
                <div class="col-md-12" style="border-bottom: 2px dotted black; position: relative; text-align: center; margin-left: auto;margin-right: auto;left: 0;right: 0;">
                    <center>
                    <div style="position: absolute; top: -37px; text-align: center"> <span style="font-weight: bold; width:100%;text-align: center;margin: auto; border-bottom: 3px solid black;">: {{strtoupper($berita_acara->user->name)}} :</span></div></center>
                </div>
                
                
            </div> --}}

            <div class="row" style="margin-top: 15px">
                <table width="100%">
                    <tr>
                        {{-- <td align="center" style="border-bottom: 2px dotted black; padding: 0px;z-index: 1;"><span style="z-index: 100;font-weight: bold; width:100%;text-align: center;margin: auto;"><u style="0px 4px 0px black;">:{{strtoupper($berita_acara->user->name)}}:</u></span> --}}
                        <p class="row" style="border-bottom: 2px dotted balck; position: relative; text-align: center"><span style="font-weight: bold;border-bottom: 3px solid black; top: -22px ; position: absolute;left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%)">:{{strtoupper($berita_acara->user->name)}}:</span></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row" style="text-align: justify">
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
            <div class="row" style="text-align: justify; margin-top: 15px">
                Jabatan sebagai {{$berita_acara->user->jabatan->nm_jabatan}}, pada Badan Pengawas Pemilihan Kabupaten Bone Bolango tersebut di atas, telah meminta keterangan dalam rangka penelusuran informasi awal, dari seorang yang bernama: :-------------
            </div>
            <div class="row" style="margin-top: 15px">
                <table width="100%">
                    <tr>
                        {{-- <td align="center" style="border-bottom: 2px dotted black; padding: 0px;z-index: 1;"><span style="z-index: 100;font-weight: bold; width:100%;text-align: center;margin: auto;"><u style="0px 4px 0px black;">:{{strtoupper($berita_acara->user->name)}}:</u></span> --}}
                        <p class="row" style="border-bottom: 2px dotted balck; position: relative; text-align: center"><span style="font-weight: bold;border-bottom: 3px solid black; top: -22px ; position: absolute;left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%)">:{{strtoupper($berita_acara->nama)}}:</span></p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row" style="text-align: justify; margin-top: 5px">
                @php
                    $date1 = new DateTime(date('Y-m-d', strtotime($berita_acara->tgl_lahir)));
                    $date2 = new DateTime(date('Y-m-d'));
                    $interval = $date1->diff($date2);
                @endphp
                Dilahirkan di {{$berita_acara->tmpt_lahir}} tanggal 5  Bulan Juli Tahun 1982 (umur {{$interval->y}} Tahun), pekerjaan {{$berita_acara->pekerjaan}} Agama: {{$berita_acara->agama}} Kewarganegaraan Indonesia, tempat tinggal di {{$berita_acara->tinggal}}
            </div>
            <div class="row" style="text-align: justify; margin-top: 15px">
                Ia <span>(<u style="font-weight: bold;">{{strtoupper($berita_acara->nama)}}</u>)</span> didengar keterangannya, untuk memperjelas adanya informasi awal terkait {{$berita_acara->terkait}}-----------------------------------------------------------------------------
            </div>
            <div class="row" style="text-align: justify; margin-top:15px">
                Atas pertanyaan Saya/Kami, yang bersangkutan menjawab serta menerangkan sebagai berikut:
            </div>
            <div class="row" style="text-align: left; margin-top:15px">
                PERTANYAAN:
            </div>
            <div class="row" style="text-align: justify; margin-top:15px">
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
                        <td colspan="2" style="padding-top: 10px" align="left">Pertanyaan Isi (Berkaitan dengan Kasus)*</td>
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
                        <td colspan="2" style="padding-top: 10px" align="left">Pertanyaan Penutup</td>
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
            <div class="row"  style="text-align:right; margin-top:20px">
                YANG MEMBERI KETERANGAN,
            </div>

            <div class="row"  style="text-align:right; margin-top:90px">
                (<span class="text-bold">{{strtoupper($berita_acara->nama)}}</span>)
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


                    <div class="row"  style="text-align:justify; margin-top:25px">
                        --------- Demikian berita acara ini dibuat dengan sebenar-benarnya, kemudian ditutup dan ditanda tangani di {{$berita_acara->lokasi_wawancara}} , pada Pukul {{date('H:i', strtotime($berita_acara->selesai))}} wita,  hari {{$hari2}} tanggal {{date('d', strtotime($berita_acara->selesai))}} {{$bulan2}} Tahun {{date('Y', strtotime($berita_acara->selesai))}}......	
                    </div>
                    <div class="row"  style="text-align:right; margin-top:20px">
                        YANG MEMINTA KETERANGAN,
                    </div>

                    <div class="row"  style="text-align:right; margin-top:90px">
                        (<span class="text-bold">{{strtoupper($berita_acara->user->name)}}</span>)
                    </div>
                    
            
    </div>
</div>
    

    {{-- <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
</body>

</html>

