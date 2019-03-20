@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stream Juri
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    @if(count($users)==0)
                        <div class="text-center">
                            Tidak ada juri yang belum bergabung dalam stream
                            <br>
                            <a href="{!! route('streams.show', [$stream_id]) !!}" class="btn btn-default">Kembali</a>
                        </div>
                    @else
                        {!! Form::open(['route' => 'streamJuri']) !!}
                            @include('admin.streams.stream_juris.fields')
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
