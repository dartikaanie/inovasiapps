@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Inovasis</h1>

    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-default">
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#sudah" data-toggle="tab"><span class="label label-danger">{{count($inovBelum)}}</span>Terimplementasi <small>(belum Terverifikasi)</small></a></li>
                        <li><a href="#register" data-toggle="tab">Terverifikasi Registrasi <small>(belum memiliki stream)</small></a></li>
                        <li><a href="#belum" data-toggle="tab">Belum Terimplementasi</a></li>
                        <li><a href="#all" data-toggle="tab">Semua Inovasi</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="sudah">
                            @include('admin.list_inovasis.table')
                        </div>
                        <div class="tab-pane" id="register">
                            @include('admin.list_inovasis.table_register')
                        </div>
                        <div class="tab-pane" id="belum">
                            @include('admin.list_inovasis.table_belum')
                        </div>
                        <div class="tab-pane" id="all">
                            @include('admin.list_inovasis.table_all')
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

