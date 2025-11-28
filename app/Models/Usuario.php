<?php
//Em qual pasta ele está
namespace App\Models;

use PDO;
use PDOException;
use App\Core\Database;

// Mesmo nome de Arquivo
class usuario {

    // Aqui declaramos uma função para cada operação do CRUD

    // Busca todos os usuários no BD
    public static function buscarTodos() {
        // Primeiro vamos conectar no banco de dados
        // Precisamos importar  o PDO antes de criar a classe
        // Como vamos utilizar o arquivo DATABASE, importamos ele também
        $pdo = DataBase::Conectar();

        // Geramos o script SQL de consulta
        $sql = "SELECT * FROM usuarios";

        // Retornamos o resultado da consulta
        return $pdo->query($sql)->fetchAll();
    }

    public static function salvar($dados) {
        try {
            $pdo = Database::conectar();

            $senha_criptografada = password_hash($dados['senha'], PASSWORD_BCRYPT);

            $sql = "INSERT INTO usuarios (nome,  data_nascimento,  genero,  celular,  rua,  numero,  cidade,  estado,  email,  tipo_usuario,  senha)";
            $sql .= "VALUES             (:nome, :data_nascimento, :genero, :celular, :rua, :numero, :cidade, :estado, :email, :tipo_usuario, :senha)";

            // Prepara o SQL para ser inserido no BD e limpa códigos maliciosos
            $stmt = $pdo->prepare($sql);

            // Passa as variáveis para o SQL
            $stmt->bindParam(':nome'            ,$dados['nome']             ,PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento' ,$dados['data_nascimento']                 );
            $stmt->bindParam(':genero'          ,$dados['genero']           ,PDO::PARAM_STR);
            $stmt->bindParam(':celular'         ,$dados['celular']          ,PDO::PARAM_STR);
            $stmt->bindParam(':rua'             ,$dados['rua']              ,PDO::PARAM_STR);
            $stmt->bindParam(':numero'          ,$dados['numero']           ,PDO::PARAM_STR);
            $stmt->bindParam(':cidade'          ,$dados['cidade']           ,PDO::PARAM_STR);
            $stmt->bindParam(':estado'          ,$dados['nomestadoe']       ,PDO::PARAM_STR);
            $stmt->bindParam(':email'           ,$dados['email']            ,PDO::PARAM_STR);
            $stmt->bindParam(':tipo_usuario'    ,$dados['tipo_usuario']     ,PDO::PARAM_STR);
            $stmt->bindParam(':senha'           ,$senha_criptografada);

            //Executa o SQL
            $stmt->execute();
            // Retorna o ID do registro no BD
            return (int) $pdo->lastInsertId();

        }catch (PDOException $e) {
            echo "Erro ao inserir: " . $e->getMessage();
            //exit;
        }
    }
}