<!DOCTYPE html>
<html class="dark" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taskit</title>
    <link
        rel="stylesheet"
        href="https://unpkg.com/franken-ui-releases@0.0.13/dist/default.min.css"
    />
</head>
<body class="uk-background-default text-primary">
    <div class="uk-align-center uk-width-large">
        <ul class="uk-tab-alt uk-margin-top">
            <li id="login-btn-action"><a href="#">Entrar</a></li>
            <li id="register-btn-action"><a href="#">Criar Conta</a></li>
        </ul>
    </div>
    <form class="uk-width-large uk-align-center" id="login-form" method="post" action="{{route('auth.login')}}" style="display: none">
        @csrf
        <div class="uk-margin">
            <label class="uk-form-label">E-mail</label>
            <div class="uk-form-controls uk-margin-small">
                <input placeholder="E-mail" name="email" id="email" type="email" class="uk-input"/>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-form-label">Senha</div>
            <div class="uk-form-controls uk-margin-small uk-form-controls-text">
                <input placeholder="Senha" name="password" id="password" type="password"  class="uk-input"/>
            </div>
        </div>
        <div class="uk-alert uk-margin" uk-alert>
            <a href class="uk-alert-close" uk-close></a>
            <div class="uk-alert-title">Aviso!</div>
            <div class="uk-alert-description uk-text-muted">
                Suas informações estão não são armazenadas nem informadas a terceiros. O processamento de dados é totalmente seguro.
            </div>
        </div>
        <button class="uk-button uk-button-primary uk-width-large">Entrar</button>
    </form>
    <form class="uk-width-large uk-align-center" id="register-form" method="post" action="{{route('auth.register')}}" style="display: none">
        @csrf
        <div class="uk-margin">
            <label class="uk-form-label">Nome Completo</label>
            <div class="uk-form-controls uk-margin-small">
                <input placeholder="Nome" name="name" id="name" type="text" class="uk-input"/>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label">E-mail</label>
            <div class="uk-form-controls uk-margin-small">
                <input placeholder="E-mail" name="email" id="email" type="email" class="uk-input"/>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-form-label">Senha</div>
            <div class="uk-form-controls uk-margin-small uk-form-controls-text">
                <input placeholder="Senha" name="password" id="password" type="password"  class="uk-input"/>
            </div>
        </div>
        <div class="uk-alert uk-margin" uk-alert>
            <a href class="uk-alert-close" uk-close></a>
            <div class="uk-alert-title">Aviso!</div>
            <div class="uk-alert-description uk-text-muted">
                Suas informações estão não são armazenadas nem informadas a terceiros. O processamento de dados é totalmente seguro.
            </div>
        </div>
        <button class="uk-button uk-button-primary uk-width-large">Criar Conta</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('login-btn-action').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('login-btn-action').classList.add('uk-active');
                document.getElementById('register-form').style.display = 'none';
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('register-btn-action').classList.remove('uk-active');

            });
            document.getElementById('register-btn-action').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('register-btn-action').classList.toggle('uk-active');
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-btn-action').classList.add('uk-active');
                document.getElementById('register-form').style.display = 'block';
                document.getElementById('login-btn-action').classList.remove('uk-active');

            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit-icons.min.js"></script>
</body>
</html>
