<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BIENVENIDOS</title>
<script src="librerias/jQuery/js/jquery-3.5.1.min.js"></script>
<link href="librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="librerias/bootstrap/js/bootstrap.min.js"></script>

<script src="librerias/jQuery/dist/jquery.mask.min.js"></script>
<link rel="stylesheet" href="fontawesome/css/all.min.css">
<script type="text/javascript" src="portales/main.js"></script>


<!------ Include the above in your HEAD tag ---------->
<head>
  
      <ul class="nav ">
         <li class="nav-item">
           <a class="nav-link active" href="#inicio" >Inicio</i></a>
         </li>
          <a class="nav-link" href="#coordinacion" >Coordinación </a>
         </li>
          <a class="nav-link" href="#docentes">Docentes</a>
         </li>
          <a class="nav-link" href="#alumnos">Alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Quejas/Sugerencias</a>
          </li>
        
       </ul>
   

</head>
<body>
   <form>
      <div id="ventana">
         <div class="tab-pane fade show active" id="inicio" role="tabpanel"aria-labelledby="inicio-tab">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                 <div class="carousel-item active">
                   <img src="./img/i1.png" class="d-block w-100" alt="...">
                 </div>
                 <div class="carousel-item">
                   <img src="./img/i2.png" class="d-block w-100" alt="...">
                 </div>
                 <div class="carousel-item">
                   <img src="./img/i3.png" class="d-block w-100" alt="...">
                 </div>
               </div>
               <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
               </a>
             </div>
      
            
         </div>

         <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                    <div class="wrapper fadeInDown">
                     <div id="formContent">
                       <!-- Tabs Titles -->
                       <div class="login">
                        <h2 class= "loginin">Login </h2>

                    <form >
                      <label class=" loginin"> User:</label>
                      <input class="form-control loginin" name="username" type="text" id="username" required>
                      <label class="loginin">Password:</label>
                      <input class="form-control loginin" name="password" type="password" id="password" required>
                     <button class="btn btn-autline-default" onclick="menu()">login</button>
                             
                  </form>


                    </div>
                   
                     </div>
                   </div>
            
            </div>
          </div>

      </div>


</form>

</body>

</html>