<table class="table table-responsive" id="streams-table">
    <thead>
        <tr>
            <th>Nip Juri</th>
        <th>Inovasi Id</th>
        <th>Nama Stream</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($streams as $stream)
        <tr>
            <td>{!! $stream->nip_juri !!}</td>
            <td>{!! $stream->inovasi_id !!}</td>
            <td>{!! $stream->nama_stream !!}</td>
            <td>
                {!! Form::open(['route' => ['streams.destroy', $stream->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('streams.show', [$stream->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('streams.edit', [$stream->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>