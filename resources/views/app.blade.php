<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tredo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Tredo</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (Request::is('/') ? 'active' : '') }}">
                    <a class="nav-link" href="{{ route('main') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ (Request::is('employees') ? 'active' : '') }}">
                    <a class="nav-link" href="{{ route('employees') }}">Сотрудники</a>
                </li>
                <li class="nav-item {{ (Request::is('departments') ? 'active' : '') }}">
                    <a class="nav-link" href="{{ route('departments') }}">Отделы</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="app">
        @yield('content')

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
