@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kriteraia Kategori Penilaian
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'kriteraiaKategoriPenilaians.store']) !!}

                        @include('kriteraia_kategori_penilaians.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
