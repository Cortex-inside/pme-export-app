<!-- Links -->
<ul class="sidenav-inner py-1">
    @is(['superuser','admin','informatica','core','diretor'])
    <li class="sidenav-item {{(Route::is("dashboard"))? "active": ""}}" data-toggle="tooltip"
        data-placement="right" title="Dashboard" >
        <a class="sidenav-link" href="{{route("dashboard")}}">
            <i class="sidenav-icon fas fa-home"></i>
            <div>Dashboard</div>
        </a>
    </li>
    @endis
    @shield('companyCertificates.index')
        <li class="sidenav-divider mb-1"></li>

        <li class="sidenav-item  @if(Route::is("companyCertificates*") ) open @endif">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-book"></i>
                <div>@lang('sistema.menu.Certificates')</div>
            </a>

            <ul class="sidenav-menu">
                <li class="sidenav-item {{(Route::is("companyCertificates.index"))? "active": ""}}" data-toggle="tooltip"
                    data-placement="right" title="Todos Pedidos" >
                    <a class="sidenav-link" href="{{route("companyCertificates.index")}}"><div>Todos</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.pending"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="Pedidos Pendentes" >
                    <a class="sidenav-link" href="{{route("companyCertificates.pending")}}"><div>Pendentes</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.approved"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="Pedidos Aprovados" >
                    <a class="sidenav-link" href="{{route("companyCertificates.approved")}}"><div>Aprovados</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.disapproved"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="Pedidos Reprovados" >
                    <a class="sidenav-link" href="{{route("companyCertificates.disapproved")}}"><div>Reprovados</div></a>
                </li>
                <li class="sidenav-item {{(Route::is("companyCertificates.inProgress"))? "active": ""}}" data-toggle="tooltip" data-placement="right" title="Em andamento" >
                    <a class="sidenav-link" href="{{route("companyCertificates.inProgress")}}"><div>Em andamento</div></a>
                </li>
            </ul>
        </li>
    @endshield

    @shield('companies.index')
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-item  @if(Route::is("companies*") ) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  lnr lnr-apartment"></i>
            <div>@lang('sistema.menu.Companies')</div>
        </a>

        <ul class="sidenav-menu">
            @shield('companies.index')
            <li class="sidenav-item {{(Route::is("companies.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.index")}}"><div>Todas</div></a>
            </li>
            @endshield
            @shield('companies.pending')
            <li class="sidenav-item {{(Route::is("companies.pending"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.pending")}}"><div>Pendentes</div></a>
            </li>
            @endshield
            @shield('companies.approved')
            <li class="sidenav-item {{(Route::is("companies.approved"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.approved")}}"><div>Aprovadas</div></a>
            </li>
            @endshield
            @shield('companies.disapproved')
            <li class="sidenav-item {{(Route::is("companies.disapproved"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("companies.disapproved")}}"><div>Reprovadas</div></a>
            </li>
            @endshield
        </ul>
    </li>
    @endshield
    @shield('exchange.requests.todos')
    <li class="sidenav-divider mb-1"></li>

    <li class="sidenav-item   @if(Request::is('exchange/requests-todos')) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon feather icon-inbox"></i>
            <div> @lang('sistema.menu.Requests')</div>
        </a>

        <ul class="sidenav-menu">
            @shield('exchange.requests.todos')
            <li class="sidenav-item {{(Route::is("exchange.requests-todos"))? "active": ""}}"
                data-toggle="tooltip"
                data-placement="right" title="Pedidos Todos" >
                <a class="sidenav-link" href="{{route("exchange.requests-todos")}}"><div><i class=" feather icon-download "></i>
                        Todos</div></a>
            </li>
            @endshield

        </ul>
    </li>
    <li class="sidenav-divider mb-1"></li>
    @endshield
    @shield('products.index')
    <!-- EXEMPLO DE MENU MULTIPLO -->
    <li class="sidenav-item {{ (Request::is('products*') OR Request::is('productCategories*')) ? 'open' : '' }}">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon fas fa-box"></i>
            <div>@lang('sistema.menu.Products')</div>
        </a>
        <ul class="sidenav-menu">
            <li class="sidenav-item {{ Route::is('products.create') ? 'active' : '' }}"><a class="sidenav-link" href="{!! route('products.create') !!}">Cadastrar produto</a></li>
            <li class="sidenav-item {{ Route::is('products.index') ? 'active' : '' }}"><a class="sidenav-link" href="{!! route('products.index') !!}">Produtos</a></li>
            <li class="sidenav-item {{ Route::is('productCategories.index') ? 'active' : '' }}"><a class="sidenav-link" href="{!! route('productCategories.index') !!}">Categorias</a></li>

        </ul>
    </li>
    <li class="sidenav-divider mb-1"></li>
    @endshield

    @is(['superuser','admin'])
    <li class="sidenav-item  @if(Route::is("certificates*") OR  Route::is("caes*") OR  Route::is("districts*") OR  Route::is("provinces*") OR  Route::is("requirements*") OR  Route::is("departments*") OR  Route::is("roles*") OR
      Route::is("permissions*") OR
        Route::is
    ("certificateCategories*")) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  lnr lnr-sync"></i>
            <div>@lang('sistema.menu.Settings')</div>
        </a>

        <ul class="sidenav-menu">
            @shield('certificates.index')
            <li class="sidenav-item {{(Route::is("certificates.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("certificates.index")}}"><div>Certificados</div></a>
            </li>
            @endshield
            @shield('certificateCategories.index')
            <li class="sidenav-item {{(Route::is("certificateCategories.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("certificateCategories.index")}}"><div>Certificado
                        Categoria</div></a>
            </li>
            @endshield
            @shield('requirements.index')
            <li class="sidenav-item {{(Route::is("requirements.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("requirements.index")}}"><div>Exigências</div></a>
            </li>
            @endshield


            <li class="sidenav-divider mb-1"></li>

            @shield('departments.index')
            <li class="sidenav-item {{(Route::is("departments.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Departamentos" >
                <a class="sidenav-link" href="{{route("departments.index")}}"><div>Departamentos</div></a>
            </li>
            @endshield


            @shield('provinces.index')
            <li class="sidenav-item {{(Route::is("provinces.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Províncias" >
                <a class="sidenav-link" href="{{route("provinces.index")}}"><div>Províncias</div></a>
            </li>
            @endshield

            @shield('districts.index')
            <li class="sidenav-item {{(Route::is("districts.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Distritos" >
                <a class="sidenav-link" href="{{route("districts.index")}}"><div>Distritos</div></a>
            </li>
            @endshield


            @shield('caes.index')
            <li class="sidenav-item {{(Route::is("caes.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="caes" >
                <a class="sidenav-link" href="{{route("caes.index")}}"><div>CAES</div></a>
            </li>
            @endshield

        </ul>
    </li>

    <li class="sidenav-divider mb-1"></li>
    @endis

    @is(['superuser','admin'])

    <li class="sidenav-item  @if(Route::is("users*")) open @endif">
        <a href="javascript:" class="sidenav-link sidenav-toggle">
            <i class="sidenav-icon  lnr lnr-users"></i>
            <div>@lang('sistema.menu.Users')</div>
        </a>

        <ul class="sidenav-menu">
            @shield('users.index')
            <li class="sidenav-item {{(Route::is("users.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("users.index")}}"><div>Usuários</div></a>
            </li>
            @endshield

            @shield('users.index')
            <li class="sidenav-item {{(Route::is("users.indexEmpresa"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("users.indexEmpresa")}}"><div>Usuários Empresa</div></a>
            </li>
            @endshield

            @shield('roles.index')
            <li class="sidenav-item {{(Route::is("roles.index"))? "active": ""}}" data-toggle="tooltip"
                data-placement="right" title="Empresas" >
                <a class="sidenav-link" href="{{route("roles.index")}}"><div>Grupos</div></a>
            </li>
            @endshield

        </ul>
    </li>
    @endis
</ul>


{{--<li  data-widget="tree" class="  {{ Request::is('admin/requirements*') || Request::is('admin/certificateCategories*') || Request::is('admin/certificates*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-file"></i> <span>Certificados</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Request::is('admin/certificates*') ? 'active' : '' }}"><a href="{!! route('certificates.index') !!}">Certificados</a></li>--}}
        {{--<li class="{{ Request::is('admin/certificateCategories*') ? 'active' : '' }}"><a href="{!! route('certificateCategories.index') !!}">Categorias</a></li>--}}
        {{--<li class="{{ Request::is('admin/requirements*') ? 'active' : '' }}"><a href="{!! route('requirements.index') !!}">Exigencias</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--<!-- EXEMPLO DE MENU MULTIPLO -->--}}
{{--<li  data-widget="tree" class=" {{ (Request::is('products*') OR Request::is('productCategories*')) ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-product-hunt"></i> <span>Produtos</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Route::is('products.create') ? 'active' : '' }}"><a href="{!! route('products.create') !!}">Cadastrar produto <span class="label label-success">new</span></a></li>--}}
        {{--<li class="{{ Route::is('products.index') ? 'active' : '' }}"><a href="{!! route('products.index') !!}">Produtos</a></li>--}}
        {{--<li class="{{ Route::is('productCategories.index') ? 'active' : '' }}"><a href="{!! route('productCategories.index') !!}">Categorias</a></li>--}}

    {{--</ul>--}}
{{--</li>--}}

{{--<!-- EXEMPLO DE MENU MULTIPLO -->--}}
{{--<li data-widget="tree" class="  {{ Request::is('exchange/requests*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-arrows-h"></i> <span>Pedidos</span>--}}
        {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu">--}}
        {{--<li class="{{ Route::is('exchange.requests-todos') ? 'active' : '' }}"><a href="{!! route('exchange.requests-todos') !!}">Todos</a></li>--}}
        {{--<li class="{{ Route::is('exchange.requests-fechados') ? 'active' : '' }}"><a href="{!! route('exchange.requests-fechados') !!}">Fechados</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}

{{--<li>--}}


{{--<li class="{{ Request::is('admin/departments*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('departments.index') !!}"><i class="fa fa-globe"></i><span>Departamentos</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('admin/provinces*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('provinces.index') !!}"><i class="fa fa-globe"></i><span>Provincias</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('admin/districts*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('districts.index') !!}"><i class="fa fa-globe"></i><span>Distritos</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('admin/caes*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('caes.index') !!}"><i class="fa fa-file"></i><span>CAE</span></a>--}}
{{--</li>--}}


{{--<!-- EXEMPLO DE MENU MULTIPLO -->--}}
{{--<li  data-widget="tree" class="  {{ Request::is('admin/users*') || Request::is('admin/group_users*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-users"></i> <span>Usuários</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Route::is('users*') ? 'active' : '' }}"><a href="{!! route('users.index') !!}">Usuários</a></li>--}}
        {{--<li class="{{ Route::is('users*') ? 'active' : '' }}"><a href="{!! route('users.indexEmpresa') !!}">Usuários Empresas</a></li>--}}
        {{--@is('superuser')<li class="{{ Route::is('group_users*') ? 'active' : '' }}"><a href="{!! route('group_users.index') !!}">Grupos de Acesso</a></li>@endis--}}
    {{--</ul>--}}
{{--</li>--}}
{{--@is('superuser')--}}
{{--<li  data-widget="tree" class=" {{ Request::is('admin/roles*') || Request::is('admin/permissions*') ? 'active' : '' }}">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-key"></i> <span>Administrativo</span>--}}
        {{--<span class="pull-right-container">--}}
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu menu-open">--}}
        {{--<li class="{{ Request::is('admin/permissions*') ? 'active' : '' }}"><a href="{!! route('permissions.index') !!}">Permissões</a></li>--}}
        {{--<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}"><a href="{!! route('roles.index') !!}">Regras</a></li>--}}
    {{--</ul>--}}
{{--</li>--}}
{{--@endis--}}
{{--<li>--}}
    {{--<a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
        {{--<i class="fa fa-sign-out"></i> <span>Sair</span>--}}
    {{--</a>--}}
    {{--<form id="logout-form" action="/logout" method="POST" style="display: none;">--}}
        {{--@csrf--}}
    {{--</form>--}}
{{--</li>--}}