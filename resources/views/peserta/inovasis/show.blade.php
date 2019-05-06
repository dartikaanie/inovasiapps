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

                                <td>:

                                    @if($inovasi->area_implementasi != null)
                                        {{$inovasi->areas->area_implementasi}}
                                    @endif
                                </td>
                            </tr>
                            <tr>

                                <td>Inisiator</td>

                                <td>:
                                    @if($inovasi->nip_inisiator  != null)
                                        {{$inovasi->users->nama}}
                                    @endif
                                </td>
                            </tr>
                            <tr>

                                <td>Fasilitator</td>

                                <td>:
                                    @if($inovasi->nip_fasilitator  != null)
                                        {{$inovasi->fasilitators->nama}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Departemen</td>
                                <td>:
                                    @if($inovasi->timInovasi->departemens  != null)
                                        {{$inovasi->timInovasi->departemens->nama}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Anggota</td>
                                <td>:
                                @foreach($anggota as $a)
                                    <label class="label label-primary"> {{$a->users->nama}}</label>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>: {{$inovasi->subKategoris->nama_sub_kategori}}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Implementasi / Rencana</td>
                                <td>:
                                    @if($inovasi->tgl_pelaksanaan != null)
                                        {{date_format($inovasi->tgl_pelaksanaan, 'd-M-Y')}}
                                @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Implementasi</td>
                                <td>: @if($inovasi->status_implementasi==0)
                                          Belum Terimplementasi
                                    @else
                                          Sudah Terimplementasi
                                    @endif
                                </td>
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
                                <td>: Rp {{number_format($inovasi->saving + $inovasi->opp_lost - $inovasi->biaya  ,2,',','.')}} </td>
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
                                        <a class="btn btn-default" href="{{asset('dokumen_tim/'.$inovasi->dokumen_tim)}}"> <i class="fa fa-download"></i></a>
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
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>: @if($inovasi->status == 0 )
                                        <label class="label label-danger">Belum Terimplementasi</label>
                                    @elseif($inovasi->status == 1 )
                                        <label class="label label-warning">Terimplementasi</label>
                                        <label class="label label-warning">Proses Verifikasi oleh admin</label>
                                    @elseif($inovasi->status == 2 )
                                        <label class="label label-success">Terregistrasi</label>
                                    @elseif($inovasi->status == 3 )
                                        <label class="label label-success">Proses Penilaian</label>
                                    @else
                                        <label class="label label-success">Selesai</label>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <!-- Dokumen Preview -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h4>Aksi Data Inovasi</h4>

                        @if($inovasi->status == 0)
                            <p>Jika data inovasi sudah lengkap (tidak ada perubahan lagi), Silakaan klik tombol ajukan inovasi </p>

                            <small class="list-group-item-danger">Jika inovasi diajukan, Anda tidak dapat mengubah(edit) inovasi</small>
                            <br><br>
                            <a class="btn btn-info" data-toggle="modal" data-target="#ajukan-{{$inovasi->inovasi_id}}">
                                <i class="fa fa-lock"> </i>   Ajukan Inovasi    </a>
                            <a class="btn btn-warning" href="{!! route('inovasis.edit', [$inovasi->inovasi_id]) !!}">Ubah</a>
                            <a href="{!! route('tims.show', [$inovasi->tim_id]) !!}" class='btn btn-primary'><i class="glyphicon glyphicon-eye-open"></i> Lihat Tim </a>

                            @include('peserta.inovasis.modal.modal_ajukan')
                         @endif
                        <a class="btn btn-primary" href="{{route('tims.show',[$inovasi->tim_id])}}">Selesai</a>
                        </div>
                    <hr style="height: 20px;">
                    @if($inovasi->status == 0)
                    <div class="box-body box-profile">
                        <h4>Apakah ada kendala ?</h4>
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
                        <iframe src="{{asset('dokumen_tim/'.$inovasi->dokumen_tim)}}#toolbar=0" width="100%"  height="800px" scrolling="auto" ></iframe>
                        @else
                        Dokumen Inovasi belum diupload
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection
