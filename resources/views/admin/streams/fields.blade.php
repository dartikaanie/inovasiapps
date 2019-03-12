{{--<!-- Nip Juri Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('nip_juri', 'Nip Juri:') !!}--}}
    {{--{!! Form::select('nip_juri', ], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Inovasi Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('inovasi_id', 'Inovasi Id:') !!}--}}
    {{--{!! Form::select('inovasi_id', ], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Nama Stream Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_stream', 'Nama Stream:') !!}
    {!! Form::text('nama_stream', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('streams.index') !!}" class="btn btn-default">Cancel</a>
</div>
