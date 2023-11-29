<?php
include("conecta.php");
// faz conexao com o banco

$id = $_POST["idItem"];
$nomeItem = $_POST["nomeItem"];
$descricao = $_POST["descricao"];
$almoxarifado = $_POST["almoxarifado"];
// var_dump($cpf);

// var_dump($telefone);
// $id_Item = "";

$sql = "UPDATE item SET nomeItem = '$nomeItem', descricao = '$descricao', almoxarifado = '$almoxarifado' WHERE idItem =  $id";
$resultado = mysqli_query($conexao, $sql);

if($almoxarifado == 1){
    if ($resultado == true) {
        header("Location: consultarGeral.php?result=alert");
    } else {
        header("Location: formCadItem.php?result=false");
    }
}else{
    if ($resultado == true) {
        header("Location: consultarPeda.php?result=alert");
    } else {
        header("Location: formCadItem.php?result=false");
    }
}