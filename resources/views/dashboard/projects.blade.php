<!DOCTYPE html>
<html lang="pt-br" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos</title>
    <link
        rel="stylesheet"
        href="https://unpkg.com/franken-wc@0.0.2/dist/css/neutral.min.css"
    />
</head>
<body class="uk-background-default text-primary">
<div class="uk-margin-medium-bottom uk-margin-medium-right uk-position-bottom-right">
    <form method="get" action="{{route('dashboard.index')}}">
        @csrf
        <button class="uk-button uk-button-ghost"><span uk-icon="icon: arrow-left" class="uk-margin-small-right"></span></button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit-icons.min.js"></script>
</body>
</html>
