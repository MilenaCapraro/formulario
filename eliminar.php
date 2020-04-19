<?php

use Classes\Usuario;

$data = filter_input_array(INPUT_GET, FILTER_DEFAULT);



if(isset($data['codigo'])){
    require './Classes/Usuario.php';
    $usu = new Usuario();
    $usu -> eliminar($data['codigo']);
    header("Location: cadastrar-cliente.php");
    
}
?>




