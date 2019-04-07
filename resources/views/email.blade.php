<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        .btn-info{color:#fff;background-color:#5bc0de;border-color:#46b8da}
        .btn{display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:400;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-image:none;border:1px solid transparent;border-radius:4px}
    </style>
</head>
<body class="">
<div class="row">
    <div class="col-md-12">
        <p>Ada Inovasi yang telah terimplementasi masuk. Silakan Lakukan Verifikasi Inovasi. Adapaun Detail Inovasi yang masuk adalah sebagai berikut.</p>
    </div>
    <div class="col-md-6">
        <table class="table table-responsive">
            <tr>
                <td>Nama Tim </td>
                <td>: {{$inovasi->TimInovasi->nama_tim}}</td>
            </tr>
            <tr>
                <td>Departemen </td>
                <td>: {{$inovasi->TimInovasi->departemens->departemen}}</td>
            </tr>
            <tr>
                <td>Ketua tim </td>
                <td>: {{$nama}}</td>
            </tr>
            <tr>
                <td>Judul </td>
                <td>: {{$inovasi->judul}}</td>
            </tr>
        </table>
    </div>
    <a class="btn btn-info" href="{{route('listInovasis.show', $inovasi->inovasi_id)}}" style="color: whitesmoke">Cek Inovasi</a>
</div>
</body>
</html>