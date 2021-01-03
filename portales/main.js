function login() {
    console.log();
    var password = $("#pass").val();
    var user = $('#user').val();
    var radio=$('input:radio[name=optionsRadios]:checked').val();
    console.log("estoy en login");
    if (password!="" && user!="" && radio!=""){
        var params = {
            rutina: 'login',
            password: password,
            user: user,
            radio:radio
        }
        console.log(params);
        $.ajax({
            url: "portales/login.php",
            data: params,
            type: "POST",
            dataType: "text"
        })
            .done(function (data) {
                console.log('mi data' + data);
                if(data!=0) {
                    if (radio == 'option2') {
                        // alert("ACCESO CORRECTO'\nSe debe mostrar la vista DOCENTE");

                        pintaCoordinacion(data);
                        $('#li').html('  <a class="nav-link" onclick="pintaCoordinacion('+data+')">Coordinacion</i></a>');

                    } else {
                        if (radio == 'option1') {
                            // alert("ACCESO CORRECTO\nSe debe mostrar la vista COORDINACIÓN");
                            $('#li').html('<a class="nav-link" onclick="pintaDocentes('+data+')">Docentes</i></a>');
                            pintaDocentes(data);
                        } else {
                            if (radio == 'option0') {
                                //       alert("AACESO CORRECTO\nSe debe mostrar la vista alumno");
                               $('#li').html('       <a class="nav-link" href="#alumnos" onclick="misNotas('+data+')">Alumnos</a>');
                                misNotas(data);
                               console.log(data);
                            }

                        }
                    }
                }
                    else {
                            alert("Usuario o contraseña incorrecta");
                        }



            })
            .fail(function (textStatus) {
                alert("error de ajax");
            });

    }else {
        alert("Llene todos los campos");

    }



}

function pintaCoordinacion() {

    var s = "prueba";
    console.log("estoy en pantalla coordinacion");
    var params = {
        rutina: 'coordinacion',
        estado: s
    }

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#ventana").html(data);

            //console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}


function carrucel() {

    var s = "prueba";
    console.log("estoy en carrucel");
    var params = {
        rutina: 'inicio',
        estado: s
    }
    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#ventana").html(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}

function listCoordinacion(s) {
    var estado = s;
    var params = {
        rutina: 'listCoordinacion',
        estado: s
    }

    console.log(params);
    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#vistaCoordinacion").html(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });
}



function guardarNotas(){
    var calificaciones=Array();
    var tabla=$('#listAlumnos');
    var id_docente=1;//leer el usuario
    var nivel=$('#nivel').val();
   tabla.find('tbody tr').each(function (i,v){
      console.log(v);
      var id=$(this).attr('data-id');
      var p1=$('#p1'+id).val();
      var p2=$('#p2'+id).val();
      var p3=$('#p3'+id).val();

      var calificacion= {
          id: id,
          p1:p1,
          p2:p2,
          p3:p3,
      }
       calificaciones.push(calificacion);
       console.log(calificaciones);
   });
   var params={
       rutina:'guardaNotas',
       docente:id_docente,
       nivel:nivel,
       calificaciones:JSON.stringify(calificaciones)
   }
    console.log(params);

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text",

    })

        .done(function (data) {
            console.log(data);
            /*if(data==1){
                listCoordinacion(1);
            }*/


        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });
    console.log(calificaciones);



}


function newTeacher(s) {
    var tipo=(s==0)?'new':'edit';
    var id = $('#edicion').val();
    var band = 0;
    console.log('añadir teacher');
    //derecho es como se lee en pantalla
  //  var tipo = $("#addTeacher").data('action');
   console.log(tipo);
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var nombre = $('#inputName_'+tipo).val().toUpperCase();
    var apP = $('#inputApP_'+tipo).val().toUpperCase();
    var apM = $('#inputApM_'+tipo).val().toUpperCase();
    var tel = $('#inputTel_'+tipo).val();
    var email = $('#inputEmail_'+tipo).val();
    var pass = $('#inputPass_'+tipo).val();
    var pass1 = $('#inputPass1_'+tipo).val();
//if (pass==pass1){
    var params = {
        // izquierda así lo mando

        rutina: 'datosTeaher',
        nombre: nombre,
        apP: apP,
        apM: apM,
        tel: tel,
        email: email,
        pass: pass,
        tipo:tipo,
        id: id
    }
    console.log(params);
    if (pass==pass1){
        band++;
        alerta("Las contraseñas no son iguales");
    }
    if (nombre.trim() == '') {
        alert('Porfavor ingrese nombre.');
        $('#inputName_'+tipo).focus();
        band++;
        return false;
    } else if (apP.trim() == '') {
        alert('Ingrese appelliod paterno.');
        $('#inputApP_'+tipo).focus();
        band++;
        return false;
    } else if (apM.trim() == '') {
        alert('Ingrese appelliod materno.');
        $('#inputApP_'+tipo).focus();
        band++;
        return false;
    } else if (email.trim() == '') {
        alert('Please enter your email.');
        $('#inputEmail_'+tipo).focus();
        band++;
        return false;
    } else if (email.trim() != '' && !reg.test(email)) {
        alert('Ingrese un correo válido.');
        $('#inputEmail_'+tipo).focus();
        band++;
        return false;
    }
    if (band > 0) {
        console.log('band' + band);
    } else {

        $.ajax({
            url: "portales/rutinas.php",
            data: params,
            type: "POST",
            dataType: "text",
            beforeSend: function () {
                $('.submitBtn').attr("disabled", "disabled");
                //  $('.modal-body').css('opacity', '.5');
            },
        })

            .done(function (data) {
                console.log(data);
                if(data!=1){

                }else{
                    $('.modal').removeClass('modal-backdrop ');
                    listCoordinacion(1);
                }


            })
            .fail(function (textStatus) {
                alert("error de ajax");
            });


    }
//}else {
  //  alerta("Las contraseñas no son iguales");
//}



}



function eliminarDocente(s){



}


function deleteA(s)
{

    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        var params = {
            rutina: 'eliminarAlumno',
            id: s
        }
        console.log(params);

        $.ajax({
            url: "portales/rutinas.php",
            data: params,
            type: "POST",
            dataType: "text"
        })

            .done(function (data) {

                $("#datosmodal").html(data);
                console.log(data);
            })
            .fail(function (textStatus) {
                alert("error de ajax");
            });

    } else {
        console.log("No se eliminó");
    }
}


function editarAlumno(s) {

    var params = {
        rutina: 'pantallaEditarAlumno',
        id: s
    }
    console.log(params);

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {

            $("#datosmodal").html(data);
            console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}


function alerta(s)
{

    var mensaje;
    var opcion = confirm("Click en Aceptar o Cancelar");
    if (opcion == true) {
        var params = {
            rutina: 'eliminarDocente',
            id: s
        }
        console.log(params);

        $.ajax({
            url: "portales/rutinas.php",
            data: params,
            type: "POST",
            dataType: "text"
        })

            .done(function (data) {

                $("#datosmodal").html(data);
                console.log(data);
            })
            .fail(function (textStatus) {
                alert("error de ajax");
            });

    } else {
        console.log("No se eliminó");
    }
}

function editarDocente(s) {

    var params = {
        rutina: 'pantallaEditarDocente',
        id: s
    }
    console.log(params);

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {

            $("#datosmodal").html(data);
            console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}

//ingresa y editar alumnos
function datosAlumnos() {
    console.log('entre');
    var id = $('#edicion').val();
    var band = 0;
    console.log('añadir alumno');
    //derecho es como se lee en pantalla
    var tipo = $("#addStudent").data('action');
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var nombre = $('#inputName').val().toUpperCase();
    var apP = $('#inputApP').val().toUpperCase();
    var apM = $('#inputApM').val().toUpperCase();
    var tel = $('#inputTel').val().toUpperCase();
    var email = $('#inputEmail').val().toLocaleLowerCase();
    var carrera = $('#inputCarrera').val();
    var nivel = $('#inputNivel').val();
    var pass = $('#inputPass').val();
    var matricula=$('#inputMatricula').val();
    var params = {
        // izquierda así lo mando

        rutina: 'student_' + tipo,
        nombre: nombre,
        apP: apP,
        apM: apM,
        tel: tel,
        email: email,
        pass: pass,
        id: id,
        carrera: carrera,
        nivel: nivel,
        matricula:matricula
    }
    console.log(params);

    if (nombre.trim() == '') {
        alert('Porfavor ingrese nombre.');
        $('#inputName').focus();
        band++;
        return false;
    } else if (apP.trim() == '') {
        alert('Ingrese appelliod paterno.');
        $('#inputApP').focus();
        band++;
        return false;
    } else if (apM.trim() == '') {
        alert('Ingrese appelliod materno.');
        $('#inputApP').focus();
        band++;
        return false;
    } else if (email.trim() == '') {
        alert('Please enter your email.');
        $('#inputEmail').focus();
        band++;
        return false;
    } else if (email.trim() != '' && !reg.test(email)) {
        alert('Ingrese un correo válido.');
        $('#inputEmail').focus();
        band++;
        return false;
    }
    if (band > 0) {
        console.log('band' + band);
    } else {

        $.ajax({
            url: "portales/rutinas.php",
            data: params,
            type: "POST",
            dataType: "text",
            beforeSend: function () {
                $('.submitBtn').attr("disabled", "disabled");
                $('.modal-body').css('opacity', '.5');
            },
        })

            .done(function (data) {
                $("#ventana").html(data);

                console.log(data);

            })
            .fail(function (textStatus) {
                alert("error de ajax");
            });


    }


}

function alumnos() {

    var s = "prueba";

    var params = {
        rutina: 'alumnos',
        estado: s
    }

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#ventana").html(data);

            console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}

function actulizarDocente() {

}

function listaNombres(){

    var carrera=$('#carrera').val();
console.log('carrera'+carrera);

    var params = {
        rutina: 'filtroNombre',
        carrera:carrera
    }
    console.log(params);

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {

            $("#alumno").html(data);
            console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}




function pintaDocentes(d){

    var params = {
        rutina: 'pantallaDocentes',
        user:d

    }

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#ventana").html(data);

            //console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}
function listaAlumnos(){
    var docente=$('#docente').val();
    var nivel=$('#nivel').val();
    var params = {
        rutina: 'listaGrupo',
        nivel:nivel

    }
console.log(params);
    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
          //  $("#listA").html(data);
            $("#v-pills-tabContent").html(data);
            console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });
}
function modificarnotas(){
    console.log('entre notas');
    var docente=$('#docente').val();
    var nivel=$('#nivel').val();
    var params = {
        rutina: 'listaGrupoC',
        nivel:nivel,
        docente:docente

    }

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#v-pills-tabContent").html(data);

            //console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });
}
function editaNota(id){
    console.log('edita nota');
    var docente=$('#docente').val();
    var user=id;
    var nivel=$('#nivel').val();
    var p1=$('#p1'+id).val();
    var p2=$('#p2'+id).val();
    var p3=$('#p3'+id).val();

    var params = {
        rutina: 'editNotas',
        nivel:nivel,
        id:user,
        p1:p1,
        p2:p2,
        p3:p3,
        docente:docente

    }
    console.log(params);
    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            //$("#ventana").html(data);
            modificarnotas();
           console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });
}

function misNotas(u){
    console.log('entre mis notas');
    //var user=$('#user').val();
    var user=u;
    var params = {
        rutina: 'misNotas',
        id:user

    }
console.log(user);
    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#ventana").html(data);

            //console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });
}

function guardarAsignacion(){
    var grupos=Array();
    var tabla=$('#tablaGrupos');
    var id_docente=1;//leer el usuario
    var nivel=$('#nivel').val();
    tabla.find('tbody tr').each(function (i,v){
        console.log(v);
        var id=$(this).attr('data-id');
        var id_docente=$('#docente'+id).val();


        var grupo= {
            id: id,
           docente:id_docente
        }
        grupos.push(grupo);
    });
    var params={
        rutina:'asignaGrupo',
        grupo:JSON.stringify(grupos)
    }
    console.log(params);

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text",

    })

        .done(function (data) {
            console.log(data);
            if(data==1){
                listCoordinacion(4);
            }


        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

}
function generaConstancia(){
    var carrera=$('#carrera').val();
    var alumno=$('#alumno').val();

    var params={
        rutina:'constacia',
        carrera:carrera,
        alumno:alumno
    }
    console.log(params);

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text",

    })

        .done(function (data) {
            $('#miConstacia').html(data);
            console.log(data);
        //   setTimeout(generaPDF(data),3000);


        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });



}

function generaPDF(){
//var dato=;
    w=window.open();
    w.document.write(
        '<style>'+
        '.iz{aling:left}'+
        '.d{align:right}'+

        +'</style>'+
        $('#miConstancia').html()

    );
    w.print();
    w.close();
}