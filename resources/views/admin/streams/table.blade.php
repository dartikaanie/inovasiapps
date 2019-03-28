<table class="table table-bordered" id="streams-table">
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Nama Stream</th>
            <th>Juri</th>
            <th>Inovasi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($streams as $stream)
        <tr>
            <td>{!! $stream->kategoris->nama_kategori !!}</td>
            <td>{!! $stream->nama_stream !!}</td>
            <td>
                <?php $juri = \App\Models\juri::where('stream_id', $stream->stream_id)->where('status_aktif',1)->get(); ?>
                {{count($juri)}}
            </td>
            <td>
                <?php $inovasis =\App\Models\inovasi::where('stream_id', $stream->stream_id)->get(); ?>
               {{count($inovasis)}}

            <td>
                <div class='btn-group'>
                    <a href="{!! route('streams.show', [$stream->stream_id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                   <a href="{!! route('deleteStream', [$stream->stream_id]) !!}" class="btn btn-danger" onclick="return confirm('Kamu yakin menghapus strean ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                         </div>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>