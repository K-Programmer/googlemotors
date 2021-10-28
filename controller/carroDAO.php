<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'google_motors');

$rs=1;

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];


$reg= "insert into carro (marca, modelo,ano,preco) values ('$marca','$modelo','$ano','$preco')";
mysqli_query($con,$reg);

    echo 0;



?>