<?php

use Classes\Usuario;

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($data ['salvar'])) {
    require './Classes/Usuario.php';

    $usu = new Usuario();
    $usu->inserir($data ['nome'], $data ['email'], $data ['login'], $data ['senha']);
    header("Location: cadastrar-cliente.php"); //redirecionando
}
?>


<!--
No INDEX.PHP fica o formulário do cliente, após o cliente clicar em salvar, será
criado um cadastro.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        <title>Cadastro de clientes</title>

        <?php if (isset($data ['salvar'])) { ?>
            <script>
                alert("Usuário cadastrado com sucesso !");
            </script>
            
        <?php } ?>
    </head>
    <body>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div>
            <form action="index.php" method="post">

                <h3>Cadastre-se</h3>

                <table id="tabela"> 


                    <td><tr>
                    <label for="nome"></label>
                    <input type="text" required name="nome" id="nome" placeholder="Nome"/>
                    </tr></td>
                    <br><br>

                    <td><tr>
                    <label for="email"></label>
                    <input type="email" required name="email" id="email" placeholder="E-mail"/>
                    </tr></td>
                    <br><br>

                    <td><tr>
                    <label for="login"></label>
                    <input type="text" required name="login" id="login" placeholder="Login"/>
                    </tr></td>
                    <br><br>

                    <td><tr>
                    <label for="senha"></label>
                    <input type="password" required name="senha" id="senha" placeholder="Senha"/>
                    </tr></td>
                    <br><br>

                    <td><tr>
                    <label for="senha-confirma"></label>
                    <input type="password" required name="senha-confirma" id="senha-confirma" placeholder="Confirmar Senha"/>
                    </tr></td>
                    <br><br>
                    <button type="submit" required name="salvar" id="salvar"> Salvar </button>
                </table>
            </form>
        </div>
    </body>
</html>
