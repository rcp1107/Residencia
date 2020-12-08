
<?php
include '../funciones/consulSQL.php';
class Idiomas
{
    public function inicio()
    {

        $html = '
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
';

        return $html;
    }

    public function coordinacion($id)
    {
      $html='
      <div class="row">
         <div class="col-2 bg-black position-sticky">
            <ul class="nav flex-column" >
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#list1" aria-controls="list1" onclick="listCoordinacion(1)" >Docentes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#list2" aria-controls="list2" onclick="listCoordinacion(2)">Alumnos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#list3" aria-controls="list3" onclick="listCoordinacion(3)>Constancia</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#list4" aria-controls="list4" onclick="listCoordinacion(4)>Pendientes</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#list5" aria-controls="list5" onclick="listCoordinacion(5)>Tools</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#">Carrucel</a>
              </li>
            </ul>
      </div>
   

      
      
      
      <div class="col-10 tab-content" id="vistaCoordinacion">
              <div class="tab-pane fade show active" role="tabpanel" id="list1" aria-labelledby="list1">
              
                 <h4>Teacher List</h4> 
              <div align="right" class="py-2"><button class="btn btn-secondary" onclick="newTeacher()">Add teacher</button></div>
                 <table class="table table-bordered">
                   <thead>
                     <th>Teacher</th>
                     <th>Emai</th>
                     <th>Groups</th>
                     <th>Action</th>
                     
                   </thead>
                   <tbody>
                   
                   </tbody>
                 </table>
                 
                 
               </div>
                 <div id="list2" class="tab-pane fade" role="tabpanel" aria-labelledby="list2">
                    <h4>Lista de alumnos</h4>              
                 </div>
                 <div id="list3" class="tab-pane fade" role="tabpanel" aria-labelledby="list3">
                    <h4>Constancias</h4>              
                 </div>
                 <div id="list4" class="tab-pane fade" role="tabpanel" aria-labelledby="list4">
                    <h4>Pendientes</h4>              
                 </div>
                 <div id="list5" class="tab-pane fade" role="tabpanel" aria-labelledby="list5">
                    <h4>Tools</h4>              
                 </div>
             
      </div>
        
      
    </div>
      ';
     return $html;
    }
    public function pantallaCoordinacion($s){
         switch ($s){
         case '1':
             $query='SELECT * FROM ';
         }
        // $verUser = ejecutarSQL::consultar("select * from coordinacion where correo='$nombre' and password='$clave'");

       // $UserC = mysqli_num_rows($verUser);
        //if ($UserC > 0) {
         //return 1;
           // }else{
             //  return  0;
            //}


       // }

    }

    public function docentes($request)
    {

        $html = '
      <div class="row">
        <div class="col-3">
        <ul class="list-group">
          <li class="list-group-item active">Alumno</li>
          <li class="list-group-item">Calificaciones</li>
          <li class="list-group-item">Grupo</li>
          <li class="list-group-item">Aviso</li>
          <li class="list-group-item">Tools</li>
        </ul>
        
        </div>
        <div class="col-9"></div>
      
      </div>
  
  
  ';

        return $html;
    }

    public function login($request)
    {
        $nombre = $request['user'];
        $clave = $request['password'];
        $verUser = ejecutarSQL::consultar("select * from coordinacion where correo='$nombre' and password='$clave'");

        $UserC = mysqli_num_rows($verUser);
        if ($UserC > 0) {
         return 1;
            }else{
               return  0;
            }


        }
}
?>
