
   <input hidden="true" name="kategori_id" value="{{$kategori->kategori_id}}">

<!-- Nama Sub Kategori Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nama_sub_kategori', 'Nama Sub Kategori:') !!}
    {!! Form::text('nama_sub_kategori', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

