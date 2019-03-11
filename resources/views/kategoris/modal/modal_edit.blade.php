<!-- Modal Sub Kategori -->
<div class="modal fade" id="editSub-{{$sub->sub_kategori_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$sub->sub_nama_kategori}}</h5>
                @include('adminlte-templates::common.errors')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model($sub, ['route' => ['subKategoris.update', $sub->sub_kategori_id], 'method' => 'patch']) !!}
                @include('kategoris.modal.fields_sub')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-primary" value="Ubah">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- Modal Sub Kategori -->