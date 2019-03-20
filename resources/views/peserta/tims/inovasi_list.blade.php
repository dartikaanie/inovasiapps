<h1 class="pull-right">
    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('/tambahInovasi/'.$tim->tim_id) !!}"><i class="fa fa-plus"> </i>  inovasi </a>
</h1>

<table class="table table-responsive" id="inovasis-table">
    <thead>
    <tr>
        <th>Tanggal Submit</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Status Registrasi</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($inovasis as $inovasi)
        <tr>
            <td>{{date_format(date_create($inovasi->created_at), 'd-m-Y')}}</td>
            <td>{!! substr($inovasi->judul,0,30) !!}
                @if(strlen($inovasi->judul) > 30)
                    ...
                    @endif
            </td>
            <td>{!! $inovasi->subKategoris->nama_sub_kategori!!}</td>
           {{--<td>@if($inovasi->status_implementasi == 0 )--}}
                    {{--<label class="label label-danger">belum terimplementasi</label>--}}
                    {{--@else--}}
                    {{--<label class="label label-success">proses verifikasi</label>--}}
                {{--@endif--}}
            {{--</td>--}}
            <td>
                @if($inovasi->status_registrasi == 1 )
                    <label class="label label-warning">proses verifikasi admin</label>
                @elseif($inovasi->status_registrasi == 2 )
                    <label class="label label-success">Masuk Tahap Penilaian</label>
                @else
                    <label class="label label-danger">Belum Teregistrasi</label>
                 @endif
            <td>
                {!! Form::open(['route' => ['inovasis.destroy', $inovasi->inovasi_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::hidden('tim_id', $tim->tim_id) !!}
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
    @endforeach
    </tbody>
</table>