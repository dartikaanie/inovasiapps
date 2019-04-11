<?php $i=1; ?>
{!! Form::model($tim, ['route' => ['anggotaTims.update', $tim->tim_id], 'method' => 'patch']) !!}
{!! Form::hidden('tim_id', $tim->tim_id, null, ['class' => 'form-control']) !!}
{!! Form::hidden('jum', count($anggotaTims), null, ['class' => 'form-control']) !!}

    @foreach($anggotaTims  as $anggotaTim)
        <div class="form-group col-sm-6">
            <label name="nip">Nama Anggota {{$i}} :</label>
            <select name="nip[{{$i}}]" id="nip" class="form-control select2" >
                @foreach($peserta as $p)
                    @if($p->nip ==$anggotaTim->nip)
                        <option value="{{$p->nip}}" selected>{{$p->nama}}</option>
                        @endif
                    <option value="{{$p->nip}}">{{$p->nama}}</option>
                @endforeach
            </select>
        </div>
        <input hidden name="anggota_tim_id[{{$i}}]" id="id" value="{{$anggotaTim->anggota_tim_id}}" >
            <div class="form-group col-sm-6">
                <label name="status">Status Anggota {{$i}} :</label>
                    <select name="status_anggota_id[{{$i}}]" class="form-control">

                        @foreach($status as $stat)
                            @if($stat->status_anggota_id == $anggotaTim->status_anggota_id)
                                <option value="{{$stat->status_anggota_id}}" selected>{{$stat->status_anggota}}</option>
                            @else
                                <option value="{{$stat->status_anggota_id}}">{{$stat->status_anggota}}</option>
                            @endif
                    @endforeach
                    </select>
            </div>
             <?php $i++; ?>
        @endforeach
{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
<a href="{!! route('tims.show',[$tim->tim_id]) !!}" class="btn btn-default">Kembali</a>

{!! Form::close() !!}