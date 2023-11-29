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

         .quebra {
              word-wrap: break-word;
              white-space: pre-line;
          }
	       </style>
  </head>
  
        <body>
      <?php 
      
      require_once "topo.html";
      require_once "conecta.php";
  
        ?>
      <div class="row">
      <main class="container col s9 offset-s3 ">
        <br><br>
      <div class="cont1 col s5 offset-s0">
        <h3 class="borda center-align white-text"> Almoxarifado Geral </h3>
      </div>
    <br><br><br><br><br><br>

    <table class=" bordered highlight striped responsive-table topicos">
            <thead class="">
              <tr>
                  <th>ID</th>
                  <th>Item</th>
                  <th>Descrição</th>
                  <th>Estoque</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                
              </tr>
              
            </thead>
            <tbody>
    
    <?php
    
      $sql = "SELECT idItem,nomeItem,descricao,almoxarifado FROM item";
      $resultado = mysqli_query($conexao,$sql); 
    // var_dump($resultado);
    //  $dados = mysqli_fetch_assoc($resultado);
  
    while($linha = mysqli_fetch_assoc($resultado))
        if($linha['almoxarifado'] == 1){

        { 
          echo "<tr>";
          $id = $linha['idItem'];
          $nomeItem = $linha['nomeItem'];
          $descricao = $linha['descricao']; 

        
          echo "<tr>";
          echo "<td>" . $id . "</td>";
          echo "<td class='ltabela'>" . $nomeItem . "</td>";
          echo "<td class='text-justify'>" . $descricao . "</td>";
          echo "<td>  <a href= 'formEstoque.php?idItem=$id' class='btn-floating waves-effect waves-light light-blue darken-4 '> <i class='material-icons'>add</i></a> </td>";
          echo "<td>  <a href= 'formAtualItem.php?idItem=$id' class='btn-floating waves-effect waves-light light-blue darken-4 '> <i class='material-icons'>mode_edit</i></a> </td>";
          echo "<td> <a href='#modal1' onclick='preencheId($id)' class='btn-floating waves-effect waves-light light-blue darken-4 modal-trigger'> <i class='material-icons'>delete</i></a> </td>";
  
          echo "</tr>";
        }
        } 
  
        ?>
        
        </tbody>
        </table>
      </div>
      </div>
        <br>

        </main>
      </div>
      <br><br>
      
  
      <!-- Modal Trigger -->
      <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> -->
  
      <!-- Modal Structure -->
      <div id="modal1" class="modal aviso">
        <div class="modal-content">
          <h4>Excluir Item</h4>
          <p>Tem certeza que deseja excluir o Item?</p>
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
                echo "M.toast({html: 'Item salvo com sucesso!', classes: 'rounded'})";
              }else {
                echo "M.toast({html: 'Erro ao salvar o Item!', classes: 'rounded'})";
              }
            }?>
          });
  
        function preencheId(id) {
          let btnSim = document.getElementById("btn-sim");
          btnSim.href = "deletarItem.php?idItem=" + id;
        }
        </script>
  
        </body>
      </html>