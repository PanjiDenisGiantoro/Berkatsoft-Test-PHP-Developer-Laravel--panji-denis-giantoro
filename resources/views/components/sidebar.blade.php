{{--@php--}}
{{--$links = [--}}
{{--    [--}}
{{--        "href" => "dashboard",--}}
{{--        "text" => "Dashboard",--}}
{{--        "is_multi" => false,--}}
{{--    ],--}}
{{--    [--}}
{{--        "href" => [--}}
{{--            [--}}
{{--                "section_text" => "User",--}}
{{--                "section_list" => [--}}
{{--                    ["href" => "user", "text" => "Data User"],--}}
{{--                    ["href" => "user.new", "text" => "Buat User"]--}}
{{--                ]--}}
{{--            ]--}}
{{--        ],--}}
{{--        "text" => "User",--}}
{{--        "is_multi" => true,--}}
{{--    ],--}}
{{--];--}}
{{--$navigation_links = array_to_object($links);--}}
{{--@endphp--}}

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">


            <li class="menu-header">task</li>
            <li class="{{ Request::routeIs('task1.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('task1.index') }}"><i class="fas fa-store"></i><span>task</span></a>
            </li>

            <li class="menu-header">produk</li>
            <li class="{{ Request::routeIs('produk.list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('produk.list') }}"><i class="fas fa-store"></i><span>produk</span></a>
            </li>
            <li class="menu-header">customer</li>
            <li class="{{ Request::routeIs('customer.list') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customer.list') }}"><i class="fas fa-store"></i><span>customer</span></a>
            </li>
            <li class="menu-header">sales</li>
            <li class="{{ Request::routeIs('order.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('order.index') }}"><i class="fas fa-store"></i><span>sales</span></a>
            </li>
            <li class="{{ Request::routeIs('order.view') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('order.view') }}"><i class="fas fa-store"></i><span>lihat order</span></a>
            </li>



{{--            <li class="menu-header">User</li>--}}
{{--            <li class="nav-item dropdown {{ Route::is(['user', 'user.*']) ? 'active' : '' }}">--}}
{{--                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Pendukung</span></a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li class="{{ Route::is('user') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link" href="{{ route('user') }}">User</a>--}}
{{--                    </li>--}}
{{--                    <li class="{{ Route::is('user.new') ? 'active' : '' }}">--}}
{{--                        <a class="nav-link" href="{{ route('user.new') }}">New User</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </aside>
</div>
