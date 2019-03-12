@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inovasi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inovasi, ['route' => ['inovasis.update', $inovasi->id], 'method' => 'patch']) !!}

                        @include('inovasis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection