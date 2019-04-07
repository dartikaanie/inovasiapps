<table class="table table-responsive" id="inovasis-table">
    <thead>
        <tr>
            <th>Tanggal submit</th>
            <th>Nama Tim</th>
            <th>Departemen</th>
            <th>Sub Kategori Id</th>
            <th>Judul</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inovBelum as $inovasi)
            <tr>
                <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
                <td>{!! $inovasi->TimInovasi->nama_tim !!}</td>
                <td>{!! $inovasi->TimInovasi->departemens->departemen !!}</td>
                <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                <td>{!! substr($inovasi->judul,0,50) !!}
                    @if(strlen($inovasi->judul) > 50)
                        ...
                    @endif</td>

                <td>
                    <div class='btn-group'>
                        <a href="{!! route('inovasiJuris.show', [$inovasi->inovasi_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i> </a>
                        <a href="{!! route('showNilaiInovasiJuri', [$inovasi->inovasi_id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-check"></i> </a>
                    </div>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>