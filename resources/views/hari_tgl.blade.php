
@if (date('D')=='Mon')
    @php
        $hari = 'Senin';
    @endphp
@elseif (date('D')=='Tue')
    @php
        $hari = 'Selasa';
    @endphp
@elseif (date('D')=='Wed')
    @php
        $hari = 'Rabu';
    @endphp
@elseif (date('D')=='Thu')
    @php
        $hari = 'Kamis';
    @endphp
@elseif (date('D')=='Fri')
    @php
        $hari = "Jum'at";
    @endphp
@elseif (date('D')=='Sat')
    @php
        $hari = 'Sabtu';
    @endphp
@elseif (date('D')=='Sun')
    @php
        $hari = 'Minggu';
    @endphp
@endif

{{-- bulan --}}
@if (date('m')==1)
    @php
        $bulan = 'Januari';
    @endphp
@elseif (date('m')==2)
    @php
        $bulan = 'Februari';
    @endphp
@elseif (date('m')==3)
    @php
        $bulan = 'Maret';
    @endphp
@elseif (date('m')==4)
    @php
        $bulan = 'April';
    @endphp
@elseif (date('m')==5)
    @php
        $bulan = 'Mei';
    @endphp
@elseif (date('m')==6)
    @php
        $bulan = 'Juni';
    @endphp
@elseif (date('m')==7)
    @php
        $bulan = 'Juli';
    @endphp
@elseif (date('m')==8)
    @php
        $bulan = 'Agustus';
    @endphp
@elseif (date('m')==9)
    @php
        $bulan = 'September';
    @endphp
@elseif (date('m')==10)
    @php
        $bulan = 'Oktober';
    @endphp
@elseif (date('m')==11)
    @php
        $bulan = 'November';
    @endphp
@elseif (date('m')==12)
    @php
        $bulan = 'Desember';
    @endphp
@endif