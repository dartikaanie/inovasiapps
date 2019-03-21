<div class="col-lg-2 col-xs-12">
    <a href="{{route('inovasiJuris.index')}}">
        <div class="small-box bg-gray">
            <div class="inner">
                <h3><i class="ion ion-android-arrow-back"></i></h3>
                <p>&nbsp;</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-arrow-back"></i>
            </div>
        </div>
    </a>
</div>
<div class="col-lg-5 col-xs-12">
   @if($inovasi->status_penilaian ==0)
    <div class="small-box bg-red">
        <div class="inner">
            <h3>Belum Selesai</h3>
            <p>Silakan selesaikan penilaian</p>
        </div>
        <div class="icon">
            <i class="ion ion-alert"></i>
        </div>
    </div>
       @else
        <div class="small-box bg-green">
            <div class="inner">
                <h3>Selesai</h3>
                <p>Nilai tidak dapat diubah lagi</p>
            </div>
            <div class="icon">
              <i class="ion ion-key"></i>
            </div>
        </div>

    @endif
</div>

<div class="col-lg-5 col-xs-12">
    <div class="small-box bg-blue">
        <div class="inner">
            <h3>{{$total}}</h3>
            <p>Total Nilai</p>
        </div>
        <div class="icon">
            <i class="ion ion-android-menu"></i>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <div class="tab-content">

            @if($inovasi->status_penilaian==0)
                @if(empty($penilaians))
                    {!! Form::open(['route' => 'penilaianTims.store']) !!}
                @else
                    {!! Form::model($penilaians, ['route' => ['penilaianTims.update', $inovasi->inovasi_id], 'method' => 'patch']) !!}
                @endif
                    {!! Form::hidden('inovasi_id', $inovasi->inovasi_id, null, ['class' => 'form-control'])!!}
                    {!! Form::hidden('nip_juri',$juri, null, ['class' => 'form-control'])!!}
            @endif
            @foreach($kriterias as $kriteria)
                    <div class="panel box box-default">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion-{{$i++}}" href="#collapse-{{$i}}">{{$kriteria}}</a>
                            </h4>
                        </div>
                        <div id="collapse-{{$i}}" class="panel-collapse collapse">
                            @foreach($kitkats as $kitkat)
                                @if($kitkat->subKriterias->kriterias->nama_kriteria == $kriteria)
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>{{$kitkat->subKriterias->sub_kriteria}}</strong></td>
                                            <td>

                                                @foreach($penilaians as $p)

                                                    @if($p->krikat_id == $kitkat->kriteria_katategori_id)
                                                        @if($inovasi->status_penilaian==1)
                                                            <label class="label label-primary">{{$p->nilai}}</label>
                                                        @else
                                                            @if($p->nilai == null)
                                                            <input type="number" min="0" name="penilaian_id[{{$kitkat->kriteria_katategori_id}}]" class="form-control" >
                                                            @else
                                                                <input type="number" min="0" name="penilaian_id[{{$kitkat->kriteria_katategori_id}}]" class="form-control" value="{{$p->nilai}}">
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="14%">{{$kitkat->subKriterias->rentang1}}</td>
                                            <td>{{$kitkat->subKriterias->keterangan1}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$kitkat->subKriterias->rentang2}}</td>
                                            <td>{{$kitkat->subKriterias->keterangan2}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$kitkat->subKriterias->rentang3}}</td>
                                            <td>{{$kitkat->subKriterias->keterangan3}}</td>
                                        </tr>
                                        <tr>
                                            <td>{{$kitkat->subKriterias->rentang4}}</td>
                                            <td>{{$kitkat->subKriterias->keterangan4}}</td>
                                        </tr>
                                    </table>
                                </div>
                                @endif
                                @endforeach
                        </div>
                    </div>
                @endforeach
                @if($inovasi->status_penilaian==0)
                    <div class="btn-group">
                            {!! Form::submit('Nilai', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        <a class="btn btn-success"  href="{{route('kunciNilai',[$inovasi->inovasi_id])}}"> Kunci Nilai</a>
                    </div>
                    <small class="text-danger">Nilai yang sudah dikunci tidak dapat diubah lagi</small>
                @endif


        </div>
    </div>
</div>


