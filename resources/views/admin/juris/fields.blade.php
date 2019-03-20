
<div class="form-group col-sm-6">
    {!! Form::label('nip', 'Nip Juri :') !!}
    {!! Form::select('nip', $user,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori :') !!}
    {!! Form::select('kategori_id', $kategoris,null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('juris.index') !!}" class="btn btn-default">Cancel</a>
</div>
