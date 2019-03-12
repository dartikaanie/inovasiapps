<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @foreach($kategoris as $kategori)
                   <li><a href="#tab-{{$kategori->kategori_id}}" data-toggle="tab">{{$kategori->nama_kategori}}</a></li>
            @endforeach
        </ul>

        <div class="active tab-content">
            @foreach($kategoris as $kategori)
                <div class="tab-pane" id="tab-{{$kategori->kategori_id}}">
                    <div class="box-body">
                        <div class="box-group" id="accordion-{{$kategori->kategori_id}}">
                                <a href="" class="btn btn-warning"> Ubah Kriteria Penilaian - {{$kategori->nama_kategori}} </a>
                            <br><br>
                            @foreach($subKategoris as $subKategori)
                                @if($subKategori->kategori_id == $kategori->kategori_id)
                                    <div class="panel box box-default">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#accordion-{{$kategori->kategori_id}}" href="#collapse-{{$kategori->kategori_id}}-{{$subKategori->sub_kategori_id}}">
                                                    <h4> {{$subKategori->nama_sub_kategori}}</h4>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-{{$kategori->kategori_id}}-{{$subKategori->sub_kategori_id}}" class="panel-collapse collapse in">
                                            @foreach($kriterias as $kriteria)
                                                @if($kriteria->kategori_id == $kategori->kategori_id)
                                                    @foreach($subKriterias as $subKri)
                                                        @if($subKri->kriteria_id === $kriteria->kriteria_id)
                                                            <div class="box-body">
                                                                <h4> {{$kriteria->nama_kriteria}}</h4>
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td colspan="2"><strong>{{$subKri->sub_kriteria}}</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="14%">{{$subKri->rentang1}}</td>
                                                                        <td>{{$subKri->keterangan1}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{$subKri->rentang2}}</td>
                                                                        <td>{{$subKri->keterangan2}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{$subKri->rentang3}}</td>
                                                                        <td>{{$subKri->keterangan3}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>{{$subKri->rentang4}}</td>
                                                                        <td>{{$subKri->keterangan4}}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{--<div class="row">--}}
    {{--@foreach($kategoris as $kategori)--}}
        {{--<div class="col-md-6">--}}
            {{--<div class="box box-solid">--}}
                {{--<div class="box-header with-border">--}}
                    {{--<h4 class="pull-left">{{$kategori->nama_kategori}}</h4><br>--}}
                {{--</div>--}}
                {{--<!-- /.box-header -->--}}

                {{--<!-- /.box-body -->--}}
            {{--</div>--}}
            {{--<!-- /.box -->--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--</div>--}}


