
<!-- Nama Stream Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_stream', 'Nama Stream:') !!}
    {!! Form::text('nama_stream', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Stream Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'kategori:') !!}
    {!! Form::select('kategori_id', $kategoris,null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('streams.index') !!}" class="btn btn-default">Batal</a>
</div>
