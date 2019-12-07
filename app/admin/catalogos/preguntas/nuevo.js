$(document).ready(function(){
    aseverar($("#decalogo").val());
    $("#nuevo").click(function(){
        var pregunta = $("#pregunta").val();
        var tipo = $("#tipo").val();
        var decalogo = $("#decalogo").val();
        var aseveracion = $("#aseveracion").val();
        var ip = $("#ip").val();
        $.ajax({
            url: "insertar.php",
            type: "POST",
            data: "pregunta=" + pregunta +"&tipo=" + tipo + "&decalogo=" + decalogo + "&aseveracion=" + aseveracion + "&ip=" + ip,
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
  $("#decalogo").change(function(){
     aseverar($(this).val());
  });
});
function aseverar(decalogo){
    var deca = decalogo //toma el valor que elegi
    $.ajax({
        url: "aseveracion.php",
        type: "POST",
        data: "decalogo="+deca,
        success:function(exito){
        $("#aseveracion").html(exito);

    }
    });
}