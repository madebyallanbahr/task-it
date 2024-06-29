<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskit: Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-container {
            max-width: 400px;
            width: 100%;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center ">
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-lg-4">
            <div id="login-form" class="container-fluid">
                <form class="p-4 bg-white shadow-lg rounded form-container" method="post" action="{{route('auth.login')}}">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
                    <p class="small text-secondary text-center">Insira as credenciais para acessar a plataforma.</p>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="loginEmail" name="email" placeholder="name@example.com" required>
                        <label for="loginEmail">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password" required>
                        <label for="loginPassword">Senha</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
                    <p class="mt-3 mb-0 text-center">
                        <a href="#" id="showRegisterForm">Criar Conta</a>
                    </p>
                </form>
            </div>
            <div id="register-form" class="container-fluid" style="display: none;">
                <form class="p-4 bg-white shadow-lg rounded form-container" method="post" action="{{route('auth.register')}}">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-center">Criar Conta</h1>
                    <p class="small text-secondary text-center">Preencha os campos abaixo para criar uma conta.</p>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="registerName" name="name" placeholder="Name Person" required>
                        <label for="registerName">Nome de Usuário</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="registerEmail" name="registerEmail" placeholder="name@example.com" required>
                        <label for="registerEmail">E-mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="registerPassword" name="registerPassword" placeholder="Password" required>
                        <label for="registerPassword">Senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                        <label for="confirmPassword">Confirmação de Senha</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                    <p class="mt-3 mb-0 text-center">
                        <a href="#" id="showLoginForm">Voltar para Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('showRegisterForm').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        });

        document.getElementById('showLoginForm').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        });
    });
</script>
</body>
</html>
