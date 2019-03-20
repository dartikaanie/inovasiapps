<table class="table table-bordered">
    <tr>
        <td>Nama Tim </td>
        <td>: {{$kendala->inovasis->timInovasi->nama_tim}}</td>
    </tr>
    <tr>
        <td>Judul Inovasi</td>
        <td>: {{$kendala->inovasis->judul}}</td>
    </tr>
    <tr>
        <td>Ketua Tim</td>
        <td>: @if($kendala->inovasis->timInovasi->anggotaTims->statusAnggotas->status_anggota == "Ketua")
              {{$kendala->inovasis->timInovasi->anggotaTims->users->nama}}
              @endif
        </td>
    </tr>
    <tr><td>Kendala</td>
        <td>: {{$kendala->isi_kendala}}</td>
    </tr>
    <tr>
        <td>solusi</td>
        <td>: @if($kendala->solusi == null)
            <a class="btn btn-primary" data-toggle="modal" data-target="#addSolusi-{{$kendala->id}}">
                    <i class="fa fa-plus"> </i>   Solusi   </a>
                @include("admin.kendalas.modal_solusi")
                @else
                  {{$kendala->solusi}}
            @endif
        </td>

</table>