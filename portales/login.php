<?php


session_start();
include '../funciones/consulSQL.php';
//sleep(2);

$nombre = $_POST['user'];
$clave = $_POST['password'];
$radio = $_POST['radio'];
$user='';

//if (!$nombre == "" && !$clave == "") {
switch ($radio){
    case 'option0':
        $alumno = ejecutarSQL::consultar("select correo,password,id_alumno from alumno where correo='$nombre' and password='$clave'");


        if ($actor = $alumno->fetch_assoc()) {

            $_SESSION['alumno'] = $actor['id_alumno'];
            $_SESSION['id_alumno'] = $user;
          $id= $actor['id_alumno'];
            //echo '<script> location.href="Idiomas.php"; </script>';
          echo $id;
        } else {
           echo 0;
        }
        break;
    case 'option1':
        print 'case'.$radio;
        $docente = ejecutarSQL::consultar("select correo,password,id_docente from docente where correo='$nombre' and password='$clave'");

        if ($row = $docente->fetch_assoc()) {
            $id= $row['id_docente'];
            $_SESSION['docente'] = $nombre;
            $_SESSION['pass_docente'] = $clave;

          //  echo '<script> location.href="Idiomas.php"; </script>';
            echo $id;
        } else {
           echo 0;
        }
        break;
    case 'option2':
        print 'case'.$radio;
        $coor = ejecutarSQL::consultar("select correo,password,id_coordinacion from coordinacion where correo='$nombre' and password='$clave'");
        if ($row = $coor->fetch_assoc()) {
            $id= $row['id_coordinacion'];
            $_SESSION['admin'] = $nombre;
            $_SESSION['pass_admin'] = $clave;
            echo  $id;
           // echo '<script> location.href="Idiomas.php"; </script>';
        } else {
            echo 0;
        }

}
   //}
