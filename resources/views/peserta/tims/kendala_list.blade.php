<h1 class="pull-right">
    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('/tambahInovasi/'.$tim->tim_id) !!}"><i class="fa fa-plus"> </i>  inovasi </a>
</h1>

<table class="table table-responsive" id="inovasis-table">
    <thead>
    <tr>
        <th>Judul Inovasi</th>
        <th>Kendala</th>
        <th>Butuh bantuan</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($kendalas as $kendala)

        <tr>
            <td>{!! substr($kendala->judul,0,30) !!}
                @if(strlen($kendala->judul) > 30)
                    ...
                @endif
            </td>
            <td>{{$kendala->isi_kendala}}</td>
            <td>
                @if($kendala->tim_expert_id != null){{$kendala->expert->nama}}
            @else
                    -
                    @endif
            </td>
            <td>
                {!! Form::open(['route' => ['kendalas.destroy', $kendala->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Kamu yakin?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>