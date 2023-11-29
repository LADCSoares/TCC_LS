
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
         .cont1{
         font-family: "Roboto", sans-serif;
         background-color: rgb(8,83,148);
        }
  
        .topicos{
          font-family: "Roboto", sans-serif;
          font-size: 16px;
          margin-left: 46px;
        }
        .aviso{
          font-family: "Roboto", sans-serif;
        }
        .topo2{
          background-color: rgb(8,83,148);
      }
       .borda{
        border-radius: 3%;
       }
	      </style>
  </head>
  
        <body>
      <?php 
      
      require_once "topo.html";
      require_once "conecta.php";
  
        ?>
      <div class="row">
      <main class="container col s8 offset-s3 ">
        <br><br>
      <div class="cont1 borda col s3 offset-s0">
        <h3 class=" center-align white-text"> Funcionários </h3>
      </div>
   <br><br><br><br><br><br>
    
    <table class="bordered highlight striped responsive-table topicos">
            <thead class="">
              <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Cargo</th>
                  <th>Telefone</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                
              </tr>
              
            </thead>
            <tbody>
    
    <?php
    
      $sql = "SELECT idFuncionario,nome,cpf,cargo,telefone FROM funcionario";
      $resultado = mysqli_query($conexao,$sql); 
    // var_dump($resultado);
    //  $dados = mysqli_fetch_assoc($resultado);
  
    while($linha = mysqli_fetch_assoc($resultado))
        { 
          echo "<tr>";
          $id = $linha['idFuncionario'];
          $nome = $linha['nome'];
          $cpf = $linha['cpf']; 
          $cargo = $linha['cargo'];
          $telefone = $linha['telefone'];
        
          echo "<tr>";
          echo "<td>" . $id. "</td>";
          echo "<td class='ltabela'>" . $nome . "</td>";
          echo "<td>" . $cpf . "</td>";
          echo "<td class='ltabela'>" . $cargo . "</td>";
          echo "<td>" . $telefone . "</td>";
        
          echo "<td>  <a href= 'formAtualFun.php?idFuncionario=$id' class='btn-floating waves-effect waves-light light-blue darken-4 '> <i class='material-icons'>mode_edit</i></a> </td>";
          echo "<td> <a href='#modal1' onclick='preencheId($id)' class='btn-floating waves-effect waves-light light-blue darken-4 modal-trigger'> <i class='material-icons'>delete</i></a> </td>";
  
          echo "</tr>";
        } 
  
        ?>
        
        </tbody>
        </table>
        <br>

        </main>
      </div>
      <br><br>
      
  
      <!-- Modal Trigger -->
      <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->
  
      <!-- Modal Structure -->
      <div id="modal1" class="modal aviso">
        <div class="modal-content">
          <h4>Excluir funcionário</h4>
          <p>Tem certeza que deseja excluir o funcionário?</p>
        </div>
        <div class="modal-footer center">
          <a href="" id="btn-sim" class="modal-close waves-effect waves-green btn-flat">Sim</a>
          <a href="#!" class="modal-close waves-effect waves-red btn-flat">Não</a>
        </div>
      </div>
    


      
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          <script type="text/javascript" src="js/materialize.min.js"></script>


        <script type="text/javascript">
        $(document).ready(function(){
        $('.modal').modal();
        $('.dropdown-trigger').dropdown();
          <?php
            if (isset($_GET['result'])) {
              if ($_GET['result'] == true) {
                echo "M.toast({html: 'Funcionário salvo com sucesso!', classes: 'rounded'})";
              }else {
                echo "M.toast({html: 'Erro ao salvar o funcionário!', classes: 'rounded'})";
              }
            }?>
          });
  
        function preencheId(id) {
          let btnSim = document.getElementById("btn-sim");
          btnSim.href = "deletarFun.php?idFuncionario=" + id;
        }
        </script>
  
        </body>
      </html>
  
  