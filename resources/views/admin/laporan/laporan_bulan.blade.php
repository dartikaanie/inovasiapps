@extends('layouts.app')

@section('content')
    <section class="content-header">
        <a class="btn btn-default pull-left" href="{{route('dashboard')}}"><i class="fa fa-angle-left"></i> Kembali</a>
        <a class="btn btn-primary pull-left" href=""><i class="glyphicon glyphicon-print"></i> Print</a>
        <div class="clearfix"></div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-default">
            @if($bulan !=0 && $tahun !=0 &&  $bulan2 ==0)
                <h3 class="text-center"> Laporan Inovasi Bulan {{$bulan .' ' . $tahun }}  </h3>
            @elseif( $bulan2 != null)
                <h3 class="text-center"> Laporan Inovasi Bulan {{$bulan.' - '.$bulan2.' '.$tahun}} </h3>
            @else
                <h3 class="text-center"> Laporan Inovasi </h3>
            @endif
            <br>
                <body onload="window.print()">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                <tr >
                    <th class="text-center">No</th>
                    <th  width="12%" class="text-center">Tanggal Daftar</th>
                    <th  width="15%" class="text-center">Nama Tim</th>
                    <th  width="13%" class="text-center">Departemen</th>
                    <th  width="15%" class="text-center">Anggota Tim</th>
                    <th  width="15%" class="text-center">Sub Kategori Id</th>
                    <th class="text-center">Judul</th>
                </tr>
                </thead>
                <tbody>
                <?php $n=0;  ?>
                @foreach($inovasis as $inovasi)
                        <tr>
                            <td>{{++$n}}</td>
                            <td>{{date_format(date_create($inovasi->created_at), 'd F Y')}}</td>
                            <td>{!! $inovasi->TimInovasi->nama_tim !!}</td>
                            <td>{!! $inovasi->TimInovasi->departemen !!}</td>
                            <td>
                                <?php $i=0;?>
                                @foreach($anggota[$n-1] as $a)
                                 {{++$i}}). &nbsp; {{$a->Users->nama}} <br>
                                @endforeach
                            </td>
                            <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                            <td>{!! $inovasi->judul!!}</td>
                        </tr>
             @endforeach
                </tbody>
            </table>
            </body>
        </div>
    </div>
@endsection



