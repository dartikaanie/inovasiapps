<div class="modal fade" id="modalKendala-{{$inovasi->inovasi_id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Apakah butuh konsultasi dengan tim expert?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {!! Form::open(['route' => 'kendalaButuh']) !!}
                <!-- Modal body -->
                <div class="modal-body">
                    <!-- Isi Kendala Field -->
                    <div class="row">
                        <div class="text-center">
                            <input hidden name="inovasi_id" value="{{$inovasi->inovasi_id}}">
                            <input type="submit" name="butuh"  value="ya" class="btn btn-primary">
                            <input type="submit" name="butuh" value="tidak" class="btn btn-primary">
                        </div>

                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>