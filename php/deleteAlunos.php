<?php 

include_once 'conexaoBanco.php';


if(isset($_REQUEST['id'])){
    $idAluno = $_REQUEST['id'];


    $verifyDeleteAlunos = "SELECT * FROM vendas WHERE alunos_idAluno=".$idAluno;
    $query = $con->query($verifyDeleteAlunos) or die($con->error);
    $linhas=mysqli_num_rows($query);

    if($linhas == 0) {
        $sql = "DELETE FROM alunos WHERE idAluno = '$idAluno'";
        $query = $con->query($sql) or die($con->error);
        echo "true";
    } else {
        echo "false";
    }


    
    
}


?>