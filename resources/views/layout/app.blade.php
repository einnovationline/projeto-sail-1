<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Treinamento </title>
</head>
<body>

    <div class="app">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <a href="{{ route('register') }}">Cadastre-se</a>
        @yield('content')
    </div>

</body>
</html>
