<div class="modal fade" id="modalTambah-{{$tim->tim_id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Jumlah Anggota</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('directToForm')}}">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="number" class="form-control" name="jumlah_anggota" placeholder="0" min="1">
                        <input hidden="true" name="tim_id" value="{{$tim->tim_id}}" min="1">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary"  value="lanjut">
                </div>
            </form>
        </div>
    </div>
</div>