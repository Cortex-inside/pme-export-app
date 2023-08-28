@if(Auth::user()->company->status != 5 && Auth::user()->company->status != 4 && Auth::user()->company->status != 2)
<li class="{{ Route::is('exchange.index') ? 'active' : '' }}"><a href="{!! route('exchange.index') !!}"><i
                class="fa  fa-bullhorn"></i> <span>Anúncios</span></a></li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree"  class="  {{ Request::is('sysCompany/announcements*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-product-hunt"></i> <span>Anúncios</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('sysCompany.companyAnnouncements.create') ? 'active' : '' }}"><a
                    href="{!! route('sysCompany.companyAnnouncements.create') !!}">Cadastrar anúncio <span
                        class="label label-success">new</span></a></li>
        <li class="{{ Route::is('sysCompany.companyAnnouncements.indexByCompany') ? 'active' : '' }}"><a
                    href="{!! route('sysCompany.companyAnnouncements.indexByCompany') !!}">Meus anúncios</a></li>
    </ul>
</li>

<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class="  {{ Request::is('exchange/requests*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-arrows-h"></i> <span>Pedidos</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Route::is('exchange.requests-enviados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-enviados') !!}">Enviados</a></li>
        <li class="{{ Route::is('exchange.requests-recebidos') ? 'active' : '' }}"><a href="{!! route('exchange.requests-recebidos') !!}">Recebidos</a></li>
{{--        <li class="{{ Route::is('exchange.requests-fechados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-fechados') !!}">Fechados</a></li>--}}
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class="  {{ Request::is('sysCompany/certificates*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-file"></i> <span>Certificados</span>
        <span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('sysCompany.certificates.index') ? 'active' : '' }}"><a href="{!! route('sysCompany.certificates.index') !!}">Lista de certificados</a></li>
        <li class="{{ Route::is('sysCompany.certificates.myCertificates') ? 'active' : '' }}"><a href="{!! route('sysCompany.certificates.myCertificates') !!}">Meus certificados</a></li>
    </ul>
</li>
<!-- EXEMPLO DE MENU MULTIPLO -->
<li data-widget="tree" class=" {{ Request::is('sysCompany/company*') ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-info-circle"></i> <span>Meus dados</span>
        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
    </a>
    <ul class="treeview-menu menu-open">
        <li class="{{ Route::is('sysCompany.company.index') ? 'active' : '' }}"><a
                    href="{!! route('sysCompany.company.index') !!}">Dados da empresa</a></li>

        <li class="{{ Request::is('sysCompany/company/companyPartners*') ? 'active' : '' }}"><a
                    href="{!! route('companyPartners.index') !!}">Sócios</a></li>

        <li class="{{ Request::is('sysCompany/company/companyRepresentatives*') ? 'active' : '' }}"><a
                    href="{!! route('companyRepresentatives.index') !!}">Representantes</a></li>

        <li class="{{ Route::is('sysCompany.company.users.change_password') ? 'active' : '' }}"><a
                    href="{!! route('sysCompany.company.users.change_password',Auth::user()->uuid) !!}">Trocar senha</a></li>
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
@endif