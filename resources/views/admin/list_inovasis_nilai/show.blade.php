@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tim
        </h1>
    </section>
    <div class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    @include('flash::message')
                    <div class="box-body box-profile">
                        <table class="table table-striped">
                            <tr>
                                <td>Judul</td>
                                <td>: {{$inovasi->judul}} </td>
                            </tr>
                        </table>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <H5>Rekap Nilai Total Setiap Juri</H5>
                                @foreach($penilaian as $p)
                                <tr>
                                    <td>{{$p->users->nama}} </td>

                                    <td>{{$totalAll[$p->nip_juri]}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong> {{$all}} </strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 pull-right">
                            <a href="{{Route('listNilaiInovasi')}}" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detail Penilaian Juri</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                @foreach($penilaian as $p)
                                    <li><a href="#nilai-{{$p->nip_juri}}" data-toggle="tab" >&nbsp;{{$p->users->nama}}&nbsp;</a></li>
                                @endforeach
                            </ul>
                            <div class="tab-content">

                                @foreach($penilaian as $p)
                                    <div class="tab-pane" id="nilai-{{$p->nip_juri}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <?php $total =0;?>
                                                @foreach($kriterias as $kriteria)
                                                    <h4>{{$kriteria}}</h4>

                                                        <div class="box-body">
                                                            <table class="table table-bordered">
                                                                @foreach($kitkats as $kitkat)
                                                                    @if($kitkat->subKriterias->kriterias->nama_kriteria == $kriteria)
                                                                <tr>
                                                                    <td width="70%">{{$kitkat->subKriterias->sub_kriteria}}</td>
                                                                    <td>
                                                                        @foreach($penilaiansDetail as $pd)
                                                                            @if($pd->penilaian_inovasi_id == $p->penilaian_inovasi_id)
                                                                                @if($pd->krikat_id == $kitkat->kriteria_katategori_id)
                                                                                    <p>{{$pd->nilai}}</p>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                </tr>
                                                                    @endif
                                                                @endforeach
                                                            </table>
                                                        </div>

                                                @endforeach
                                                <table class="table table-responsive">
                                                    <td width="70%"><h4>Total Nilai</h4></td>
                                                    <td><h4>{{$totalAll[$p->nip_juri]}}</h4></td>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="small-box bg-blue-gradient">
                                                    <div class="inner">
                                                        <h5>Saran : </h5>
                                                        <p>{{$p->saran}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            </div>
        </div>
@endsection
