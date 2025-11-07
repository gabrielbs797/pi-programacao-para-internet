<?php

// Importa o carregamento automático do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

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
    render('usuarios/lista_usuarios.php', ['title' => 'Usuários - Lojas de Miniaturas AcceleRods']);
} elseif ($url == "/usuarios/inserir") {
    render('usuarios/form_usuarios.php', ['title' => 'Cadastro de usuários - Lojas de Miniaturas AcceleRods']);
}
// Produtos
elseif ($url == "/produtos") {
    render('produtos/lista_produtos.php', ['title' => 'Produtos - Lojas de Miniaturas AcceleRods']);
} elseif ($url == "/produtos/inserir") {
    render('produtos/form_produtos.php', ['title' => 'Cadastro de produtos - Lojas de Miniaturas AcceleRods']);
}


?>