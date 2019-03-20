<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama Tim:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen', 'Departemen:') !!}
    {!! Form::text('departemen', null, ['class' => 'form-control']) !!}
</div>
{{----<!-- Nip Field -->--}}
<div class="form-group col-sm-6">
{{--{!! Form::label('nip', 'Nama Peserta:') !!}--}}
    {!! Form::hidden('nip', $nip , null, ['class' => 'form-control', 'data-placeholder'=> 'Select']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tims.index') !!}" class="btn btn-default">Kembali</a>
</div>

