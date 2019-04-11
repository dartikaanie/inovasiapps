
{!! Form::hidden('stream_id', $stream_id, null, ['class' => 'form-control']) !!}

<div class="form-group col-sm-12">
    <table class="table table-bordered">
        <thead>
        <th>check</th>
        <th>Nik </th>
        <th>Nama </th>
        <th>Departemen tim</th>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td>
                    <input type="checkbox"  name="nip_juri[]" value="{{$user->nip}}" >
                </td>
                <td>{{$user->nip}}</td>
                <td>{{$user->nama}}</td>
                <td>{{$user->departemens->nama}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if(count($users)==0)
        <div class="text-center">Tidak ada juri aktif yang belum bergabung dalam stream</div>
@else
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
@endif
<!-- Submit Field -->
    <a href="{!! route('streams.show', [$stream_id]) !!}" class="btn btn-default">Kembali</a>
</div>
