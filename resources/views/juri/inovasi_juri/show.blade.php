@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tim
        </h1>
    </section>
    <div class="content">
        <div class="row">

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="box box-primary">
                        @include('flash::message')
                        <div class="box-body box-profile">
                            <table class="table table-striped">
                                <tr>
                                    <td>Judul</td>
                                    <td>: {{$inovasi->judul}} </td>
                                </tr>
                                <tr>
                                    <td>Area Implementasi</td>
                                    <td>: {{$inovasi->area_implementasi}} </td>
                                </tr>
                                <tr>
                                    <td>Latar belakang</td>
                                    <td>: {{$inovasi->latar_belakang}}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan inovasi</td>
                                    <td>: {{$inovasi->tujuan_inovasi}}</td>
                                </tr>
                                <tr>
                                    <td>Saving</td>
                                    <td>: Rp {{number_format($inovasi->saving,2,',','.')}} </td>
                                </tr>
                                <tr>
                                    <td>Opp. Cost</td>
                                    <td>: Rp {{number_format($inovasi->opp_lost,2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <td>Revenue</td>
                                    <td>: Rp {{number_format($inovasi->revenue,2,',','.')}} </td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>: Rp {{number_format($inovasi->saving - $inovasi->opp_lost  ,2,',','.')}} </td>
                                </tr>
                                <tr>
                                    <td>Tanggal pelaksanaan inovasi</td>
                                    <td>: {{date_format(date_create($inovasi->tgl_pelaksanaan),'d-m-Y')}} </td>
                                </tr>
                                <tr>
                                    <td>Tanggal Submit</td>
                                    <td>: {{date_format(date_create($inovasi->created_at),'d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Dokumen Tim</td>
                                    <td>:
                                        @if($inovasi->dokumen_tim)
                                        <a class="label label-success">Sudah di Upload</a>
                                        @else
                                            <label class="label label-danger">tidak ada</label>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>Dokumen Pendukung</td>
                                    <td>:
                                        @if($inovasi->dokumen_pendukung)
                                            <a class="label label-success">Sudah di Upload</a>
                                        @else
                                            <label class="label label-warning">tidak ada</label>
                                            @endif
                                    </td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <!-- Dokumen Preview -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            @if($inovasi->dokumen_tim)
                                <iframe src="{{asset('/dokumen_tim/'.$inovasi->dokumen_tim)}}#toolbar=0" width="100%"  height="800px" scrolling="auto" ></iframe>
                            @else
                                Dokumen Inovasi belum diupload
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h5>Nilai Inovasi</h5>
                        @include('juri.inovasi_juri.table_penilaian')
                    </div>
                </div>
            </div>


            </div>
        </div>
@endsection
