<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">--}}
    @yield('links')
    <title>регистрация</title>
</head>
<body>
<header>

    <h1>ПАК</h1>
    <div class="app">
        @if(request()->user())
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        @else
            <div class="header-login">
                <a href="{{route('login')}}">Войти</a>
                <a href="{{route('register')}}">Регистрация</a>
            </div>

        @endif
    </div>


</header>

@yield('content')

<footer>
    <div>
        <p>2023 все права защищены</p>
    </div>
    <div>
        <p><u> +7 999 999 99 99</u></p>
        <p>pak@mail.ru</p>
        <p>Тех. Поддержка</p>
    </div>
</footer>
</body>
</html>
