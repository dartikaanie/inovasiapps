

<table class="table table-striped" id="inovasis-table">
    <tbody>
    @foreach($kendalas as $kendala)

        <tr>
            <td>

                <h4> <a href="#" class="name">
                   <small class="text-muted pull-right"></small>
                        {{$kendala->judul}}
                </a></h4>
                <p class="message">
                <i class="fa fa-envelope"></i> {{$kendala->isi_kendala}}
                </p>
                        <br>
                @if($kendala->tim_expert_id != null)
                    <label> Butuh Bantuan dari expert : <span class="label label-primary"> {{$kendala->expert->nama}} </span></label>
                @else
                    -
                @endif

                {!! Form::open(['route' => ['kendalas.destroy', $kendala->id], 'method' => 'delete']) !!}
                <div class='pull-right'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Kamu yakin?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>