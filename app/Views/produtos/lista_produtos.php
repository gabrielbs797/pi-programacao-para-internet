<div class="d-flex mb-3 justify-content-between">
    <h1>Produtos</h1>
    <a href="/produtos/inserir" class="btn btn-success my-auto">Adicionar produto</a>
</div>

<div class="tabela-responsiva">
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Marca</th>
            <th>Valor unitário</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($produtos as $p): ?>
        <tr>
            <td><?= $p['id_produto'] ?></td>
            <td><?= $p['modelo'] ?></td>
            <td><?= $p['marca'] ?></td>
            <td>R$ <?= $p['valor_unitario'] ?></td>
            <td>
                <a href="<?= "produtos/" . $p['id_produto'] . "/editar"  ?>" class="btn btn-primary btn-sm">Editar</a>
                <a href="<?= "produtos/" . $p['id_produto'] . "/excluir"  ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>