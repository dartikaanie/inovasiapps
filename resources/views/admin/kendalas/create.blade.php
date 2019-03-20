@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sub Kriteria
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'kendalas.store']) !!}

                        @include('admin.kendalas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
