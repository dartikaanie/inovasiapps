@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Tims</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('tims.create') !!}">Tambah Tim</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-hover" id="tims-table">
                    <thead>
                    <tr>
                        <th>Nama Tim</th>
                        <th>Anggota</th>
                        <th>Tanggal tim dibentuk</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tims as $tim)
                        <tr>

                            <td>{!! $tim->nama_tim   !!}</td>
                            <td>
                                <?php $anggota = \App\Models\anggotaTim::where('tim_id', $tim->tim_id)->get();?>
                                <ul>
                                    @foreach($anggota as $a)
                                        <li>{{$a->users->nama}} ( {{$a->statusAnggota->status_anggota}} )</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{date_format(date_create($tim->created_at),"d-m-Y")}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


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