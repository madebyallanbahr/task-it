<!-- resources/views/layouts/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Seu Site</title>
    <link rel="stylesheet" href="https://unpkg.com/franken-ui-releases@0.0.13/dist/default.min.css">
    <!-- Inclua outros CSS necessários aqui -->
    <style>
        /* Estilos adicionais personalizados */
    </style>
</head>
<body class="bg-gray-100">

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="py-4 px-6">
            <h2 class="text-xl font-semibold text-gray-800">Meu Dashboard</h2>
            <ul class="mt-6">
                <li>
                    <a href="#" class="flex items-center py-2 px-4 text-gray-600 hover:bg-gray-200 hover:text-gray-800">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 18v-6a9 9 0 0118 0v6"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 6h5m-2.5 5.5L18 9l-2.5-2.5M10 15v3"></path></svg>
                        Dashboard
                    </a>
                </li>
                <!-- Adicione mais itens de menu conforme necessário -->
            </ul>
        </div>
    </aside>

    <!-- Conteúdo Principal -->
    <main class="flex-1 p-6">
        <!-- Título da Página -->
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>

        <!-- Conteúdo do Dashboard -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <!-- Conteúdo do Dashboard aqui -->
            <p>Seu conteúdo do dashboard vai aqui...</p>
        </div>
    </main>
</div>

</body>
</html>
