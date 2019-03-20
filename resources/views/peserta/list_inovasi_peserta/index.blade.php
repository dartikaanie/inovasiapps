@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Tims</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('tims.create') !!}">Tambah Inovasi</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#belum" data-toggle="tab">Belum Terimplementasi</a></li>
                        <li><a href="#sudah" data-toggle="tab">Sudah Terimplementasi</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="belum">
                            @include('peserta.list_inovasi_peserta.table')
                        </div>
                        <div class="tab-pane" id="sudah">
                            @include('peserta.list_inovasi_peserta.table_sudah')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

<!-- DataTables -->
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>