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
                                      @if(count($penilaians)!=0)
                                        @foreach($penilaians as $p)
                                            @if($p->krikat_id == $kitkat->kriteria_katategori_id)
                                                @if($penilaianInovasi->status_penilaian==1)
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
                                    @else
                                        <input type="number" min="0" name="penilaian_id[{{$kitkat->kriteria_katategori_id}}]" class="form-control" >
                                    @endif
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


