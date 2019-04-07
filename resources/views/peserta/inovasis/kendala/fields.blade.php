{!! Form::open(['route' => 'kendalas.store']) !!}
<!-- Modal body -->
<div class="modal-body">
    <!-- Isi Kendala Field -->
    <div class="row">
        <div class="form-group col-sm-6">
            @if($butuh == "ya")
                {!! Form::label('expert', 'Butuh bantuan expert dari :') !!}
                {!! Form::select('tim_expert_id',$expert, null, ['class' => 'form-control']) !!}
            @endif
        </div>
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