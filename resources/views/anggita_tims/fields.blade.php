<!-- Nip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nip', 'Nip:') !!}
    {!! Form::select('nip', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Tim Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tim_id', 'Tim Id:') !!}
    {!! Form::select('tim_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Anggota Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_anggota_id', 'Status Anggota Id:') !!}
    {!! Form::select('status_anggota_id', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anggitaTims.index') !!}" class="btn btn-default">Cancel</a>
</div>
