
 @if(count($user)==0)
     <div class="form-group col-sm-12">
     <p class="text-center">Tidak ada juri yang dapat ditambahkan  <br> <br> <a href="{{Route('juris.index')}}" class="btn btn-default">Kembali</a></p>

     </div>
     @else
        <div class="form-group col-sm-6">
            <label name="nip">Nama Juri :</label>
            <select name="nip" id="nip" class="form-control select2">

                @foreach($user as $p )

                    <option value="{{$p->nip}}">{{$p->nama}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('kategori_id', 'Kategori :') !!}
            {!! Form::select('kategori_id', $kategoris,null, ['class' => 'form-control']) !!}
        </div>

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('juris.index') !!}" class="btn btn-default">Cancel</a>
        </div>
     @endif
