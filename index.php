<?php

  $erro_usuario = isset($_GET['erro_usuario'])  ? $_GET['erro_usuario'] : 0;
  $erro_email =   isset($_GET['erro_email'])    ? $_GET['erro_email']   : 0;
  
  $erro = isset($_GET['erro']) ? $_GET['erro'] : 0; //identificando o erro no login

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RD Cond</title>
    <link rel="icon" href="imagens/favicon.png">

    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">

    <script>
      $(document).ready( function() {

        //verficar se os campos de usuario e senha estão preenchidos
        $('#btn_login').click(function() {

          var campo_vazio = false;

          if ($('#campo_usuario').val() == '') {
              $('#campo_usuario').css({'border-color' : '#A94442'});
              campo_vazio = true;
          }
          else {
            $('#campo_usuario').css({'border-color' : '#CCC'});
          }

          if ($('#campo_senha').val() == '') {
              $('#campo_senha').css({'border-color' : '#A94442'});
              campo_vazio = true;
          }
          else {
            $('#campo_senha').css({'border-color' : '#CCC'});
          }

          if (campo_vazio) return false;

        });

      });
    </script>

  </head>

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

  <body class="capa-index">

    <!-- formulario de login -->
    <!-- metodo post e action, definem como e para onde sera enviado os dados de cadastro do formulario -->
    <form method="post" action="validar_acesso.php" class="modal fade" id="logar">        
        <div class="modal-dialog modal-sm">
          <div class="modal-content">

            <!-- cabecalho -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
              <h4 class="modal-title">Já possui uma conta?</h4>
            </div> <!-- fecha cabecalho -->

            <!-- corpo -->
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário">
              </div>
              <div class="form-group">
                <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha">
              </div>

                <!-- caso o usuario ou senha tenha sido digitado errado, 
                aparecer a mensagem abaixo dentro da caixa de formulario -->
                <?php
                  if ($erro == 1) {
                    echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
                  }
                ?>

            </div> <!-- fecha corpo -->

            <!-- rodape -->
            <div class="modal-footer">
              <button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>
            </div> <!-- fecha rodape -->

          </div>
        </div>
      </form> <!-- fecha formulario de login -->

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

      <!-- formulario de cadastro -->
      <!-- metodo post e action, definem como e para onde sera enviado os dados de cadastro do formulario -->
      <form method="post" action="registra_usuario.php" class="modal fade in" id="cadastrar">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            
            <!-- cabecalho -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span> 
              </button>
              <h4 class="modal-title">Inscrever-se</h4>
            </div> <!-- fecha cabecalho -->

            <!-- corpo -->
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
              <?php
                  if ($erro_usuario) {
                    echo '<font style="color:#FF0000"> Usuário já existe</font>';
                  }
              ?>
              </div>

              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required="requiored">
              <?php
                  if ($erro_email) {
                    echo '<font style="color:#FF0000"> E-mail já cadastrado</font>';
                  }
              ?>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
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

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

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

          <a href="index.php" class="navbar-brand">
            <span class="img-logo"></span>
          </a>
        </div> <!-- fecha header -->

        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="" data-toggle="modal" data-target="#cadastrar">Inscrever-se</a></li>
            <li><a href="" data-toggle="modal" data-target="#logar">Entrar</a></li>
          </ul>
        </div> <!-- fecha navbar -->
      </div> <!-- fecha container -->
    </nav> <!-- fecha nav -->

<!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <div class="capa"> <!-- corpo vazio -->
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>