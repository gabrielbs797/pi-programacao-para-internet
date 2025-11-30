<h1>Cadastrar produto</h1>

<form action="/produtos/salvar" method="POST">
    <div class="row">
        <div class="mb-3 col-sm">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        
        <div class="mb-3 col-sm">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>
        
        <div class="mb-3 col-sm-2">
            <label for="ano" class="form-label">Ano</label>
            <input type="number" class="form-control" id="ano" name="ano" required>
        </div>
    </div>
    
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea rows="5" class="form-control" id="descricao" name="descricao" required></textarea>
    </div>

    <div class="row">
        <div class="mb-3 col-sm">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" required>
        </div>
        
        <div class="mb-3 col-sm">
            <label for="valor" class="form-label">Valor unitário</label>
            <input type="decimal" class="form-control" id="valor" name="valor" required>
        </div>
        
        <div class="mb-3 col-sm">
        <label for="categoria" class="form-label">Categoria</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <?php foreach($categorias as $c): ?>
            <option value=<?= '"' . $c['id_categoria'] . '"' ?>><?= $c['descricao'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    </div>

    <a href="/produtos" class="btn btn-secondary me-2">Voltar</a>
    <button type="reset" class="btn btn-danger me-2">Limpar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>