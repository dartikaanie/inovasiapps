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
                                        {{$inovasi->areas->nama}}
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
                                <td>Tanggal Implementasi / Rencana</td>
                                <td>: {{$inovasi->tgl_pelaksanaan}}</td>
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
                                <td>Kategori</td>
                                <td>: {{$inovasi->subKategoris->nama_sub_kategori}}</td>
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
                                <td>Status </td>
                                <td>: @if($inovasi->status == 0 )
                                        <label class="label label-danger">Belum Terimplementasi</label>
                                    @elseif($inovasi->status == 1 )
                                        <label class="label label-warning">Terimplementasi</label>
                                    @elseif($inovasi->status == 2 )
                                        <label class="label label-success">Terregistrasi</label>
                                    @elseif($inovasi->status == 3 )
                                        <label class="label label-success">Proses Penilaian</label>
                                    @else
                                        <label class="label label-success">Selesai</label>
                                    @endif
                                </td>
                            </tr>
                            @if($inovasi->status==2)
                                <tr>
                                    <td>Stream</td>
                                    <td>: @if($inovasi->stream_id == null)
                                              <label class="label label-danger">Belum Gabung Stram mana pun</label>
                                              @else
                                              <label>{{$inovasi->nama_stream}}</label>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <h5>Aksi Data Inovasi</h5>
                        @if($inovasi->status == 1)
                                {!! Form::model($inovasi, ['route' => ['listInovasis.update', $inovasi->inovasi_id], 'method' => 'patch']) !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('Status', 'Status Registrasi :') !!}
                                            {!! Form::select('status', ['0' => 'belum terverifikasi', '2' => 'registrasi terverifikasi'], null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        {!! Form::submit('Update status', ['class' => 'btn btn-info', 'onclick' => "return confirm('Apakah yakin?')"]) !!}
                                    </div>
                                </div>
                                {!! Form::close() !!}
                        @elseif($inovasi->status == 0)
                            Inovasi Masih belum Diajukan
                        @endif
                        <a class="btn btn-primary pull-right" href="{{route('listInovasis.index')}}">Selesai</a>
                    </div>
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
