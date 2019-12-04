$(document).ready(function(){
    $("#nuevo").click(function(){
        var respuesta = $("#respuesta").val();
        var ip = $("#ip").val();
        $.ajax({
            url: "insertar.php",
            type: "POST",
            data: "respuesta=" + respuesta +"&ip=" + ip,
            success: function(exito){
                if(exito=='s'){
                    location.href="index.php";
                }else{
                    alert(exito);
                }
            },
            error: function(fracaso){
                alert(fracaso);
            }

        });

    });

});
