@extends('layouts.app')

@section('content')

    <section class="content">
       <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{count($juri)}}</h3>
                        <p>Juri</p>
                    </div>
                    <div class="icon">
                        <p></p>
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{route('juris.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{count($tim)}}</h3>

                        <p>Pegawai</p>
                    </div>
                    <div class="icon">
                        <p></p>
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{route('timInovasi')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{count($inovasi_terdaftar)}}</h3>

                        <p>Inovasi Terdaftar </p>
                    </div>
                    <div class="icon">
                        <p></p>
                        <i class="fa  fa-lightbulb-o"></i>
                    </div>
                    <a href="{{route('listInovasis.index')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{count($inovasi_terimplementasi)}}</h3>

                        <p>Inovasi Terajukan</p>
                    </div>
                    <div class="icon">
                        <p></p>
                        <i class="fa fa-paper-plane"></i>
                    </div>
                    <a href="{{route('listInovasis.implemen')}}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        {{--//charts--}}
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <h3>Jumlah Inovasi</h3>
                    <div class="panel-body">
                        <canvas id="canvas" height="100%"></canvas>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body">
                        <h3>Jumlah Inovasi Berdasarkan Departemen</h3>
                        <div class="panel-body">
                            <canvas id="canvasDept" height="100%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{--<div class="col-md-6">--}}
                {{--<div class="box box-default">--}}
                    {{--<div class="box-body">--}}
                        {{--<h3>Jumlah Inovasi Berdasarkan Jenis Kelamin</h3>--}}
                        {{--<div class="panel-body">--}}
                            {{--<canvas id="canvasJekel" height="100%"></canvas>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-body">
                        <h3>Laporan Inovasi Terdaftar</h3>
                        <div class="nav-tabs-custom ">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#perBulan" data-toggle="tab">1 Bulan</a></li>
                                <li><a href="#per3Bulan" data-toggle="tab">3 Bulan</a></li>
                                <li><a href="#perTahun" data-toggle="tab">Tahun</a></li>
                                <li><a href="#semua" data-toggle="tab">Semua</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="perBulan">
                                    <form action="{{route('laporanBulan')}}" method="get">
                                        <div class="form-group">
                                            <label for="date">Pilih Bulan - Tahun (yyyy-mm) </label>
                                            <input type="month" min="2019-01" class="form-control" name="date" required>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Export to Excel">
                                        <input type="submit" name="submit"  class="btn btn-primary" value="lihat">
                                    </form>
                                </div>
                                <div class="tab-pane" id="per3Bulan">
                                    <form action="{{route('laporan3Bulan')}}" method="get">
                                        <div class="form-group">
                                            <label for="date">Pilih Bulan Awal (yyyy-mm) </label>
                                            <input type="month" min="2019-01" class="form-control" name="date" required>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Export to Excel">
                                        <input type="submit" name="submit"  class="btn btn-primary" value="lihat">
                                    </form>
                                </div>
                                <div class="tab-pane" id="perTahun">
                                    <form action="{{route('laporanTahun')}}" method="get">
                                        <div class="form-group">
                                            <label for="date">Pilih Tahun </label>
                                            <select name="date" class="form-control">
                                                @for($m=2019; $m <= 2100 ; $m++)
                                                    <option value="{{$m}}">{{$m}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Export to Excel">
                                        <input type="submit" name="submit"  class="btn btn-primary" value="lihat">
                                    </form>
                                </div>
                                <div class="tab-pane" id="semua">
                                    <form action="{{route('laporanSemua')}}" method="get">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Export to Excel">
                                        <input type="submit" name="submit"  class="btn btn-primary" value="lihat">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

@include('admin.charts.inovasi_perbulan')
@include('admin.charts.inovasi_perdepartemen')
{{--@include('admin.charts.inovasi_perjekel')--}}