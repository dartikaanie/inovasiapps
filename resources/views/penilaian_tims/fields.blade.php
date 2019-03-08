<!-- Stream Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stream_id', 'Stream Id:') !!}
    {!! Form::select('stream_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_kategori_id', 'Sub Kategori Id:') !!}
    {!! Form::select('sub_kategori_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Kriteria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_kriteria_id', 'Sub Kriteria Id:') !!}
    {!! Form::select('sub_kriteria_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Nilai Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai', 'Nilai:') !!}
    {!! Form::number('nilai', null, ['class' => 'form-control']) !!}
</div>

<!-- Saran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saran', 'Saran:') !!}
    {!! Form::text('saran', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('penilaianTims.index') !!}" class="btn btn-default">Cancel</a>
</div>
