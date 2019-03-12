<table class="table table-responsive" id="kriteraiaKategoriPenilaians-table">
    <thead>
        <tr>
            <th>Sub Kriteria Id</th>
        <th>Sub Kategori Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kriteraiaKategoriPenilaians as $kriteraiaKategoriPenilaian)
        <tr>
            <td>{!! $kriteraiaKategoriPenilaian->subKategoris->nama_sub_kategori !!}</td>
            <td>{!! $kriteraiaKategoriPenilaian->subKriterias->sub_kriteria !!}</td>
            <td>
                {!! Form::open(['route' => ['kriteraiaKategoriPenilaians.destroy', $kriteraiaKategoriPenilaian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kriteraiaKategoriPenilaians.show', [$kriteraiaKategoriPenilaian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kriteraiaKategoriPenilaians.edit', [$kriteraiaKategoriPenilaian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>