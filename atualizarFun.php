<?php
include("conecta.php");
// faz conexao com o banco

$id = $_POST["idFuncionario"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
// var_dump($cpf);
$cargo = $_POST["cargo"];
$telefone = $_POST["telefone"];
// var_dump($telefone);
// $id_Item = "";

$sql = "UPDATE funcionario SET nome = '$nome', cpf = '$cpf', cargo = '$cargo', telefone = '$telefone' WHERE idFuncionario =  $id";
$resultado = mysqli_query($conexao, $sql);
if ($resultado == true) {
    header("Location: consultarFun.php?result=true");
} else {
    header("Location: consultarFun.php?result=false");
}

