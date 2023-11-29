<?php
if(isset($_POST['login'])){

include_once('conecta.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE login='$usuario'";
$resultado = mysqli_query($conexao, $sql);  

if(mysqli_num_rows($resultado) > 0){
    $dados = mysqli_fetch_assoc($resultado);
    // if(password_verify($senha,$dados['senha'])){
    if($senha == $dados['senha']){
            header("location:paginaInicial.php");
        } else {
            header("location:index.php");
        }
        
    }
} 
?>

<!DOCTYPE html>
<html lang="PT-br">
  <head>
      <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lilita+One|Roboto+Slab">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>SCAEM</title>
    <style>
              body{
                background-color: rgb(8,83,148);
             }
             .contorno{
              background-color:#b71c1c;
              }
              .contorno2{
              background-color:#ffffff;
              }
              .contorno3{
                background-color: rgb(8,83,148);
              }
              .imagem2{
                height:200px;
                float: center;
              }
              .topicos{
		            font-family: "Roboto", sans-serif;
		            font-size: 17px;
		            font-weight: 800;
                margin-left: 43px;;
	            }
              .topico5{
		            font-family: "Roboto", sans-serif;
		            font-size: 17px;
		            font-weight: 800;

	            }
     </style>   
 </head>
<body>
  <div class="row">
    <br><br>
    <div class="container col s6 offset-s3 center-align contorno">
      <br><br>
    <div class="container col s10 offset-s1 center-align contorno2">
      <br><br>
    <img class=" imagem2 " src="municipio.png">
    <br><br>
    <div class="col s10 offset-s1 left-align">
    <form method="post">

          <p class="topicos ">Nome da Escola:</p>
					<div class="input-field">
						<i class="material-icons prefix"></i>
						<label for="name"> </label>
						<input type="text" name="usuario" required>
					</div>
					<p class="topicos">Senha:</p>
          			<div class="input-field">
						<i class="material-icons prefix"></i>
						<label for="cargo"></label>
						<input type="password" name="senha" required>
					</div>
          <a class="center-aling" href="formulario-recuperar.php"><span class=" topicos5">Esqueci Minha Senha</span></a>

          <br><br>
			  		<p class="center-align">
						<button class="waves-effect waves-light btn blue black-text topicos2" type="submit" name="login"> Logar </button>
					  </p>
          <br>
			  </form>
    </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
  </div>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
              
        <script>

        </script>
</body>
</html> 