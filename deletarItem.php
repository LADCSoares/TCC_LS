<?php
include("conecta.php");

   $id = $_GET['idItem'];
   $sql = "SELECT * FROM item WHERE idItem=$id";
   $resultado = mysqli_query($conexao, $sql);
   $linha = mysqli_fetch_array($resultado);
   

$sql = "DELETE FROM item where idItem = $id";
$resultado = mysqli_query($conexao, $sql);

// arrumar o deletar
if ($resultado == true) {
   header("Location: consultarGeral.php");
} else {
   header("Location: consultarPeda.php");
}

?>
