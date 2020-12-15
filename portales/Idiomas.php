<?php
include '../funciones/consulSQL.php';
session_start();
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
                $return = $this->vistaConstancias();
                break;
            case '4':
                $return = $this->Grupos();
                break;

        }
        return $return;

    }


    private function nivel()
    {
        $niv = '';
        $nivel = ejecutarSQL::consultar("select * from nivel");
        while ($row = mysqli_fetch_array($nivel)) {
            $niv .= '
      
            <option value=' . $row['id_nivel'] . '>' . $row['nivel'] . '</option>';

        }
        $nv = '<option value="0">-----</option>';
        return $nv . $niv;

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
            <button onclick="editarDocente(' . $id_docente . ')" class="btn-warning">
                <a href="#" data-toggle="modal" data-target=".editDoc"><li class="fa fa-edit"></li></a>
            </button>
            <button onclick="alerta(' . $id_docente . ')" class="btn-outline-danger">
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
                     <button type="button" class="btn-outline-success" >
            <a href="#" class="fa fa-user-graduate" data-toggle="modal" data-target=".modal-addT">Agregar Docente</button></a>
       
                            
            </div>
             <input type="text" class="form-control pull-left" style="width:18%" id="search" placeholder="Buscar...">

                 <h4>Teacher List</h4> 

                     
                     <table id="tabladocentes" class="table table-bordered">
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
               <script>
                        // Write on keyup event of keyword input element
                        $(document).ready(function(){
                            $("#search").keyup(function(){
                                _this = this;
                                // Show only matching TR, hide rest of them
                                $.each($("#tabladocentes tbody tr"), function() {
                                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                                        $(this).hide();
                                    else
                                        $(this).show();
                                });
                            });
                        });
                    </script>
               
               <!-- Button trigger modal -->
            
        

            
            <!-- Modal REGISTRAR-->
          
            <div class="modal fade modal-addT" id="addTeacher_new"  tabindex="-1" aria-labelledby="addTeacherLabel" aria-hidden="true">
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
                <button id="addTeacher_new"  data-dismiss="modal" type="button" class="btn btn-primary" onclick="newTeacher(0)">Guardar</button>
            </div>
                </div>
              </div>
            </div>
            
            
            <!--MODAL EDICION DOCE-->
            <div class="modal fade editDoc" id="addTeacher_edit"  role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              
                <h4 class="modal-title" align="center">Actualizar datos del Docente</h4>
            </div>
            <div class="modal-body" id="datosmodal">
           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button data-dismiss="modal" type="button" id="addTeacher_edit" class="btn btn-primary" onclick="newTeacher(1)">
                    Actualizar
                    </button>
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


    private function Grupos()
    {
        $html = '
                 <div class="tab-pane fade show active" role="tabpanel" id="list1" aria-labelledby="list4">
              
                 <h4>Asignar Docente al Grupo</h4> 
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
      //  sleep(2);
        $nombre = $request['user'];
        $clave = $request['password'];
        $radio = $request['radio'];
        $id='';

        if (!$nombre == "" && !$clave == "") {
            $docente = ejecutarSQL::consultar("select correo,password,id_docente from docente where correo='$nombre' and password='$clave'");
            $coor = ejecutarSQL::consultar("select correo,password,id_coordinacion from coordinacion where correo='$nombre' and password='$clave'");
            $alumno = ejecutarSQL::consultar("select correo,password, id_alumno from alumno where correo='$nombre' and password='$clave'");

            if ($radio == "option0") {
                $alu = mysqli_num_rows($alumno);

                if ($alu > 0) {
                     $_SESSION['alumno'] = $nombre;
                     $_SESSION['pass_alumno'] = $clave;
                     $_SESSION['id_alumno'] = $id;

                     return  1;

                } else {
                    return 0;
                }

            }
            if ($radio == "option1") {
                $docen = mysqli_num_rows($docente);
                if ($docen > 0) {
                    $_SESSION['docente'] = $nombre;
                    $_SESSION['pass_docente'] = $clave;
                    $user='<input id="user" data-id="">';
                    return 1;
                } else {
                    return 0;
                }

            }
            if ($radio == "option2") {
                $coordinacion = mysqli_num_rows($coor);
                if ($coordinacion > 0) {
                    $_SESSION['admin'] = $nombre;
                    $_SESSION['pass_admin'] = $clave;
                    return 2;
                } else {
                   return 0;
                }
            }

        }


    }

    public function newTeacherGuardado($request)
    {
        $tipo = $request['tipo'];
        $nombre = $request['nombre'];
        $apP = $request['apP'];
        $apM = $request['apM'];
        $email = $request['email'];
        $telefono = $request['tel'];
        $pass = $request['pass'];

        if ($tipo == 'new') {


            if (consultasSQL::InsertSQL("docente", "nombre, apellido_p, apellido_m, correo, telefono, password",
                "'$nombre','$apP','$apM','$email','$telefono', '$pass'")) {
                $return = 1;
            } else {
                echo "Ha ocurrido un error\nPor favor intente nuevamente";
                $return = 0;
            }
        } else {
            $id = $request['id'];
            if ($tipo == 'edit') {

                if (consultasSQL::UpdateSQL("docente",
                    "nombre='$nombre', apellido_p='$apP', apellido_m='$apM', correo='$email', telefono='$telefono', password='$pass'",
                    "id_docente='$id'")) {
                    $return = 1;
                }

            }

        }

        return $return;

    }

    public function elimarDocente($request)
    {
        $id = $request['id'];
        if (consultasSQL::UpdateSQL("docente",
            "status='0'",
            "id_docente='$id'")) ;
        echo "eliminado";

    }

    public function editTeacherGuardado()
    {

    }

    public function pantallaEdicionDocente($id)
    {
        $verDocentes = ejecutarSQL::consultar("select * from docente where id_docente=$id", array($id), 1);
        if ($row = mysqli_fetch_array($verDocentes)) {

            $nombre = $row['nombre'];
            $apellido = $row['apellido_p'];
            $apellido_m = $row['apellido_m'];
            $correo = $row['correo'];
            $telefono = $row['telefono'];
            $password = $row['password'];


        }
        $modal1 = '
<div class="modal-body">
<input id="edicion" type="hidden" value="' . $id . '">
                    <p class="statusMsg"></p>
                  <form role="form">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="inputName_edit" value="' . $nombre . '">
                    </div>
                    <div class="form-group">
                        <label>Apellido paterno</label>
                        <input type="text" class="form-control" id="inputApP_edit" value="' . $apellido . '">
                    </div>
                    <div class="form-group">
                        <label>Apellido materno</label>
                        <input type="text" class="form-control" id="inputApM_edit" value="' . $apellido_m . '">
                    </div>
                    <div class="form-group">
                        <label>correo</label>
                        <input type="email" class="form-control" id="inputEmail_edit" value="' . $correo . '">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="fa-newspaper-o" id="inputTel_edit" value="' . $telefono . '">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="text" class="form-control" id="inputPass_edit" value="' . $password . '">
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
        if (consultasSQL::InsertSQL("alumno", "nombre, apellido_p, apellido_m, correo, telefono, password, id_carrera, id_nivel",
            "'$nombre','$apP','$apM','$email','$telefono', '$pass','$carrera', $nivel")) {
            echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';
        } else {
            echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente';
        }
    }

    private function vistaConstancias()
    {
        $html = '
          <div class="row">
             <div class="col-3">
             <label>Carrera</label>
             <select id="carrera">' . $this->carreras() . '</select>
            
             </div>
            
             <div class="col-3">
             <label>Nivel</label>
               <select id="nivel">' . $this->nivel() . '</select>
              </div>
             <div class="col-3">
              <label>Nombre</label>
                <select id="alumno"></select>
             </div>
           
          </div>
          <div class="center-block"><button>Generar Pdf</button></div>
        <script>
        $("#nivel").on("change",function ()){
            listaNombres();
        }
</script>
        ';

        return $html;
    }

    public function nombre($request)
    {
        $nivel = $request['nivel'];
        $carrera = $request['carrera'];
        $opcion = '';
        $ver = ejecutarSQL::consultar("select * from vista_alumnos where carrera=" . $carrera . " and nivel=" . $nivel . " ");
        while ($row = mysqli_fetch_array($ver)) {
            $nombre = $row['nombre'];
            $apellido = $row['apellidos'];
            $id = $row['id_alumno'];
            $opcion .= '
            <option value="' . $id . '">' . $nombre . ' ' . $apellido . '</option>
               ';


        }
        return $opcion;


    }

    public function pantallaDocente()
    {
        $html = '
   <input id="docente" value="1" hidden>
  <div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="listaAlumnos()">Lista Alumnos</a>
    <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="modificarnotas()">Modificar Notas</a>

  </div>
    <div class="row">
         <div class="col-12">
           <label>GRUPO</label>
           <select id="nivel">' . $this->nivel() . '</select>
         </div>
         <script>
            $("#nivel").on("change",function (){
               console.log("entre onchenge");
                listaAlumnos();
            })
         </script>
        
      <div class="col-11">
  
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                   
                    <div class="col-12">
                     <h4>Alumnos del grupo</h4>
                     <div id="listA"></div>
                    </div>
                 
                 </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
             </div>
             </div>
   </div>
</div>
       
        ';
        return $html;


    }

    public function listAlum($request)
    {
        $nivel = $request['nivel'];

        $td = '';
        $modal = '';
        $verAlum = ejecutarSQL::consultar("select * from vista_alumnos WHERE id_nivel='$nivel'");
//falta añadir el docente
        while ($row = mysqli_fetch_array($verAlum)) {
            $id_Alumno = $row['id_alumno'];
            $nombre = $row['nombre'];
            $apellido = $row['apellidos'];
            $carrera = $row['carrera'];

            $td .= '
                      <tr id="id' . $id_Alumno . '">
                          <td>' . $nombre . '' . $apellido . '</td>
                 
                          <td>' . $carrera . '</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
               ';

        }


        $html = '
           <table id="listAlumnos" class="table table-bordered">
            <thead>
           <th >NOMBRE</th>
           <th >CARRERA</th>
           <th >P1</th>
           <th >P2</th>
           <th >P3</th>
           <th >PROMEDIO</th>
          </thead>
          <tbody>
             ' . $td . '
          </tbody>
      </table>
        
        
        ';

        print "prueba";
        return $html;
    }

    public function listAlumnC($request)
    {
        $nivel = $request['nivel'];
        $docente = $request['docente'];

        $td = '';
        $modal = '';
        $verAlum = ejecutarSQL::consultar("select * from vista_alumnos WHERE id_nivel=$nivel");
//falta añadir el docente
        while ($row = mysqli_fetch_array($verAlum)) {
            $id_Alumno = $row['id_alumno'];
            $nombre = $row['nombre'];
            $apellido = $row['apellidos'];
            $carrera = $row['carrera'];

            $td .= '
                      <tr id="id' . $id_Alumno . '" data-id="' . $id_Alumno . '">
                          <td>' . $nombre . '' . $apellido . '</td>
                 
                          <td>' . $carrera . '</td>
                          <td><input class="form-control" id="p1' . $id_Alumno . '"></td>
                          <td><input class="form-control" id="p2' . $id_Alumno . '"></td>
                          <td><input class="form-control" id="p3' . $id_Alumno . '"></td>
                        
                      </tr>
               ';


        }


        $html = '
           <table id="listAlumnos" class="table table-bordered">
            <tr>
           <th >NOMBRE</th>
           <th >CARRERA</th>
           <th >P1</th>
           <th >P2</th>
           <th >P3</th>
         
          </tr>
          <tbody>
             ' . $td . '
          </tbody>
      </table>
      
      <button onclick="guardarNotas()">Guardar</button>
        
        
        ';


        return $html;

    }

    public function misNotas($request)
    {
        $id = $request['id'];

        $td = '';
        $modal = '';
        $verAlum = ejecutarSQL::consultar("select * from vista_alumnos WHERE id_alumno=$id");
//falta añadir el docente
        while ($row = mysqli_fetch_array($verAlum)) {
            $id_Alumno = $row['id_alumno'];
            $nombre = $row['nombre'];
            $apellido = $row['apellidos'];
            $carrera = $row['carrera'];
            $alumno = $nombre . ' ' . $apellido;
            $td .= '
                      <tr id="id' . $id_Alumno . '">
                          <td></td>                       
                          <td></td>                       
                          <td></td>                       
                          <td></td>                       
                          <td></td>                       
                      </tr>
               ';

        }


        $html = '
         <div class="row">
          <input type="hidden"  name="admin-name" value="'.$_SESSION['id_alumno'].'>">
          <div class="col-1">  <labe>Nombre:</labe>  </div>
          <div class="col-4">  <input class="form-control" value="' . $alumno . '" disabled> </div>
          <div class="col-1">  <labe>Carrera:</labe>   </div>
          <div class="col-4"> <input class="form-control" value="' . $carrera . '" disabled> </div>
                
         
          </div>
          
           <table id="misNotas" class="table table-bordered">
            <tr>
           <th >Nivel</th>
           
           <th >P1</th>
           <th >P2</th>
           <th >P3</th>
           <th >FINAL</th>
         
          </tr>
          <tbody>
             ' . $td . '
          </tbody>
      </table>
      ';

       return $html;
    }


        public function guardaNotas($request){
        $notas=json_decode($request['calificaciones']);
        $docente=$request['docente'];
        $nivel=$request['nivel'];

        foreach ($notas as $key =>$n){
            $id_alumno=$n->id;
            $p1=$n->p1;
            $p2=$n->p2;
            $p3=$n->p3;

            $not = ejecutarSQL::consultar("select * from parciales where id_alumno='$id_alumno'");
             $s = mysqli_num_rows($not);
                if ($s > 0) {
                    $dato=1;
                }
                if($dato){
                    if (consultasSQL::UpdateSQL("parciales",
                        "parcial_1='$p1', parcial_2='$p2', parcial_3='$p3'",
                        "id_alumno='$id_alumno'")) {
                        $return = 1;
                    }
                }else{
                    if (consultasSQL::InsertSQL("parciales", " parcial_1,parcial_2,parcial_3,id_alumno,id_nivel,id_docente",

                        "'$id_alumno','$p1','$p2','$p3','$id_alumno', '$nivel','$docente'")) {
                        echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';
                    } else {
                        echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente';
                    }

                }



        }




        }
}

?>
