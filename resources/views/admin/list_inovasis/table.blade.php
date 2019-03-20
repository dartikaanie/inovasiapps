<table class="table table-responsive" id="inovasis-table">
    <thead>
        <tr>
            <th>Tanggal submit</th>
            <th>Nama Tim</th>
            <th>Departemen</th>
            <th>Sub Kategori Id</th>
            <th>Judul</th>
            <th>Status Implementasi</th>
            <th>Status Registrasi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inovasis as $inovasi)
        @if($inovasi->status_implementasi == 1)
            <tr>
                <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
                <td>{!! $inovasi->TimInovasi->nama_tim !!}</td>
                <td>{!! $inovasi->TimInovasi->departemen !!}</td>
                <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                <td>{!! substr($inovasi->judul,0,50) !!}
                    @if(strlen($inovasi->judul) > 50)
                        ...
                    @endif</td>
                <td>@if($inovasi->status_implementasi == 0 )
                        <label class="label label-danger">belum terimplementasi</label>
                    @else
                        <label class="label label-success">sudah terimplementasi</label>
                    @endif
                </td>
                <td>
                    @if($inovasi->status_registrasi == 1 )
                        <label class="label label-warning">proses verifikasi admin</label>
                    @elseif($inovasi->status_registrasi == 2 )
                        <label class="label label-success">Masuk Tahap Penilaian</label>
                    @else
                        <label class="label label-danger">Belum Teregistrasi</label>
                @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['listInovasis.destroy', $inovasi->inovasi_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('listInovasis.show', [$inovasi->inovasi_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                        {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>