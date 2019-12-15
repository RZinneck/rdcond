<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.class.php');

    $cond_nome = $_POST['cond_nome'];
    $cond_andar = $_POST['cond_andar']; //valores passados por meio do metodo serialize

    $id_usuario = $_SESSION['id_usuario'];

    if($id_usuario == '') {
        die();
    }

    $objDb = new db();
    $link = $objDb->conecta_mysql();
 

    $sql = "INSERT INTO condominio (cond_nome, cond_andar, sind_fk) values ('$cond_nome', '$cond_andar', '$id_usuario')";

    mysqli_query($link, $sql);

?>