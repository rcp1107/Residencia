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
<h4>
    <ul class="nav ">
        <li class="nav-item">
            <a class="nav-link active" onclick="carrucel()">Inicio</i></a>
        </li>
        <!--<a href="#" class="nav-link" data-toggle="modal" data-target=".modal-login">
            <i class="fa fa-user"></i>&nbsp;&nbsp;Coordinación
        </a>-->
        <a class="nav-link" onclick="pintaCoordinacion()">Coordinacion</i></a>

        </li>
        <a class="nav-link" href="#docentes">Docentes</a>
        </li>
        <a class="nav-link" href="#alumnos">Alumnos</a>
        </li>
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
                    <input type="text" class="form-control" id="user" placeholder="Escribe tu nombre" required=""/>
                </div>
                <div class="form-group">
                    <label><span class="glyphicon glyphicon-lock"></span>&nbsp;PASSWORD</label>
                    <input type="password" class="form-control" id="pass" placeholder="Escribe tu contraseña"
                           required=""/>
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

