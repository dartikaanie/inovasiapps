<table class="table table-hover" id="tims-table">
    <thead>
        <tr>
            <th>Nama Tim</th>
            <th>Anggota</th>
            <th>Tanggal tim dibentuk</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tims as $tim)
        <tr>

            <td>{!! $tim->nama_tim   !!}</td>
            <td>
                <?php $anggota = \App\Models\anggotaTim::where('tim_id', $tim->tim_id)->get();?>
                <ul>
                    @foreach($anggota as $a)
                    <li>{{$a->users->nama}} ( {{$a->statusAnggota->status_anggota}} )</li>
                    @endforeach
                </ul>
            </td>
            <td>{{date_format(date_create($tim->created_at),"d-m-Y")}}</td>
            <td>

                {{--{!! Form::open(['route' => ['tims.destroy', $tim->tim_id], 'method' => 'delete']) !!}--}}

                      {{--@include ('peserta.tims.modal.modal_tambah')--}}
                <a href="{!! route('tims.show', [$tim->tim_id]) !!}" class='btn btn-info'><i class="glyphicon glyphicon-eye-open"></i> Lihat </a>

                {{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger ', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                {{--{!! Form::close() !!}--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

