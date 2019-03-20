{{--<li class="{{ Request::is('roles*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>--}}
{{--</li>--}}
{{--//ADMIN--}}
@if(Auth::user()->role_id == 0)

    <li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
        <a href="{!! route('kategoris.index') !!}"><i class="fa fa-edit"></i><span>Kategoris</span></a>
    </li>


    <li class="{{ Request::is('kriterias*') ? 'active' : '' }}">
        <a href="{!! route('kriterias.index') !!}"><i class="fa fa-edit"></i><span>Kriteraia Penilaians</span></a>
    </li>

    <li class="{{ Request::is('list_inovasi*') ? 'active' : '' }}">
        <a href="{!! route('listInovasis.index') !!}"><i class="fa fa-edit"></i><span>List Inovasi</span></a>
    </li>

    <li class="{{ Request::is('kendalas*') ? 'active' : '' }}">
        <a href="{!! route('kendalas.index') !!}"><i class="fa fa-edit"></i><span>Kendalas</span></a>
    </li>

    <li class="{{ Request::is('streams*') ? 'active' : '' }}">
        <a href="{!! route('streams.index') !!}"><i class="fa fa-edit"></i><span>Streams</span></a>
    </li>


    <li class="{{ Request::is('juris*') ? 'active' : '' }}">
        <a href="{!! route('juris.index') !!}"><i class="fa fa-edit"></i><span>Juris</span></a>
    </li>



    {{-----------------------------//PESRETA------------------------------------------}}
@elseif(Auth::user()->role_id =1)

    <li class="{{ Request::is('tims*') ? 'active' : '' }}">
        <a href="{!! route('tims.index') !!}"><i class="fa fa-edit"></i><span>Tims</span></a>
    </li>

    <li class="{{ Request::is('list_inovasi_peserta*') ? 'active' : '' }}">
        <a href="{!! route('inovasiPesertas.index') !!}"><i class="fa fa-edit"></i><span>List Inovasi</span></a>
    </li>

    <?php
        $juri = \App\Models\juri::join('users','users.nip','=','juris.nip')->where('users.nip', Auth::user()->nip);
    ?>
        {{----------------------------//JURI-------------------------------------------------------}}
        @if($juri)
        <li class="{{ Request::is('penilaianTims*') ? 'active' : '' }}">
            <a href="{!! route('penilaianTims.index') !!}"><i class="fa fa-edit"></i><span>Penilaian Tims</span></a>
        </li>
        @endif
@endif
