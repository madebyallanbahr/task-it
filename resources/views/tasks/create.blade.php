<?php
    use App\Enums\StatusEnum;
    use App\Enums\PriorityEnum;

    $status = StatusEnum::cases();
    $priority = PriorityEnum::cases();
?>
<!DOCTYPE html>
<html lang="pt-br" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link
        rel="stylesheet"
        href="https://unpkg.com/franken-wc@0.0.2/dist/css/neutral.min.css"
    />
</head>
<body class="uk-background-default text-primary">
    <form method="post" action="{{route('tasks.store')}}" class="uk-form-horizontal uk-position-center uk-margin-large">
        @csrf
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Nome da Tarefa</label>
            <div class="uk-form-controls">
                <input
                    class="uk-input"
                    name="name"
                    id="form-horizontal-text"
                    type="text"
                    placeholder="Nome descritivo"
                />
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Descrição da Tarefa</label>
            <div class="uk-form-controls">
                <textarea
                    style="resize: none;"
                    class="uk-input"
                    name="description"
                    id="form-horizontal-text"
                    placeholder="Descrição aqui"
                    maxlength="128"
                ></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Status da Tarefa</label>
            <div class="uk-form-controls">
                <select
                    class="uk-select"
                    name="status"
                    id="form-horizontal-text"
                >
                    @foreach($status as $statuses)
                        <option>
                            {{$statuses}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Prioridade da Tarefa</label>
            <div class="uk-form-controls">
                <select
                    class="uk-select"
                    name="priority"
                    id="form-horizontal-text"
                >
                    @foreach($priority as $priorities)
                        <option>
                            {{$priorities}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Data de Vencimento</label>
            <div class="uk-form-controls">
                <input
                    class="uk-input"
                    id="form-horizontal-text"
                    name="due_date"
                    type="date"
                    placeholder="Data de Vencimento"
                />
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="form-horizontal-text">Projeto</label>
            <div class="uk-form-controls">
                <select
                    class="uk-select"
                    name="project"
                    id="form-horizontal-text"
                >
                        <option>
                            N/A
                        </option>
                </select>
            </div>
        </div>
        <div class="uk-margin">
            <button class="uk-button uk-button-default uk-width-large">Criar Tarefa</button>
        </div>
    </form>

<div class="uk-margin-small-top uk-margin-small-right uk-position-top-right">
    <form method="get" action="{{route('dashboard.index')}}">
        @csrf
        <button class="uk-button uk-button-ghost"><span uk-icon="icon: arrow-left" class="uk-margin-small-right"></span></button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.21.5/dist/js/uikit-icons.min.js"></script>
</body>
</html>
