<?php

use Classes\Usuario;
require './Classes/Usuario.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$parametros = filter_input_array(INPUT_GET, FILTER_DEFAULT);

$usu = new Usuario();
$usuarioList = $usu->listagem($parametros['codigo']);

if (isset($parametros ['codigo'])) {
    $usu->editar($parametros['codigo'], $data['nome'], $data['email'], $data['login']);
}

if (isset($data ['salvar'])) {
    header("Location: cadastrar-cliente.php"); //redirecionando
}
?>

<!--
A função EDITAR é a mesma que o UPDATE.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/layout.css" rel="stylesheet" type="text/css">
        <title>Cadastro de clientes</title>

        <?php if (isset($data ['salvar'])) { ?>
    <script>
        alert("Usuário editado com sucesso !");

    </script>
<?php } ?>

    </head>
    <body>


        <div>
            <form " method="post" action="editar.php?codigo=<?php echo $parametros['codigo']; ?>">

                <h3>Editando Dados</h3>

                <?php foreach ($usuarioList as $index => $usu) { ?>
                    <table id="tabela"> 

                        <div class="campo">
                        <label for="nome"></label>
                        <input type="text" required name="nome" style="width: 20em; height: 2em;" id="nome" value = " <?php echo $usu ['nome']; ?>" placeholder="Nome"/>
                        </div><br>

                        <div class="campo">
                        <label for="email"></label>
                        <input type="email" required name="email" style="width: 20em; height: 2em;" id="email" value = " <?php echo $usu ['email']; ?>" placeholder="E-mail""/>
                        </div><br>

                        <div class="campo">
                        <label for="login"></label>
                        <input type="text" required name="login" style="width: 20em; height: 2em;" id="login" value = " <?php echo $usu ['login']; ?>" placeholder="Login"/>
                        </div><br>

                        <button class="botao" type="submit" required name="salvar" id="salvar"> Salvar dados </button>

                    </table>
                <?php } ?>
            </form>
        </div>
    </body>
</html>
