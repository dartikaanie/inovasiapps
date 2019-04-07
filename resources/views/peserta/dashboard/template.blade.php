<div class="box-body">
    <?php $n=0; $m=0;?>
    @foreach($kategoris as $kategori)
        @if($kategori->nama_kategori == "BREAKTHROUGH" && $n==0)
            <h3>{{$kategori->nama_kategori}}</h3>
            <?php $n++;?>
        @elseif($kategori->nama_kategori == "INCREAMENTAL" && $m==0)
            <?php $m++;?>
            <h3>{{$kategori->nama_kategori}}</h3>
        @else
            <strong><i class="fa fa-book margin-r-5"></i>{{$kategori->nama_sub_kategori}}</strong>
            <p class="text-muted">
                {{$kategori->keterangan}}
            </p>
            @if($kategori->file != null)
                <a href="{{asset('template/'.$kategori->file)}}" class="btn btn-social btn-default"><i class="fa fa-download"></i> <b>Template {{$kategori->nama_sub_kategori}}</b></a>
            @endif
             <hr>
            @endif
@endforeach
</div>