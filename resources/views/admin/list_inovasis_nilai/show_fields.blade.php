@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tim
        </h1>
    </section>
    <div class="content">
        <div class="row">
            @include('flash::message')
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <table class="table table-striped">
                            <tr>
                                <td>Judul</td>
                                <td>: Ini Judul </td>
                            </tr>
                            <tr>
                                <td>Area Implementasi</td>
                                <td>: Ini Area implementasi </td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>: Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi  Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini Deskripsi  Ini Deskripsi Ini Deskripsi Ini Deskripsi Ini DeskripsiIni Deskripsi Ini Deskripsi Ini Deskripsi Ini DeskripsiIni DeskripsiIni DeskripsiIni DeskripsiIni DeskripsiIni DeskripsiIni DeskripsiIni DeskripsiIni DeskripsiIni Deskripsi </td>
                            </tr>
                            <tr>
                                <td>Latar belakang</td>
                                <td>: Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakangIni Latar belakang Ini Latar belakang Ini Latar belakangIni Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang Ini Latar belakang  </td>
                            </tr>
                            <tr>
                                <td>Tujuan inovasi</td>
                                <td>: Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi Ini tujuan inovasi </td>
                            </tr>
                            <tr>
                                <td>Saving</td>
                                <td>: Rp 0000000 </td>
                            </tr>
                            <tr>
                                <td>Opp. Cost</td>
                                <td>: Rp 00000000 </td>
                            </tr>
                            <tr>
                                <td>Revenue</td>
                                <td>: Rp 000000000 </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>: Rp 0000000 </td>
                            </tr>
                            <tr>
                                <td>Status Implementasi</td>
                                <td>: Ini Status Implementasi </td>
                            </tr>
                            <tr>
                                <td>Tanggal pelaksanaan inovasi</td>
                                <td>: 12-01-2018 </td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>: Ini keterangan </td>
                            </tr>
                            <tr>
                                <td>Dokumen</td>
                                <td>: Judl_inovasi.pdf </td>
                            </tr>
                            <tr>
                                <td>Dokumen Pendukung</td>
                                <td>: Judl_inovasi.zip </td>
                            </tr>
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->



            {{--Bagian kanan--}}
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">List Inovasi</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <table class="table table-striped">
                                <tr>
                                    <td>Ketua tim</td>
                                    <td>: Ini nama ketua </td>
                                </tr>
                                <tr>
                                    <td>Fasilitator</td>
                                    <td>: Ini nama fasilitator </td>
                                </tr>
                                <tr>
                                    <td>Anggota</td>
                                    <td>: Ini nama Anggota <br>  Ini nama Anggota <br>  Ini nama Anggota </td>
                                </tr>
                                <tr>
                                    <td>Inisiator</td>
                                    <td>: Ini nama inisiator</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
