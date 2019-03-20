<?php $i=1; ?>
{!! Form::model($tim, ['route' => ['anggotaTims.update', $tim->tim_id], 'method' => 'patch']) !!}
{!! Form::hidden('tim_id', $tim->tim_id, null, ['class' => 'form-control']) !!}
<table class="table table-responsive" id="anggitaTims-table">

    <tbody>
    @foreach($anggotaTims  as $anggotaTim)
            <tr>
                <!-- Nip Field -->
                <td>
                    <label name="nip">Nama Anggota {{$i}} :</label>
                    <select name="nip" id="nip" class="form-control selectpicker" data-live-search="true">
                        @foreach($peserta as $p)
                            @if($p->nim ==$anggotaTim->nip)
                                <option value="{{$p->nip}}" selected>{{$p->nama}}</option>
                                @endif
                            <option value="{{$p->nip}}">{{$p->nama}}</option>
                        @endforeach
                </td>
                <td>                        <!-- Status Anggota Id Field -->
                    <label name="status">Status Anggota {{$i}} :</label>
                    <select name="status_anggota_id" class="form-control">

                        @foreach($status as $stat)
                            @if($stat->status_anggota_id == $anggotaTim->status_anggota_id)
                                <option value="{{$stat->status_anggota_id}}" selected>{{$stat->status_anggota}}</option>
                            @else
                                <option value="{{$stat->status_anggota_id}}">{{$stat->status_anggota}}</option>
                            @endif
                    @endforeach
                </td>
            </tr>
        <?php $i++; ?>
        @endforeach
        </tbody>
</table>

{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
<a href="{!! route('tims.show',[$tim->tim_id]) !!}" class="btn btn-default">Kembali</a>

{!! Form::close() !!}