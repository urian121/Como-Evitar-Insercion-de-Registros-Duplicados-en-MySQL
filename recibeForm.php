<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include('config.php');
$nombre       = trim($_POST['nombre']);
$apellido     = trim($_POST['apellido']);
$email        = $_POST['email'];
$telefono     = $_POST['telefono'];
$sueldo       = $_POST['sueldo'];

date_default_timezone_set("America/Bogota");
$fecha_ingreso  = date("Y-m-d");

print_r($_POST);

$selectQuery   = ("SELECT email FROM trabajadores WHERE email='{$email}' ");
$query         = mysqli_query($con, $selectQuery);
print $totalCliente  = mysqli_num_rows($query);

//Validamos que la consulta haya retornado información
$jsonData = array();
if( $totalCliente >= 0 ){
$jsonData['success'] = 1;

$InsertCliente = "INSERT INTO trabajadores(nombre, apellido, email, telefono, sueldo, fecha_ingreso) VALUES ('$nombre','$apellido','$email','$telefono', '$sueldo', '$fecha_ingreso')";
$resultadoCliente = mysqli_query($con, $InsertCliente);

} else{
    $jsonData['success'] = ($InsertCliente);
}




//Mostrando mi respuesta en formato Json
header('Content-type: application/json; charset=utf-8');
echo json_encode( $jsonData );

}
?>