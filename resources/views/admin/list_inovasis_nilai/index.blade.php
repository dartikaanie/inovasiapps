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
                        <li class="active"><a href="#sudah" data-toggle="tab">Penilaian Selesai</a></li>
                        <li><a href="#belum" data-toggle="tab">Proses Penilaian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="sudah">
                            @include('admin.list_inovasis_nilai.table')
                        </div>
                        <div class="tab-pane" id="belum">
                            @include('admin.list_inovasis_nilai.table_belum')
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

