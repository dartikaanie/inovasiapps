@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Juri
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($juri, ['route' => ['juris.update', $juri->nip], 'method' => 'PATCH']) !!}

                        @include('admin.juris.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection