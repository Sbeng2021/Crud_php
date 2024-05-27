<?php
 require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/config.php";
 require_once $_SERVER["DOCUMENT_ROOT"] . "/crud/usuario.php";
 try {
    /* $id=$_SESSION['Usuario']['id_usuario']; */
    $usuario = Usuario::listar();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
?>

 <h1>Listagem de usuários</h1>

 <table border="1">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php foreach($usuario as $d): ?> 
        <?php $id = $d['id'];
            $usuario = new Usuario($id);
            ?>
      
        <tr>
    
            <td><?= $d['id']; ?></td>
            <td><?= $d['nome']; ?></td>
            <td><?= $d['email']; ?></td>
            <td>
                <a href="editar.php?id=<?= $usuario->id?>">[ Editar ]</a>
                <a href="excluir.php?id=<?= $usuario->id?>">[ Excluir ]</a>
            </td>
            
        </tr>
        
    <?php endforeach; ?>
 </table>
<a href="inserir.php">Cadastrar usuários</a>