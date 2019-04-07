<div class="modal fade" id="modalKendala-{{$inovasi->inovasi_id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Kendala</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(['route' => 'kendalas.store']) !!}
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Isi Kendala Field -->
                    <div class="row">
                        <div class="form-group col-sm-12">
                            {!! Form::label('isi_kendala', 'Isi Kendala:') !!}
                            {!! Form::textarea('isi_kendala', null, ['class' => 'form-control']) !!}
                            {!! Form::hidden('inovasi_id', $inovasi->inovasi_id ,null, ['class' => 'form-control']) !!}
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