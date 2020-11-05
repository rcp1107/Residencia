<?php
//require ("funciones/data_base.php");

    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "idiomas";


    $conexion = mysqli_connect($server, $user, $pass,$bd, die("correcto")) 
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");

    return $conexion;

//Recibimos las dos variables
$usuario=$_POST["user"];
$password=$_POST["pass"];
 
/* Realizamos una consulta por cada tabla para buscar en que tabla se encuentra 
el usuario que está intentando acceder */
$alumno = mysqli_query($conexion,"SELECT matricula,password FROM alumno WHERE matricula = '$usuario' AND password = '$password'");
$docente = mysqli_query($conexion,"SELECT * FROM docente WHERE correo = '$usuario' AND password = '$password'");
$coordinacion = mysqli_query($conexion,"SELECT * FROM coordinacion WHERE correo = '$usuario' AND password = '$password'");

/* Sabemos que en el caso que exista el usuario se encontrará en una de estas 
tres tablas, por lo tanto se guardará en alguno de nuestras tres variables 
que guardan nuestra consulta */
 
/* Ahora comprobamos que variable contiene al usuario*/
if(mysqli_num_rows($alumno) > 0) 
{
    /* Si entra en este if significa que el que intenta acceder es un alumno, 
    por lo tanto le creamos una sesión */
    session_start();
    echo "aqui";
 
    $_SESSION['alumno']="$usuario";
 
    /* Nos dirigimos al espacio de los alumnos usando header que nos 
    redireccionará a la página que le indiquemos */
    header("Location: portales/alumnos.php");
 
    /* terminamos la ejecución ya que si redireccionamos ya no nos interesa 
    seguir ejecutando código de este archivo */
    exit(); 
}
 
/* Ahora comprobamos si el que intenta acceder es un profesor */
else if($docente> 0) 
{
    session_start();
    $_SESSION['docente']="$usuario";
    header("Location: portales/maestros.html");
    exit(); 
}
 
//comprobamos si es un director el que intenta abrir la sesión
else if($coordinacion > 0) 
{
    session_start();
    $_SESSION['coordinacion']="$usuario";
    header("Location: portales/coordinacion.html");
    exit();
} 
else 
{
   /* Si no el usuario no se encuentra en ninguna de las tres tablas 
   imprime el siguiente mensaje */
   $mensajeaccesoincorrecto = "El usuario y la contraseña son incorrectos, por favor vuelva a introducirlos.";
   echo $mensajeaccesoincorrecto; 
}
?>
