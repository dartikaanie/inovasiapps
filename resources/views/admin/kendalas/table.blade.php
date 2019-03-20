<table class="table table-responsive" id="subKriterias-table">
    <thead>
        <tr>
            <th>Tim </th>
        <th>Judul inovasi</th>
            <th>kategori</th>
        <th>Kendala</th>
            <th>solusi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kendalas as $kendala)
        <tr>
            <td>{!! $kendala->inovasis->timInovasi->nama_tim!!}</td>
            <td>{!! substr($kendala->inovasis->judul,0,30) !!}
                @if(strlen($kendala->inovasis->judul) > 30)
                    ...
                @endif
            </td>
            <td>{!! $kendala->inovasis->subKategoris->nama_sub_kategori!!}</td>
            <td>{!! substr($kendala->isi_kendala,0,30) !!}
                @if(strlen($kendala->isi_kendala) > 30)
                    ...
                @endif</td>
            <td>{!! substr($kendala->solusi,0,30) !!}
                @if(strlen($kendala->solusi) > 30)
                    ...
                @endif</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('kendalas.show', [$kendala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kendalas.edit', [$kendala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>