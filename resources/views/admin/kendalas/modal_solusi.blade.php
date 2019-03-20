<div class="modal fade" id="addSolusi-{{$kendala->id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Solusi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        {!! Form::model($kendala, ['route' => ['kendalas.update', $kendala->id], 'method' => 'patch']) !!}
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Isi Kendala Field -->
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label name="solusi">Solusi :</label>
                            <textarea name="solusi" class="form-control"> </textarea>
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>