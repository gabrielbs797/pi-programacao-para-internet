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

    public static function buscarUm($id){
        // Inicia a conexão com o BD
        $pdo = Database::conectar();

        $sql = "SELECT * FROM categorias WHERE deleted_at IS NULL AND id_categoria = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function atualizar($dados) {
        try {
            $pdo = Database::conectar();

            $sql =  'UPDATE categorias SET descricao = :descricao WHERE id_categoria = :id_categoria';

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':descricao'    ,$dados['descricao']    ,PDO::PARAM_STR);
            $stmt->bindParam(':id_categoria' ,$dados['id_categoria'] ,PDO::PARAM_INT);

            return $stmt->execute();
        }
        catch (PDOException $e) {
            echo "Erro ao alterar: " . $e->getMessage();
            exit;
        }
    }

    public static function excluir($id) {
        try {
            $pdo = Database::conectar();
            $sql = "DELETE FROM categorias WHERE id_categoria = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
        catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
            exit;    
        }
    }
}