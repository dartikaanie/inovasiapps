<table class="table table-striped" id="inovasis-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal submit</th>
            <th>Nama Tim</th>
            <th>Departemen</th>
            <th>Sub Kategori Id</th>
            <th>Judul</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php $n=0; ?>
    @foreach($inovasis as $inovasi)
            <tr>
                <td>{{++$n}}</td>
                <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
                <td>{!! $inovasi->TimInovasi->nama_tim !!}</td>
                <td>{!! $inovasi->TimInovasi->departemens->nama!!}</td>
                <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
                <td>{!! substr($inovasi->judul,0,50) !!}
                    @if(strlen($inovasi->judul) > 50)
                        ...
                    @endif</td>
                <td>  @if($inovasi->status == 0 )
                        <label class="label label-danger">Terdaftar</label>
                    @elseif($inovasi->status == 1 )
                        <label class="label label-warning">Dikirim</label>
                    @elseif($inovasi->status == 2 )
                        <label class="label label-info">Terverifikasi</label>
                    @elseif($inovasi->status == 3 )
                        <label class="label label-primary">Proses Penilaian</label>
                    @else
                        <label class="label label-success">Selesai</label>
                    @endif
                </td>
                <td>
                    <a href="{!! route('listInovasis.show', [$inovasi->inovasi_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i> Lihat</a>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>

{{ $inovasis->links() }}