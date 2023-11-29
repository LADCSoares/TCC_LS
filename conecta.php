<?php

$bdServidor = "localhost";
$bdUsuario = "root";
$bdSenha =  "";
$bdBanco = "scaem"; // para outros da para mudar apenas aqui


$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if(mysqli_errno($conexao)){
    echo "problemas para conectar no banco. ERRO:";
    echo mysqli_connect_error();
    die();

}


?>