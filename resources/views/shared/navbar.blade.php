<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-md">
    <div class="container">
        <!-- Branding Image -->
        <a class="branding" href="{{ route('home') }}" title="ThePenzone.com home">
            <svg class="branding-image">
    			<use xlink:href="{{ mix('/images/sprite.svg') }}#logo"></use>
    		</svg>
        </a>

        <!-- Collapsed Hamburger -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
            @admin
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{ link_to_route('admin.dashboard', __('dashboard.dashboard'), [], ['class' => 'nav-link']) }}
                    </li>
                </ul>
            @endadmin

            @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a v-pre href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        {{ link_to_route('users.show', __('users.public_profile'), Auth::user(), ['class' => 'dropdown-item']) }}
                        {{ link_to_route('users.edit', __('users.settings'), [], ['class' => 'dropdown-item']) }}

                        <div class="dropdown-divider"></div>

                        <a href="{{ url('/logout') }}"
                            class="dropdown-item"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            @lang('auth.logout')
                        </a>

                        <form id="logout-form" class="d-none" action="{{ url('/logout') }}" method="POST">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
            @endauth

            @guest

              @include ('shared/_search_form')

            @endguest
        </div>
    </div>
</nav>
