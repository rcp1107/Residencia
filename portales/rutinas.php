
<?php
include_once  "Idiomas.php";
$Eng= new Idiomas();


switch($_REQUEST["rutina"]){
    case 'menu':
        $dato=$_REQUEST['estado'];
        print $Eng->menu($dato);
        break;
    case 'coordinacion':
        $dato=$_REQUEST['estado'];
        print $Eng->coordinacion($dato);
        break;
    case 'docentes':
        $dato=$_REQUEST['estado'];
        print $Eng->docentes($dato);
        break;

}
?>