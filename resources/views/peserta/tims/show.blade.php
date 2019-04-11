@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tim
        </h1>
    </section>
    <div class="content">
        <div class="row">
            @include('flash::message')
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('logo2.png')}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$tim->nama_tim}}</h3>

                        <p class="text-muted text-center">{{$tim->departemens->nama}}</p>

                            <div class="small-box bg-blue">
                                <a href="{!! route('tims.create') !!}" class="small-box-footer">
                                    <div class="text-center">
                                        <h4><i class="fa fa-plus-square"></i> Inovasi </h4>
                                    </div>
                                </a>
                            </div>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Anggota</b>
                            </li>
                            @foreach($anggota as $a)
                            <li class="list-group-item"><a><i class="fa fa-user"></i> {{$a->users->nama}}</a> &nbsp
                                <small>({{$a->statusAnggota->status_anggota}})</small>
                                <span class="pull-right">
                                    @if($a->nip != auth::user()->nip)
                                    <a href="{{route('anggotaTims.show', [$a->anggota_tim_id])}}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> </a>
                                    @endif
                                </span>
                               </li>
                            @endforeach
                        </ul>
                        <a class="btn btn-warning btn-xs" href="{{route('tims.edit', [$tim->tim_id])}}"> <i class="fa fa-edit"> </i>    Data Tim  </a>

                        <a class="btn btn-warning btn-xs" href="{{route('anggotaTims.edit', [$tim->tim_id])}}"><i class="fa fa-edit"> </i>  Anggota  </a>
                       <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalTambah-{{$tim->tim_id}}">
                            <i class="fa fa-plus"> </i>   Anggota   </a>
                           @include("peserta.tims.modal.modal_tambah")


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Achievement</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{count($inovasis)}}</h3>

                                    <p>Jumlah ikut Inovasi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-load-a"></i>
                                </div>
                            </div>
                        </div>

                        {{--<div class="col-lg-12 col-xs-12">--}}
                            {{--<!-- small box -->--}}
                            {{--<div class="small-box bg-green">--}}
                                {{--<div class="inner">--}}
                                    {{--<h3>150</h3>--}}

                                    {{--<p>Jumlah Reward</p>--}}
                                {{--</div>--}}
                                {{--<div class="icon">--}}
                                    {{--<i class="ion ion-star"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            {{--Bagian kanan--}}
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">List Inovasi</a></li>
                        <li><a href="#kendala" data-toggle="tab">Kendala Inovasi</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            @include('peserta.tims.inovasi_list')
                        </div>
                        <div class="tab-pane" id="kendala">
                            @include('peserta.tims.kendala_list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
