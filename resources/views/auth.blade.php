@extends('layouts.app')

@section('title', 'TaskIt - Autenticação')

@section('content')
<div class="flex min-h-svh items-center justify-center p-4 md:bg-muted md:p-10">
    <div class="w-full max-w-md">
        <div class="mb-6 flex justify-center">
            <a href="#">
                <h1 class="uk-h3 text-2xl font-bold text-primary">TaskIt</h1>
            </a>
        </div>
        
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5">
                <h1 class="uk-h4">Acesse sua conta</h1>
                <p class="text-muted-foreground">
                    Digite suas credenciais abaixo para fazer login em sua conta.
                </p>
            </div>
            
            <!-- Tab Navigation -->
            <div class="mt-6">
                <ul class="uk-tab-alt" uk-tab>
                    <li id="login-btn-action" class="uk-active">
                        <a href="#">Entrar</a>
                    </li>
                    <li id="register-btn-action">
                        <a href="#">Criar Conta</a>
                    </li>
                </ul>
            </div>
            
            <!-- Login Form -->
            <form class="mt-6 space-y-6" id="login-form" method="post" action="{{route('auth.login')}}">
                @csrf
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="login-email">E-mail</label>
                    <input
                        class="uk-input"
                        id="login-email"
                        name="email"
                        type="email"
                        placeholder="seu@email.com"
                        required
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="login-password">Senha</label>
                    <input
                        class="uk-input"
                        id="login-password"
                        name="password"
                        type="password"
                        placeholder="Sua senha"
                        required
                    />
                </div>
                
                <div class="flex justify-between">
                    <label for="remember">
                        <input name="remember" type="hidden" value="0" />
                        <input
                            class="uk-checkbox mr-1"
                            id="remember"
                            name="remember"
                            type="checkbox"
                            value="1"
                        />
                        Lembrar de mim
                    </label>
                    <a class="uk-link" href="#">Esqueceu a senha?</a>
                </div>
                
                <button class="uk-btn uk-btn-primary block w-full" type="submit">
                    Entrar
                </button>
            </form>
            
            <!-- Register Form -->
            <form class="mt-6 space-y-6" id="register-form" method="post" action="{{route('auth.register')}}" style="display: none">
                @csrf
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="register-name">Nome Completo</label>
                    <input
                        class="uk-input"
                        id="register-name"
                        name="name"
                        type="text"
                        placeholder="Seu nome completo"
                        required
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="register-email">E-mail</label>
                    <input
                        class="uk-input"
                        id="register-email"
                        name="email"
                        type="email"
                        placeholder="seu@email.com"
                        required
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="register-password">Senha</label>
                    <input
                        class="uk-input"
                        id="register-password"
                        name="password"
                        type="password"
                        placeholder="Sua senha"
                        required
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="register-password-confirm">Confirmar Senha</label>
                    <input
                        class="uk-input"
                        id="register-password-confirm"
                        name="password_confirmation"
                        type="password"
                        placeholder="Confirme sua senha"
                        required
                    />
                </div>
                
                <button class="uk-btn uk-btn-primary block w-full" type="submit">
                    Criar Conta
                </button>
            </form>
            
            <div class="uk-alert uk-alert-primary mt-6" uk-alert>
                <a href class="uk-alert-close" uk-close></a>
                <div class="uk-alert-title">Aviso!</div>
                <div class="uk-alert-description">
                    Suas informações não são informadas a terceiros. O processamento de dados é totalmente seguro.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching functionality
            const loginBtn = document.getElementById('login-btn-action');
            const registerBtn = document.getElementById('register-btn-action');
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');

            if (loginBtn && registerBtn && loginForm && registerForm) {
                loginBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    loginBtn.classList.add('uk-active');
                    registerBtn.classList.remove('uk-active');
                    loginForm.style.display = 'block';
                    registerForm.style.display = 'none';
                });

                registerBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    registerBtn.classList.add('uk-active');
                    loginBtn.classList.remove('uk-active');
                    registerForm.style.display = 'block';
                    loginForm.style.display = 'none';
                });
            }
        });
    </script>
@endpush