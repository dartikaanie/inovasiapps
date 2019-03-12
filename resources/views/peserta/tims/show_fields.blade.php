<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <table class="table table-responsive">
            <tr>
                <td>Nama Tim</td>
                <td>: {{$tim->nama}}</td>
            </tr>
            <tr>
                <td>Ketua Tim</td>
                <td>: {{$ketua->users->nama}}</td>
            </tr>
            <tr>
                <td>Fasilitator</td>
                @if($fasilitator)
                <td>: {{$fasilitator->users->nama}}</td>
                    @else
                <td>-</td>
                    @endif
            </tr>
            <tr>
                <td>Anggota</td>
                <td>: <ul>
                @foreach($anggota as $a)
                    <li>{{$a->users->nama}}</li>
                        @endforeach
                    </ul></td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>: {{$tim->departemen}}</td>
            </tr>
        </table>
    </div>
</div>
