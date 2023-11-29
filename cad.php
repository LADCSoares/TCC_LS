<?php
// faz conexao com o banco
include("conecta.php");

$escola = $_POST["escola"];
$senha = $_POST["senha"];


$sql = "INSERT INTO usuario (escola, senha) VALUES ('$escola', '$senha' )"; // pede para inserir em tal tabela no banco
$resultado = mysqli_query($conexao, $sql);

if ($resultado == true) {
    header("Location: consultarReg.php?result=true");
} else {
    header("Location: consultarReg.php?result=false");
}

?>