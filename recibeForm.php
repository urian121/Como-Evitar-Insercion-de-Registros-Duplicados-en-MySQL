<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
sleep(2);

    include('config.php');
    $nombre       = trim($_POST['nombre']);
    $apellido     = trim($_POST['apellido']);
    $email        = trim($_POST['email']);
    $telefono     = trim($_POST['telefono']);
    $sueldo       = trim($_POST['sueldo']);

    date_default_timezone_set("America/Bogota");
    $fecha_ingreso  = date("Y-m-d");

    /**Importante: Antes de hacer cualquier acción verifico si existe algún registro con
     * información  igual a la que esta llegando desde el formulario.
    */
    $selectQuery   = ("SELECT email FROM trabajadores WHERE email='{$email}' ");
    $query         = mysqli_query($con, $selectQuery);
    $totalCliente  = mysqli_num_rows($query);

    /**Caso 1: Existe el registro */
    if ($totalCliente >= 1) {
        $updateCliente = ("UPDATE  trabajadores
            SET nombre   ='$nombre',
                apellido ='$apellido',
                email    ='$email',
                telefono ='$telefono',
                sueldo   ='$sueldo',
                fecha_ingreso=CURDATE()
                ");
        $resultadoCliente = mysqli_query($con, $updateCliente);    
        echo 'exitoUpdate';
    } else {
        /**Caso 2: No existe, creo el registro */
        $InsertCliente = "INSERT INTO trabajadores(nombre, apellido, email, telefono, sueldo, fecha_ingreso) 
            VALUES ('$nombre','$apellido','$email','$telefono', '$sueldo', CURDATE())";
        $resultadoCliente = mysqli_query($con, $InsertCliente); 
        echo 'exitoInsert';
    }

}
