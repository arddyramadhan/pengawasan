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
        .page_break { 
            page-break-before: always;
            margin-bottom: 50px;
        }

        *{
            font-family: "Bookman Old Style", serif;
            
        }

        table{
            font-size: 16px;
            /* font-size: 4.2333mm; */
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
                <td style="font-size: 13px"><i> Jln. {{ $informasi_awal->user->kabupaten->almt_jalan.' '.$informasi_awal->user->kabupaten->almt_kel_des }} <br>Kecamatan {{ $informasi_awal->user->kabupaten->almt_kecamatan.' '. ucfirst($informasi_awal->user->kabupaten->status).' '.$informasi_awal->user->kabupaten->nama }} <br>Email : bawaslubonebolango@gmail.com</i></td>
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
                    <td style="" align="right">Formulir Model A.6</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="" align="center"><u>INFORMASI AWAL</u></td>
                </tr>
            </table>
        </div>

        <div class="row" style="margin-top: 20px ">
            
            
            <table width="60%" style="margin-left: 30%">
                <tr>
                    <td style="" align="left" width="40%">Nasional</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> Indonesia</td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Provinsi</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> Gorontalo</td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Kabupaten/Kota</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> {{ $informasi_awal->user->kabupaten->nama }}</td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Kecamatan</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> {{ $informasi_awal->user->kabupaten->almt_kecamatan }}</td>
                </tr>
                <tr>
                    <td style="" align="left" width="40%">Kelurahan/Desa</td>
                    <td style="" align="center" width="2%">:</td>
                    <td style="" align="left" width="auto"> {{ $informasi_awal->user->kabupaten->almt_kel_des}}</td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 25px ">
            <table width="100%">
                <tr>
                    <th valign="top" width="3%">1.</th>
                    <th width="1%"></th>
                    <td>Telah ditemukan Informasi Awal yang berasal dari : <span style="font-weight: bold">{{$informasi_awal->informasi->nama}}</span>  </td>

                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 15px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%">2.</th>
                    <th width="1%"></th>
                    <td>Informasi adanya dugaan pelanggaran Pemilihan berupa:  </td>

                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">a. </td>
                    <td valign="top" width="30%">Peristiwa</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto">{{$informasi_awal->peristiwa}}</td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">b. </td>
                    <td valign="top" width="30%">Tempat Kejdian</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto">{{$informasi_awal->tempat_kejadian}}</td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">c. </td>
                    <td valign="top" width="30%">Tanggal Kejadian</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto">{{date('d-F-Y', strtotime($informasi_awal->waktu_tgl_kejadian))}}</td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">d. </td>
                    <td valign="top" width="30%">Waktu Kejadian</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto">{{date('H:i', strtotime($informasi_awal->waktu_tgl_kejadian))}} Wita</td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">e. </td>
                    <td valign="top" width="30%">Terlapor</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto">{{$informasi_awal->terlapor}}</td>

                </tr>
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="3%" valign="top">f. </td>
                    <td valign="top" width="30%">Alamat Terlapor</td>
                    <td valign="top" width="1%">:</td>
                    <td style="font-weight: bold" width="auto">{{$informasi_awal->alamat_terlapor}}</td>

                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 15px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%">3.</th>
                    <th width="1%"></th>
                    <td>Bukti-Bukti Awal :  </td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    {{-- <td width="3%" valign="top">1. </td> --}}
                    @php
                        $no = 0;
                    @endphp
                    @if ($informasi_awal->informasi->img_bukti != null)
                        <td width="2%" valign="top">{{++$no}}.</td>
                        <td width="88%">Bukti Foto dugaan pelanggaran yang di laporkan ke dalam aplikasi silahap.</td>
                    @endif
                </tr>
                @forelse ($informasi_awal->informasi_awal_bukti as $item)
                    <tr>
                        <th valign="top"  width="3%"></th>
                        <th width="1%"></th>
                        <td width="2%" valign="top">{{++$no}}.</td>
                        <td width="88%" valign="top"> {{$item->nama}}.</td>
                    </tr>    
                @empty
                
                @endforelse
                
            </table>
        </div>
        <div class="row" style="margin-top: 15px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%">4.</th>
                    <th width="1%"></th>
                    <td>Uraian Singkat Dugaan Pelanggaran :  </td>
                </tr>
            </table>
        </div>
        <div class="row" style="margin-top: 0px ">
            <table width="100%">
                <tr>
                    <th valign="top"  width="3%"></th>
                    <th width="1%"></th>
                    <td width="96%" valign="top" align="justify"> {!!$informasi_awal->uraian_kejadian!!} </td>
                </tr>
            </table>
        </div>

        <div class="row" style="margin-top: 40px ">
            <table width="100%">
                <tr>
                    <td style="width: auto"></td>
                    <td align="center" style="width: 40%;">Penerima Informasi Awal</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 30px"></td>
                </tr>
                <tr>
                    <td style="width: auto"></td>
                    <td align="center" style="width: 40%;"><u style="font-weight: bold">{{$informasi_awal->user->name}}</u></td>
                </tr>
                
            </table>
        </div>
            
    </div>
</div>


@forelse ($informasi_awal->informasi_awal_bukti as $buktis)
    @php
        $tampil = 'ada';
        break;
    @endphp

@empty
    @php
        $tampil = 'tidak';
    @endphp
@endforelse
    
@if ($tampil == 'ada')
    @if ((Request::segment(4) == 'halaman') || (Request::segment(4) == 'preview'))
        <div class="page_break"></div>
        <br>
        <div class="row" style="margin-top: 10px; margin-bottom: 10px">
            <table width="100%">
                <tr>
                    <td style="" align="center"><u>INFORMASI AWAL</u></td>
                </tr>
            </table>
        </div>
        <div class="row pl-5 pr-5" style="padding: 0px 10px 0px 10px; margin-bottom: 10px ">
            <div class="row" style="padding: 10px 20px 0px 20px; font-size: 18px">
                <div class="mailbox-read-message pl-4 pr-4">
                    <div class="form-group mb-4">
                        @php
                            $no = 0;
                        @endphp
                        @if ($informasi_awal->informasi->img_bukti != null)
                            <span style="margin-bottom: 10px" class="text-bold">{{++$no}}. Bukti foto dugaan pelanggaran yang di upload langsung kedalam Sistem informasi laporan hasil pengawasan (SILAHAPS).</span>
                            <br>
                            <img style="margin-bottom: 10px; margin-top: 10px" class="mt-2 ml-3" src="{{ asset('storage/'.$informasi_awal->informasi->img_bukti) }}" width="70%" alt="">
                        @endif
                    </div>
                    @forelse ($informasi_awal->informasi_awal_bukti as $bukti)
                        <div style="margin-top: 20px">
                            <span style="margin-bottom: 10px">{{++$no}}. {{$bukti->nama}}. </span>
                            <br>
                            <img  style="margin-bottom: 10px; margin-top: 10px" src="data:image/jpeg;data:image/jpg;data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/'.$bukti->foto))) }}" width="70%" alt="">
                        </div>
                    @empty
                    @endforelse
                </div>    
            </div>
        </div>
    @endif
@endif

@if (Request::segment(4) == 'halaman')
    <script>
        window.print();
    </script>
@endif

    {{-- <script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
</body>

</html>

