<?php 

include_once '../conexaoBanco.php';


if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "UPDATE games SET `status` = 'F'
                WHERE `id_game` = '$id'";

    $query = $con->query($sql) or die($con->error);

}




?>