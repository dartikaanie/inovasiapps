<table class="table table-hover" id="tims-table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Tim</th>
            <th>Judul</th>
            <th>Status Registrasi</th>
            <th colspan="3">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inovasis as $inovasi)
        @if($inovasi->status_implementasi == 0)
            <tr>
                <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
                <td>{!! substr($inovasi->judul,0,30) !!}
                    @if(strlen($inovasi->judul) > 30)
                        ...
                    @endif
                </td>
                <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                <td>
                    @if($inovasi->status_registrasi == 1 )
                        <label class="label label-warning">proses verifikasi admin</label>
                    @elseif($inovasi->status_registrasi == 2 )
                        <label class="label label-success">Masuk Tahap Penilaian</label>
                    @else
                        <label class="label label-danger">Belum Teregistrasi</label>
                @endif
                <td>
                <td>
                    {!! Form::open(['route' => ['inovasis.destroy', $inovasi->inovasi_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::hidden('tim_id', $inovasi->tim_id) !!}
                        <a href="{!! route('inovasis.show', [$inovasi->inovasi_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                        @if($inovasi->status_registrasi == 0 )
                            <a href="{!! route('inovasis.edit', [$inovasi->inovasi_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                        @else
                            <a class='btn btn-default' disabled="yes"><i class="glyphicon glyphicon-edit"></i></a>
                        @endif
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>

