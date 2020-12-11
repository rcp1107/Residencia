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
        $html = '
<aside class="bs-sidenav">
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
                <a class="nav-link" href="#list3" aria-controls="list3" onclick="listCoordinacion(3)">Constancia</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#list4" aria-controls="list4" onclick="listCoordinacion(4)">Pendientes</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#list5" aria-controls="list5" onclick="listCoordinacion(5)">Tools</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="#">Carrucel</a>
              </li>
            </ul>
      </div>  
</form>
         
      
      <div class="col-10 tab-content" id="vistaCoordinacion">
            ' . $this->listDocentes() . '  
            
             
      </div>
        
      
    </div>
      ';
        return $html;
    }

    public function pantallaCoordinacion($s)
    {

        switch ($s) {
            case '1':
                $return = $this->listDocentes();
                break;
            case '2':
                $return = $this->listAlumnos();
                break;
            case '3':
                $return = 'llenar datos para constancia';
                break;
            case '4':
                $return = $this->pendientes();
                break;

        }
        return $return;

    }

    private function nivel()
    {
        $niv = '';
        $nivel = ejecutarSQL::consultar("select * from nivel");
        while ($row = mysqli_fetch_array($nivel)) {
            $niv .= '<option value=' . $row['id_nivel'] . '>' . $row['nivel'] . '</option>';

        }
        return $niv;

    }

    private function listDocentes()
    {
        $td = '';
        $modal = '';
        $verDocentes = ejecutarSQL::consultar("select * from docente where status='1'");
        while ($row = mysqli_fetch_array($verDocentes)) {
            $id_docente = $row['id_docente'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido_p'] . ' ' . $row['apellido_m'];
            $correo = $row['correo'];
            $button = '
            <button onclick="editarDocente('.$id_docente.')" class="btn-warning">
                <a href="#" data-toggle="modal" data-target=".editDoc"><li class="fa fa-edit"></li></a>
            </button>
            <button onclick="alerta('.$id_docente.')" class="btn-outline-danger">
            <li class="fa fa-trash"></li></button>
                   ';
            $td .= '
                      <tr>
                          <td>' . $nombre . '</td>
                          <td>' . $apellido . '</td>
                          <td>' . $correo . '</td>
                          <td>' . $button . '</td>
                        
                      </tr>
               ';

        }


        $html = '
            <div class="tab-pane fade show active" role="tabpanel" id="list1" aria-labelledby="list1">
              <div align="right" class="py-2">
                     <button type="button" class="btn btn-secondary" >
            <a href="#" class="nav-link" data-toggle="modal" data-target=".modal-addT">
            <i class="fa fa-user"></i>Agregar Docente</button></a>
            </div>
                 <h4>Teacher List</h4> 
                     
                     <table class="table table-bordered">
                     <thead>
                         <tr>
                         
                     <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                   <tbody>
                     ' . $td . '
                   </tbody>
                 </table>        
               </div>
               
               <!-- Button trigger modal -->
            
        

            
            <!-- Modal REGISTRAR-->
          
            <div class="modal fade modal-addT" id="addTeacher" data-action="new" tabindex="-1" aria-labelledby="addTeacherLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Docente</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                  </div>
                              <!-- Modal Body -->

                  <div class="modal-body">
                    <p class="statusMsg"></p>
                  <form role="form">
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="inputName_new" placeholder="Ingrese su nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputApP">Apellido paterno</label>
                        <input type="text" class="form-control" id="inputApP_new" placeholder="Ingrese el apellido paterno"/>
                    </div>
                    <div class="form-group">
                        <label for="inputApP">Apellido materno</label>
                        <input type="text" class="form-control" id="inputApM_new" placeholder="Ingrese el apellido materno"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">correo</label>
                        <input type="email" class="form-control" id="inputEmail_new" placeholder="Se utilizará como usuario de acceso"/>
                    </div>
                    <div class="form-group">
                        <label for="inputTel">Teléfono</label>
                        <input type="text" class="fa-newspaper-o" id="inputTel_new" placeholder="Ingrese teléfono"/>
                    </div>
                    <div class="form-group">
                        <label for="inputPass">Contraseña</label>
                        <input type="password" class="form-control" id="inputPass_new" placeholder="Ingrese su contraseña"></input>
                    </div>
                    <div class="form-group">
                        <label for="inputPass1">Contraseña</label>
                        <input type="password" class="form-control" id="inputPass1_new" placeholder="Repita su contraseña"></input>
                    </div>
                </form>

                  </div>
                  <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="addTeacher" data-action="new" type="button" class="btn btn-primary" onclick="newTeacher(0)">Guardar</button>
            </div>
                </div>
              </div>
            </div>
            
            
            <!--MODAL EDICION DOCE-->
            <div class="modal fade editDoc" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Modal with Dynamic Content</h4>
            </div>
            <div class="modal-body" id="datosmodal">
           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="addTeacher" type="button" class="btn btn-primary submitBtn" onclick="newTeacher(1)" data-action="edit">Actualizar</button>

            </div>
        </div>
    </div>
</div>
            
           
           
               
               
            ';
        return $html . $modal;
    }

    private function carreras()
    {
        $opcion = '';
        $carrera = ejecutarSQL::consultar("select * from carreras");
        while ($row = mysqli_fetch_array($carrera)) {
            $opcion .= '<option value=' . $row['id_carrera'] . '>' . $row['carrera'] . '</option>';

        }
        return $opcion;

    }

    private function listAlumnos()
    {
        $td = '';
        $modal = '';
        $verAlum = ejecutarSQL::consultar("select * from vista_alumnos");

        while ($row = mysqli_fetch_array($verAlum)) {
            $id_Alumno = $row['id_alumno'];
            $nombre = $row['nombre'];
            $apellido = $row['apellidos'];
            $correo = $row['correo'];
            $carrera = $row['carrera'];
            $nivee = $row['nivel'];

            $button = '
           <button id="edit" class="btn-outline-warning" >
          <li class="fa fa-edit">        
            </li> 
            </button>
           <btn id="delete' . $id_Alumno . '" class="btn-outline-danger">
           <li class="fa fa-trash"></li></btn>
                   ';
            $td .= '
                      <tr>
                          <td>' . $nombre . '</td>
                          <td>' . $apellido . '</td>
                          <td>' . $correo . '</td>
                          <td>' . $carrera . '</td>
                          <td>' . $nivee . '</td>
                          <td>' . $button . '</td>
                      </tr>
               ';

        }


        $html = '
            <div class="tab-pane fade show active" role="tabpanel" id="list2" aria-labelledby="list2">
              <div align="right" class="py-2">
                     <button type="button" class="btn btn-secondary" >
            <a href="#" class="nav-link" data-toggle="modal" data-target=".modal-addS">
            <i class="fa fa-user"></i>Agregar Alumno</button></a>
            </div>
                 <h4>Lista Estudiantes</h4> 
                     
                     <table class="table table-bordered">
                     <thead>
                         <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Carrera</th>
                        <th>Nivel</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                   <tbody>
                     ' . $td . '
                   </tbody>
                 </table>        
               </div>
               
               <!-- Button trigger modal -->
            
        

            
            <!-- Modal -->
          
            <div class="modal fade modal-addS" id="addStudent" data-action="new" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dar de Alata Estudiante</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                  </div>
                              <!-- Modal Body -->

                  <div class="modal-body">
                    <p class="statusMsg"></p>
                  <form role="form">
                    <div class="form-group">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Ingrese su nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="inputApP">Apellido paterno</label>
                        <input type="text" class="form-control" id="inputApP" placeholder="Ingrese el apellido paterno"/>
                    </div>
                    <div class="form-group">
                        <label for="inputApP">Apellido materno</label>
                        <input type="text" class="form-control" id="inputApM" placeholder="Ingrese el apellido materno"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">correo</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="Se utilizará como usuario de acceso"/>
                    </div>
                    <div class="form-group">
                        <label for="inputTel">Teléfono</label>
                        <input type="text" class="fa-newspaper-o" id="inputTel" placeholder="Ingrese teléfono"/>
                    </div>
                       <div class="form-group">
                        <label for="inputCarrera">Carrera</label>
                        <select type="text" class="form-control" id="inputCarrera" placeholder="Seleccione carrera">
                        <option>Seleccione carrera</option>
                        ' . $this->carreras() . '</select>
                    </div>
                       <div class="form-group">
                        <label for="inputNivel">Nivel</label>
                        <select type="text" class="form-control" id="inputNivel" placeholder="Seleccione Nivel">
                                               <option>Seleccione nivel</option>
                                                                       ' . $this->nivel() . '</select>


                    </div>
                    <div class="form-group">
                        <label for="inputPass">Contraseña</label>
                        <input type="password" class="form-control" id="inputPass" placeholder="Ingrese su contraseña"></input>
                    </div>
                    <div class="form-group">
                        <label for="inputPass1">Contraseña</label>
                        <input type="password" class="form-control" id="inputPass1" placeholder="Repita su contraseña"></input>
                    </div>
                </form>

                  </div>
                  <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary submitBtn" data-action="newStudent" onclick="datosAlumnos()" >Guardar</button>
            </div>
                </div>
              </div>
            </div>
           
               
            ';
        return $html;
    }


    private function pendientes()
    {
        $html = '
                 <div class="tab-pane fade show active" role="tabpanel" id="list1" aria-labelledby="list4">
              
                 <h4>Slopes</h4> 
                     <div align="right" class="py-2"><button class="btn btn-secondary" onclick="newSlope()">Add Slope</button></div>
                     <table class="table table-bordered">
                     <thead>
                        <th>Slopes</th>
                        <th>Date</th>
                        <th>Action</th>
                      </thead>
                   <tbody>
                   
                   </tbody>
                 </table>        
               </div>
            ';
        return $html;
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
        } else {
            return 0;
        }


    }

    public function newTeacherGuardado($request)
    {
        $tipo=$request['tipo'];
        $nombre = $request['nombre'];
        $apP = $request['apP'];
        $apM = $request['apM'];
        $email = $request['email'];
        $telefono = $request['tel'];
        $pass = $request['pass'];

        if($tipo=='new') {


            if (consultasSQL::InsertSQL("docente", "nombre, apellido_p, apellido_m, correo, telefono, password",
                "'$nombre','$apP','$apM','$email','$telefono', '$pass'")) {
                echo "El registro se completo con éxito";
            } else {
                echo "Ha ocurrido un error\nPor favor intente nuevamente";
            }
        }else{
            $id=$request['id'];
            if($tipo=='edit'){

                if(consultasSQL::UpdateSQL("docente",
                    "nombre='$nombre', apellido_p='$apP', apellido_m='$apM', correo='$email', telefono='$telefono', password='$pass'",
                    "id_docente='$id'" )){
                    echo "correcto";

                }

            }

        }

    }
    public function elimarDocente($request){
        $id=$request['id'];
        $status=$request['status'];
        if(consultasSQL::UpdateSQL("docente",
            "status='0'",
            "id_docente='$id'"));
        echo "eliminado";

    }
    public function editTeacherGuardado(){

    }

    public function pantallaEdicionDocente($id)
    {
        $verDocentes = ejecutarSQL::consultar("select * from docente where id_docente=$id",array($id),1);
if($row = mysqli_fetch_array($verDocentes)){

            $nombre = $row['nombre'];
            $apellido = $row['apellido_p'];
            $apellido_m=$row['apellido_m'];
            $correo=$row['correo'];
            $telefono=$row['telefono'];
            $password = $row['password'];


        }
$modal1='
<div class="modal-body">
<input id="edicion" type="hidden" value="'.$id.'">
                    <p class="statusMsg"></p>
                  <form role="form">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="inputName_edit" value="'.$nombre.'">
                    </div>
                    <div class="form-group">
                        <label>Apellido paterno</label>
                        <input type="text" class="form-control" id="inputApP_edit" value="'.$apellido.'">
                    </div>
                    <div class="form-group">
                        <label>Apellido materno</label>
                        <input type="text" class="form-control" id="inputApM_edit" value="'.$apellido_m.'">
                    </div>
                    <div class="form-group">
                        <label>correo</label>
                        <input type="email" class="form-control" id="inputEmail_edit" value="'.$correo.'">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="fa-newspaper-o" id="inputTel_edit" value="'.$telefono.'">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" class="form-control" id="inputPass_edit" value="'.$password.'">
                    </div>

                </form>

                  </div>
';
return $modal1;

    }

    public function newAlumno($request)
    {
        $nombre = $request['nombre'];
        $apP = $request['apP'];
        $apM = $request['apM'];
        $email = $request['email'];
        $telefono = $request['tel'];
        $pass = $request['pass'];
        $carrera = $request['carrera'];
        $nivel = $request['nivel'];
        if (consultasSQL::InsertSQL("alumno", "nombre, apellido_p, apellido_m, correo, telefono, password,id_carrera, id_nivel",
            "'$nombre','$apP','$apM','$email','$telefono', '$pass','$carrera', $nivel")) {
            echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';
        } else {
            echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente';
        }
    }

}

?>
