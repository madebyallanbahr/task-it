<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link
        rel="stylesheet"
        href="https://unpkg.com/franken-wc@0.0.2/dist/css/neutral.min.css"
    />
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
                                <li><a href="{{route('dashboard.tasks')}}"><span uk-icon="folder" class="uk-margin-small-right"></span> Tarefas</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="{{route('dashboard.projects')}}"><span uk-icon="album" class="uk-margin-small-right"></span> Projetos</a></li>
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
                Altere suas informações pessoais aqui.
            </p>
        </div>
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom">
            <div>
                <label class="uk-form-label" for="name">Nome</label>
                <input
                    class="uk-input"
                    id="name"
                    type="text"
                    aria-describedby="name-help-block"
                    placeholder="Nome"
                    value="{{$user->name}}"
                />
                <div id="name-help-block" class="uk-form-help text-muted-foreground">
                    Seu nome completo
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="name">E-mail</label>
                <input
                    class="uk-input"
                    id="email"
                    name="email"
                    type="email"
                    aria-describedby="name-help-block"
                    placeholder="E-mail"
                    value="{{$user->email}}"
                />
                <div id="name-help-block" class="uk-form-help text-muted-foreground">
                    Seu e-mail
                </div>
        </div>
    </div>
            <div class="uk-card-footer uk-flex uk-flex-between">
                <button class="uk-button uk-button-default">Editar</button>
            </div>
    </div>
    </form>
    <form class="uk-margin">
        <div class="uk-width-1-3@s uk-card">
            <div class="uk-card-header">
                <h3 class="uk-card-title">Troca de Senha</h3>
                <p class="uk-margin-small-top uk-text-small text-muted-foreground">
                    Altere sua senha aqui.
                </p>
                <div class="uk-margin">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="name">Senha atual</label>
                        <input
                            class="uk-input"
                            id="password"
                            name="password"
                            type="password"
                            aria-describedby="name-help-block"
                            placeholder="Senha"
                            value=""
                        />
                        <div id="name-help-block" class="uk-form-help text-muted-foreground">
                            Digite sua senha atual
                        </div>
                    </div>
                    <label class="uk-form-label" for="name">Senha nova</label>
                    <input
                        class="uk-input"
                        id="password"
                        name="password"
                        type="password"
                        aria-describedby="name-help-block"
                        placeholder="Senha"
                        value=""
                    />
                    <div id="name-help-block" class="uk-form-help text-muted-foreground">
                        Digite uma nova senha
                    </div>
                  </div>
                </div>
                <div class="uk-card-footer uk-flex uk-flex-between">
                    <button class="uk-button uk-button-default">Alterar Senha</button>
                </div>
            </div>
    </form>
    <div class="uk-margin-medium-bottom uk-margin-medium-right uk-position-bottom-right">
        <form method="post" action="{{route('auth.logout')}}">
            @csrf
            <button class="uk-button uk-button-ghost"><span uk-icon="sign-out" class="uk-margin-small-right"></span>Sair</button>
        </form>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit-icons.min.js"></script>
</body>
</html>
