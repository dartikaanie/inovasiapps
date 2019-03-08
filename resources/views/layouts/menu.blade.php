<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('kategoris*') ? 'active' : '' }}">
    <a href="{!! route('kategoris.index') !!}"><i class="fa fa-edit"></i><span>Kategoris</span></a>
</li>

<li class="{{ Request::is('subKategoris*') ? 'active' : '' }}">
    <a href="{!! route('subKategoris.index') !!}"><i class="fa fa-edit"></i><span>Sub Kategoris</span></a>
</li>

<li class="{{ Request::is('kriterias*') ? 'active' : '' }}">
    <a href="{!! route('kriterias.index') !!}"><i class="fa fa-edit"></i><span>Kriterias</span></a>
</li>

<li class="{{ Request::is('subKriterias*') ? 'active' : '' }}">
    <a href="{!! route('subKriterias.index') !!}"><i class="fa fa-edit"></i><span>Sub Kriterias</span></a>
</li>


<li class="{{ Request::is('kriteraiaKategoriPenilaians*') ? 'active' : '' }}">
    <a href="{!! route('kriteraiaKategoriPenilaians.index') !!}"><i class="fa fa-edit"></i><span>Kriteraia Kategori Penilaians</span></a>
</li>

<li class="{{ Request::is('tims*') ? 'active' : '' }}">
    <a href="{!! route('tims.index') !!}"><i class="fa fa-edit"></i><span>Tims</span></a>
</li>

<li class="{{ Request::is('anggitaTims*') ? 'active' : '' }}">
    <a href="{!! route('anggitaTims.index') !!}"><i class="fa fa-edit"></i><span>Anggita Tims</span></a>
</li>

<li class="{{ Request::is('statusAnggotas*') ? 'active' : '' }}">
    <a href="{!! route('statusAnggotas.index') !!}"><i class="fa fa-edit"></i><span>Status Anggotas</span></a>
</li>

<li class="{{ Request::is('inovasis*') ? 'active' : '' }}">
    <a href="{!! route('inovasis.index') !!}"><i class="fa fa-edit"></i><span>Inovasis</span></a>
</li>

<li class="{{ Request::is('streams*') ? 'active' : '' }}">
    <a href="{!! route('streams.index') !!}"><i class="fa fa-edit"></i><span>Streams</span></a>
</li>

<li class="{{ Request::is('penilaianTims*') ? 'active' : '' }}">
    <a href="{!! route('penilaianTims.index') !!}"><i class="fa fa-edit"></i><span>Penilaian Tims</span></a>
</li>


