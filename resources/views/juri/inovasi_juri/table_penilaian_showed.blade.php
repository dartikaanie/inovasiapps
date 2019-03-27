@foreach($kriterias as $kriteria)
    <h4>{{$kriteria}}</h4>
        @foreach($kitkats as $kitkat)
            @if($kitkat->subKriterias->kriterias->nama_kriteria == $kriteria)
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <td width="70%">{{$kitkat->subKriterias->sub_kriteria}}</td>
                        <td>
                            @foreach($penilaians as $p)
                                @if($p->krikat_id == $kitkat->kriteria_katategori_id)
                                    @if($penilaianInovasi->status_penilaian==1)
                                        <p class="label label-primary">{{$p->nilai}}</p>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
            @endif
        @endforeach
@endforeach

<div class="small-box bg-blue">
    <div class="inner">
        <h5>Saran : </h5>
        <p>{{$penilaianInovasi->saran}}</p>
    </div>
    <div class="icon">
        <i class="ion ion-android-mail"></i>
    </div>

</div>


