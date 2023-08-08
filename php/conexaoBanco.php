<?php

$usuario="root";
$senha="";
$local="localhost";
$banco="volei_database";

$con=mysqli_connect($local,$usuario,$senha,$banco);
mysqli_set_charset($con,"utf8");

?>