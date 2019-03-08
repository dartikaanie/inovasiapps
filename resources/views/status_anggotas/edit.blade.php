@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Anggota
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusAnggota, ['route' => ['statusAnggotas.update', $statusAnggota->id], 'method' => 'patch']) !!}

                        @include('status_anggotas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection