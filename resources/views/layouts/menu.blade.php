{{--<li class="{{ Request::is('roles*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>--}}
{{--</li>--}}
{{--//ADMIN--}}
@if(Auth::user()->role_id == 0)

    <li>
        <a href="{!! route('dashboard') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
    </li>


    <li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
        <a href="{!! route('kategoris.index') !!}"><i class="fa fa-edit"></i><span>Kategoris</span></a>
    </li>


    <li class="{{ Request::is('kriterias*') ? 'active' : '' }}">
        <a href="{!! route('kriterias.index') !!}"><i class="fa fa-edit"></i><span>Kriteraia Penilaians</span></a>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-star"></i>
            <span>Inovasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{!! route('listInovasis.index') !!}"><i class="fa  fa-lightbulb-o"></i><span>List Inovasi</span></a>
            </li>
            <li>
                <a href="{!! route('listNilaiInovasi') !!}"><i class="fa   fa-check-square"></i><span>List Nilai Inovasi</span></a>
            </li>
            <li>
                <a href="{!! route('kendalas.index') !!}"><i class="fa  fa-envelope-o"></i><span>Kendala Tim</span></a>
            </li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa  fa-edit"></i> <span>Manajemen Penilaian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is('juris*') ? 'active' : '' }}">
                <a href="{!! route('juris.index') !!}"><i class="fa   fa-user"></i><span>Kelola Juri</span></a>
            </li>
            <li class="{{ Request::is('streams*') ? 'active' : '' }}">
                <a href="{!! route('streams.index') !!}"><i class="fa  fa-users"></i><span>Kelola Stream</span></a>
            </li>
        </ul>
    </li>

    {{--<li class="treeview">--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-file"></i> <span>Laporan</span>--}}
            {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu">--}}
            {{--<li>--}}
                {{--<a href="{!! route('laporanBulan') !!}"><i class="fa   fa-user"></i><span>Per Bulan</span></a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}



    {{-----------------------------//PESRETA------------------------------------------}}
@elseif(Auth::user()->role_id =1)

    <li class="{{ Request::is('tims*') ? 'active' : '' }}">
        <a href="{!! route('tims.index') !!}"><i class="fa fa-edit"></i><span>Tims</span></a>
    </li>

    <li class="{{ Request::is('list_inovasi_peserta*') ? 'active' : '' }}">
        <a href="{!! route('inovasiPesertas.index') !!}"><i class="fa fa-edit"></i><span>List Inovasi</span></a>
    </li>

    <?php
        $juri = \App\Models\juri::join('users','users.nip','=','juris.nip')
                                ->where('users.nip', Auth::user()->nip)
                                ->where('juris.status_aktif',1)->first();
    ?>
        {{----------------------------//JURI-------------------------------------------------------}}
        @if($juri)
        <li class="{{ Request::is('inovasiJuri*') ? 'active' : '' }}">
            <a href="{!! route('inovasiJuris.index') !!}"><i class="fa fa-edit"></i><span>Inovasi Tims</span></a>
        </li>

        @endif
@endif
