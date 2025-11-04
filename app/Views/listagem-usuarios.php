<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcceleRods - Listagem de usuários</title>
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
                <input class="form-control" type="search" placeholder="Pesquisar..."/>
            </form>
            <a href="/login" class="btn btn-dark" type="button">Sair</a>
            </div>
        </div>
        </nav>

    <main class="mx-5 px-5 py-4">
        
        <div class="d-flex justify-content-between">
            <h1>Usuários</h1>
            <a href="/cadastro-usuario" class="btn btn-success my-auto">Adicionar usuário</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Marcos Pereira</td>
                    <td>marcos.pereira@email.com</td>
                    <td>Administrador(a)</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash3-fill"></i> Excluir
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Juliana Araújo</td>
                    <td>juliana.araujo@email.com</td>
                    <td>Funcionário(a)</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash3-fill"></i> Excluir
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Gabriel Moraro</td>
                    <td>gabriel.moraro@email.com</td>
                    <td>Cliente</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil-fill"></i> Editar
                        </a>
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash3-fill"></i> Excluir
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer class="menu-bg bg-danger bg-gradient flex-wrap py-3 text-center text-white">
        <p class="my-auto">Projeto desenvolvido por: Gabriel Bueno da Silva e Giovani Henrique Cornelio</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>