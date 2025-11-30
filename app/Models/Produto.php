<?php
namespace App\Models;

use PDO;
use PDOException;
use App\Core\Database;

class produto {

    public static function buscarTodos() {
        $pdo = DataBase::Conectar();

        $sql = "select p.id_produto
                      ,p.marca 
	                  ,p.modelo
	                  ,p.ano
	                  ,p.descricao
	                  ,p.quantidade
	                  ,p.valor_unitario
                      ,c.descricao as categoria
                    from produtos  p
                    inner join categorias c on p.id_categoria = c.id_categoria ";

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

    public static function buscarUm($id) {
        $pdo = Database::conectar();

        $sql = "select p.id_produto
                      ,p.marca 
	                  ,p.modelo
	                  ,p.ano
	                  ,p.descricao
	                  ,p.quantidade
	                  ,p.valor_unitario
                      ,c.descricao as categoria
                    from produtos  p
                    inner join categorias c on p.id_categoria = c.id_categoria
                    WHERE p.deleted_at IS NULL AND id_produto = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function atualizar($dados) {
        try {
            $pdo = Database::conectar();

            $sql  = 'UPDATE produtos SET ';
            $sql .= 'marca          = :marca, '; 
            $sql .= 'modelo         = :modelo, '; 
            $sql .= 'ano            = :ano, '; 
            $sql .= 'descricao      = :descricao, '; 
            $sql .= 'quantidade     = :quantidade, '; 
            $sql .= 'valor_unitario = :valor_unitario, ';
            $sql .= 'id_categoria   = :id_categoria ';
            $sql .= 'WHERE id_produto = :id';

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':marca'           ,$dados['marca']           ,PDO::PARAM_STR);
            $stmt->bindParam(':modelo'          ,$dados['modelo']          ,PDO::PARAM_STR);
            $stmt->bindParam(':ano'             ,$dados['ano']             ,PDO::PARAM_STR);
            $stmt->bindParam(':descricao'       ,$dados['descricao']       ,PDO::PARAM_STR);
            $stmt->bindParam(':quantidade'      ,$dados['quantidade']      ,PDO::PARAM_STR);
            $stmt->bindParam(':valor_unitario'  ,$dados['valor_unitario']  ,PDO::PARAM_STR);
            $stmt->bindParam(':id_categoria'    ,$dados['id_categoria']    ,PDO::PARAM_INT);
            $stmt->bindParam(':id'              ,$dados['id_produto']      ,PDO::PARAM_INT);

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
            $sql = "DELETE FROM produtos WHERE id_produto = :id";
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