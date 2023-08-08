<?php 

include_once '../conexaoBanco.php';


if(isset($_REQUEST['id'])){
    $idJogador = $_REQUEST['id'];


    $verifyDeleteJogador = "SELECT * FROM games WHERE id_playersfk=".$idJogador;
    $query = $con->query($verifyDeleteJogador) or die($con->error);
    $linhas=mysqli_num_rows($query);

    if($linhas == 0) {
        $sql = "UPDATE players SET `status` = 'F'
                WHERE `id_players` = '$idJogador'";
        $query = $con->query($sql) or die($con->error);
        echo "true";
    } else {
        echo "false";
    }

    
}


?>