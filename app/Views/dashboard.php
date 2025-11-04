<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcceleRods - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-danger bg-gradient">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-bold" href="/dashboard">AcceleRods</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                        Usuários
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/listagem-usuarios">Listagem de usuários</a></li>
                        <li><a class="dropdown-item" href="/cadastro-usuarios">Cadastro de usuários</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                        Produtos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/listagem-produtos">Listagem de produtos</a></li>
                        <li><a class="dropdown-item" href="/cadastro-produtos">Cadastro de produtos</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Pesquisar..."/>
                <button class="btn btn-info" type="submit">🔍</button>
            </form>
            </div>
        </div>
        </nav>

    <main>
        <img src="/imgs/dashboard.jpg" class="rounded mx-auto my-5 d-block" style="width: 65%;">
    </main>

    <footer class="menu-bg bg-danger bg-gradient flex-wrap py-3 text-center text-white">
        <p class="my-auto">Projeto desenvolvido por: Gabriel Bueno da Silva e Giovanni Pedro</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>