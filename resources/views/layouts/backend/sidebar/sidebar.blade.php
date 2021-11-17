<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ config('app.name', 'Dashboard') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">{{ config('app.name', 'Sumburero') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Painel Administrativo</li>
            <li class="@if (Route::is('dashboard.index')) active @endif"><a class="nav-link" href="{{ route('dashboard.index') }}"><i
                        class="fas fa-chart-line"></i>
                    <span>
                        Estatísticas
                    </span></a></li>
        </ul>
    </aside>
</div>

@push('css')
    <style>
        .notification {
            width: 24px;
            padding: 0px;
            text-align: center;
            border-radius: 20px;
            height: 24px;
            text-align-last: center;
            float: right;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
        }

    </style>
@endpush
