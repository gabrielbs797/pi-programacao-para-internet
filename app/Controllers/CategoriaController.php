<?php 
namespace App\Controllers;

use App\Models\Categoria;

class CategoriaController {
    public function listar() {
        $lista_categorias = Categoria::buscarTodos();

        render("categorias/lista_categorias.php", [
            'title' => "Listagem de Categorias",
            'categorias' => $lista_categorias
        ]);
    }

    public function retornar_categorias() {
        return Categoria::buscarTodos();
    }
}