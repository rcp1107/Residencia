<?php
include_once "Idiomas.php";


$Eng = new Idiomas();
switch ($_REQUEST["rutina"]) {
    case 'inicio':
        $dato = $_REQUEST['estado'];
        print $Eng->inicio($dato);
        break;
    case 'coordinacion':
        $dato = $_REQUEST['estado'];
        print $Eng->coordinacion($dato);
        break;

    case 'alumnos':
        $dato = $_REQUEST['estado'];
        print $Eng->alumnos($dato);
        break;
    case 'eliminarAlumno':
        print $Eng->eliminarAlumno($_REQUEST);
        break;

    case 'pantallaEditarAlumno':
        print $Eng->editarAlumno($_REQUEST);
        break;
    case 'login':

        //print $Eng->login($_REQUEST);
        break;
    case 'listCoordinacion':
        $s = $_REQUEST['estado'];
        print $Eng->pantallaCoordinacion($s);
        break;
    case 'datosTeaher':
        print $Eng->newTeacherGuardado($_REQUEST);
        break;
    case 'eliminarDocente':
        print $Eng->elimarDocente($_REQUEST);
        break;
    case 'pantallaEditarDocente':
        $s = $_REQUEST['id'];
        print $Eng->pantallaEdicionDocente($s);

        break;
    case 'student_new':
        print $Eng->newAlumno($_REQUEST);
        break;
    case 'filtroNombre':
        $carrera=$_REQUEST['carrera'];
        print $Eng->nombre($carrera);
        break;

    case 'pantallaDocentes':
        $id=$_REQUEST['user'];
        print $Eng->pantallaDocente($id);
        break;
    case 'listaGrupo':
        print  $Eng->listAlum($_REQUEST);
        break;
    case 'listaGrupoC':
        print $Eng->listAlumnC($_REQUEST);
        break;
    case 'misNotas':
        print $Eng->misNotas($_REQUEST);
        break;
    case 'editNotas':
        print $Eng->guardaNotas($_REQUEST);
        break;
    case 'asignaGrupo':
        print $Eng->asignaGrupo($_REQUEST);
        break;
    case 'constacia':
        print $Eng->constacia($_REQUEST);
        break;
}
?>