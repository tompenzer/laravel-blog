<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    <div class="container">
        <!-- Branding Image -->
        {{ link_to_route('home', config('app.name', 'Laravel'), [], ['class' => 'navbar-brand']) }}

        <!-- Collapsed Hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            @include('admin/shared/sidebar')

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{ link_to_route('users.show', __('users.public_profile'), Auth::user(), ['class' => 'dropdown-item']) }}
                        {{ link_to_route('users.edit', __('users.settings'), [], ['class' => 'dropdown-item']) }}

                        <div class="dropdown-divider"></div>

                        {{ Form::open(['route' => 'logout']) }}
                        <a href="{{ route('logout') }}"
                            class="dropdown-item"
                            onclick="event.preventDefault();
                                        event.target.parentNode.submit();">
                            @lang('auth.logout')
                        </a>
                        {{ Form::close() }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
