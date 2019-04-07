
{!! Form::hidden('stream_id', $stream_id, null, ['class' => 'form-control']) !!}

<div class="form-group col-sm-12">
        <table class="table table-bordered">
            <thead>
                <th>check</th>
                <th>Nama Tim</th>
                <th>Judul Inovasi</th>
                <th>Departemen tim</th>
            </thead>
            <tbody>

                <?php $i=0; ?>
                @foreach($inovasis as $inovasi)
                <tr>
                    <td>
                        <input type="checkbox"  name="inovasi_id[]" value="{{$inovasi->inovasi_id}}" >
                    </td>
                    <td>{{$inovasi->timInovasi->nama_tim}}</td>
                    <td>{{$inovasi->judul}}</td>
                    <td>{{$inovasi->timInovasi->departemens->nama}}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

    @if(count($inovasis)==0)
        <div class="text-center">Tidak ada tim yang belum bergabung dalam stream</div>
    @else
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        @endif
    <!-- Submit Field -->
        <a href="{!! route('streams.show', [$stream_id]) !!}" class="btn btn-default">Kembali</a>
</div>
