<?php

include_once '../conexaoBanco.php';

$id = $_POST['jogadores_edit_id'];
$jogadores_nome = strtoupper($_POST['jogadores_edit_nome']);
$jogadores_sobrenome = strtoupper($_POST['jogadores_edit_sobrenome']);
$name = $jogadores_nome . ' ' . $jogadores_sobrenome;

$jogadores_cpf = $_POST['jogadores_edit_cpf'];
$jogadores_cep = $_POST['jogadores_edit_cep'];
$jogadores_cidade = $_POST['jogadores_edit_cidade'];
$jogadores_bairro = $_POST['jogadores_edit_bairro'];
$jogadores_rua = $_POST['jogadores_edit_rua'];
$jogadores_numero = $_POST['jogadores_edit_numero'];
$jogadores_sexo = $_POST['jogadores_edit_sexo'];
$jogadores_altura = $_POST['jogadores_edit_altura'];
$jogadores_data_nascimento = $_POST['jogadores_edit_data_nascimento'];
$jogadores_whatssap = $_POST['jogadores_edit_whatssap'];



$sql = "UPDATE players SET `name` = '$name',`whatssap` = '$jogadores_whatssap', `cpf` = '$jogadores_cpf', `zipcode` = '$jogadores_cep', `city` = '$jogadores_cidade', 
                    `neighborhood` =  '$jogadores_bairro', `street` = '$jogadores_rua', `number` = '$jogadores_numero', `gender` = '$jogadores_sexo' 
                    , `birthdate` = '$jogadores_data_nascimento', `height` = '$jogadores_altura'
                    WHERE `id_players` = '$id'";

echo $sql;
$query = $con->query($sql) or die ($con->error);





?>
