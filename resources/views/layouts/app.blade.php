@include ('layouts.head')
<body class="bg-dark">
    <div id="app">
        @include('shared/navbar')

        <div class="container margin-t-3xl">
            @include('shared/alerts')

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('shared/footer')
    </div>

    <!-- Scripts -->
    @if (Request::is('posts/*'))
        <script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
    @endif
    <script src="{{ mix('/js/app.js') }}"></script>
    @stack('inline-scripts')
</body>
</html>
