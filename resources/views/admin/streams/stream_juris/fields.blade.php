

    {!! Form::hidden('stream_id', $stream_id, null, ['class' => 'form-control']) !!}

    <div class="form-group col-sm-6">
        {!! Form::label('nip_juri', 'Juri:') !!}
        {!! Form::select('nip_juri', $users, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('streams.show', [$stream_id]) !!}" class="btn btn-default">Batal</a>
    </div>
