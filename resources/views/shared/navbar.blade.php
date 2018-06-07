<nav class="navbar navbar-dark fixed-top navbar-expand-md">
    <div class="container">
        <!-- Branding Image -->
        <a class="branding navbar-brand" href="{{ route('home') }}" title="ThePenzone.com home">
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
            @endauth

            @guest
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-inline-block margin-r-s" href="https://github.com/tompenzer/penzone" target="_blank" data-turbolinks="false" title="@lang('nav.git')">
                            <i class="fa fa-git" aria-hidden="true"></i>
                        </a>

                        <a class="nav-link d-inline-block margin-r-s" href="{{ route('posts.feed') }}" data-turbolinks="false" title="@lang('nav.rss')">
                            <i class="fa fa-rss" aria-hidden="true"></i>
                        </a>

                        <a class="nav-link d-inline-block margin-r-l" href="{{ route('contact') }}" data-turbolinks="false" title="@lang('nav.contact')">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        @include ('shared/_search_form')
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
