<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/usuario.php";

$id = $_GET['id'];
try {
    
    $usuario = new Usuario($id);
   
} catch (PDOException $e) {
    echo $e->getMessage();
 }
 
 
 ?>


<h1>Editar usuário</h1>
<form action="editar_controller.php" method="POST">
    <input type="hidden" id="id" name="id" value="<?=$usuario->id?>">
    <label for="nome">
Nome:<input type="text" id="nome" name="nome" value="<?=$usuario->nome?>">
    </label>
    <label for="email">
E-mail:<input type="text" id="email" name="email" value="<?=$usuario->email?>">
    </label>
    <input type="submit" value="atualizar">
</form>

