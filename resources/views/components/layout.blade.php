<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a href="{{route("series.index")}}" class="navbar-brand">Series</a>
            {{-- executa somente se tiver um usuario logado!!!!!!!!!!! --}}
            @auth
            <a class="navbar-brand" href="{{route("logout")}}">Sair</a>
            @endauth
            
            @if (!isset($login))
            {{-- executa quando nao tem um usuario logado --}}
                @guest
                <a class="navbar-brand" href="{{route("login")}}">Entrar</a>
                @endguest
                
            @endif
            
        </div>
    </nav>
    <h1>{{ $title }}</h1>
    
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
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
