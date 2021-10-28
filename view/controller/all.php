<?php
 


session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'googlemotors');





$query = "SELECT * FROM carro";

$result = mysqli_query( $con, $query );
$num= mysqli_num_rows($result);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json );


?>