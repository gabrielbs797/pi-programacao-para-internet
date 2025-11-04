<?php

// Importa o carregamento automático do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

// Obtém a URL do navegador
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Carrega a página correspondente
if ($url == "/") {
    require __DIR__ . '/../app/Views/home.php';
}

if($url == "/cadastro-produtos") {
    require __DIR__ . '/../app/Views/cadastro-produtos.php';
}

if($url == "/cadastro-usuarios") {
    require __DIR__ . '/../app/Views/cadastro-usuarios.php';
}

if($url == "/dashboard") {
    require __DIR__ . '/../app/Views/dashboard.php';
}

if($url == "/listagem-produtos") {
    require __DIR__ . '/../app/Views/listagem-produtos.php';
}

if($url == "/listagem-usuarios") {
    require __DIR__ . '/../app/Views/listagem-usuarios.php';
}

if($url == "/login") {
    require __DIR__ . '/../app/Views/login.php';
}

?>