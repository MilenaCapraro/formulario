<?php
use Classes\Usuario;
require './Classes/Usuario.php';


$usu = new Usuario();

$usuarios = $usu->listar();

?>

<!--
No CADASTRAR-CLIENTE.PHP é impresso os dados de clientes já cadastrados. Nele terá a opção de
cadastrar um novo cliente (será redirecionado para o INDEX.PHP), editar os dados já cadastrados
(redirecionado para EDITAR.PHP) e excluir os dados já cadastrados (redirecionado para o ELIMINAR.PHP).
-->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/layout.css" rel="stylesheet" type="text/css">

        <title>Formulário - cadastro de clientes</title>
    </head>
    <body>
        
        <h3>Clientes Cadastrados</h3>
       
        <table  border="1" id="1" style="background-color: black; width:10em; height: 2em; margin:auto">
            <tr>
                
                <td>Código</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Login</td>
                <td>Opções</td>
                
            </tr>

            <tbody>
                 <?php foreach ($usuarios as $index=>$usuario) { ?>
            
            <tr>
                <td style="background-color: black; width:500px; height: 50; margin:auto"><?php echo $usuario ['codigo']; ?></td>
                <td><?php echo $usuario ['nome'] ?></td>
                <td><?php echo $usuario ['email'] ?></td>
                <td><?php echo $usuario ['login'] ?></td>
                <td>
                    <a style="color: white" href="editar.php?codigo=<?php echo $usuario ['codigo']; ?> &editar" ><img src="css/editar.png" width="20"></a>
                    <a style="color: white" href="eliminar.php?codigo=<?php echo $usuario ['codigo']; ?> &excluir" ><img src="css/apagar.png" width="20"></a>
                </td>
            </tr>
            
           <?php } ?>
            </tbody>
            </table>
        <br><br>
        <a href="index.php" class="titulo" style="color: white; font-family: sant; font-size: 30px;">Cadastrar novo usuário</a>
    </body>
</html>




