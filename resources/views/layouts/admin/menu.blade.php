    <!-- [ Layout sidenav ] Start -->
    <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">
        <!-- Brand demo (see assets/css/demo/demo.css) -->
        <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        {{--<img src="/assets/img/logo.png" alt="TurmaVip" class="img-fluid">--}}
                    </span>
            <a href="/admin" class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{strtoupper(env
            ("APP_NAME"))}}</a>
            <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                <i class="ion ion-md-menu align-middle"></i>
            </a>
        </div>
        <div class="sidenav-divider mt-0"></div>

        @is('empresa')
            @include('layouts.admin.menu_empresa')
        @endis
        @is('empresa_estrangeira')
            @include('layouts.admin.menu_empresa_estrangeira')
        @endis
        @is(['superuser','admin','departamento','informatica','core','diretor'])
            @include('layouts.admin.menu_admin')
        @endis

    </div>
    <!-- [ Layout sidenav ] End -->