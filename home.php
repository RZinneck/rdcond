<?php

  session_start();

  require_once('db.class.php'); //arquivo importado para dentro desse script

  if (!isset($_SESSION['usuario'])) {
    header('Location: index.php?erro=1');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>
    <link rel="icon" href="imagens/favicon.png">

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="estilo.css" rel="stylesheet">

    <script type="text/javascript">
      
      //cadastro do nome do apartamento
      $(document).ready(function(){

        $('#btn_ap_nome').click(function(){

          //não deixar executar caso algum campo esteja em branco (medida de segurança)
          if($('#cond_nome').val().length > 0 && $('#cond_andar').val().length > 0){

            $.ajax({
              url: 'inclui_ap.php',
              method: 'POST',
              data: $('#form_ap_nome').serialize(),

              success: function(data){ //após a inserção dos dados, limpar a caixa de texto
                $('#cond_nome').val('');
                $('#cond_andar').val('');
                alert('Dados inseridos com sucesso!');
                window.location.reload();
              }
            });
          }
        });

        //verficar se os campos da aba inserir estão preenchidos
        $('#btn_ap_nome').click(function() {

          var campo_vazio = false;

          if ($('#cond_nome').val() == '') {
              $('#cond_nome').css({'border-color' : '#A94442'});
              campo_vazio = true;
          }
          else {
            $('#cond_nome').css({'border-color' : '#CCC'});
          }

          if ($('#cond_andar').val() == '') {
              $('#cond_andar').css({'border-color' : '#A94442'});
              campo_vazio = true;
          }
          else {
            $('#cond_andar').css({'border-color' : '#CCC'});
          }

          if (campo_vazio) return false;

        });

      });

    </script>

  </head>

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

  <body>

  <?php
  $id_usuario = $_SESSION['id_usuario'];
  $sql = "select * from condominio where sind_fk = '$id_usuario' ";
  $objDb = new db(); //conectando ao banco de dados
  $link = $objDb->conecta_mysql(); //conectando ao banco de dados
  $resultado_id = mysqli_query($link, $sql); //conectando ao banco de dados
  $fk_condominio = mysqli_fetch_array($resultado_id);
  $_SESSION['sind_fk'] = $fk_condominio['sind_fk']; //variavel de sessão $fk_condominio = ao item que está no indice sind_fk do array
  $_SESSION['cond_andar'] = $fk_condominio['cond_andar']; //variavel de sessão $cond_andar = ao item que está no indice cond_andar do array

  $sind_fk = $_SESSION['sind_fk']; //variavel de sessão sendo passada para uma variavel mais facil de ser escrita
  $cond_andar = $_SESSION['cond_andar']; //variavel de sessão sendo passada para uma variavel mais facil de ser escrita
  ?>

    <!-- nav -->
    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">

      <!-- container -->
      <div class="container">
        
        <!-- header -->
        <div class="navbar-header">
          
          <!-- botao toggle (aquele responsivo) -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> <!-- fechar botao toggle (aquele responsivo) -->

          <a href="home.php" class="navbar-brand">
            <span class="img-logo"></span>
          </a>
        </div> <!-- fecha header -->

        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <?php print_r($_SESSION['usuario'])?><span class="caret"></span> <!-- escrevendo o nome do usuario no botão de sair -->
              </a> 
              <ul class="dropdown-menu">
                <li> <a href="sair.php">logout</a> </li>
              </ul>
            </li>
          </ul>          
        </div> <!-- fecha navbar -->
      </div> <!-- fecha container -->
    </nav> <!-- fecha nav -->

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <div class="tela-principal">
      <div class="container">
        <div class="col-md-2"></div>

            <div class="col-md-8">
              <div class="page-header">
                <h3 class="centralizar-texto">Condominio<h3>
              </div>

                <?php
                  if ($sind_fk != 0) {} //deixando a aba 'inserir condominio' ate que o nome e andar seja dado pelo usuario
                  else {                  
                    echo '<div id="aba_inserir"><button class="btn btn5"><a href="#inserir" role="tab" data-toggle="tab">Inserir condomínio</a></button></div>';
                  }
                ?>

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

              <!-- conteúdo das abas -->
              <div class="tab-content">

                <?php  //codigo da aba inserir para que o usuario set o nome e andar
                  if ($sind_fk != 0) {}                  
                  else {
                    echo '<!-- aba inserir -->
                          <div class="tab-pane" role="tabpanel" id="inserir"> <br>
                            <form id="form_ap_nome" class="input-group">
                              <input type="text" id="cond_nome" name="cond_nome" class="form-control" placeholder="Nome do condomínio">
                              <br><br>
                              <input type="text" id="cond_andar" name="cond_andar" class="form-control" placeholder="Quantos andares tem o condomínio?">
                              <br><br>
                              
                              <span class="input-group-btn" >
                                <button class="btn btn5" id="btn_ap_nome" type="button">Inserir</button>
                              </span>

                            </form> <!-- fecha form nome apartamento -->
                          </div> <!-- fecha aba inserir -->';
                        }
                ?>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

          <?php

          require_once('db.class.php'); //arquivo importado para dentro desse script

          $objDb = new db();
          $link = $objDb->conecta_mysql(); //conectando ao banco de dados

          for ($i=1; $i <= $cond_andar ; $i++) {
            $j = $i * 10;
            $ap1 = $j + 1;
            $ap2 = $j + 2;
            $ap3 = $j + 3;
            $ap4 = $j + 4;
            $sql = " insert into unidade(uni_id) values ('$ap1')";

            echo '
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> '.$i.'º andar
                  <span class="caret"></span></button>

                  <ul class="dropdown-menu">                    
                    <li id="ap'.$ap1.'" name="ap'.$ap1.'"> <a href="'.$ap1.'">Apartamento '.$ap1.'</a></li>
                    <li id="ap'.$ap2.'" name="ap'.$ap2.'"> <a href="'.$ap2.'">Apartamento '.$ap2.'</a></li>
                    <li id="ap'.$ap3.'" name="ap'.$ap3.'"> <a href="'.$ap3.'">Apartamento '.$ap3.'</a></li>
                    <li id="ap'.$ap4.'" name="ap'.$ap4.'"> <a href="'.$ap4.'">Apartamento '.$ap4.'</a></li>
                  </ul>

                </div>

                ';
            }
          ?>                
              </div> <!-- fecha conteúdo das abas -->          
            </div> <!-- fecha col-md-6 -->
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

        <div class="col-md-2"></div>
      </div> <!-- fecha container -->
    </div> <!-- fecha tela principal -->

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>