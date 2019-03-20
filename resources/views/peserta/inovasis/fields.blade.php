


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
        <a href="{!! route('tims.show', [$tim->tim_id]) !!}" class="btn btn-default">Cancel</a>
    </div>

