@extends('layouts.app')

@section('title', 'Projetos')

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
                <li class="uk-active">
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
                        <span uk-icon="user" class="uk-margin-small-right"></span>Usuário
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
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="uk-h4">Seus Projetos</h1>
                            <p class="text-muted-foreground">Gerencie e acompanhe o progresso dos seus projetos.</p>
                        </div>
                        <a href="{{route('projects.create')}}" class="uk-btn uk-btn-primary">
                            <span uk-icon="plus" class="uk-margin-small-right"></span>Novo Projeto
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if(isset($projects) && $projects->count() > 0)
        <!-- Project List -->
        <div class="uk-grid-match uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l uk-margin-top" uk-grid>
            @foreach($projects as $project)
                <div>
                    <div class="uk-card uk-card-default uk-card-hover">
                        <div class="uk-card-header">
                            <div class="flex justify-between items-center">
                                <h3 class="uk-card-title uk-margin-remove">{{ $project->name }}</h3>
                                <span class="uk-badge uk-badge-{{ $project->status == 'completed' ? 'success' : ($project->status == 'active' ? 'warning' : 'secondary') }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p class="uk-text-muted">{{ $project->description ?: 'Sem descrição' }}</p>
                            <div class="mt-3 space-y-1">
                                <div class="flex justify-between text-sm">
                                    <span class="text-muted-foreground">Prioridade:</span>
                                    <span class="font-medium text-{{ $project->priority == 'high' ? 'red' : ($project->priority == 'medium' ? 'blue' : 'green') }}-600">
                                        {{ ucfirst($project->priority) }}
                                    </span>
                                </div>
                                @if($project->start_date)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-muted-foreground">Início:</span>
                                        <span>{{ \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') }}</span>
                                    </div>
                                @endif
                                @if($project->end_date)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-muted-foreground">Conclusão:</span>
                                        <span>{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="uk-card-footer">
                            <div class="flex justify-between">
                                <a href="{{route('projects.edit', $project->id)}}" class="uk-btn uk-btn-small uk-btn-default">
                                    <span uk-icon="pencil" class="uk-margin-small-right"></span>Editar
                                </a>
                                <form method="post" action="{{route('projects.destroy', $project->id)}}" class="uk-display-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="uk-btn uk-btn-small uk-btn-danger" 
                                            onclick="return confirm('Tem certeza que deseja excluir este projeto?')">
                                        <span uk-icon="trash" class="uk-margin-small-right"></span>Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="uk-margin-top">
            <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
                <div class="text-center py-12">
                    <div class="mb-4">
                        <span uk-icon="album" class="uk-text-muted" style="font-size: 4rem;"></span>
                    </div>
                    <h3 class="uk-h4 mb-2">Nenhum projeto encontrado</h3>
                    <p class="text-muted-foreground mb-6">Comece criando seu primeiro projeto para organizar suas tarefas.</p>
                    <a href="{{route('projects.create')}}" class="uk-btn uk-btn-primary">
                        <span uk-icon="plus" class="uk-margin-small-right"></span>Criar Primeiro Projeto
                    </a>
                </div>
            </div>
        </div>
    @endif
</main>
@endsection