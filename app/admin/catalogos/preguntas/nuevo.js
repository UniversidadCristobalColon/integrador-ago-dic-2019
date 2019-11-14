$(document).ready(function(){
    $("#nuevo").click(function(){
        var pregunta = $("#pregunta").val();
        var orden = $("#orden").val();
        var tipo = $("#tipo").val();
        $.ajax({
            url: "insertar.php",
            type: "POST",
            data: "pregunta = " + pregunta + "&orden" + orden + "&tipo" + tipo,
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