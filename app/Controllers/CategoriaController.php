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

    public function salvar() {
        $dados = [
            'categoria' => filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS)
        ];

         $erros = [];

        if(empty($dados['categoria'])) {
            $erros[] = 'O Campo Categoria não pode ficar em branco!';
        }

        if(empty($erros)) {
            $id = Categoria::salvar($dados);
            header('Location: /categorias');
        }
        else {
            // Se houver erros volta pro formulário
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /categorias/inserir');
        }
    }

    public function retornar_categorias() {
        return Categoria::buscarTodos();
    }
}