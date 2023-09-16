<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }}</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="{{ route('series.index') }}" class="navbar-brand">Home</a>

    @auth
        <a href="{{ route('logout') }}">Sair</a>
    @endauth

    @guest
        <a href="{{ route('login.index') }}">Entrar</a>
    @endguest
  </div>
</nav>

<div class="container">
    <h1>{{ $title }}</h1>

    @isset($mensagemSuccess)
        <div class="alert">
            {{ $mensagemSuccess }}
        </div>
    @endisset

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ $slot }}
</div>

</body>
</html>
