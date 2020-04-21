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
        <div>
            <form action="index.php" method="post">
                <h3>Cadastre-se</h3>

                <table class="tabela"> 

                    <div class="campo">
                        <label for="nome" ></label>
                        <input type="text" required name="nome" style="width: 20em; height: 2em; font-size: 15px" id="nome" placeholder="Nome"/>
                    </div>

                    <div class="campo">
                        <label for="email"></label><br>
                        <input type="email" required name="email" style="width: 20em; height: 2em; font-size: 15px" id="email" placeholder="E-mail"/>
                    </div><br>

                    <div class="campo">
                        <label for="login"></label>
                        <input type="text" required name="login" style="width: 20em; height: 2em; font-size: 15px" id="login" placeholder="Login"/>
                    </div><br>

                    <div class="campo">
                        <label for="senha"></label>
                        <input type="password" required name="senha" style="width: 20em; height: 2em; font-size: 15px" id="senha" placeholder="Senha"/>
                    </div><br>

                    <div class="campo">
                        <label for="senha-confirma"></label>
                        <input type="password" required name="senha-confirma" style="width: 20em; height: 2em; font-size: 15px" id="senha-confirma" placeholder="Confirmar Senha"/>
                    </div><br>
                    <button type="submit" class="botao" required name="salvar" id="salvar"> Salvar </button>
                </table>
            </form>
        </div>
    </body>
</html>
