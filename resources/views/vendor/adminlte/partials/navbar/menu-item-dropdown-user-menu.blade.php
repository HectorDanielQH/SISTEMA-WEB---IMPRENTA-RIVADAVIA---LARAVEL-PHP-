@php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )
@php( $profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout') )

@if (config('adminlte.usermenu_profile_url', false))
    @php( $profile_url = Auth::user()->adminlte_profile_url() )
@endif

@if (config('adminlte.use_route_url', false))
    @php( $profile_url = $profile_url ? route($profile_url) : '' )
    @php( $logout_url = $logout_url ? route($logout_url) : '' )
@else
    @php( $profile_url = $profile_url ? url($profile_url) : '' )
    @php( $logout_url = $logout_url ? url($logout_url) : '' )
@endif

<li class="nav-item dropdown user-menu">

    {{-- User menu toggler --}}
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        @if(config('adminlte.usermenu_image'))
            <img src="data:image/png;base64,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"
                 class="user-image img-circle elevation-2"
                 alt="{{ Auth::user()->name }}">
        @endif
        <span @if(config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
            {{ Auth::user()->name }}
        </span>
    </a>

    {{-- User menu dropdown --}}
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        {{-- User menu header --}}
        @if(!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
            <li class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if(!config('adminlte.usermenu_image')) h-auto @endif">
                @if(config('adminlte.usermenu_image()'))
                    <img src="data:image/png;base64,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"
                         class="img-circle elevation-2"
                         alt="{{ Auth::user()->name }}">
                @endif
                <p class="@if(!config('adminlte.usermenu_image')) mt-0 @endif">
                    {{ Auth::user()->name }}
                    @if(config('adminlte.usermenu_desc'))
                        <small>{{ Auth::user()->adminlte_desc }}</small>
                    @endif
                </p>
            </li>
        @else
            @yield('usermenu_header')
        @endif

        {{-- Configured user menu links --}}
        @each('adminlte::partials.navbar.dropdown-item', $adminlte->menu("navbar-user"), 'item')

        {{-- User menu body --}}
        @hasSection('usermenu_body')
            <li class="user-body">
                @yield('usermenu_body')
            </li>
        @endif

        {{-- User menu footer --}}
        <li class="user-footer">
            @if($profile_url)
                <a href="{{ $profile_url }}" class="btn btn-default btn-flat">
                    <i class="fa fa-fw fa-user"></i>
                    {{ __('adminlte::menu.profile') }}
                </a>
            @endif
            <a class="btn btn-default btn-flat float-right @if(!$profile_url) btn-block @endif"
               href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-power-off"></i>
                {{ __('adminlte::adminlte.log_out') }}
            </a>
            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        </li>

    </ul>

</li>
