<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $penilaianTim->id !!}</p>
</div>

<!-- Stream Id Field -->
<div class="form-group">
    {!! Form::label('stream_id', 'Stream Id:') !!}
    <p>{!! $penilaianTim->stream_id !!}</p>
</div>

<!-- Sub Kategori Id Field -->
<div class="form-group">
    {!! Form::label('sub_kategori_id', 'Sub Kategori Id:') !!}
    <p>{!! $penilaianTim->sub_kategori_id !!}</p>
</div>

<!-- Sub Kriteria Id Field -->
<div class="form-group">
    {!! Form::label('sub_kriteria_id', 'Sub Kriteria Id:') !!}
    <p>{!! $penilaianTim->sub_kriteria_id !!}</p>
</div>

<!-- Nilai Field -->
<div class="form-group">
    {!! Form::label('nilai', 'Nilai:') !!}
    <p>{!! $penilaianTim->nilai !!}</p>
</div>

<!-- Saran Field -->
<div class="form-group">
    {!! Form::label('saran', 'Saran:') !!}
    <p>{!! $penilaianTim->saran !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $penilaianTim->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $penilaianTim->updated_at !!}</p>
</div>

