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
            $pdo = Database::conectar();

            $sql = "INSERT INTO produtos ( marca,  modelo,  ano,  descricao,  quantidade,  valor_unitario,  id_categoria)";
            $sql .= "VALUES              (:marca, :modelo, :ano, :descricao, :quantidade, :valor_unitario, :id_categoria)";

            //Prepara o SQL para ser inserido no BD e limpa códigos maliciosos
            $stmt = $pdo->prepare($sql);

            //Passa as variáveis para o SQL
            $stmt ->bindParam(':marca'           ,$dados['marca']           ,PDO::PARAM_STR);
            $stmt ->bindParam(':modelo'          ,$dados['modelo']          ,PDO::PARAM_STR);
            $stmt ->bindParam(':ano'             ,$dados['ano']             ,PDO::PARAM_STR);
            $stmt ->bindParam(':descricao'       ,$dados['descricao']       ,PDO::PARAM_STR);
            $stmt ->bindParam(':quantidade'      ,$dados['quantidade']      ,PDO::PARAM_INT);
            $stmt ->bindParam(':valor_unitario'  ,$dados['valor_unitario']  ,PDO::PARAM_STR);
            $stmt ->bindParam(':id_categoria'    ,$dados['id_categoria']    ,PDO::PARAM_INT);

            $stmt->execute();

            return (int) $pdo->lastInsertId();
        }
        catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
        }
    }
}