<?php
namespace App\Models;

use PDO;
use PDOException;
use App\Core\Database;

class produto {

    public static function buscarTodos() {
        $pdo = DataBase::Conectar();

        $sql = "SELECT * FROM produtos";

        return $pdo->query($sql)->fetchAll();
    }

    public static function salvar($dados) {
        try {
            // $pdo = Database::conectar();

            // $senha_criptografada = password_hash($dados['senha'], PASSWORD_BCRYPT);

            // $sql = "INSERT INTO produtos (nome, data_nascimento, genero, celular, rua, numero, cidade, estado, email, tipo_usuario, senha)";
            // $sql .= "VALUES (:nome, :data_nascimento, :genero, :celular, :rua, :numero, :cidade, :estado, :email, :tipo_usuario, :senha)";

            // Prepara o SQL para ser inserido no BD e limpa códigos maliciosos
            // $stmt = $pdo->prepare($sql);

            // Passa as variáveis para o SQL
            // $stmt ->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);

        }catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
        }
    }
}