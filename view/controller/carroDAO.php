<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'googlemotors');

$rs=1;

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];


$reg= "insert into carro (marca, modelo,ano,preco) values ('$marca','$modelo','$ano','$preco')";
mysqli_query($con,$reg);

$query = "SELECT * FROM carro";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );


?>