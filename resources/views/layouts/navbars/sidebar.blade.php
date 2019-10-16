<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            {{ __('Creative Tim') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ ($activePage == 'categories' || $activePage == 'products' || $activePage == 'orders') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#sales" aria-expanded="false">
                    <i class="material-icons">store</i>
                    <p>{{ __('Sales') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ ($activePage == 'categories' || $activePage == 'products' || $activePage == 'orders') ? ' show' : '' }}" id="sales">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'categories' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('categories.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Categories') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'products' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('products.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Products') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'orders' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <span class="sidebar-mini"> C </span>
                                <span class="sidebar-normal">{{ __('Orders') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'users') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#userManagement" aria-expanded="false">
                    <i class="material-icons">supervisor_account</i>
                    <p>{{ __('User Management') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse{{ ($activePage == 'profile' || $activePage == 'users') ? ' show' : '' }}" id="userManagement">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal">{{ __('User profile') }} </span>
                            </a>
                        </li>
                        <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <span class="sidebar-mini"> U </span>
                                <span class="sidebar-normal"> {{ __('Users') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
