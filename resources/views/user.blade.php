@extends('master.app')
@section('title', 'Laporan Masyarakat')
@section('judul', 'Laporan Masyarakat')
@section('menu', 'Informasi')
@section('sub', 'Laporan Masyarakat')
@section('content')

<div class="row">
{{-- @php
    $sts_antrian = 'tidak';
    $jum_antrian = 0;
@endphp
@forelse ($data_antrian as $no => $antri)
    @if ($antri->status=='antrian')
        @php
            ++$jum_antrian;
            $sts_antrian = 'ada';            
        @endphp
    @endif
@empty
    
@endforelse --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">

                    <li class="nav-item"><a class="nav-link {{Request::segment(2) ? '' : 'active'}}" href="/informasi">Semua</a></li>
                    <li class="nav-item"><a class="nav-link {{Request::segment(2)=='dibaca' ? 'active' : ''}}" href="/informasi/dibaca">Dibaca</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    {{-- antrian --}}
                    <div class="active tab-pane" id="">
                    </div>

                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>









    <div class="col-md-12">
        
    </div>
</div>
@endsection
