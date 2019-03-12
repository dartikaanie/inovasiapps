<table class="table table-responsive" id="subKriterias-table">
    <thead>
        <tr>
            <th>Kriteria Id</th>
        <th>Sub Kriteria</th>
        <th>Rentang1</th>
        <th>Keterangan1</th>
        <th>Rentang2</th>
        <th>Keterangan2</th>
        <th>Rentang3</th>
        <th>Keterangan3</th>
        <th>Rentang4</th>
        <th>Keterangan4</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subKriterias as $subKriteria)
        <tr>
            <td>{!! $subKriteria->kriterias->nama_kriteria !!}</td>
            <td>{!! $subKriteria->sub_kriteria !!}</td>
            <td>{!! $subKriteria->rentang1 !!}</td>
            <td>{!! $subKriteria->keterangan1 !!}</td>
            <td>{!! $subKriteria->rentang2 !!}</td>
            <td>{!! $subKriteria->keterangan2 !!}</td>
            <td>{!! $subKriteria->rentang3 !!}</td>
            <td>{!! $subKriteria->keterangan3 !!}</td>
            <td>{!! $subKriteria->rentang4 !!}</td>
            <td>{!! $subKriteria->keterangan4 !!}</td>
            <td>
                {!! Form::open(['route' => ['subKriterias.destroy', $subKriteria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subKriterias.show', [$subKriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subKriterias.edit', [$subKriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>