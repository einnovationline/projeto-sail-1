<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>@yield('title') - Treinamento </title><!--título da aba -->

        <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-gray-50">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div id="head" class="container mx-auto px-4 py-8">
                @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" style="margin-right: 1200px;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </button>
                </form>
                @endauth

                @guest
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Entrar
                    </button>
                </form>
                @endguest

                <form action="#" method="get">
                    @csrf
                    <button type="submit" class="btn btn-link">
                        Home
                    </button>
                </form>
                @yield('content')<!--inclui o corpo da página -->
            </div>
        </nav>
    </body>
</html>
