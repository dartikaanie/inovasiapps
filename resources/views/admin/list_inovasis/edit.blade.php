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
                   {!! Form::model($inovasi, ['route' => ['inovasis.update', $inovasi->inovasi_id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}

                       <div class="row">

                           {!! Form::hidden('tim_id',$inovasi->tim_id, ['class' => 'form-control']) !!}
                           {!! Form::hidden('sub_kategori_id',$inovasi->sub_kategori_id, ['class' => 'form-control']) !!}

                           <div class="col-md-6">
                           <div class="form-group col-sm-12">
                               {!! Form::label('judul', 'Judul :') !!}
                               {!! Form::text('judul', null, ['class' => 'form-control']) !!}
                           </div>
                           <!-- Area Implementasi Field -->
                           <div class="form-group col-sm-12">
                           {!! Form::label('area_implementasi', 'Area Implementasi:') !!}
                           {!! Form::text('area_implementasi', null, ['class' => 'form-control']) !!}
                           </div>

                           <!-- Nip Inisiator Field -->
                           <div class="form-group col-sm-12">
                           {!! Form::label('nip_inisiator', 'Inisiator:') !!}
                           {!! Form::select('nip_inisiator', $anggota, null, ['class' => 'form-control']) !!}
                           </div>

                           <!-- Latar Belakang Field -->
                               <div class="form-group col-sm-12">
                               {!! Form::label('latar_belakang', 'Latar Belakang:') !!}
                               {!! Form::textarea('latar_belakang', null, ['class' => 'form-control']) !!}
                               </div>

                               <!-- Tujuan Inovasi Field -->
                               <div class="form-group col-sm-12">
                               {!! Form::label('tujuan_inovasi', 'Tujuan Inovasi:') !!}
                               {!! Form::textarea('tujuan_inovasi', null, ['class' => 'form-control']) !!}
                               </div>
                           </div>
                           <div class="col-md-6">
                               <!-- Saving Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('saving', 'Saving:') !!}
                                   {!! Form::number('saving', null, ['class' => 'form-control', 'id' => 'saving', 'onChange' => 'change();']) !!}
                               </div>

                               <!-- Opp Lost Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('opp_lost', 'Opp Lost:') !!}
                                   {!! Form::number('opp_lost', null, ['class' => 'form-control', 'id' => 'opp_lost', 'onChange' => 'change();']) !!}
                               </div>

                               <!-- Total Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('opp_lost', 'Total:') !!}
                                   {!! Form::number('opp_lost', null, ['class' => 'form-control', 'disabled' => 'yes', 'id' => 'total']) !!}
                               </div>
                               <!-- Status Implementasi Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('status_implementasi', 'Status Implementasi:') !!}
                                   {!! Form::select('status_implementasi', ['0' => 'belum Terimplementasi','1' => 'sudah terimplementasi'],null, ['class' => 'form-control']) !!}
                               </div>

                               <!-- Dokumen Tim Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('dokumen_tim', 'Dokumen Tim:') !!}
                                   {!! Form::file('dokumen_tim', null, ['class' => 'form-control']) !!}
                               </div>

                               <!-- Dokumen Tim Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('dokumen_pendukung', 'Dokumen Pendung:') !!}
                                   {!! Form::file('dokumen_pendukung', null, ['class' => 'form-control']) !!}
                                   <small class="list-group-item-danger">*Dokumen pendukung dapat berupa foto,laporan,dsb. jika ada</small>
                               </div>

                               <div class="form-group col-sm-12">
                                    <a href="" class="btn btn-warning"><i class="fa fa-download"></i> Download template - {{$inovasi->subKategoris->nama_sub_kategori}}</a>
                               </div>

                               <!-- Status Registrasi Field -->
                               <div class="form-group col-sm-6">
                                   {!! Form::hidden('status_registrasi', 0, ['class' => 'form-control']) !!}
                               </div>

                               <div class="col-md-12">
                                   {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                                   <a href="{!! route('tims.show', [$inovasi->tim_id]) !!}" class="btn btn-default">Batal</a>
                               </div>
                               {!! Form::close() !!}
                           </div>
                       </div>

               </div>
           </div>
       </div>
   </div>
@endsection

<script>
    function change() {
        var saving = document.getElementById("saving");
        var opp_lost = document.getElementById("opp_lost");
        var total = document.getElementById('total');

        var t = saving.value - opp_lost.value;
        total.value = t;
    }
</script>