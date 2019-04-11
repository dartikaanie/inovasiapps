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

                            <table class="table table-responsive" id="inovasis-table">
                <thead>
                    <tr>
                        <th>Tanggal submit</th>
                        <th>Nama Tim</th>
                        <th>Departemen</th>
                        <th>Sub Kategori Id</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inovasis as $inovasi)
                        <tr>
                            <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
                            <td>{!! $inovasi->TimInovasi->nama_tim !!}</td>
                            <td>{!! $inovasi->TimInovasi->departemens->departemen !!}</td>
                            <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                            <td>{!! substr($inovasi->judul,0,50) !!}
                                @if(strlen($inovasi->judul) > 50)
                                    ...
                                @endif</td>
                            <td>  @if($inovasi->status == 0 )
                                    <label class="label label-danger">Terdaftar</label>
                                @elseif($inovasi->status == 1 )
                                    <label class="label label-warning">Dikirim</label>
                                @elseif($inovasi->status == 2 )
                                    <label class="label label-info">Terverifikasi</label>
                                @elseif($inovasi->status == 3 )
                                    <label class="label label-primary">Proses Penilaian</label>
                                @else
                                    <label class="label label-success">Selesai</label>
                                @endif
                            </td>
                            <td>
                                {!! Form::open(['route' => ['listInovasis.destroy', $inovasi->inovasi_id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('listInovasis.show', [$inovasi->inovasi_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
                {{ $inovasis->links() }}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection