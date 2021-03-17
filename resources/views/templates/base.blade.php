<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/js/jquery-3.6.0.js') }}"></script>
    @stack('scripts')
</head>
<body>
    <div class="header">
        <div class="header__inner">
            <div class="header__item header__left">
                <a href="{{ route('main') }}">PARKING</a>
            </div>
            <div class="header__item header__right">
                <a href="{{ route('client.index') }}">Список клиентов</a>
                <a href="{{ route('client.create') }}">Добавить клиента</a>
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>
