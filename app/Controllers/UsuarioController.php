<?php 
namespace App\Controllers;

// Importa o Model de Usuario
use App\Models\Usuario;

class UsuarioController {
    // Busca os usuarios e chama a tela de listar
    public function listar() {
        // Chama a model e a função que busca os dados e armazena na var
        $lista_usuarios = Usuario::buscarTodos();

        render("usuarios/lista_usuarios.php", [
            'title' => "Lista de Usuários",
            'usuarios' => $lista_usuarios
        ]);
    }

    public function salvar() {
        // 1. Limpa os dados, remove tudo que não for texto puro
        $dados = [
            'nome'            => filter_input(INPUT_POST, 'nome'         ,FILTER_SANITIZE_SPECIAL_CHARS),
            'data_nascimento' => $_POST['data_nascimento'] ?? '',    
            'genero'          => filter_input(INPUT_POST, 'genero'       ,FILTER_SANITIZE_SPECIAL_CHARS),
            'celular'         => filter_input(INPUT_POST, 'celular'      ,FILTER_SANITIZE_SPECIAL_CHARS),
            'rua'             => filter_input(INPUT_POST, 'rua'          ,FILTER_SANITIZE_SPECIAL_CHARS),
            'numero'          => filter_input(INPUT_POST, 'numero'       ,FILTER_SANITIZE_SPECIAL_CHARS),
            'cidade'          => filter_input(INPUT_POST, 'cidade'       ,FILTER_SANITIZE_SPECIAL_CHARS),
            'estado'          => filter_input(INPUT_POST, 'estado'       ,FILTER_SANITIZE_SPECIAL_CHARS),
            'email'           => filter_input(INPUT_POST, 'email'        ,FILTER_SANITIZE_SPECIAL_CHARS),
            'tipo_usuario'    => filter_input(INPUT_POST, 'tipo_usuario' ,FILTER_SANITIZE_SPECIAL_CHARS),
            'senha'           => filter_input(INPUT_POST, 'senha'        ,FILTER_DEFAULT               )
        ];

        //Cria a lista de erros
        $erros = [];

        if(empty($dados['nome'])) {
            $erros[] = 'O Campo NOME não pode ficar em branco!';
        }
        else if (strlen($dados['nome']) < 4) { //Verifica se o nome tem menos de 4 letras
            $erros[] = 'O campo NOME deve ter mais do que 3 caracteres!';
        }

        // Se não houver erros salva
        if(empty($erros)) {
            $id = Usuario::salvar($dados);
            header('Location: /usuarios');
        }
        else {
            // Se houver erros volta pro formulário
            $_SESSION['erros'] = $erros;
            $_SESSION['dados'] = $dados;
            header('Location: /usuarios/inserir');
        }
    }
}
