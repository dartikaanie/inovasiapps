<table class="table table-responsive" id="tims-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Departemen</th>
        <th>Nip</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tims as $tim)
        <tr>
            <td>{!! $tim->nama !!}</td>
            <td>{!! $tim->departemen !!}</td>
            <td>{!! $tim->nip !!}</td>
            <td>
                {!! Form::open(['route' => ['tims.destroy', $tim->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tims.show', [$tim->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tims.edit', [$tim->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>