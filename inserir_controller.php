<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/conexao.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/usuario.php";


try {
    

    $nome = ($_POST['nome']);
    $email = ($_POST['email']);
    
    
    

    $usuario = new Usuario($id);
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->criar();

    header("Location: /crud/index.php");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
