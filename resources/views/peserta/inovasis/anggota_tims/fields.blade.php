
{{--{!! Form::hidden('nip', Auth::user()->nip, null, ['class' => 'form-control']) !!}--}}
{!! Form::hidden('tim_id', $tim->tim_id, null, ['class' => 'form-control']) !!}
{!! Form::hidden('jum', $jum, null, ['class' => 'form-control']) !!}
{!! Form::hidden('inovasi_id', $inovasi_id, null, ['class' => 'form-control']) !!}

@for($i=1; $i<=$jum; $i++)
    <!-- Nip Field -->
    <div class="form-group col-sm-6">
        <label name="nip">Nama Anggota {{$i}} :</label>
            <select name="nip[{{$i}}]" id="nip" class="form-control select2">
                @foreach($peserta as $p)
                <option value="{{$p->nip}}">{{$p->nama}}</option>
                @endforeach
            </select>
    </div>
    <!-- Status Anggota Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('status_anggota_id', 'Status Anggota Id:') !!}
        {!! Form::select('status_anggota_id['.$i.']', $status, null, ['class' => 'form-control']) !!}
    </div>
@endfor
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tims.show',[$tim->tim_id]) !!}" class="btn btn-default">Cancel</a>
</div>
