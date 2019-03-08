

<!-- Sub Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_kategori_id', 'Sub Kategori Id:') !!}
    {!! Form::select('sub_kategori_id', $sub_kategoris, null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Kriteria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_kriteria_id', 'Sub Kriteria Id:') !!}
    {!! Form::select('sub_kriteria_id', $sub_kriterias, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kriteraiaKategoriPenilaians.index') !!}" class="btn btn-default">Cancel</a>
</div>
