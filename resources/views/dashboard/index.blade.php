<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/franken-ui-releases@0.0.13/dist/default.min.css">
</head>
<body class="uk-background-default text-primary">
<nav class="uk-navbar-container">
    <div class="uk-container">
        <div uk-navbar="mode: click">
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li><a href="{{route('dashboard.index')}}"><span uk-icon="thumbnails" class="uk-margin-small-right"></span>Dashboard</a></li>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav" >
                    <li>
                        <a href="#">Acessar <span uk-navbar-parent-icon></span></a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="#"><span uk-icon="folder" class="uk-margin-small-right"></span> Tarefas</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#"><span uk-icon="album" class="uk-margin-small-right"></span> Projetos</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<main class="uk-container uk-margin">
    <section>
        <h3 > Olá, seja bem vindo <span class="uk-text-bold">{{$user->name}}</span>!</h3>
        <p class="uk-text-small uk-text-muted uk-text-break">Aqui você encontra as configurações do seu perfil, informações da sua conta que lhe permite a edição/exclusão da sua conta. Tudo no seu controle!</p>
    </section>
    <form class="uk-margin">
    <div class="uk-width-1-3@s uk-card">
        <div class="uk-card-header">
            <h3 class="uk-card-title">Informações pessoais</h3>
            <p class="uk-margin-small-top uk-text-small text-muted-foreground">
                Deploy your new project in one-click.
            </p>
        </div>
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom">
            <div class="">
                <label class="uk-form-label" for="name">Name</label>
                <input
                    class="uk-input"
                    id="name"
                    type="text"
                    aria-describedby="name-help-block"
                    placeholder="Name"
                />
                <div id="name-help-block" class="uk-form-help">
                    The name of your project.
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="framework">Framework</label>
                <select class="uk-select" name="framework" id="framework">
                    <option value="sveltekit">Sveltekit</option>
                    <option value="sveltekit">Astro</option>
                </select>
            </div>
        </div>

        <div class="uk-card-footer uk-flex uk-flex-between">
            <button class="uk-button uk-button-default">Cancel</button>
            <button class="uk-button uk-button-primary">Deploy</button>
        </div>
    </div>
    </form>
    <div class="uk-margin-medium-bottom uk-margin-medium-right uk-position-bottom-right">
        <form method="post" action="{{route('auth.logout')}}">
            <button class="uk-button uk-button-ghost"><span uk-icon="sign-out" class="uk-margin-small-right"></span>Sair</button>
        </form>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit-icons.min.js"></script>
</body>
</html>
