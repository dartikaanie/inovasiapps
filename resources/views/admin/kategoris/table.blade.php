<div class="row">
    <?php $i=0; ?>
    @foreach($kategoris as $kategori)
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="pull-left">{{$kategori->nama_kategori}}</h4><br>
                {{--<a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('subKategoris.create') !!}"> + Sub Kategori </a>--}}
                <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#tambahSubKategori-{{$kategori->kategori_id}}">
                    + Sub Kategori
                </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-group" id="accordion">  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                     @foreach($subKategori as $sub)
                        <?php $n=0; ?>
                        @if($sub->kategori_id == $kategori->kategori_id)
                            <div class="panel box box-default">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{$i}}-{{$n}}">
                                            {{$sub->nama_sub_kategori}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse-{{$i}}-{{$n}}" class="panel-collapse collapse in">
                                    <div class="box-body">
                                        {{$sub->keterangan}}
                                    </div>
                                    <div class="box-body">
                                        {!! Form::open(['route' => ['subKategoris.destroy', $sub->sub_kategori_id], 'method' => 'delete']) !!}
                                        <div class='btn-group pull-right'>
                                            {{--<a href="{!! route('subKategoris.edit', [$sub->sub_kategori_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSub-{{$sub->sub_kategori_id}}"><i class="glyphicon glyphicon-edit"></i></button>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                        @include ("admin.kategoris.modal.modal_edit")
                                    </div>
                                </div>
                            </div>
                            <?php $n=$n+1; ?>
                        @endif
                        <?php $i=$i+1; ?>
                        @include('admin.kategoris.modal.modal_tambah')
                    @endforeach
                    </div>
                </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    @endforeach
</div>
