@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-container">
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li class="uk-active">
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
                    <h1 class="uk-h4">
                        Olá, seja bem vindo <span class="text-primary">{{$user->name}}</span>!
                    </h1>
                    <p class="text-muted-foreground">
                        Aqui você encontra as configurações do seu perfil, informações da sua conta que lhe permite a edição/exclusão da sua conta. Tudo no seu controle!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@m uk-child-width-1-3@l uk-margin-top" uk-grid>
        <div>
            <div class="uk-card uk-card-default uk-card-hover">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        <span uk-icon="folder" class="uk-margin-small-right"></span>Suas Tarefas
                    </h3>
                    <p class="uk-text-small uk-text-muted uk-margin-remove">
                        Gerencie suas tarefas diárias
                    </p>
                </div>
                <div class="uk-card-body">
                    <div class="uk-text-center">
                        <div class="uk-text-large uk-text-bold uk-text-primary">{{ $tasksCount ?? 0 }}</div>
                        <div class="uk-text-small uk-text-muted">Tarefas pendentes</div>
                    </div>
                </div>
                <div class="uk-card-footer">
                    <a href="{{route('tasks.index')}}" class="uk-btn uk-btn-primary uk-width-1-1">
                        <span uk-icon="plus" class="uk-margin-small-right"></span>Gerenciar Tarefas
                    </a>
                </div>
            </div>
        </div>

        <div>
            <div class="uk-card uk-card-default uk-card-hover">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        <span uk-icon="album" class="uk-margin-small-right"></span>Seus Projetos
                    </h3>
                    <p class="uk-text-small uk-text-muted uk-margin-remove">
                        Organize seus projetos
                    </p>
                </div>
                <div class="uk-card-body">
                    <div class="uk-text-center">
                        <div class="uk-text-large uk-text-bold uk-text-primary">{{ $projectsCount ?? 0 }}</div>
                        <div class="uk-text-small uk-text-muted">Projetos ativos</div>
                    </div>
                </div>
                <div class="uk-card-footer">
                    <a href="{{route('projects.index')}}" class="uk-btn uk-btn-primary uk-width-1-1">
                        <span uk-icon="plus" class="uk-margin-small-right"></span>Gerenciar Projetos
                    </a>
                </div>
            </div>
        </div>

        <div>
            <div class="uk-card uk-card-default uk-card-hover">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">
                        <span uk-icon="cog" class="uk-margin-small-right"></span>Configurações
                    </h3>
                    <p class="uk-text-small uk-text-muted uk-margin-remove">
                        Personalize sua experiência
                    </p>
                </div>
                <div class="uk-card-body">
                    <div class="uk-text-center">
                        <div class="uk-text-large uk-text-bold uk-text-primary">{{$user->name}}</div>
                        <div class="uk-text-small uk-text-muted">Perfil ativo</div>
                    </div>
                </div>
                <div class="uk-card-footer">
                    <a href="{{route('settings.index')}}" class="uk-btn uk-btn-default uk-width-1-1">
                        <span uk-icon="cog" class="uk-margin-small-right"></span>Configurar
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
