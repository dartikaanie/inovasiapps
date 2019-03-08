<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen', 'Departemen:') !!}
    {!! Form::text('departemen', null, ['class' => 'form-control']) !!}
</div>

<!-- Nip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nip', 'Nip:') !!}
    {!! Form::select('nip', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tims.index') !!}" class="btn btn-default">Cancel</a>
</div>
