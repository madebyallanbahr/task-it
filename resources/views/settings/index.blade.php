@extends('layouts.app')

@section('title', 'Configurações da Conta')

@section('content')
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-container">
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="{{route('dashboard.index')}}">
                        <span uk-icon="thumbnails" class="uk-margin-small-right"></span>Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('tasks.index')}}">
                        <span uk-icon="folder" class="uk-margin-small-right"></span>Tarefas
                    </a>
                </li>
                <li>
                    <a href="{{route('projects.index')}}">
                        <span uk-icon="album" class="uk-margin-small-right"></span>Projetos
                    </a>
                </li>
                <li class="uk-active">
                    <a href="{{route('settings.index')}}">
                        <span uk-icon="cog" class="uk-margin-small-right"></span>Configurações
                    </a>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="#">
                        <span uk-icon="user" class="uk-margin-small-right"></span>{{$user->name}}
                        <span uk-navbar-parent-icon></span>
                    </a>
                    <div class="uk-navbar-dropdown" uk-dropdown>
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="{{route('settings.index')}}"><span uk-icon="cog" class="uk-margin-small-right"></span>Configurações</a></li>
                            <li class="uk-nav-divider"></li>
                            <li>
                                <form method="post" action="{{route('auth.logout')}}" class="uk-display-inline">
                                    @csrf
                                    <button type="submit" class="uk-btn uk-btn-text uk-text-left uk-width-1-1">
                                        <span uk-icon="sign-out" class="uk-margin-small-right"></span>Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="uk-container uk-margin-top">
    <div class="uk-grid-match uk-child-width-1-1" uk-grid>
        <div>
            <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
                <div class="flex flex-col space-y-1.5">
                    <h1 class="uk-h4">Configurações da Conta</h1>
                    <p class="text-muted-foreground">
                        Gerencie suas informações pessoais, preferências e configurações de segurança.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Information -->
    <div class="uk-margin-top">
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5">
                <h3 class="uk-h4">Informações do Perfil</h3>
                <p class="text-muted-foreground">
                    Atualize suas informações pessoais e de contato.
                </p>
            </div>

            <form class="mt-6 space-y-6" method="POST" action="{{route('settings.profile.update')}}">
                @csrf
                @method('PUT')
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="name">Nome Completo</label>
                    <input
                        class="uk-input"
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Seu nome completo"
                        value="{{old('name', $user->name)}}"
                        required
                    />
                    @error('name')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="email">E-mail</label>
                    <input
                        class="uk-input"
                        id="email"
                        name="email"
                        type="email"
                        placeholder="seu@email.com"
                        value="{{old('email', $user->email)}}"
                        required
                    />
                    @error('email')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button class="uk-btn uk-btn-default" type="button" onclick="resetProfileForm()">Cancelar</button>
                    <button class="uk-btn uk-btn-primary" type="submit">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Password Change -->
    <div class="uk-margin-top">
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5">
                <h3 class="uk-h4">Alterar Senha</h3>
                <p class="text-muted-foreground">
                    Mantenha sua conta segura com uma senha forte.
                </p>
            </div>

            <form class="mt-6 space-y-6" method="POST" action="{{route('settings.password.update')}}">
                @csrf
                @method('PUT')
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="current_password">Senha Atual</label>
                    <input
                        class="uk-input"
                        id="current_password"
                        name="current_password"
                        type="password"
                        placeholder="Digite sua senha atual"
                        required
                    />
                    @error('current_password')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="password">Nova Senha</label>
                    <input
                        class="uk-input"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Digite sua nova senha"
                        required
                    />
                    @error('password')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="password_confirmation">Confirmar Nova Senha</label>
                    <input
                        class="uk-input"
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Confirme sua nova senha"
                        required
                    />
                </div>

                <div class="flex justify-end space-x-2">
                    <button class="uk-btn uk-btn-default" type="button" onclick="resetPasswordForm()">Cancelar</button>
                    <button class="uk-btn uk-btn-primary" type="submit">Alterar Senha</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preferences -->
    <div class="uk-margin-top">
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5">
                <h3 class="uk-h4">Preferências</h3>
                <p class="text-muted-foreground">
                    Personalize sua experiência na aplicação.
                </p>
            </div>

            <form class="mt-6 space-y-6" method="POST" action="{{route('settings.preferences.update')}}">
                @csrf
                @method('PUT')
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="framework_preference">Framework Preferido</label>
                    <select class="uk-select" name="framework_preference" id="framework_preference">
                        <option value="">Selecione um framework</option>
                        <option value="laravel" {{old('framework_preference', $user->framework_preference ?? '') == 'laravel' ? 'selected' : ''}}>Laravel</option>
                        <option value="react" {{old('framework_preference', $user->framework_preference ?? '') == 'react' ? 'selected' : ''}}>React</option>
                        <option value="vue" {{old('framework_preference', $user->framework_preference ?? '') == 'vue' ? 'selected' : ''}}>Vue.js</option>
                        <option value="angular" {{old('framework_preference', $user->framework_preference ?? '') == 'angular' ? 'selected' : ''}}>Angular</option>
                        <option value="svelte" {{old('framework_preference', $user->framework_preference ?? '') == 'svelte' ? 'selected' : ''}}>Svelte</option>
                        <option value="astro" {{old('framework_preference', $user->framework_preference ?? '') == 'astro' ? 'selected' : ''}}>Astro</option>
                    </select>
                    @error('framework_preference')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="theme_preference">Tema</label>
                    <select class="uk-select" name="theme_preference" id="theme_preference">
                        <option value="light" {{old('theme_preference', $user->theme_preference ?? 'light') == 'light' ? 'selected' : ''}}>Claro</option>
                        <option value="dark" {{old('theme_preference', $user->theme_preference ?? 'light') == 'dark' ? 'selected' : ''}}>Escuro</option>
                    </select>
                    @error('theme_preference')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="language_preference">Idioma</label>
                    <select class="uk-select" name="language_preference" id="language_preference">
                        <option value="pt-BR" {{old('language_preference', $user->language_preference ?? 'pt-BR') == 'pt-BR' ? 'selected' : ''}}>Português (Brasil)</option>
                        <option value="en-US" {{old('language_preference', $user->language_preference ?? 'pt-BR') == 'en-US' ? 'selected' : ''}}>English (US)</option>
                        <option value="es-ES" {{old('language_preference', $user->language_preference ?? 'pt-BR') == 'es-ES' ? 'selected' : ''}}>Español</option>
                    </select>
                    @error('language_preference')
                        <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button class="uk-btn uk-btn-default" type="button" onclick="resetPreferencesForm()">Cancelar</button>
                    <button class="uk-btn uk-btn-primary" type="submit">Salvar Preferências</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="uk-margin-top">
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5">
                <h3 class="uk-h4 uk-text-danger">Zona de Perigo</h3>
                <p class="text-muted-foreground">
                    Ações irreversíveis que afetam sua conta permanentemente.
                </p>
            </div>

            <div class="mt-6">
                <div class="uk-alert uk-alert-danger" uk-alert>
                    <div class="uk-alert-title">Excluir Conta</div>
                    <div class="uk-alert-description">
                        Esta ação é irreversível. Todos os seus dados serão permanentemente removidos.
                    </div>
                </div>

                <button class="uk-btn uk-btn-danger" type="button" uk-toggle="target: #delete-account-modal">
                    <span uk-icon="trash" class="uk-margin-small-right"></span>Excluir Conta
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Delete Account Modal -->
<div id="delete-account-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title uk-text-danger">Confirmar Exclusão da Conta</h2>
        
        <div class="uk-alert uk-alert-danger uk-margin">
            <div class="uk-alert-title">Atenção!</div>
            <div class="uk-alert-description">
                Esta ação é irreversível. Todos os seus dados, tarefas e projetos serão permanentemente removidos.
            </div>
        </div>

        <form method="POST" action="{{route('settings.account.delete')}}">
            @csrf
            @method('DELETE')
            
            <div class="uk-margin">
                <label class="uk-form-label" for="delete_password">Digite sua senha para confirmar:</label>
                <input class="uk-input" type="password" name="password" id="delete_password" required>
                @error('password')
                    <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                @enderror
            </div>

            <div class="uk-margin">
                <label class="uk-form-label" for="delete_confirmation">Digite "DELETE" para confirmar:</label>
                <input class="uk-input" type="text" name="confirmation" id="delete_confirmation" required>
                @error('confirmation')
                    <div class="uk-text-danger uk-text-small">{{ $message }}</div>
                @enderror
            </div>

            <div class="uk-modal-footer uk-text-right">
                <button class="uk-modal-close uk-button uk-button-default" type="button">Cancelar</button>
                <button class="uk-button uk-button-danger" type="submit">Excluir Conta Permanentemente</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function resetProfileForm() {
        document.querySelector('form[action="{{route('settings.profile.update')}}"]').reset();
    }

    function resetPasswordForm() {
        document.querySelector('form[action="{{route('settings.password.update')}}"]').reset();
    }

    function resetPreferencesForm() {
        document.querySelector('form[action="{{route('settings.preferences.update')}}"]').reset();
    }

    // Show success messages
    @if(session('success'))
        UIkit.notification({
            message: '{{ session('success') }}',
            status: 'success',
            pos: 'top-right',
            timeout: 5000
        });
    @endif

    @if(session('error'))
        UIkit.notification({
            message: '{{ session('error') }}',
            status: 'danger',
            pos: 'top-right',
            timeout: 5000
        });
    @endif
</script>
@endpush