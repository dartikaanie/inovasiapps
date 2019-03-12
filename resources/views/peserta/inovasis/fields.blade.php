

{{--<!-- Area Implementasi Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('area_implementasi', 'Area Implementasi:') !!}--}}
    {{--{!! Form::text('area_implementasi', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Nip Inisiator Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('nip_inisiator', 'Nip Inisiator:') !!}--}}
    {{--{!! Form::select('nip_inisiator', ], null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}



<!-- Latar Belakang Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('latar_belakang', 'Latar Belakang:') !!}--}}
    {{--{!! Form::text('latar_belakang', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Tujuan Inovasi Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('tujuan_inovasi', 'Tujuan Inovasi:') !!}--}}
    {{--{!! Form::text('tujuan_inovasi', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Saving Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('saving', 'Saving:') !!}--}}
    {{--{!! Form::number('saving', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Opp Lost Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('opp_lost', 'Opp Lost:') !!}--}}
    {{--{!! Form::number('opp_lost', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Status Implementasi Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('status_implementasi', 'Status Implementasi:') !!}--}}
    {{--{!! Form::number('status_implementasi', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}



{{--<!-- Dokumen Tim Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('dokumen_tim', 'Dokumen Tim:') !!}--}}
    {{--{!! Form::text('dokumen_tim', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Status Registrasi Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('status_registrasi', 'Status Registrasi:') !!}--}}
    {{--{!! Form::number('status_registrasi', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}




{{--//form awal--}}

    <!-- Judul Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('judul', 'Judul:') !!}
        {!! Form::text('judul', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-4">
        {!! Form::label('area_implementasi', 'Area Implementasi:') !!}
        {!! Form::text('area_implementasi', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Sub Kategori Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('sub_kategori_id', 'Sub Kategori Id:') !!}
        {!! Form::select('sub_kategori_id', $sub, null, ['class' => 'form-control']) !!}
    </div>
{!! Form::hidden('tim_id', $tim->tim_id, ['class' => 'form-control']) !!}
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('inovasis.index') !!}" class="btn btn-default">Cancel</a>
    </div>

