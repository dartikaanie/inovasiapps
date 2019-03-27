<table class="table table-responsive" id="inovasis-table">
    <thead>
        <tr>
            <th>Tanggal submit</th>
            <th>Nama Tim</th>
            <th>Departemen</th>
            <th>Sub Kategori Id</th>
            <th>Judul</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inovasis as $inovasi)
            <tr>
                <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
                <td>{!! $inovasi->TimInovasi->nama_tim !!}</td>
                <td>{!! $inovasi->TimInovasi->departemen !!}</td>
                <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                <td>{!! substr($inovasi->judul,0,50) !!}
                    @if(strlen($inovasi->judul) > 50)
                        ...
                    @endif</td>
                <td>  @if($inovasi->status == 0 )
                        <label class="label label-danger">Belum Terimplementasi</label>
                    @elseif($inovasi->status == 1 )
                        <label class="label label-warning">Terimplementasi</label>
                    @elseif($inovasi->status == 2 )
                        <label class="label label-info">Terregistrasi</label>
                    @elseif($inovasi->status == 3 )
                        <label class="label label-primary">Proses Penilaian</label>
                    @else
                        <label class="label label-success">Selesai</label>
                    @endif
                </td>
            </tr>
    @endforeach
    </tbody>
</table>