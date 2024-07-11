<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/franken-ui-releases@0.0.13/dist/default.min.css">
</head>
<body class="uk-background-default text-primary">
    <p> Olá, seja bem vindo {{$user->name}}</p>
    <form method="post" action="{{route('auth.logout')}}">
        @csrf
        <button class="uk-button uk-button-primary" type="submit">Sair</button>
    </form>
</body>
</html>
