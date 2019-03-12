@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Stream
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($stream, ['route' => ['streams.update', $stream->id], 'method' => 'patch']) !!}

                        @include('streams.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection