<?php

include_once '../conexaoBanco.php';

$id = $_POST['games_edit_id'];
$estadio = $_POST['games_edit_estadio'];
$jogador_responsavel = $_POST['games_edit_jogador_responsavel'];
$qtd_pessoas = $_POST['games_edit_qtd_pessoas'];
$preco = $_POST['games_edit_preco'];
$duracao = $_POST['games_edit_duracao'];
$data_partida = $_POST['games_edit_data_partida'];
$forma_pagamento = $_POST['games_edit_forma_pagamento'];



$sql = "UPDATE games SET `game_duration` = '$duracao', `id_stadiumfk` = '$estadio', `id_playersfk` = '$jogador_responsavel', `quantity_peaple` = '$qtd_pessoas', 
                    `price` =  '$preco', `game_date` = '$data_partida' , `payment` = '$forma_pagamento' 
                    WHERE `id_game` = '$id'";

echo $sql;
$query = $con->query($sql) or die ($con->error);





?>
