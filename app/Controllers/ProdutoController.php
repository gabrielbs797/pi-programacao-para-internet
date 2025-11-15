<?php 
namespace App\Controllers;

use App\Models\Produto;

class ProdutoController {
    public function listar() {
        $lista_produtos = Produto::buscarTodos();

        render("produtos/lista_produtos.php", [
            'title' => "Listagem de Produtos",
            'produtos' => $lista_produtos
        ]);
    }
}