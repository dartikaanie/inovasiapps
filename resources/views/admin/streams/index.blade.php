@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Streams</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('streams.create') !!}"><i class="glyphicon glyphicon-plus"></i> Stream </a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.streams.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

