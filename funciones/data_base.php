<?php
class dbase{
    function connectDB(){

        $server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "idiomas";
    
    
        $conexion = mysqli_connect($server, $user, $pass,$bd) 
            or die("Ha sucedido un error inexperado en la conexion de la base de datos");
    
        return $conexion;
    } 
    
    function disconnectDB($conexion){
    
        $close = mysqli_close($conexion) 
            or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
    
        return $close;
    }
    //connectDB();
    

}

?>
