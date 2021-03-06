<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CLE</title>
    <script src="./librerias/jQuery/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="./librerias/jQuery/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="./portales/main.js" type="text/javascript"></script>


    <link href="./librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="./librerias/bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="./librerias/jQuery/dist/jquery.mask.min.js"></script>-->
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-light">
    <img src="./img/logotecnm.png" width="20%">

    <img src="./img/logosep.png" width="20%">
    <img src="./img/logoyucatan.png" width="20%">
   <div align="right"> <a href="#" class="table-cell-td " data-toggle="modal" data-target=".modal-login">
        <i class="fa fa-user"></i>&nbsp;&nbsp;Login
    </a></div>
</nav>


<h4>
    <ul class="nav" style="color: #1b1e21" id="cabecera">
        <li class="nav-item">
            <a class="nav-link active" onclick="carrucel()">Inicio</i></a>
        </li>
        <!--<a href="#" class="nav-link" data-toggle="modal" data-target=".modal-login">
            <i class="fa fa-user"></i>&nbsp;&nbsp;Coordinación
        </a>-->
        <li id="li"></li>
        <li class="nav-item">
            <a class="nav-link" href="#">Quejas/Sugerencias</a>
        </li>


    </ul>
</h4>
<div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="modal-form-login">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-primary" id="myModalLabel">LOGIN</h4>
            </div>
            <form>
                <div class="form-group">
                    <label><span class="glyphicon glyphicon-user"></span>&nbsp;USER</label>
                    <input type="text" class="form-control" id="user" placeholder="Escribe tu nombre" required="">
                </div>
                <div class="form-group">
                    <label><span class="glyphicon glyphicon-lock"></span>&nbsp;PASSWORD</label>
                    <input type="password" class="form-control" id="pass" placeholder="Escribe tu contraseña"
                           required="">
                </div>
                <p>¿SELECCIONE?</p>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" value="option0">
                        ALUMNO
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" value="option1">
                        DOCENTE
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" value="option2">
                        COORDINACIÓN
                    </label>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm" data-dismiss="modal" onclick="login()">login</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
                <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
            </form>
        </div>
    </div>
</div>


</body>

</html>

