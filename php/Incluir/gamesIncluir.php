<?php

include_once '../conexaoBanco.php'; 
 
$estadio = $_POST['games_add_estadio'];
$jogador_responsavel = $_POST['games_add_jogador_responsavel'];
$qtd_pessoas = $_POST['games_add_qtd_pessoas'];
$preco = $_POST['games_add_preco'];
$duracao = $_POST['games_add_duracao'];
$data_partida = $_POST['games_add_data_partida'];
$forma_pagamento = $_POST['games_add_forma_pagamento'];


$sql = "INSERT INTO games (`game_duration`, `id_stadiumfk`, `id_playersfk`, `quantity_peaple`, `price`, `game_date`, `payment` , `status`) 
              VALUES  ('$duracao', '$estadio', '$jogador_responsavel', '$qtd_pessoas', '$preco', '$data_partida', '$forma_pagamento', 'A')";


$query = $con->query($sql) or die ($con->error);


?>