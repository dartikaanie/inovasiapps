<!-- Modal Sub Kategori -->
<div class="modal fade" id="tambahSubKategori-{{$kategori->kategori_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{$kategori->nama_kategori}}</h5>
                @include('adminlte-templates::common.errors')
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'subKategoris.store']) !!}
                @include('admin.kategoris.modal.fields_sub')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <input type="submit" class="btn btn-primary" value="Tambah">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- Modal Sub Kategori -->