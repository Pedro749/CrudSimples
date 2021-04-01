<?php
// fazendo conexão com o banco de dados
$servername = "localhost";
$username="root";
$password = "";
$dbname = "users";

$connect = mysqli_connect($servername,$username,$password,$dbname);
// verificando se ouve algum erro ao conectar com o banco de dados
if(mysqli_connect_error()){
    echo "Erro" . mysqli_connect_error();
}