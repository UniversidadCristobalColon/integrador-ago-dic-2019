<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';

$sql = "SELECT host, port, username, password, email_name, content FROM email_conf where id = 1";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $host = $row['host'];
        $port = $row['port'];
        $username = $row['username'];
        $password = $row['password'];
        $mailName = $row['email_name'];
        $content = $row['content'];
    }
}


define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="ckeditor/ckeditor.js"></script>
    <title><?php echo PAGE_TITLE ?></title>


    <?php getTopIncludes(RUTA_INCLUDE ) ?>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-mail-bulk"></i>
                    Parametros SMTP
                </div>
                <div class="card-body">
                    <form action="changeEmailParameters.php" method="post">
  <div class="form-group">
       <h5>Host</h5>
    <input name= "host" type="form-text" class="form-control" id="mailConfigHost" value ="<?php echo $host;?>" placeholder="Host" >
  </div>
  <div class="form-group">
       <h5>Puerto</h5>
    <input name ="port" type="form-text" class="form-control" id="mailConfigPort" value ="<?php echo $port;?>" placeholder="Port" >
  </div>  
  <div class="form-group">
       <h5>Nombre</h5>
    <input name="name" type="form-text" class="form-control" id="mailConfigName" value ="<?php echo $mailName;?>" placeholder="Nombre">
  </div>
  <div class="form-group">
       <h5>User</h5>
    <input name= "user" type="form-text" class="form-control" id="mailConfigUser" value ="<?php echo $username;?>" placeholder="User" >
  </div>  
  <div class="form-group">
    <h5>Pass</h5>
    <input name="pass" type="form-text" class="form-control" id="mailConfigPass" value ="<?php echo $password;?>" placeholder="Pass">
  </div>



  <div class="form-group">
     <h3>Texto del correo para evaluadores</h3>
<div class="alert alert-warning" role="alert">
  Es importante incluir este token <strong>{{url_encuesta}}</strong> en la plantilla del correo electrónico para que sea reemplazado por el enlace de la encuesta de manera automática.
  </div>
  <textarea name="editor" class= "form-control" id="editor"  name ="editor" id="editor">
      <?php echo $content;?>
  </textarea>
<script type="text/javascript">
    ClassicEditor
.create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
</div>

  <input type="submit" value = "Guardar" class="btn btn-primary">
</form>

                   
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <?php getFooter() ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>
