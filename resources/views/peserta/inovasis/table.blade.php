<table class="table table-responsive" id="inovasis-table">
    <thead>
        <tr>
            <th>Tim Id</th>
        <th>Area Implementasi</th>
        <th>Nip Inisiator</th>
        <th>Sub Kategori Id</th>
        <th>Judul</th>
        <th>Latar Belakang</th>
        <th>Tujuan Inovasi</th>
        <th>Saving</th>
        <th>Opp Lost</th>
        <th>Status Implementasi</th>
        <th>Tgl Pelaksanaan</th>
        <th>Dokumen Tim</th>
        <th>Status Registrasi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inovasis as $inovasi)
        <tr>
            <td>{!! $inovasi->tim_id !!}</td>
            <td>{!! $inovasi->area_implementasi !!}</td>
            <td>{!! $inovasi->nip_inisiator !!}</td>
            <td>{!! $inovasi->sub_kategori_id !!}</td>
            <td>{!! $inovasi->judul !!}</td>
            <td>{!! $inovasi->latar_belakang !!}</td>
            <td>{!! $inovasi->tujuan_inovasi !!}</td>
            <td>{!! $inovasi->saving !!}</td>
            <td>{!! $inovasi->opp_lost !!}</td>
            <td>{!! $inovasi->status_implementasi !!}</td>
            <td>{!! $inovasi->tgl_pelaksanaan !!}</td>
            <td>{!! $inovasi->dokumen_tim !!}</td>
            <td>{!! $inovasi->status_registrasi !!}</td>
            <td>
                {!! Form::open(['route' => ['inovasis.destroy', $inovasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('inovasis.show', [$inovasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('inovasis.edit', [$inovasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>