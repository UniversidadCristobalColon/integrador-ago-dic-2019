$(document).ready(function() {
    $("#btn-eliminar").click(function(){
        var id = $("#idrespuesta").val();
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
function eliminar(id) {
    $("#idrespuesta").val(id); //establece el valor
    $("#delete").modal("show");
}