<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
        <!--Import Google Icon Font-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lilita+One|Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--Let browser know website is optimized for mobile-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>SCAEM</title>
	<style>
    .cont1{
		font-family: "Lilita One", sans-serif;
		background-color: rgb(8,83,148);
	}

	.topicos{
		font-family: "Roboto", sans-serif;
		font-size: 17px;
		margin-left: 46px;
		font-weight: 800;
	}
	.topicos2{
		font-family: "Roboto", sans-serif;
		font-size: 18px;
		margin-left: 46px;
		font-weight: 600;
	}
	
	</style>
</head>
<body>
  
    <?php
//    require_once "cabeca.php";
   include "conecta.php";
   include "topo.html";

   $id = $_GET['idFuncionario'];
   $sql = "SELECT * FROM funcionario WHERE idFuncionario=$id";
   $resultado = mysqli_query($conexao, $sql);
   $linha = mysqli_fetch_array($resultado);
   mysqli_close($conexao);
    ?>
    <br><br>
	<div class="row">
	
	<div class="container z-depth-3 col s6 offset-s4 cont1">
	<h4 class="center-align white-text"> ATUALIZAR INFORMAÇÕES FUNCIONÁRIO </h4>
	</div>
	
	<div class="col s8 offset-s3">

		<div class="container ">
		<br>
		<div class="col s10 offset-s1">
			<form method="POST" action="atualizarFun.php">

			<input type="hidden" name="idFuncionario" value="<?php echo $linha['idFuncionario']?>">

				<p class="topicos">Nome:</p>
				<div class="input-field">
					<i class="material-icons prefix"></i>
					<label for="name"> </label>
					<input type="text" name="nome" value="<?php echo $linha['nome']; ?>" required>
				</div>

				<p class="topicos">CPF:</p>
				<div class="input-field">
					<i class="material-icons prefix "></i>
					<label for="cpf"></label>
					<input type="text"  name="cpf" value="<?php echo $linha['cpf']; ?>" placeholder="xxx.xxx.xxx-xx" pattern="[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}"  title="O CPF precisa estar neste formato xxx.xxx.xxx-xx"  maxlength="14"  required>
				</div>
				
				<p class="topicos">Cargo:</p>
				  <div class="input-field">
					<i class="material-icons prefix"></i>
					<label for="cargo"></label>
					<input type="text" name="cargo"  value="<?php echo $linha['cargo']; ?>" required>
				</div>

				<p class="topicos">Telefone:</p>
				<div class="input-field">
			
					<i class="material-icons prefix "></i>
					<label for="telefone:"></label>
					<input type="tel"  name="telefone"  value="<?php echo $linha['telefone']; ?>" id="telefone"  placeholder="(DDD)xxxx-xxxx" pattern="(\([0-9]{2}\))([9]{1})?([0-9]{4})-([0-9]{4})"  title="O número de telefone precisa estar neste formato (DDD)xxxx-xxxx"  maxlength="14"  required>
					</div>




		  </div>
		  <br>
				  <p class="right-align">
					<button class="waves-effect waves-light btn yellow black-text topicos2" type="submit"><i class="material-icons left"></i> Atualizar </button>
				</p>

		  </form>
		</div>
	</div>
</div>


</form>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
	<script type="text/javascript">
           $(document).ready(function() {
        	$('.dropdown-trigger').dropdown();
       			 <?php
       			 if (isset($_GET['result'])) {
       			   if ($_GET['result'] == true) {
       			     echo "M.toast({html: 'O funcionário foi atualizado com sucesso!'})";
       			   } else {
       			     echo "M.toast({html: 'Erro ao atualizar o funcionário!'})";
       			   }
       			 } ?>
    		  	});
        </script>
</body>
</html>