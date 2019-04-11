<div class="modal fade" id="tambahArea">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambahkan Area?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(['route' => 'areaAdd']) !!}
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Isi Kendala Field -->
                    <div class="row">
                            <div class="form-group col-sm-12">
                            <input hidden name="tim_id" value="{{$tim->tim_id}}">
                            {!! Form::label('area_implementasi', 'area implementasi:') !!}
                            <input type="text" name="area_implementasi"  class="form-control">
                        </div>

                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>