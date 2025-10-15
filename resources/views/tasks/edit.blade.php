@extends('layouts.app')

@section('title', 'Editar Tarefa')

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
                        <span uk-icon="user" class="uk-margin-small-right"></span>{{auth()->user()->name}}
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

<div class="flex min-h-svh items-center justify-center p-4 md:bg-muted md:p-10">
    <div class="w-full max-w-2xl">
        <div class="mb-6 flex justify-center">
            <h1 class="uk-h3 text-2xl font-bold text-primary">Editar Tarefa</h1>
        </div>
        
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5 mb-6">
                <h2 class="uk-h4">Informações da Tarefa</h2>
                <p class="text-muted-foreground">
                    Atualize os dados da tarefa abaixo.
                </p>
            </div>
            
            <form method="post" action="{{route('tasks.update', $task->id)}}" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="task-name">Nome da Tarefa</label>
                    <input
                        class="uk-input"
                        id="task-name"
                        name="name"
                        type="text"
                        placeholder="Digite o nome da tarefa"
                        value="{{ old('name', $task->name) }}"
                        required
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="task-description">Descrição</label>
                    <textarea
                        class="uk-textarea"
                        id="task-description"
                        name="description"
                        rows="4"
                        placeholder="Descreva a tarefa"
                        maxlength="500"
                    >{{ old('description', $task->description) }}</textarea>
                    <div class="uk-form-help text-muted-foreground">
                        Máximo 500 caracteres
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid gap-y-1">
                        <label class="uk-form-label" for="task-status">Status</label>
                        <select class="uk-select" name="status" id="task-status">
                            @foreach($status as $statusOption)
                                <option value="{{ $statusOption->value }}" {{ old('status', $task->status) == $statusOption->value ? 'selected' : '' }}>
                                    {{ $statusOption->label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="grid gap-y-1">
                        <label class="uk-form-label" for="task-priority">Prioridade</label>
                        <select class="uk-select" name="priority" id="task-priority">
                            @foreach($priority as $priorityOption)
                                <option value="{{ $priorityOption->value }}" {{ old('priority', $task->priority) == $priorityOption->value ? 'selected' : '' }}>
                                    {{ $priorityOption->label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="task-due-date">Data de Vencimento</label>
                    <input
                        class="uk-input"
                        id="task-due-date"
                        name="due_date"
                        type="date"
                        value="{{ old('due_date', $task->due_date) }}"
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="task-project">Projeto</label>
                    <select class="uk-select" name="project_id" id="task-project">
                        <option value="">Nenhum projeto</option>
                        @if(isset($projects))
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                
                <div class="flex items-center space-x-2">
                    <input
                        class="uk-checkbox"
                        id="task-favorite"
                        name="favorite"
                        type="checkbox"
                        value="1"
                        {{ old('favorite', $task->favorite) ? 'checked' : '' }}
                    />
                    <label class="uk-form-label" for="task-favorite">Marcar como favorita</label>
                </div>
                
                <div class="flex justify-between items-center pt-4">
                    <a href="{{route('tasks.index')}}" class="uk-btn uk-btn-default">
                        <span uk-icon="arrow-left" class="uk-margin-small-right"></span>Voltar
                    </a>
                    <div class="flex space-x-2">
                        <button class="uk-btn uk-btn-default" type="button" onclick="history.back()">
                            Cancelar
                        </button>
                        <button class="uk-btn uk-btn-primary" type="submit">
                            <span uk-icon="check" class="uk-margin-small-right"></span>Salvar Alterações
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Validação de data de vencimento
            const dueDateInput = document.getElementById('task-due-date');
            
            if (dueDateInput) {
                // Definir data mínima como hoje
                const today = new Date().toISOString().split('T')[0];
                dueDateInput.min = today;
            }
        });
    </script>
@endpush