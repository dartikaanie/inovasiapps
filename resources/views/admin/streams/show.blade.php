@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h3 class="profile-username text-center">STREAM {{strtoupper($stream->nama_stream)}}</h3>
    </section>
    <div class="content">
        <div class="row">
            @include('flash::message')
            {{--Bagian kanan--}}
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body">
                        <section class="content-header">
                            <h3 class="pull-left">
                                <a class="btn btn-primary" href="{{route('addJuriStream', [$stream->stream_id])}}"><i class="glyphicon glyphicon-plus"></i></a>
                                JURI</h3>
                        </section>

                        <table class="table table-hover">
                        @foreach($juris as $juri)
                                <tr>
                                    <td><i class="glyphicon glyphicon-user">&nbsp;</i> {{$juri->users->nama}}</td>
                                    <td>
                                        <a href="{{route('delStreamJuri',[$juri->nip, $stream->stream_id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Kamu yakin menghapus juri ini?')"><i class="glyphicon glyphicon-trash"></i> </a>
                                    </td>
                                </tr>
                        @endforeach
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body">
                        <section class="content-header">
                            <h3 class="pull-left">
                                <a class="btn btn-primary" href="{{route('addInovasiStream', [$stream->stream_id])}}"><i class="glyphicon glyphicon-plus"></i> </a>
                                INOVASI</h3>
                        </section>

                        <table class="table table-hover">
                            @foreach($streamInovasis as $inovasi)
                                <tr>
                                    <td><i class="glyphicon glyphicon-play">&nbsp;</i> {{$inovasi->timInovasi->nama_tim}}</td>
                                    <td>{{$inovasi->judul}}</td>
                                    <td>
                                        <a href="{{route('detailStreamInovasi',[$inovasi->inovasi_id, $stream->stream_id])}}" class="btn btn-info btn-xs" ><i class="glyphicon glyphicon-eye-open"></i> </a>
                                        <a href="{{route('delStreamInovasi',[$inovasi->inovasi_id, $stream->stream_id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Kamu yakin menghapus inovasi ini?')"><i class="glyphicon glyphicon-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="{!! route('streams.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
