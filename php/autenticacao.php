<?php

require_once("conexaoBanco.php");

$nomeUsuario=$_POST['nomeUsuario'];
$senha=$_POST['senha'];
$senhaMD5=md5($senha);

$comando="SELECT * FROM users WHERE user_name='".$nomeUsuario."' AND password='".$senhaMD5."' ";


$resultado=mysqli_query($con,$comando);
$linhas=mysqli_num_rows($resultado);


if($linhas==0){
    header('Location: ../index.php?return=false');
    
} else {

    $usuario=mysqli_fetch_assoc($resultado);
    session_start();
    $_SESSION['nivel']=$usuario['nivel'];
    
    if($usuario['nivel']=='1'){
        header("Location: indexGames.php");
    }else{
        header("Location: indexGames.php");
    }
}

?>

