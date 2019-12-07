$(document).ready(function() {
    $("#btn-eliminar").click(function(){
        var id = $("#idpregunta").val();
        $.ajax({
            url: "borrar.php",
            type: "POST",
            data: "id=" + id,
            success: function (exito) {
                if (exito == 's') {
                    location.href = "index.php";
                } else {
                    alert(exito);
                }
            },
            error: function (fracaso) {
                alert(fracaso);
            }

        });

    });
});
function editar(id,pregunta){
    $.ajax({
        url: "editar.php",
        type: "POST",
        data: "id=" + id + "&pregunta=" + pregunta,
        success: function(exito){
            $("#editar").html(exito);
            $("#editar").modal("show");

        }
    });
}
function eliminar(id) {
    $("#idpregunta").val(id); //establece el valor
    $("#delete").modal("show");



}