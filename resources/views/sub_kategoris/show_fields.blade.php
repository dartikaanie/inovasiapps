<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $subKategori->id !!}</p>
</div>

<!-- Kategori Id Field -->
<div class="form-group">
    {!! Form::label('kategori_id', 'Kategori Id:') !!}
    <p>{!! $subKategori->kategori_id !!}</p>
</div>

<!-- Nama Sub Kategori Field -->
<div class="form-group">
    {!! Form::label('nama_sub_kategori', 'Nama Sub Kategori:') !!}
    <p>{!! $subKategori->nama_sub_kategori !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $subKategori->keterangan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $subKategori->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $subKategori->updated_at !!}</p>
</div>

