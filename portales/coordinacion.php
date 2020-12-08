<?php include '../head/head.php';
?>
<section id="container-carrito-compras">
    <br><br><br><br><br><br>
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>

<!-- Modal login -->

<!-- Fin Modal login -->
<div id="mobile-menu-list" class="hidden-sm hidden-md hidden-lg">
    <!--<br>
    <h3 class="text-center tittles-pages-logo">ITZIAPAKAL</h3>-->
    <button class="btn btn-default button-mobile-menu" id="button-close-mobile-menu">
        <i class="fa fa-times"></i>
    </button>
    <br><br>
    <ul class="list-unstyled text-center">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="carro.php">Productos</a></li>
        <?php
        if(!$_SESSION['nombreAdmin']==""){
            echo '<li><a href="configAdmin.php">Administración</a></li>';
        }elseif(!$_SESSION['nombreUser']==""){
            echo '
                    <li>
                        <a href="pedido.php">Pedido</a>
                        <a href="book.php" class="table-cell-td">Book</a>
                        <a href="about.php" class="table-cell-td">About</a>
                        <a href="info.php" class="table-cell-td">Información</a>
                        </li>';
        }else{
            echo '
                        <li>
                            <a href="book.php" class="table-cell-td">Book</a>
                            <a href="about.php" class="table-cell-td">About</a>
                            <a href="info.php" class="table-cell-td">Información</a>
                            <a href="registration.php">Registro</a>
                        </li>';
        }
        ?>
    </ul>
</div>
<!-- Modal carrito -->
<div class="modal fade modal-carrito" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center"><i class="fa fa-shopping-cart fa-5x"></i></p>
            <p class="text-center">El producto se añadio al carrito</p>
            <p class="text-center"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Aceptar</button></p>
        </div>
    </div>
</div>
<!-- Fin Modal carrito -->

<!-- Modal logout -->
<div class="modal fade modal-logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center">¿Quieres cerrar la sesión?</p>
            <p class="text-center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
            <p class="text-center">
                <a href="process/logout.php" class="btn btn-primary btn-sm">Cerrar la sesión</a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            </p>
        </div>
    </div>
</div>
<!-- Fin Modal logout -->
