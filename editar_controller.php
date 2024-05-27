<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/crud/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/usuario.php";

try {
    $id = ($_POST['id']);
    $nome = ($_POST['nome']);
    $email = ($_POST['email']);

    $usuario = new Usuario($id);
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->editar();
    
    header('Location: /crud/index.php');
    exit();
} catch (Exception $e) {
    echo '' . $e->getMessage();
}



?>