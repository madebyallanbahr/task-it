@extends('layouts.app')

@section('title', 'Editar Projeto')

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
            <h1 class="uk-h3 text-2xl font-bold text-primary">Editar Projeto</h1>
        </div>
        
        <div class="fr-widget border-border bg-background text-foreground md:border md:p-6">
            <div class="flex flex-col space-y-1.5 mb-6">
                <h2 class="uk-h4">Informações do Projeto</h2>
                <p class="text-muted-foreground">
                    Atualize os dados do projeto abaixo.
                </p>
            </div>
            
            <form method="post" action="{{route('projects.update', $project->id)}}" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="project-name">Nome do Projeto</label>
                    <input
                        class="uk-input"
                        id="project-name"
                        name="name"
                        type="text"
                        placeholder="Digite o nome do projeto"
                        value="{{ old('name', $project->name) }}"
                        required
                    />
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="project-description">Descrição</label>
                    <textarea
                        class="uk-textarea"
                        id="project-description"
                        name="description"
                        rows="4"
                        placeholder="Descreva o projeto"
                        maxlength="500"
                    >{{ old('description', $project->description) }}</textarea>
                    <div class="uk-form-help text-muted-foreground">
                        Máximo 500 caracteres
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="grid gap-y-1">
                        <label class="uk-form-label" for="project-start-date">Data de Início</label>
                        <input
                            class="uk-input"
                            id="project-start-date"
                            name="start_date"
                            type="date"
                            value="{{ old('start_date', $project->start_date) }}"
                        />
                    </div>
                    
                    <div class="grid gap-y-1">
                        <label class="uk-form-label" for="project-end-date">Data de Conclusão</label>
                        <input
                            class="uk-input"
                            id="project-end-date"
                            name="end_date"
                            type="date"
                            value="{{ old('end_date', $project->end_date) }}"
                        />
                    </div>
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="project-status">Status</label>
                    <select class="uk-select" name="status" id="project-status">
                        <option value="planning" {{ old('status', $project->status) == 'planning' ? 'selected' : '' }}>Planejamento</option>
                        <option value="active" {{ old('status', $project->status) == 'active' ? 'selected' : '' }}>Em Andamento</option>
                        <option value="paused" {{ old('status', $project->status) == 'paused' ? 'selected' : '' }}>Pausado</option>
                        <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Concluído</option>
                    </select>
                </div>
                
                <div class="grid gap-y-1">
                    <label class="uk-form-label" for="project-priority">Prioridade</label>
                    <select class="uk-select" name="priority" id="project-priority">
                        <option value="low" {{ old('priority', $project->priority) == 'low' ? 'selected' : '' }}>Baixa</option>
                        <option value="medium" {{ old('priority', $project->priority) == 'medium' ? 'selected' : '' }}>Média</option>
                        <option value="high" {{ old('priority', $project->priority) == 'high' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>
                
                <div class="flex justify-between items-center pt-4">
                    <a href="{{route('projects.index')}}" class="uk-btn uk-btn-default">
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
            // Validação de datas
            const startDateInput = document.getElementById('project-start-date');
            const endDateInput = document.getElementById('project-end-date');
            
            if (startDateInput && endDateInput) {
                startDateInput.addEventListener('change', function() {
                    if (this.value && endDateInput.value && this.value > endDateInput.value) {
                        endDateInput.value = this.value;
                    }
                    endDateInput.min = this.value;
                });
            }
        });
    </script>
@endpush