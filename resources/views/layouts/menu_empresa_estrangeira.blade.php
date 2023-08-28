<li class="{{ Route::is('exchange.index') ? 'active' : '' }}"><a href="{!! route('exchange.index') !!}"><i class="fa  fa-bullhorn"></i> <span>Anúncios</span></a></li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree"  class="  {{ Request::is('sysCompany/announcements*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-product-hunt"></i> <span>Anúncios</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('sysCompany.companyAnnouncements.create') ? 'active' : '' }}"><a href="{!! route('sysCompany.companyAnnouncements.create') !!}">Cadastrar anúncio <span class="label label-success">new</span></a></li>
        <li class="{{ Route::is('sysCompany.companyAnnouncements.indexByCompany') ? 'active' : '' }}"><a href="{!! route('sysCompany.companyAnnouncements.indexByCompany') !!}">Meus anúncios</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree"  class="   {{ Request::is('exchange.requests*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-arrows-h"></i> <span>Pedidos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('exchange.requests-enviados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-enviados') !!}">Enviados</a></li>
        <li class="{{ Route::is('exchange.requests-recebidos') ? 'active' : '' }}"><a href="{!! route('exchange.requests-recebidos') !!}">Recebidos</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class="">
    <a href="#">
        <i class="fa fa-info-circle"></i> <span>Meus dados</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class=""><a href="">Alterar dados</a></li>
        <li class=""><a href="">Trocar senha</a></li>
    </ul>
</li>
<li>
    <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> <span>Sair</span>
    </a>
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
</li>