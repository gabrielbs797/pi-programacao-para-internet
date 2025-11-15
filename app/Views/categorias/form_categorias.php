<h1>Cadastrar categoria</h1>

<form action="/produtos" method="POST">
    <div class="row">
        <div class="mb-3 col-sm">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Escreva aqui a categoria" required>
        </div>
    </div>

    <a href="/produtos" class="btn btn-secondary me-2">Voltar</a>
    <button type="reset" class="btn btn-danger me-2">Limpar</button>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>