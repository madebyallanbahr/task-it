<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .task-details {
            flex-grow: 1;
        }
        .task-status {
            margin-right: 1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .dropdown-menu {
            min-width: auto;
        }
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        .filters button, .filters select {
            flex-grow: 1;
        }
        .no-tasks {
            text-align: center;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="h3">My Tasks</h1>
                <button class="btn btn-primary">+ New Task</button>
            </div>
            <div class="filters">
                <label>
                    <select class="form-control">
                        <option>Client: All</option>
                    </select>
                </label>
                <label>
                    <select class="form-control">
                        <option>Project: All</option>
                    </select>
                </label>
                <label>
                    <select class="form-control">
                        <option>Tag: All</option>
                    </select>
                </label>
                <label>
                    <select class="form-control">
                        <option>Status: Open</option>
                    </select>
                </label>
                <label>
                    <select class="form-control">
                        <option>Creator: Any</option>
                    </select>
                </label>
                <label>
                    <select class="form-control">
                        <option>Source: Internal</option>
                    </select>
                </label>
            </div>
            <div id="taskList">
                <!-- Exemplo de Tarefa -->
                <div class="card">
                    <div class="card-body">
                        <div class="task-details">
                            <h5 class="card-title mb-1">Tarefa 1</h5>
                            <p class="card-text mb-1">Data de Vencimento: 2024-07-01</p>
                        </div>
                        <div class="task-status">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Em andamento
                                </button>
                                <div class="dropdown-menu" aria-labelledby="statusDropdown1">
                                    <a class="dropdown-item" href="#">Em andamento</a>
                                    <a class="dropdown-item" href="#">Backlog</a>
                                    <a class="dropdown-item" href="#">A fazer</a>
                                    <a class="dropdown-item" href="#">Concluído</a>
                                    <a class="dropdown-item" href="#">Em revisão</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="text-info mr-2"><i class="fas fa-edit"></i></a>
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="task-details">
                            <h5 class="card-title mb-1">Tarefa 2</h5>
                            <p class="card-text mb-1">Data de Vencimento: 2024-06-30</p>
                        </div>
                        <div class="task-status">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="statusDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Concluída
                                </button>
                                <div class="dropdown-menu" aria-labelledby="statusDropdown2">
                                    <a class="dropdown-item" href="#">Em andamento</a>
                                    <a class="dropdown-item" href="#">Backlog</a>
                                    <a class="dropdown-item" href="#">A fazer</a>
                                    <a class="dropdown-item" href="#">Concluído</a>
                                    <a class="dropdown-item" href="#">Em revisão</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="text-info mr-2"><i class="fas fa-edit"></i></a>
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
