<div class="d-flex mb-3 justify-content-between">
    <h1>Categorias</h1>
    <a href="/categorias/inserir" class="btn btn-success my-auto">Adicionar categoria</a>
</div>

<div class="tabela-responsiva">
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Código</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categorias as $c): ?>
        <tr>
            <td><?= $c['id_categoria'] ?></td>
            <td><?= $c['descricao'] ?></td>
            <td>
                <a href=<?= "categorias/" . $c['id_categoria'] . "/editar"  ?> class="btn btn-primary btn-sm">Editar</a>
                <a href=<?= "categorias/" . $c['id_categoria'] . "/excluir" ?> class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>