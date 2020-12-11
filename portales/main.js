function login() {
    console.log();
    var password = $("#pass").val();
    var user = $('#user').val();
    console.log("estoy en login");
    var params = {
        rutina: 'login',
        password: password,
        user: user
    }

    console.log(params);
    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })
        .done(function (data) {
            console.log('mi data' + data);
            if (data == 1) {
                pintaCoordinacion();
            } else {
                alert('./img/img_alert/error.png');
            }
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });


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

function docentes() {

    var s = "prueba";
    console.log("estoy en docentes");
    var params = {
        rutina: 'docentes',
        estado: s
    }

    $.ajax({
        url: "portales/rutinas.php",
        data: params,
        type: "POST",
        dataType: "text"
    })

        .done(function (data) {
            $("#inicio").addClass("hidden");

            console.log(data);
        })
        .fail(function (textStatus) {
            alert("error de ajax");
        });

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
    var nombre = $('#inputName_'+tipo).val();
    var apP = $('#inputApP_'+tipo).val();
    var apM = $('#inputApM_'+tipo).val();
    var tel = $('#inputTel_'+tipo).val();
    var email = $('#inputEmail_'+tipo).val();
    var pass = $('#inputPass_'+tipo).val();
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
function eliminarDocente(s){



}
function alerta(s)
{
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
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
        nivel: nivel
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
    console.log("estoy en Docentes");
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