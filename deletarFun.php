<?php
include("conecta.php");

   $id = $_GET['idFuncionario'];
   $sql = "SELECT * FROM funcionario WHERE idFuncionario=$id";
   $resultado = mysqli_query($conexao, $sql);
   $linha = mysqli_fetch_array($resultado);
   

$sql = "DELETE FROM funcionario where idFuncionario=$id";
$resultado = mysqli_query($conexao, $sql);

// arrumar o deletar
header("Location: consultarFun.php");
?>
