
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anggita Tim
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            @include('flash::message')

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'storeAnggota']) !!}
                        @include('peserta.inovasis.anggota_tims.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection




