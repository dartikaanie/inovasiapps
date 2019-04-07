@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tim
        </h1>
    </section>
    <div class="content">
        <div class="row" style="font-size: medium">
            @include('flash::message')
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('logo2.png')}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->nama}}</h3>

                        <p class="text-muted text-center"><span class=" text-info "> {{$user->departemens->nama}} </span> -  {{$user->units->nama}}</p>

                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <a href="{!! route('tims.create') !!}" class="small-box-footer">
                                        <div class="text-center">
                                            <h4><i class="fa fa-plus-square"></i> Inovasi </h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>{{count($inovasis)}}</h3>

                                        <p>Jumlah ikut Inovasi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-lightbulb"></i>
                                    </div>
                                    <a href="{{route('inovasiPesertas.index')}}" class="small-box-footer">
                                        Lihat<i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>{{count($inovasisTerimplementasi)}}</h3>

                                        <p>Jumlah Inovasi Terimplementasi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-checkmark"></i>
                                    </div>
                                    <a href="{{route('inovasiPesertas.index')}}" class="small-box-footer">
                                        Lihat <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>{{count($inovasisBelum)}}</h3>

                                        <p>Jumlah Inovasi Belum terimplementasi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-alert"></i>
                                    </div>
                                    <a href="{{route('inovasiPesertas.index')}}" class="small-box-footer">
                                        Lihat <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Bagian kanan--}}
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#beranda" data-toggle="tab" class="bg-gray">Beranda</a></li>
                        <li><a href="#template" data-toggle="tab" class="bg-gray">Kategori Inovasi</a></li>
                        <li><a href="#tata" data-toggle="tab" class="bg-gray">Tata Cara Pendaftaran</a></li>
                        @if($juri!=null)
                            <li><a href="#nilai" data-toggle="tab" class="bg-gray">Tata Cara Penilaian</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="beranda">
                            @include('peserta.dashboard.beranda')
                        </div>
                        <div class="tab-pane" id="template">
                            @include('peserta.dashboard.template')
                        </div>
                        <div class="tab-pane" id="tata">
                            @include('peserta.dashboard.tata')
                        </div>
                        <div class="tab-pane" id="nilai">
                            @include('peserta.dashboard.nilai')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

