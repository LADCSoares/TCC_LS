<?php
// faz conexao com o banco
include("conecta.php");

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
// var_dump($cpf);
$cargo = $_POST["cargo"];
$telefone = $_POST["telefone"];
// var_dump($telefone);

$sql = "INSERT INTO funcionario (nome, cpf, cargo, telefone) VALUES ('$nome', '$cpf' , '$cargo', '$telefone')"; // pede para inserir em tal tabela no banco
$resultado = mysqli_query($conexao, $sql);

if ($resultado == true) {
    header("Location: consultarFun.php?result=alert");
}else{
    header("Location: formCadFun.php?result=false");
}

?>