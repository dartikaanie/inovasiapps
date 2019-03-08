<table class="table table-responsive" id="anggitaTims-table">
    <thead>
        <tr>
            <th>Nip</th>
        <th>Tim Id</th>
        <th>Status Anggota Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($anggitaTims as $anggitaTim)
        <tr>
            <td>{!! $anggitaTim->nip !!}</td>
            <td>{!! $anggitaTim->tim_id !!}</td>
            <td>{!! $anggitaTim->status_anggota_id !!}</td>
            <td>
                {!! Form::open(['route' => ['anggitaTims.destroy', $anggitaTim->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('anggitaTims.show', [$anggitaTim->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('anggitaTims.edit', [$anggitaTim->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>