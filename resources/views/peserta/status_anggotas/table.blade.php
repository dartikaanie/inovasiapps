<table class="table table-responsive" id="statusAnggotas-table">
    <thead>
        <tr>
            <th>Status Anggota</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusAnggotas as $statusAnggota)
        <tr>
            <td>{!! $statusAnggota->status_anggota !!}</td>
            <td>
                {!! Form::open(['route' => ['statusAnggotas.destroy', $statusAnggota->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusAnggotas.show', [$statusAnggota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusAnggotas.edit', [$statusAnggota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>