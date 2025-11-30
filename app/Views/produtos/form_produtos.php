<?php 

if (isset($dados['id_produto'])) {
    $rota = "/produtos/" . $dados['id_produto'] . "/atualizar";
} else {
    $rota = "/produtos/salvar";
}

?>


<h1>Cadastrar produto</h1>

<form action="<?= $rota ?>" method="POST">
    <div class="row">
        <div class="mb-3 col-sm">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" 
            value="<?= isset($dados['marca']) ? htmlspecialchars($dados['marca']) : '' ?>" required>
        </div>
        
        <div class="mb-3 col-sm">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" 
            value="<?= isset($dados['modelo']) ? htmlspecialchars($dados['modelo']) : '' ?>" required>
        </div>
        
        <div class="mb-3 col-sm-2">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" class="form-control" id="ano" name="ano"
            value="<?= isset($dados['ano']) ? htmlspecialchars($dados['ano']) : '' ?>" required>
        </div>
    </div>
    
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea rows="5" class="form-control" id="descricao" name="descricao" required><?= isset($dados['descricao']) ? htmlspecialchars($dados['descricao']) : '' ?>
        </textarea>
    </div>

    <div class="row">
        <div class="mb-3 col-sm">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" 
            value="<?= isset($dados['quantidade']) ? htmlspecialchars($dados['quantidade']) : '' ?>" required>
        </div>
        
        <div class="mb-3 col-sm">
            <label for="valor" class="form-label">Valor unitário</label>
            <input type="decimal" class="form-control" id="valor" name="valor" 
            value="<?= isset($dados['valor_unitario']) ? htmlspecialchars($dados['valor_unitario']) : '' ?>" required>
        </div>  
        
        <div class="mb-3 col-sm">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <?php foreach($categorias as $c): ?>
            <option value="<?= $c['id_categoria'] ?>" 
                <?=  isset($dados['categoria']) && $dados['categoria'] == $c['descricao'] ? "selected" : ""  ?>
                ><?= $c['descricao'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    </div>

    <a href="/produtos" class="btn btn-secondary me-2">Voltar</a>
    <button type="reset" class="btn btn-danger me-2">Limpar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>