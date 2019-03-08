<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $stream->id !!}</p>
</div>

<!-- Nip Juri Field -->
<div class="form-group">
    {!! Form::label('nip_juri', 'Nip Juri:') !!}
    <p>{!! $stream->nip_juri !!}</p>
</div>

<!-- Inovasi Id Field -->
<div class="form-group">
    {!! Form::label('inovasi_id', 'Inovasi Id:') !!}
    <p>{!! $stream->inovasi_id !!}</p>
</div>

<!-- Nama Stream Field -->
<div class="form-group">
    {!! Form::label('nama_stream', 'Nama Stream:') !!}
    <p>{!! $stream->nama_stream !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $stream->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $stream->updated_at !!}</p>
</div>

