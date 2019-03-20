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
                                <td>Tanggal Submit</td>
                                <td>: {{date_format(date_create($inovasi->created_at),'d-m-Y')}}</td>
                            </tr>

                            <tr>
                                <td>Dokumen Tim</td>
                                <td>:
                                    @if($inovasi->dokumen_tim)
                                        <label class="label label-success">Sudah di Upload</label>
                                    @else
                                        <label class="label label-danger">tidak ada</label>
                                    @endif
                                </td>
                            </tr>


                            <tr>
                                <td>Dokumen Pendukung</td>
                                <td>:
                                    @if($inovasi->dokumen_pendukung)
                                        <label class="label label-success">Sudah di Upload</label>
                                    @else
                                        <label class="label label-warning">tidak ada</label>
                                    @endif
                                </td>
                                </td>
                            </tr>

                            <tr>
                                <td>Status Implementasi</td>
                                <td>: @if($inovasi->status_implementasi == 0 )
                                    <label class="label label-danger">belum terimplementasi</label>
                                    @else
                                    <label class="label label-success">sudah terimplementasi</label>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Registrasi</td>
                                <td>: @if($inovasi->status_registrasi == 1 )
                                        <label class="label label-warning">proses verifikasi admin</label>
                                    @elseif($inovasi->status_registrasi == 2 )
                                        <label class="label label-success">Masuk Tahap Penilaian</label>
                                          @else
                                        <label class="label label-danger">Belum Teregistrasi</label>
                                    @endif</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @if($inovasi->status_registrasi == 0)
                @if($inovasi->status_implementasi == 0)
                    <div class="col-md-6">
                        <!-- Dokumen Preview -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                            {!! Form::model($inovasi, ['route' => ['editStatus', $inovasi->inovasi_id], 'method' => 'patch']) !!}
                                <!-- Status Implementasi Field -->
                                <div class="form-group col-sm-12">
                                    {!! Form::label('status_implementasi', 'Status Implementasi:') !!}
                                    {!! Form::select('status_implementasi', ['0' => 'belum Terimplementasi','1' => 'sudah terimplementasi'],null, ['class' => 'form-control']) !!}
                                    <small class="list-group-item-danger">Jika inovasi berstatus terimplementasi, Anda tidak dapat mengubah(edit) inovasi</small>
                                </div>
                                <div class="col-md-12">
                                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary', "onclick" => "return confirm('Anda yakin? Data tidak dapat diubah lagi')"]) !!}
                                </div>
                            {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                @endif
            @endif
            <div class="col-md-6">
                <!-- Dokumen Preview -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h5>Aksi Data Inovasi</h5>

                        @if($inovasi->status_registrasi == 0)
                            @if($inovasi->status_implementasi == 0)
                                <a class="btn btn-warning" href="{!! route('inovasis.edit', [$inovasi->inovasi_id]) !!}">Ubah</a>
                            @endif
                        @endif
                        <a class="btn btn-primary" href="{{route('streams.show',[$stream_id])}}">Selesai</a>

                    </div>
                    @if($inovasi->status_implementasi == 0)
                    <div class="box-body box-profile">
                        <h5>Apakah ada kendala ?</h5>
                        <p>Sampaikan kendala anda kepada admin.</p>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modalKendala-{{$inovasi->inovasi_id}}">
                            <i class="fa fa-plus"> </i>   Kendala   </a>
                        @include('peserta.tims.modal.modal_kendala')
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
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
        </div>
@endsection