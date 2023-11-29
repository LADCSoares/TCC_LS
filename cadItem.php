<?php
// faz conexao com o banco
include("conecta.php");

$nomeItem = $_POST["nomeItem"];
$descricao = $_POST["descricao"];
$almoxarifado = $_POST["almoxarifado"];
// var_dump($cpf);
// var_dump($telefone);
// $id_Item = "";

$sql = "INSERT INTO item (nomeItem, descricao, almoxarifado) VALUES ('$nomeItem', '$descricao', '$almoxarifado')"; // pede para inserir em tal tabela no banco
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


?>