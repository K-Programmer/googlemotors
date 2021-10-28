

<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'googlemotors');


$cid = $_POST['cid'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$preco = $_POST['preco'];



$reg= "update carro set marca='$marca',modelo='$modelo',ano='$ano',preco='$preco'  where cid = '$cid'";
mysqli_query($con,$reg);

$query = "SELECT * FROM carro";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );


?>

