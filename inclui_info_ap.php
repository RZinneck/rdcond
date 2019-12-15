<?php

  session_start();

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

    <title>Finanças</title>
    <link rel="icon" href="imagens/favicon.png">

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- bootstrap - link cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="estilo.css" rel="stylesheet">

  </head>

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

  <body>

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
            <li><a href="home.php">home</a></li>
            <li><a href="apartamentos.php">apartamentos</a></li>
            <li><a href="financas.php">finanças</a></li>

            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown">
                minha conta <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu">
                <li> <a href="">editar</a> </li>
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
      <div class="col-md-3">
        </div>

          <div class="col-md-6">
            <div class="page-header">
              <h3 class="centralizar-texto">Finanças</h3>
            </div>
                <form method="post" action="inclui_info.php" class="modal fade in" id="info_ap">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                      <!-- cabecalho -->
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span> 
                        </button>
                        <h4 class="modal-title">Adicionar responsável</h4>
                      </div> <!-- fecha cabecalho -->

                      <!-- corpo -->
                      <div class="modal-body">
                        <div class="form-group">
                          <input type="text" class="form-control" id="morador" name="morador" placeholder="Nome do responsável" required="requiored">
                        </div>

                      <div class="form-group">
                        <input type="Telefone" class="form-control" id="telefone" name="telefone" placeholder="Telefone: (11)11111-1111" required="requiored">
                      </div>
                    </div> <!-- fecha corpo -->

                    <!-- rodape -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary form-control">
                        Cadastrar
                      </button>
                    </div> <!-- fecha rodape -->

                    </div>
                  </div>
                </form> <!-- fecha formulario de cadastro -->
          </div>

        <div class="col-md-3">
      </div>
    </div>
  </div>

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <!-- rodape -->
    <footer id="rodape">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">        

          <div class="col-md-4">
            <h4>links uteis</h4>
            <ul class="nav">
              <li class="alinhar-esquerda"><a href="">Quem somos</a></li>
              <li class="alinhar-esquerda"><a href="">Ajuda</a></li>
              <li class="alinhar-esquerda"><a href="">Contato</a></li>
            </ul>
          </div>

          <div class="col-md-8">
            <ul class="nav">              
              <li class="alinhar-direita"><a href=""><img src="imagens/twitter.png"></a></li>
              <li class="alinhar-direita"><a href=""><img src="imagens/instagram.png"></a></li>
              <li class="alinhar-direita"><a href=""><img src="imagens/facebook.png"></a></li>
            </ul>
          </div>

        </div> <!-- fecha row -->
      </div> <!-- fecha container -->
    </footer> <!-- fecha rodape -->

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
  </body>
</html>