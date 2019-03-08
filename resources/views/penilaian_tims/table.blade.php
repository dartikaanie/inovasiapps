<table class="table table-responsive" id="penilaianTims-table">
    <thead>
        <tr>
            <th>Stream Id</th>
        <th>Sub Kategori Id</th>
        <th>Sub Kriteria Id</th>
        <th>Nilai</th>
        <th>Saran</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($penilaianTims as $penilaianTim)
        <tr>
            <td>{!! $penilaianTim->stream_id !!}</td>
            <td>{!! $penilaianTim->sub_kategori_id !!}</td>
            <td>{!! $penilaianTim->sub_kriteria_id !!}</td>
            <td>{!! $penilaianTim->nilai !!}</td>
            <td>{!! $penilaianTim->saran !!}</td>
            <td>
                {!! Form::open(['route' => ['penilaianTims.destroy', $penilaianTim->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penilaianTims.show', [$penilaianTim->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('penilaianTims.edit', [$penilaianTim->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>