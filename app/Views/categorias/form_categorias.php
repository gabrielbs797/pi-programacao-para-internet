<?php 

if (isset($dados['id_categoria'])) {
    $rota = "/categorias/" . $dados['id_categoria'] . "/atualizar";
} else {
    $rota = "/categorias/salvar";
}

?>

<h1>Cadastrar categoria</h1>

<form action=<?= $rota ?> method="POST">
    <div class="row">
        <div class="mb-3 col-sm">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nome da categoria" 
            value="<?= isset($dados['descricao']) ? htmlspecialchars($dados['descricao']) : '' ?>" required>
        </div>
    </div>

    <a href="/produtos" class="btn btn-secondary me-2">Voltar</a>
    <button type="reset" class="btn btn-danger me-2">Limpar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>