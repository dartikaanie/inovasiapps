<div class="col-md-2">
    <a href="{{route('inovasiJuris.index')}}">
        <div class="small-box bg-gray">
            <div class="inner">
                <h3><i class="ion ion-android-arrow-back"></i></h3>
                <p>&nbsp;</p>
            </div>
        </div>
    </a>
</div>
<div class="col-md-7">
   @if($penilaianInovasi->status_penilaian ==0)
    <div class="small-box bg-red">
        <div class="inner">
            <h3>BELUM</h3>
            <p>Kunci nilai untuk menyelesaikan</p>
        </div>
    </div>
       @else
        <div class="small-box bg-green">
            <div class="inner">
                <h3>Selesai</h3>
                <p>Nilai tidak dapat diubah lagi</p>
            </div>
        </div>

    @endif
</div>

<div class="col-md-3">
    <div class="small-box bg-blue">
        <div class="inner">
            <h3>{{$total}}</h3>
            <p>Total Nilai</p>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="nav-tabs-custom">
        <div class="tab-content">

            @if($penilaianInovasi->status_penilaian==0)
                @if(count($penilaians)==0)
                    {!! Form::open(['route' => 'penilaianTims.store']) !!}
                @else
                    {!! Form::model($penilaians, ['route' => ['penilaianTims.update', $inovasi->inovasi_id], 'method' => 'patch']) !!}
                @endif
                    {!! Form::hidden('penilaian_inovasi_id',$penilaianInovasi->penilaian_inovasi_id, null, ['class' => 'form-control'])!!}
                    {!! Form::hidden('inovasi_id',$inovasi->inovasi_id, null, ['class' => 'form-control'])!!}
            @endif
            @if($penilaianInovasi->status_penilaian==0)
                @include('juri.inovasi_juri.table_penilaian_edited')
            @else
                    @include('juri.inovasi_juri.table_penilaian_showed')
            @endif
            @if($penilaianInovasi->status_penilaian==0)
                    {!! Form::label('saran', 'Saran :') !!}
                    {!! Form::textarea('saran', $penilaianInovasi->saran, ['class' => 'form-control', 'placeholder' => $penilaianInovasi->saran ])!!}
                <div class="btn-group">
                        {!! Form::submit('Nilai', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    <a class="btn btn-success"  href="{{route('kunciNilai',[$penilaianInovasi->penilaian_inovasi_id])}}"> Kunci Nilai</a>
                </div>
                <small class="text-danger">Nilai yang sudah dikunci tidak dapat diubah lagi</small>
            @endif


        </div>
    </div>
</div>


