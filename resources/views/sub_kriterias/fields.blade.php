<!-- Kriteria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kriteria_id', 'Kriteria Id:') !!}
    {!! Form::select('kriteria_id',$kriterias, null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Kriteria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sub_kriteria', 'Sub Kriteria:') !!}
    {!! Form::text('sub_kriteria', null, ['class' => 'form-control']) !!}
</div>

<!-- Rentang1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rentang1', 'Rentang1:') !!}
    {!! Form::text('rentang1', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan1', 'Keterangan1:') !!}
    {!! Form::text('keterangan1', null, ['class' => 'form-control']) !!}
</div>

<!-- Rentang2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rentang2', 'Rentang2:') !!}
    {!! Form::text('rentang2', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan2', 'Keterangan2:') !!}
    {!! Form::text('keterangan2', null, ['class' => 'form-control']) !!}
</div>

<!-- Rentang3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rentang3', 'Rentang3:') !!}
    {!! Form::text('rentang3', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan3', 'Keterangan3:') !!}
    {!! Form::text('keterangan3', null, ['class' => 'form-control']) !!}
</div>

<!-- Rentang4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rentang4', 'Rentang4:') !!}
    {!! Form::text('rentang4', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan4 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan4', 'Keterangan4:') !!}
    {!! Form::text('keterangan4', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('subKriterias.index') !!}" class="btn btn-default">Cancel</a>
</div>
