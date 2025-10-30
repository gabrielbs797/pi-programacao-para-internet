<?php

// Importa o carregamento automático do Composer para carregar as rotas
require __DIR__ . '/../vendor/autoload.php';

// Obtém a URL do navegador
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Carrega a página correspondente
if ($url == "/") {
    require __DIR__ . '/../app/Views/home.php';
}

?>