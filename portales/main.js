

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
function Coordinacion(){

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
            $("#ventana").html(data);
            
            console.log(data);
        })
        .fail(function(textStatus){
           alert("error de ajax");
        });
    
    }