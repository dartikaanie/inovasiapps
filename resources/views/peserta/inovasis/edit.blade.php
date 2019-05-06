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
                                   {!! Form::select('area_implementasi', $area, null, ['class' => 'form-control select2']) !!}
                               </div>
                               <div class="form-group col-sm-12">
                                   <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#tambahArea">
                                       <i class="fa fa-plus"> </i>   Area Implementasi   </a>

                               </div>

                           <!-- Nip Inisiator Field -->
                           <div class="form-group col-sm-12">
                           {!! Form::label('nip_inisiator', 'Inisiator:') !!}
                           {!! Form::select('nip_inisiator', $anggota, null, ['class' => 'form-control']) !!}
                           </div>

                               <div class="form-group col-sm-12">
                                   <label name="nip">Fasilitator :</label>
                                   <select name="nip_fasilitator" id="nip" class="form-control select2">
                                       @foreach($users as $p)
                                           <option value="{{$p->nip}}">{{$p->nama}}</option>
                                           @endforeach
                                   </select>
                               </div>

                               <!-- tgl Implementasi Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('tgl_pelaksanaan', 'Tanggal Implementasi / Rencana Implementasi (yyyy-mm-dd)  :') !!}
                                   {!! Form::date('tgl_pelaksanaan',  null, ['class' => 'form-control', 'required' => 'yes', 'placeholder' => 'tahun-bulan-tanggal']) !!}
                               </div>
                               <div class="form-group col-sm-12">
                           {!! Form::label('status', 'Implementasi Inovasi ?:') !!}
                           {!! Form::select('status_implementasi', ['0' => 'Belum Implementasi','1' => 'Sudah Implementasi'],null, ['class' => 'form-control']) !!}

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

                               <!-- revenue Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('revenue', 'Revenue:') !!}
                                   {!! Form::number('revenue', null, ['class' => 'form-control', 'id' => 'revenue', 'onChange' => 'change();']) !!}
                               </div>

                               <!-- bIAYA Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('biaya', 'Biaya:') !!}
                                   {!! Form::number('biaya', null, ['class' => 'form-control', 'id' => 'biaya', 'onChange' => 'change();']) !!}
                               </div>



                               <!-- Total Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('opp_lost', 'Total:') !!}
                                   {!! Form::number('opp_lost', null, ['class' => 'form-control', 'disabled' => 'yes', 'id' => 'total']) !!}
                               </div>



                               <!-- Dokumen Tim Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('dokumen_tim', 'Dokumen Tim:') !!}
                                   {!! Form::file('dokumen_tim', null, ['class' => 'form-control']) !!}
                                   <small class="list-group-item-danger">*Dokumen tim merupakan dokumen yang berisi informasi inovasi yang telah disesuaikan dengan template yang disediakan</small>
                                   <br> <small class="list-group-item-danger">*format <label class="label label-danger">.pdf </label></small>
                               </div>

                               <!-- Dokumen Tim Field -->
                               <div class="form-group col-sm-12">
                                   {!! Form::label('dokumen_pendukung', 'Dokumen Pendukung:') !!}
                                   {!! Form::file('dokumen_pendukung', null, ['class' => 'form-control']) !!}
                                   <small class="list-group-item-danger">*Dokumen pendukung dapat berupa foto,laporan,dsb. jika ada</small>
                                   <br> <small class="list-group-item-danger">*format <label class="label label-danger">.zip / .rar </label></small>
                               </div>

                               <div class="form-group col-sm-12">
                                    <a href="{{asset('template/'.$inovasi->subKategoris->file)}}" class="btn btn-warning"><i class="fa fa-download"></i> Download template - {{$inovasi->subKategoris->nama_sub_kategori}}</a>
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
                   @include("peserta.inovasis.modal.modal_area")
               </div>
           </div>
       </div>
   </div>
@endsection

<script>
    function change() {
        var saving = document.getElementById("saving");
        var opp_lost = document.getElementById("opp_lost");
        var biaya = document.getElementById('biaya');
        var revenue = document.getElementById('revenue');
        var total = document.getElementById('total');

        var t = parseInt(saving.value) + parseInt(opp_lost.value) +  parseInt(revenue.value) - parseInt(biaya.value);
        total.value = t;
    }
</script>