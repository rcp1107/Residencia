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
    case 'docentes':
        $dato = $_REQUEST['estado'];
        print $Eng->docentes($dato);
        break;
    case 'alumnos':
        $dato = $_REQUEST['estado'];
        print $Eng->alumnos($dato);
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

    case 'pantallaEditarDocente':
        $s = $_REQUEST['id'];
        print $Eng->pantallaEdicionDocente($s);

        break;
    case 'student_new':
        print $Eng->newAlumno($_REQUEST);
        break;
    case 'filtroNombre':
        print $Eng->nombre($_REQUEST);
        break;

    case 'pantallaDocentes':
        print $Eng->pantallaDocente();
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
    case 'guardaNotas':
        print $Eng->guardaNotas($_REQUEST);
        break;
}
?>