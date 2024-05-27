<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/crud/conexao.php';

class Usuario
{
    public $id;
    public $nome;
    public $email;
    

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT * FROM usuario WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();

        $usuario = $stmt->fetch();
        $this->nome = $usuario['nome'];
        $this->email = $usuario['email'];
    
    }

    public function criar()
    {
        $query = "INSERT INTO usuario (nome, email) 
        VALUES (:nome,:email)";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();
        $this->id = $conexao->lastInsertId();
        return $this->id;
    }

    public static function listar()
    {
        $query = "SELECT * FROM usuario";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->execute();
        $lista = $stmt->fetchAll();
        return $lista;
    }

    public function editar()
    {
        $query = "UPDATE usuario SET nome = :nome, email = :email
        WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }



    public function deletar()
    {
        $query = "DELETE FROM usuario WHERE id = :id";
        $conexao = Conexao::conectar();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
}
