<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <style type="text/css" media="print">
       
        *{
            font-family: "Bookman Old Style", serif;
        }
        .coba *{
            /* font-size: 4.2333mm */
            /* padding: 10px 0px 10px 0px;  */
            font-size: 15px
        }

    </style>
   
</head>

<body>
<div class="row pl-4 pr-4" style="padding: 0px 10px 0px 10px ">

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
    <div class="row coba" style="">
        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="font-weight: bold" align="center">FORMULIR MODEL A</td>
                    
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top:0px ">
            <table width="100%">
                <tr>
                    <td style="font-weight: bold" align="center">LAPORAN HASIL PENGAWASAN PEMILU</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 30px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">I.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Data Pengawas Pemilihan : </th>
                </tr>
                
            </table>
            <table width="100%" style="">
                @php
                    $no_pelaksana = 0 ;
                    $sts_ketua='tidak';
                    $alm_ketua = '';
                @endphp
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='ketua')
                        @php
                            $sts_ketua = 'ada';
                            $alm_ketua = $user->user->alamat;
                        @endphp
                        <tr>
                            <td width="4%" align="left"></td>
                            <td width="45%" colspan="">{{($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')}}</td>
                            <td width="1%">{{($no_pelaksana==0 ? ':' : '')}}</td>
                            <td width="1%">{{++$no_pelaksana}}.</td>
                            <td width="48%"> {{$user->user->name}}</td>
                        </tr>
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='ketua')
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')}}</td>
                                <td width="1%">{{($no_pelaksana==0 ? ':' : '')}}</td>
                                <td width="1%">{{++$no_pelaksana}}.</td>
                                <td width="48%"> {{$user->user->name}}</td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='anggota')
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')}}</td>
                                <td width="1%">{{($no_pelaksana==0 ? ':' : '')}}</td>
                                <td width="1%">{{++$no_pelaksana}}.</td>
                                <td width="48%"> {{$user->user->name}}</td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse


                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if (strpos($user->user->jabatan->nm_jabatan, 'Koordinator'))
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')}}</td>
                                <td width="1%">{{($no_pelaksana==0 ? ':' : '')}}</td>
                                <td width="1%">{{++$no_pelaksana}}.</td>
                                <td width="48%"> {{$user->user->name}}</td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='staf')
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_pelaksana==0 ? 'a. Nama Pelaksana Tugas Pengawasan' : '')}}</td>
                                <td width="1%">{{($no_pelaksana==0 ? ':' : '')}}</td>
                                <td width="1%">{{++$no_pelaksana}}.</td>
                                <td width="48%"> {{$user->user->name}}</td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
            </table>
            <table width="100%" style="">
                {{-- @forelse ($lhp->tim as $item)
                    {{$item->id}}
                @empty --}}
                @php
                    $no_jabatan = 0 ;
                @endphp
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='ketua')
                        <tr>
                            <td width="4%" align="left"></td>
                            <td width="45%" colspan="">{{($no_jabatan==0 ? 'b. Jabatan' : '')}}</td>
                            <td width="1%">{{($no_jabatan==0 ? ':' : '')}}</td>
                            <td width="1%">{{++$no_jabatan}}.</td>
                            <td width="48%"> 
                                {{-- {{$user->user->name}} --}}
                                @if ($user->user->id_tingkatan >= 2)
                                    {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->sebagai.' Kecamatan '.$user->user->kecamatan->nama}}
                                @else
                                    {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->sebagai.' '.$user->user->kabupaten->status.' '.$user->user->kabupaten->nama}}
                                @endif
                                
                            </td>
                        </tr>
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='ketua')
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_jabatan==0 ? 'b. Jabatan' : '')}}</td>
                                <td width="1%">{{($no_jabatan==0 ? ':' : '')}}</td>
                                <td valign="top" width="1%">{{++$no_jabatan}}.</td>
                                <td width="48%"> 
                                @if ($user->user->id_tingkatan >= 2)
                                    {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' Kecamatan '.$user->user->kecamatan->nama}}
                                @else
                                    {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' '.($user->user->kabupaten->status == 'kabupaten' ? 'Kabupaten' : 'Kota').' '.$user->user->kabupaten->nama}}
                                @endif    
                                </td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='anggota')
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_jabatan==0 ? 'b. Jabatan' : '')}}</td>
                                <td width="1%">{{($no_jabatan==0 ? ':' : '')}}</td>
                                <td valign="top" width="1%">{{++$no_jabatan}}.</td>
                                <td width="48%"> 
                                    @if ($user->user->id_tingkatan >= 2)
                                        {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' Kecamatan '.$user->user->kecamatan->nama}}
                                    @else
                                        {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' '.($user->user->kabupaten->status == 'kabupaten' ? 'Kabupaten' : 'Kota').' '.$user->user->kabupaten->nama}}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if (strpos($user->user->jabatan->nm_jabatan, 'Koordinator'))
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_jabatan==0 ? 'b. Jabatan' : '')}}</td>
                                <td width="1%">{{($no_jabatan==0 ? ':' : '')}}</td>
                                <td valign="top" width="1%">{{++$no_jabatan}}.</td>
                                <td width="48%"> 
                                    @if ($user->user->id_tingkatan >= 2)
                                        {{$user->user->jabatan->nm_jabatan}}
                                        {{-- {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' Kecamatan '.$user->user->kecamatan->nama}} --}}
                                    @else
                                        {{-- {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' '.($user->user->kabupaten->status == 'kabupaten' ? 'Kabupaten' : 'Kota').' '.$user->user->kabupaten->nama}} --}}
                                        {{$user->user->jabatan->nm_jabatan}}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='staf')
                            <tr>
                                <td width="4%" align="left"></td>
                                <td width="45%" colspan="">{{($no_jabatan==0 ? 'b. Jabatan' : '')}}</td>
                                <td width="1%">{{($no_jabatan==0 ? ':' : '')}}</td>
                                <td valign="top" width="1%">{{++$no_jabatan}}.</td>
                                <td width="48%">
                                    @if ($user->user->id_tingkatan >= 2)
                                        {{$user->user->jabatan->nm_jabatan}}
                                        {{-- {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' Kecamatan '.$user->user->kecamatan->nama}} --}}
                                    @else
                                        {{$user->user->jabatan->nm_jabatan}}
                                        {{-- {{$user->user->jabatan->nm_jabatan.' '.$user->user->tingkatan->lainnya.' '.($user->user->kabupaten->status == 'kabupaten' ? 'Kabupaten' : 'Kota').' '.$user->user->kabupaten->nama}} --}}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
            </table>

            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">b. Alamat</td>
                    <td width="1%"  valign="top">:</td>
                    {{-- <td width="1%"></td> --}}
                    <td width="48%" style="text-align: justify">
                        @if ($sts_ketua == 'ada')
                            {{$alm_ketua}}
                        @else
                            {{$lhp->user->alamat}} 
                        @endif
                    </td>
                </tr>
            </table>


        </div>
        <div style="margin-top: 30px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">II.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Kegiatan Pengawasan : </th>
                </tr>
                
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">a. Tahapan yang di awasi</td>
                    <td width="1%"  valign="top">:</td>
                    {{-- <td width="1%"></td> --}}
                    <td width="48%" style="text-align: justify">
                        {{$lhp->tahapan}}
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">b. Bentuk Pengawasan</td>
                    <td width="1%"  valign="top">:</td>
                    {{-- <td width="1%"></td> --}}
                    <td width="48%" style="text-align: justify">
                        @if ($lhp->bentuk=='tidak')
                            Tidak Langsung
                        @else
                            Langsung
                        @endif
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">c. Pihak yang di awasi</td>
                    <td width="1%"  valign="top">:</td>
                    {{-- <td width="1%"></td> --}}
                    <td width="48%" style="text-align: justify">
                        {{$lhp->diawasi}}
                    </td>
                </tr>
            </table>

            @if(date('D', strtotime($lhp->mulai))=='Mon')
                @php
                    $hari_mulai = 'Senin';
                @endphp
            @elseif(date('D', strtotime($lhp->mulai))=='Tue')
                @php
                    $hari_mulai = 'Selasa';
                @endphp
            @elseif(date('D', strtotime($lhp->mulai))=='Wed')
                @php
                    $hari_mulai = 'Rabu';
                @endphp
            @elseif(date('D', strtotime($lhp->mulai))=='Thu')
                @php
                    $hari_mulai = 'Kamis';
                @endphp
            @elseif(date('D', strtotime($lhp->mulai))=='Fri')
                @php
                    $hari_mulai = "Jum'at";
                @endphp
            @elseif(date('D', strtotime($lhp->mulai))=='Sat')
                @php
                    $hari_mulai = 'Sabtu';
                @endphp
            @elseif(date('D', strtotime($lhp->mulai))=='Sun')
                @php
                    $hari_mulai = 'Minggu';
                @endphp
            @endif

            {{-- bulan --}}
            @if(date('m', strtotime($lhp->mulai))==1)
                @php
                    $bulan_mulai = 'Januari';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==2)
                @php
                    $bulan_mulai = 'Februari';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==3)
                @php
                    $bulan_mulai = 'Maret';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==4)
                @php
                    $bulan_mulai = 'April';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==5)
                @php
                    $bulan_mulai = 'Mei';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==6)
                @php
                    $bulan_mulai = 'Juni';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==7)
                @php
                    $bulan_mulai = 'Juli';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==8)
                @php
                    $bulan_mulai = 'Agustus';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==9)
                @php
                    $bulan_mulai = 'September';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==10)
                @php
                    $bulan_mulai = 'Oktober';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==11)
                @php
                    $bulan_mulai = 'November';
                @endphp
            @elseif(date('m', strtotime($lhp->mulai))==12)
                @php
                    $bulan_mulai = 'Desember';
                @endphp
            @endif


            {{-- Selesai --}}
            @if(date('D', strtotime($lhp->selesai))=='Mon')
                @php
                    $hari_selesai = 'Senin';
                @endphp
            @elseif(date('D', strtotime($lhp->selesai))=='Tue')
                @php
                    $hari_selesai = 'Selasa';
                @endphp
            @elseif(date('D', strtotime($lhp->selesai))=='Wed')
                @php
                    $hari_selesai = 'Rabu';
                @endphp
            @elseif(date('D', strtotime($lhp->selesai))=='Thu')
                @php
                    $hari_selesai = 'Kamis';
                @endphp
            @elseif(date('D', strtotime($lhp->selesai))=='Fri')
                @php
                    $hari_selesai = "Jum'at";
                @endphp
            @elseif(date('D', strtotime($lhp->selesai))=='Sat')
                @php
                    $hari_selesai = 'Sabtu';
                @endphp
            @elseif(date('D', strtotime($lhp->selesai))=='Sun')
                @php
                    $hari_selesai = 'Minggu';
                @endphp
            @endif

            {{-- bulan --}}
            @if(date('m', strtotime($lhp->selesai))==1)
                @php
                    $bulan_selesai = 'Januari';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==2)
                @php
                    $bulan_selesai = 'Februari';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==3)
                @php
                    $bulan_selesai = 'Maret';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==4)
                @php
                    $bulan_selesai = 'April';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==5)
                @php
                    $bulan_selesai = 'Mei';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==6)
                @php
                    $bulan_selesai = 'Juni';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==7)
                @php
                    $bulan_selesai = 'Juli';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==8)
                @php
                    $bulan_selesai = 'Agustus';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==9)
                @php
                    $bulan_selesai = 'September';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==10)
                @php
                    $bulan_selesai = 'Oktober';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==11)
                @php
                    $bulan_selesai = 'November';
                @endphp
            @elseif(date('m', strtotime($lhp->selesai))==12)
                @php
                    $bulan_selesai = 'Desember';
                @endphp
            @endif
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top">d.</td>
                    <td width="1%"  valign="top">:</td>
                    {{-- <td width="1%"></td> --}}
                    <td width="18%" style="text-align: justify">
                        Hari
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify">
                         @if ($lhp->selesai != null)
                            {{$hari_mulai.' s/d '.$hari_selesai}}
                        @else
                            {{$hari_mulai}}
                        @endif
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    {{-- <td width="1%"></td> --}}
                    <td width="18%" style="text-align: justify">
                        Tanggal
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        @if ($lhp->selesai != null)
                            {{date('d', strtotime($lhp->mulai)).' s/d '.date('d', strtotime($lhp->selesai))}}
                        @else
                            {{date('d', strtotime($lhp->mulai))}}
                        @endif
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    {{-- <td width="1%"></td> --}}
                    <td width="18%" style="text-align: justify">
                        Bulan
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        @if ($bulan_mulai != $bulan_selesai)
                            {{$bulan_mulai.' s/d '.$bulan_selesai}}
                        @else
                            {{$bulan_mulai}}
                        @endif
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    {{-- <td width="1%"></td> --}}
                    <td width="18%" style="text-align: justify">
                        Tahun
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        @if (date('Y', strtotime($lhp->mulai)) == date('Y', strtotime($lhp->selesai)))
                            {{date('Y', strtotime($lhp->mulai))}}
                        @else
                            {{date('Y', strtotime($lhp->mulai)).' s/d '.date('Y', strtotime($lhp->selesai))}}
                        @endif
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    {{-- <td width="1%"></td> --}}
                    <td width="18%" valign="top" style="text-align: justify">
                        Waktu/Jam
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                        {{date('H.i', strtotime($lhp->mulai))}} Wita s/d Selesai
                    </td>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="44%" colspan=""  valign="top"></td>
                    <td width="1%"  valign="top"></td>
                    {{-- <td width="1%"></td> --}}
                    <td width="18%" valign="top" style="text-align: justify">
                        Tempat/Lokasi
                    </td>
                    <td width="1%" align="left" valign="top" style="padding-left:2px">:</td>
                    <td width="28%" style="text-align: justify; padding-left : 4px">
                     {{$lhp->lokasi}}
                    </td>
                </tr>
            </table>
            


        </div>
        <div style="margin-top: 30px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">III.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Uraian Hasil Pengawasan : </th>
                </tr>
                
            </table>
            <div class="row">
                {!!$lhp->uraian_hasil!!}
            </div>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="93%" colspan=""  valign="top" align="justify"></td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">IV.</th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px">DUGAAN PELANGGARAN  </th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px">: {{ ($lhp->dugaan=='ada' ? 'Ada' : 'Tidak Ada') }} </th>
                </tr>
            </table>
        </div>

        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">V. </th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px"><span style="padding-left: 5px">INFORMASI DUGAAN PELANGGARAN</span></th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px"></th>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <th width="4%" align="left" valign="top"></th>
                    <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px">a. Tempat Kejadian</span></th>
                    <th width="1%"  valign="top">:</th>
            
                    <th width="48%" style="text-align: justify">
                        {{$lhp->tempat_kejadian}}
                    </th>
                </tr>
            </table>
            <table width="100%">
                <tr>
                    <th width="4%" align="left" valign="top"></th>
                    <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px">b. Waktu Kejadian</span></th>
                    <th width="1%"  valign="top">:</th>
            
                    <th width="48%" style="text-align: justify">
                        @if ($lhp->waktu_kejadian != null)
                            {{ date('d F Y', strtotime($lhp->waktu_kejadian)) }}
                        @endif
                    </th>
                </tr>
            </table>
            <table width="100%">
                @forelse ($lhp->pelaku as $n => $pelaku)
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px">{{$n==0 ? 'c. Nama Pelaku' : ' '}}</span></th>
                        <th width="1%"  valign="top">{{$n==0 ? ':' : ' '}}</th>
                
                        <th width="48%" style="text-align: justify">
                            {{++$n.'. '.$pelaku->nama}}
                        </th>
                    </tr>    
                @empty
                    
                @endforelse
                
            </table>
            <table width="100%">
                @forelse ($lhp->pelaku as $ns => $pelaku)
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 5px">{{$ns==0 ? 'd. Status Pelaku' : ' '}}</span></th>
                        <th width="1%"  valign="top">{{$ns==0 ? ':' : ' '}}</th>
                
                        <th width="48%" style="text-align: justify">
                            {{++$ns.'. '.$pelaku->status}}
                        </th>
                    </tr>    
                @empty
                    
                @endforelse
                
            </table>
            
        </div>
        <div style="margin-top: 10px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">VI.</th>
                    <th width="99%" colspan="4"align="left" style="padding-left: 10px">Uraian Dugaan Pengawasan : </th>
                </tr>
                
            </table>
            <div class="row">
                {!!$lhp->uraian_dugaan!!}
            </div>
            <table width="100%">
                <tr>
                    <td width="4%" align="left" valign="top"></td>
                    <td width="93%" colspan=""  valign="top" align="justify"></td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">VII. </th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px"><span style="padding-left: 0px">SAKSI - SAKSI</span></th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px"></th>
                </tr>
            </table>
            <table width="100%">
                @forelse ($lhp->saksi as $nsa => $saksi)
                @php
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
                @endphp
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="47%" colspan="" align="left"  valign="top"><span style="padding-left: 15px ">{{$alfa}}. Saksi {{$rom}}</span></th>
                        <th width="1%"  valign="top">:</th>
                
                        <th width="48%" style="text-align: justify">
                            {{$saksi->nama}}
                        </th>
                    </tr>    
                @empty
                    
                @endforelse
                
            </table>
        </div>
        <div style="margin-top: 0px">
            <table width="100%" style="">
                <tr>
                    <th width="1%" align="left">VIII. </th>
                    <th width="47%" colspan="3"align="left" style="padding-left: 10px"><span style="padding-left: 0px">BUKTI PENDUKUNG</span></th>
                    <th width="63%" colspan="3"align="left" style="padding-left: 10px"></th>
                </tr>
            </table>
            <table width="100%" style="margin-top: 0px">
                @forelse ($lhp->bukti as $nbuk => $bukti)
                    @php
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
                    @endphp
                    <tr>
                        <th width="4%" align="left" valign="top"></th>
                        <th width="80%" colspan="" align="left"  valign="top"><span style="padding-left: 10px ;padding-top: 10px ">{{$alfa}}. {{$bukti->nama}}</span></th>
                        {{-- <th width="1%"  valign="top">:</th>
                
                        <th width="48%" style="text-align: justify">
                            {{$bukti->nama}}
                        </th> --}}
                    </tr>    
                @empty
                    
                @endforelse
                
            </table>
        </div>
        <div style="margin-top: 20px">
                


            <table width="100%" style="font-weight: bold">
                <tr>
                    <td style="width: auto"></td>
                    <td align="center" style="width: 50%;">
                        Bone Bolango, {{$lhp->created_at->format('d F Y')}}
                        <br>
                        Pengawas</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"></td>
                </tr>

                

                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='ketua')
                        <tr>
                            <td style="width: auto"></td>
                            <td align="center" style="width: 50%;"><u>{{$user->user->name}}</u> <br> {{ucfirst($user->user->jabatan->sebagai)}}</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 30px"></td>
                        </tr>
                    @endif
                @empty
                    
                @endforelse

                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='ketua')
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u>{{$user->user->name}}</u> <br> {{ucfirst($user->user->jabatan->sebagai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='anggota')
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u>{{$user->user->name}}</u> <br> {{ucfirst($user->user->jabatan->sebagai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse
                
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if (strpos($user->user->jabatan->nm_jabatan, 'Koordinator'))
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u>{{$user->user->name}}</u> <br> {{ucfirst($user->user->jabatan->sebagai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse

                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='anggota')
                        @if ($user->user->jabatan->sebagai=='staf')
                            <tr>
                                <td style="width: auto"></td>
                                <td align="center" style="width: 50%;"><u>{{$user->user->name}}</u> <br> {{ucfirst($user->user->jabatan->sebagai)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 30px"></td>
                            </tr>
                        @endif
                    @endif
                @empty
                    
                @endforelse

                
            </table>


                {{-- <div class="row"  style="margin-top:20px; float: right; display: block">
                    <div style="text-align: center; font-weight: bold">
                        Bone Bolango, {{$lhp->created_at->format('d F Y')}}
                        <br>
                        Pengawas
                    </div>
                </div>
                <div style="clear: right;"></div>
                @forelse ($tim->tim_user as $user)
                    @if ($user->status=='ketua')
                    <div class="row"  style="margin-top:20px; display: block">
                        <div style="text-align: center; font-weight: bold">
                            {{$user->user->name}} <br> {{ucfirst($user->user->jabatan->sebagai)}}
                        </div>
                    </div>
                    @endif
                @empty
                    
                @endforelse --}}
                
        </div>
        
                    
            
    </div>
</div>
    {{-- @if (Request::segment(4) != 'mobile') --}}
        <script>
            window.print();
        </script>
    {{-- @endif --}}

    {{-- <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
</body>

</html>

