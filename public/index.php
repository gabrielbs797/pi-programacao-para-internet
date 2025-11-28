<?php
session_start(); // Inicia a sessão
// Importa o carregamento automático do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UsuarioController;
use App\Controllers\ProdutoController;
use App\Controllers\CategoriaController;

// Função para renderizar as telas com leiaute
function render($view, $data = []) {
    // Extrai os dados recebidos e converte em variáveis
    extract($data);
    ob_start();
    // Inclui a tela que enviamos específica
    require __DIR__ . '/../app/Views/' . $view;
    $content = ob_get_clean();
    // Inclui o leiaute base, que usará a variável $content
    require __DIR__ . '/../app/Views/layouts/base.php';
}

// Função para renderizar as telas com leiaute
function render_sem_template($view, $data = []) {
    // Extrai os dados recebidos e converte em variáveis
    extract($data);
    ob_start();
    // Inclui a tela que enviamos específica
    require __DIR__ . '/../app/Views/' . $view;
}

// Obtém a URL do navegador
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Navegação geral
if ($url == "/" || $url == "/index.php") {
    render_sem_template('home.php', [
        'title' => 'Início - Lojas de Miniaturas AcceleRods'
    ]);
} elseif ($url == "/sobre") {
    render('sobre.php', ['title' => 'Sobre a página - Lojas de Miniaturas AcceleRods']);
}

// Usuários
elseif ($url == "/usuarios") {
    $controller = new UsuarioController();
    $controller->listar();
} 
elseif ($url == "/usuarios/inserir") {
    render('usuarios/form_usuarios.php', ['title' => 'Cadastro de usuários - Lojas de Miniaturas AcceleRods']);
}
// Verifica alem da rota o tipo de pedido
else if ($url == "/usuarios/salvar" && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UsuarioController();
    $controller->salvar();    
} 

// Produtos
elseif ($url == "/produtos") {
    $produtos = new ProdutoController();
    $produtos->listar();
} 
elseif ($url == "/produtos/inserir") {
    $categorias_controller = new CategoriaController();
    $categorias = $categorias_controller->retornar_categorias();
    render('produtos/form_produtos.php', [
        'title' => 'Cadastro de produtos - Lojas de Miniaturas AcceleRods',
        'categorias' => $categorias 
   ]);
}

// Categorias
elseif ($url == "/categorias") {
    $categorias_controller = new CategoriaController();
    $categorias_controller->listar();
}
elseif ($url == "/categorias/inserir"){
    render('categorias/form_categorias.php', ['title' => 'Cadastro de Categorias']);
}



?>