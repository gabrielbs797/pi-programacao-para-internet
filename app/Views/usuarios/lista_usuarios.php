<div class="d-flex mb-3 justify-content-between">
    <h1>Usuários</h1>
    <a href="/usuarios/inserir" class="btn btn-success my-auto">Adicionar usuário</a>
</div>

<div class="tabela-responsiva">
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
            <?php foreach($usuarios as $u): ?>
            <tr>
                <td><?= $u['id_usuario'] ?></td>
                <td> <strong><?= $u['nome'] ?> </strong> </td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['tipo_usuario'] ?></td>
                
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Editar</a>
                    <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>