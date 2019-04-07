<table class="table table-responsive" id="juris-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Kategori</th>
        <th class="text-center">Stream</th>
        <th class="text-center">Status Aktif</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($juris as $juri)
        <tr>
            <td>{!! $juri->users->nama !!}</td>
            <td>{!! $juri->kategoris->nama_kategori !!}</td>
            <td class="text-center">
                @if($juri->streams == null)
                    <label class="label label-danger">belum ada</label>
                    @else
                    <label class="label label-primary">{{$juri->streams->nama_stream}}</label>
                @endif
            </td>
            <td class="text-center">@if($juri->status_aktif == 0)
                  <a class="btn btn-danger btn-xs" href="{!! route('statusJuri', [$juri->nip]) !!}">tidak aktif</a>
                    @else
                        <a class="btn btn-primary btn-xs" href="{!! route('statusJuri', [$juri->nip]) !!}">aktif</a>
                @endif</td>
            <td>
                {!! Form::open(['route' => ['juris.destroy', $juri->nip], 'method' => 'delete']) !!}
                <div class='btn-group'>
{{--                    <a href="{!! route('juris.show', [$juri->nip]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    <a href="{!! route('juris.edit', [$juri->nip]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>