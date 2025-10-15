@extends('layouts.app')

@section('title', 'Tarefas')

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
                <li class="uk-active">
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
                            <h1 class="uk-h4">Suas Tarefas</h1>
                            <p class="text-muted-foreground">Gerencie e organize suas tarefas diárias.</p>
                        </div>
                        <a href="{{route('tasks.create')}}" class="uk-btn uk-btn-primary">
                            <span uk-icon="plus" class="uk-margin-small-right"></span>Nova Tarefa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if(isset($tasks) && $tasks->count() > 0)
        <!-- Tasks Table -->
        <div class="uk-margin-top">
            <div class="fr-widget border-border bg-background text-foreground md:border">
                <div class="uk-overflow-auto">
                    <table class="uk-table uk-table-hover uk-table-divider">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Prioridade</th>
                                <th>Data de Vencimento</th>
                                <th>Projeto</th>
                                <th>Favorita</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>
                                        <div class="font-medium">{{ $task->name }}</div>
                                    </td>
                                    <td>
                                        <div class="text-sm text-muted-foreground max-w-xs truncate">
                                            {{ $task->description ?: 'Sem descrição' }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="uk-badge uk-badge-{{ $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'secondary') }}">
                                            {{ ucfirst($task->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="uk-badge uk-badge-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'success') }}">
                                            {{ ucfirst($task->priority) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($task->due_date)
                                            <div class="text-sm">
                                                {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                                            </div>
                                        @else
                                            <span class="text-muted-foreground">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($task->project_id)
                                            <div class="text-sm">{{ $task->project_id }}</div>
                                        @else
                                            <span class="text-muted-foreground">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($task->favorite)
                                            <span uk-icon="star" class="uk-text-warning"></span>
                                        @else
                                            <span class="text-muted-foreground">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex space-x-1">
                                            <a href="{{route('tasks.edit', $task->id)}}" class="uk-btn uk-btn-small uk-btn-default">
                                                <span uk-icon="pencil"></span>
                                            </a>
                                            <form method="post" action="{{route('tasks.destroy', $task->id)}}" class="uk-display-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="uk-btn uk-btn-small uk-btn-danger" 
                                                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                                    <span uk-icon="trash"></span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="uk-margin-top">
            <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
                <div class="text-center py-12">
                    <div class="mb-4">
                        <span uk-icon="folder" class="uk-text-muted" style="font-size: 4rem;"></span>
                    </div>
                    <h3 class="uk-h4 mb-2">Nenhuma tarefa encontrada</h3>
                    <p class="text-muted-foreground mb-6">Comece criando sua primeira tarefa para organizar seu trabalho.</p>
                    <a href="{{route('tasks.create')}}" class="uk-btn uk-btn-primary">
                        <span uk-icon="plus" class="uk-margin-small-right"></span>Criar Primeira Tarefa
                    </a>
                </div>
            </div>
        </div>
    @endif
</main>
@endsection