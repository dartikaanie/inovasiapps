<div class="modal fade" id="ajukan-{{$inovasi->inovasi_id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ajukan inovasi sekarang ?</h4>
                <br>
                <p>Jika inovasi diajukan, Anda tidak dapat mengubah(edit) inovasi</p>
            </div>
        {!! Form::model($inovasi, ['route' => ['editStatus', $inovasi->inovasi_id], 'method' => 'patch']) !!}
        <!-- Modal body -->
            <div class="modal-body">
                <!-- Isi Kendala Field -->
                <div class="row">
                    <div class="text-center">
                        <input hidden name="inovasi_id" value="{{$inovasi->inovasi_id}}">
                        <input type="submit" name="status"  value="Ajukan" class="btn btn-primary">
                        <input type="submit" name="status" value="Belum" class="btn btn-default">
                        {{--{!! Form::submit('Ya', ['class' => 'btn btn-primary']) !!}--}}
                        {{--{!! Form::submit('Tidak', ['class' => 'btn btn-primary']) !!}--}}
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