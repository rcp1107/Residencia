

function menu(){

var s="prueba";
    console.log("estoy en menu");
    var params={
        rutina:'menu',
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
function coordinacion(){

    var s="prueba";
        console.log("estoy en coordinacion");
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
            $("#coordinacion").html(data);
            
            console.log(data);
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