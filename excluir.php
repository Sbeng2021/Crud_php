<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/crud/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/usuario.php";

try {

    $id = $_GET['id'];

    $usuario = new Usuario($id);


    $usuario->deletar();
    
    header('Location: /crud/index.php');
    exit();
} catch (Exception $e) {
    echo '' . $e->getMessage();
}



?>