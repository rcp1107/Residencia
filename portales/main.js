function login(){
    console.log();
    var password= $("#pass").val();
    var user=$('#user').val();
    console.log("estoy en login");
    var params={
        rutina:'login',
        password:password,
        user:user
    }

    console.log(params);
    $.ajax({
        url:"portales/rutinas.php",
        data:params,
        type:"POST",
        dataType:"text"
    })
        .done(function(data){
            console.log('mi data'+data);
            if(data==1){
                 pintaCoordinacion();
            }else{
                alert('Datos erroneos');
            }
        })
        .fail(function(textStatus){
            alert("error de ajax");
        });


}
function pintaCoordinacion(){

    var s="prueba";
    console.log("estoy en pantalla coordinacion");
    var params={
        rutina:'coordinacion',
        estado:s
    }

    $.ajax({
        url:"portales/rutinas.php",
        data:params,
        type:"POST",
        dataType:"text"
    })

        .done(function(data){
            $("#ventana").html(data);

            console.log(data);
        })
        .fail(function(textStatus){
            alert("error de ajax");
        });

}


function carrucel(){

    var s="prueba";
    console.log("estoy en carrucel");
    var params={
        rutina:'inicio',
        estado:s
    }
    $.ajax({
        url:"portales/rutinas.php",
        data:params,
        type:"POST",
        dataType:"text"
    })

        .done(function(data){
            $("#ventana").html(data);
        })
        .fail(function(textStatus){
            alert("error de ajax");
        });

}

function listCoordinacion(s){
    var estado=s;
    var params={
        rutina:'listCoordinacion',
        estado:s
    }
    $.ajax({
        url:"portales/rutinas.php",
        data:params,
        type:"POST",
        dataType:"text"
    })

        .done(function(data){
            $("#vistaCoordinacion").html(data);
        })
        .fail(function(textStatus){
            alert("error de ajax");
        });
    }

function docentes(){

    var s="prueba";
    console.log("estoy en docentes");
    var params={
        rutina:'docentes',
        estado:s
    }

    $.ajax({
        url:"portales/rutinas.php",
        data:params,
        type:"POST",
        dataType:"text"
    })

        .done(function(data){
            $("#inicio").addClass("hidden");

            console.log(data);
        })
        .fail(function(textStatus){
            alert("error de ajax");
        });

}
function newTeacher(){
    console.log('añadir teacer');
}

function alumnos(){

    var s="prueba";
    console.log("estoy en Docentes");
    var params={
        rutina:'alumnos',
        estado:s
    }

    $.ajax({
        url:"portales/rutinas.php",
        data:params,
        type:"POST",
        dataType:"text"
    })

        .done(function(data){
            $("#ventana").html(data);

            console.log(data);
        })
        .fail(function(textStatus){
            alert("error de ajax");
        });

}