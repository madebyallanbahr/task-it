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
    @if(isset($tasks) && $tasks->count() <= 0)
        <div class="uk-flex-center uk-position-center uk-alert" uk-alert>
            <a href class="uk-alert-close" uk-close></a>
            <h3 class="uk-alert-title uk-text-large">Aviso</h3>
            <p class="uk-alert-description text-muted-foreground">Você não tem tarefas ativas.</p>
            <form method="get" action="{{route('tasks.create')}}">
                <button class="uk-button uk-button-default uk-margin-top">Criar Tarefa</button>
            </form>
        </div>
    @else
            <div class="uk-container uk-container-small uk-position-center uk-flex-center uk-overflow-auto">
            <table class="uk-table-middle uk-table uk-table-small uk-table-justify uk-table-hover uk-table-divider">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Prioridade</th>
                        <th>Data de Validade</th>
                        <th>Projeto</th>
                        <th>Favorita</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>
                            {{$task->name}}
                        </td>
                        <td>
                            {{$task->description}}
                        </td>
                        <td>
                            {{$task->status}}
                        </td>
                        <td>
                            {{$task->priority}}
                        </td>
                        <td>
                            @if(is_null($task->due_date))
                                N/A
                            @else
                                {{$task->due_date}}
                            @endif
                        </td>
                        <td>
                            {{$task->project_id}}
                        </td>
                        <td>
                            {{$task->favorite}}
                        </td>
                        <td>
                            <form>
                                @csrf
                                <button class="uk-button uk-button-default"><span class="uk-icon" uk-icon="pencil"></span></button>
                                @method('DELETE')
                                <button formmethod="post" formaction="{{route("tasks.destroy", $task->id)}}" class="uk-button uk-button-danger"><span class="uk-icon" uk-icon="trash"></span></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            </div>
    @endif
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
