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

    public function salvar() {
        $dados = [
            'marca'           => filter_input(INPUT_POST, 'marca'         ,FILTER_SANITIZE_SPECIAL_CHARS),
            'modelo'          => filter_input(INPUT_POST, 'modelo'        ,FILTER_SANITIZE_SPECIAL_CHARS),
            'ano'             => filter_input(INPUT_POST, 'ano'           ,FILTER_SANITIZE_NUMBER_INT   ),
            'descricao'       => filter_input(INPUT_POST, 'descricao'     ,FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade'      => filter_input(INPUT_POST, 'quantidade'    ,FILTER_SANITIZE_NUMBER_INT   ),
            'valor_unitario'  => filter_input(INPUT_POST, 'valor'         ,FILTER_SANITIZE_SPECIAL_CHARS),
            'id_categoria'    => filter_input(INPUT_POST, 'categoria'     ,FILTER_SANITIZE_SPECIAL_CHARS)
        ];

        $erros = [];

        if(empty($dados['marca'])) {
            $erros[] = 'O campo "marca" não pode ficar em branco!';
        }

        // Se não houver erros salva
        if(empty($erros)) {
            $id = Produto::salvar($dados);
            header('Location: /produtos');
        }
        else {
            // Se houver erros volta pro formulário
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /produtos/inserir');
        }
    }

    public function retornar_produtos() {
        return Produto::buscarTodos();
    }

    public function editar($id, $categorias) {
        $dados = Produto::buscarUm($id);

        render("produtos/form_produtos.php", [
            'title'      => 'Alterar Produto - Accelerods',
            "dados"      => $dados,   
            "categorias" => $categorias
        ]);
    }

    public function atualizar($id) {
        $dados = [
            'id_produto'      => $id,
            'marca'           => filter_input(INPUT_POST, 'marca'         ,FILTER_SANITIZE_SPECIAL_CHARS),
            'modelo'          => filter_input(INPUT_POST, 'modelo'        ,FILTER_SANITIZE_SPECIAL_CHARS),
            'ano'             => filter_input(INPUT_POST, 'ano'           ,FILTER_SANITIZE_NUMBER_INT   ),
            'descricao'       => filter_input(INPUT_POST, 'descricao'     ,FILTER_SANITIZE_SPECIAL_CHARS),
            'quantidade'      => filter_input(INPUT_POST, 'quantidade'    ,FILTER_SANITIZE_NUMBER_INT   ),
            'valor_unitario'  => filter_input(INPUT_POST, 'valor'         ,FILTER_SANITIZE_SPECIAL_CHARS),
            'id_categoria'    => filter_input(INPUT_POST, 'categoria'     ,FILTER_SANITIZE_SPECIAL_CHARS)
        ];

        Produto::atualizar($dados);
        header('Location: /produtos');
    }

    public function excluir($id) {
        produto::excluir($id);
        header('Location: /produtos');
    }
}