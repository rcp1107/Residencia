
<?php
include_once  "Idiomas.php";
$Eng= new Idiomas();


switch($_REQUEST["rutina"]){
    case 'inicio':
        $dato=$_REQUEST['estado'];
        print $Eng->inicio($dato);
        break;
    case 'coordinacion':
        $dato=$_REQUEST['estado'];
        print $Eng->coordinacion($dato);
        break;
    case 'docentes':
        $dato=$_REQUEST['estado'];
        print $Eng->docentes($dato);
        break;
    case 'alumnos':
        $dato=$_REQUEST['estado'];
        print $Eng->alumnos($dato);
        break;
    case 'login':
        print $Eng->login($_REQUEST);
        break;
    case 'listCoordinacion':
        $s=$_REQUEST['estado'];
        print $Eng->pantallaCoordinacion ($s);
        break;
    case 'Teacher_new':
        print $Eng->newTeacherGuardado ($_REQUEST);
        break;
    case 'Teacher_edit':
        print $Eng->editTeacherGuardado ($_REQUEST);
        break;
    case 'pantallaEditarDocente':

        $s=$_REQUEST['id'];
        print $Eng->edicionDocente ($s);
        break;
    case 'student_new':
        print $Eng->newAlumno($_REQUEST);
        break;

}
?>