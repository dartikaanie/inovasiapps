@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penilaian Tim
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penilaianTim, ['route' => ['penilaianTims.update', $penilaianTim->id], 'method' => 'patch']) !!}

                        @include('penilaian_tims.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection