<?php

function connectDB(){

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "idiomas";


    $conexion = mysqli_connect($server, $user, $pass,$bd);
    if (!$conexion) {
        die("Connection failed: ".mysqli_connect_error());
    }
    echo "Connected successfully";
    mysqli_close($conexion);
} 

?>

<?php

function disconnectDB($conexion){

    $close = mysqli_close($conexion) 
        or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

    return $close;
}

?>
