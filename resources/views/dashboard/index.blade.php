<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/franken-ui-releases@0.0.13/dist/default.min.css">
</head>
<body class="uk-background-default text-primary">
<div class="uk-container"> <!-- Container principal -->
    <h2 class="uk-margin-top uk-position-left uk-margin-large-left">Seja bem vindo {{"@"}}{{$user->name}}</h2>
    <div class="uk-position-top-right uk-margin-top uk-margin-large-right">
        <form method="post" action="{{ route('auth.logout') }}">
            @csrf
            <button class="uk-button uk-button-ghost" type="submit"><span uk-icon="icon: sign-out; ratio: 1"></span></button>
        </form>
    </div>
    <div>
        <p>Hellow</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit-icons.min.js"></script>
</body>
</html>
