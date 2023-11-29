<?php
session_start();

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



if (isset($_POST['login'])) {

    include_once('conecta.php');

    $usuario = $_POST['usuario'];

    $sql = "SELECT * FROM usuario WHERE login='$usuario'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // executa o php mailer com a senha
        $banco_usuario = mysqli_fetch_assoc($resultado);
        
        $banco_email = $banco_usuario['email'];
        $email = new PHPMailer();
$email->isSMTP();
$email->Host = 'smtp.gmail.com';
$email->SMTPAuth = true;
$email->Charset = 'UTF-8';
$email->SMTPSecure = 'tls';
$email->Port =587;

$email->Username = 'luisa.2021315963@aluno.iffar.edu.br';
$email->Password = 'andrielly2005';

//titulo do email
$email->Subject = 'Mensagem automatica - Recuperar senha';
$email->setFrom("$banco_email");

$email->Body =
" Olá $usuario, 
    Você solicitou o serviço de redefinição de senha. Por favor, clique no link para redefinir sua senha:
    <a href=http://localhost/TCC_LS/alterar-senha.php>Redefinir Senha</a><br><br>
Atenciosamente, SCAEM!";    

$email->AltBody = '<a href=http://localhost/TCC_LS/alterar-senha.php>Redefinir Senha</a><br><br>
Atenciosamente, SCAEM!';

$email->addAddress("$banco_email");
if($email->Send()){
    echo"Email envidado";
    $_SESSION['id_recuperar'] = $banco_usuario['id'];
}else{
    echo "nao enviado".$email->ErrorInfo;
}
$email->smtpClose();
    } else {
        echo "deu ruim";
    }
}
?>
<!DOCTYPE html>

<html lang="pt-br">

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
    <div id="login">

        <form method="POST" class="formulario">

            <div>
                <h2>Recuperação de Senha</h2>
            </div>

            <p class="topicos">Digite seu usuário para recuperar sua senha:</p>
					<div class="input-field">
						<i class="material-icons prefix"></i>
						<label for="usuario"> </label>
						<input type="text" name="usuario" class="validate" id="usuario" required>
			</div>

            <br><br>
			  		<p class="center-align">
						<button class="waves-effect waves-light btn blue black-text topicos2" type="submit" name="login" value="login"> Logar </button>
					  </p>
            <br>

        </form>

    </div>
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