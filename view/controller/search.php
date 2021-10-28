

<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'googlemotors');


$marca = $_POST['marca'];




$reg= "select * from carro where marca LIKE '$marca%'";
mysqli_query($con,$reg);

$query =  "select * from carro where marca LIKE '$marca%'";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );


?>

