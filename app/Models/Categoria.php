<?php
namespace App\Models;

use PDO;
use PDOException;
use App\Core\Database;

class categoria {

    public static function buscarTodos() {
        $pdo = DataBase::Conectar();

        $sql = "SELECT * FROM categorias";

        return $pdo->query($sql)->fetchAll();
    }

    public static function salvar($dados) {
        try {
            $pdo = Database::conectar();

            $sql = "INSERT INTO categorias (descricao)";
            $sql .= "           VALUES     (:categoria)";

            // Prepara o SQL para ser inserido no BD e limpa códigos maliciosos
            $stmt = $pdo->prepare($sql);

            // Passa as variáveis para o SQL
            $stmt ->bindParam(':categoria', $dados['categoria'], PDO::PARAM_STR);

            $stmt->execute();

            return (int) $pdo->lastInsertId();
        }
        catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
        }
    }
}