@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">List Semua Inovasi</h1>

    </section>

    <br>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-default">
            <div class="box-body">
                @include('admin.list_inovasis.table_all')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

