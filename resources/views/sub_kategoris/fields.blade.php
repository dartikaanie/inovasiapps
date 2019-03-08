<!-- Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori Id:') !!}
    {!! Form::select('kategori_id', $kategoris, null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Sub Kategori Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_sub_kategori', 'Nama Sub Kategori:') !!}
    {!! Form::text('nama_sub_kategori', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subKategoris.index') !!}" class="btn btn-default">Cancel</a>
</div>
