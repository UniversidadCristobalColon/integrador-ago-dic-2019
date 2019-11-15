$(document).ready(function(){
    $("#nuevo").click(function(){
        var pregunta = $("#pregunta").val();
        alert(pregunta);
        var tipo = $("#tipo").val();
        /*
        $.ajax({
            url: "insertar.php",
            type: "POST",
            data: "pregunta=" + pregunta +"&tipo=" + tipo,
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
*/
    });

});