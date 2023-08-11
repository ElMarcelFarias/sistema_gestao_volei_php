<?php

include_once '../conexaoBanco.php'; 
 
$jogadores_nome = strtoupper($_POST['jogadores_add_nome']);
$jogadores_sobrenome = strtoupper($_POST['jogadores_add_sobrenome']);
$name = $jogadores_nome . ' ' . $jogadores_sobrenome;

$jogadores_cpf = $_POST['jogadores_add_cpf'];
$jogadores_cep = $_POST['jogadores_add_cep'];
$jogadores_cidade = $_POST['jogadores_add_cidade'];
$jogadores_bairro = $_POST['jogadores_add_bairro'];
$jogadores_rua = $_POST['jogadores_add_rua'];
$jogadores_numero = $_POST['jogadores_add_numero'];
$jogadores_sexo = $_POST['jogadores_add_sexo'];
$jogadores_altura = $_POST['jogadores_add_altura'];
$jogadores_data_nascimento = $_POST['jogadores_add_data_nascimento'];
$jogadores_add_whatssap = $_POST['jogadores_add_whatssap'];



$sql = "INSERT INTO players (`name`, `whatssap`, `cpf`, `zipcode`, `city`, `neighborhood`, `street`, `number`, `gender`, `birthdate`, `height`, `status`) 
              VALUES  ('$name', '$jogadores_add_whatssap', '$jogadores_cpf', '$jogadores_cep', '$jogadores_cidade', '$jogadores_bairro', '$jogadores_rua', 
                       '$jogadores_numero', '$jogadores_sexo', '$jogadores_data_nascimento', '$jogadores_altura', 'A')";

$query = $con->query($sql) or die ($con->error);


?>