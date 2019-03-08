<table class="table table-responsive" id="subKategoris-table">
    <thead>
        <tr>
            <th>Kategori Id</th>
        <th>Nama Sub Kategori</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subKategoris as $subKategori)
        <tr>
            <td>{!! $subKategori->kategoris->nama_kategori !!}</td>
            <td>{!! $subKategori->nama_sub_kategori !!}</td>
            <td>{!! $subKategori->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['subKategoris.destroy', $subKategori->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subKategoris.show', [$subKategori->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subKategoris.edit', [$subKategori->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>