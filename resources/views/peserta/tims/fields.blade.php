<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama Tim:') !!}
    {!! Form::text('nama_tim', null, ['class' => 'form-control']) !!}
</div>



<!-- Departemen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departemen', 'Departemen:') !!}
    <input value="{{$user->departemens->nama}}" class="form-control" disabled="yes">
    <input hidden name="departemen" value="{{$user->departemens->kode}}">
</div>
{{----<!-- Nip Field -->--}}
<div class="form-group col-sm-6">
{{--{!! Form::label('nip', 'Nama Peserta:') !!}--}}
    {!! Form::hidden('nip', $user->nip , null, ['class' => 'form-control', 'data-placeholder'=> 'Select']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a onclick="history.go(-1)" class="btn btn-default">Kembali</a>
</div>

