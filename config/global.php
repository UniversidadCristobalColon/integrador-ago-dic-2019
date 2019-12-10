<?php

define('PAGE_TITLE', 'Evaluación 360');
$php_self       = dirname($_SERVER['PHP_SELF']);
$pos_inicial    = strpos($php_self,'app');
$dir_base       = substr($php_self,0,$pos_inicial);

/*

require '../app/login.php';

if(!confirmar()) {
    header('location: '.$dir_base.'app/index.php');
    exit();
}

*/

function getUrl(){
    require 'db.php';
    $sql = 'SELECT url
            FROM email_conf
            WHERE id = 1';

    $res = $conexion->query($sql);

    if($res) { 
        $assoc = $res->fetch_assoc();
        return $assoc['url'];
    } else {
        return 'proyecto';
    }
}

function getSidebar($ruta = ''){
    global $dir_base;

    $hay_cookie = !empty($_COOKIE['sidebar-state']) ? $_COOKIE['sidebar-state'] : '';
    $toggled = $hay_cookie == 'true' ? 'toggled' : '';

    $html = <<<EOD
<!-- Sidebar -->
<ul class="sidebar navbar-nav $toggled">    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="catalogosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Catálogos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="catalogosDropdown" id="sideGrupoCatalogos">
            <h6 class="dropdown-header">Organización</h6>            
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/organizaciones/">Organizaciones</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/departamentos/">Departamentos</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/puestos/">Puestos</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/niveles_puesto/">Niveles de puesto</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/empleados/">Empleados</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/usuarios/">Usuarios</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Evaluación</h6>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/periodos/">Periodos</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/competencias/">Competencias</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/decalogos/">Decálogo</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/escalas/">Escalas</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/preguntas/">Preguntas</a>
            <a class="dropdown-item" href="{$dir_base}app/admin/catalogos/respuestas/">Respuestas</a>
        </div>
    </li>
    
    <li class="nav-item">
        <a class="nav-link text-dark" href="{$dir_base}app/evaluacion/admin/Cuestionario/">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Cuestionarios</span>
        </a>
    </li>  
     
    <li class="nav-item">
        <a class="nav-link text-dark" href="{$dir_base}app/evaluacion/admin/Evaluaciones/">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Evaluaciones</span>
        </a>
    </li>
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="resultadosDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Resultados</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="resultadosDropdown" id="sideGrupoResultados">                        
            <a class="dropdown-item" href="{$dir_base}app/consultas/decalogo/">Decálogo</a>
            <a class="dropdown-item" href="{$dir_base}app/consultas/historico/">Histórico</a>  
            <a class="dropdown-item" href="{$dir_base}app/consultas/competencias/">Competencias</a>           
        </div>
    </li>  
    
    <li class="text-center pt-5">        
        <img src="{$dir_base}img/logo_ICAVE.png" id="sidebar-logo"/>
    </li>
</ul>
EOD;


    echo $html;
}

function getNavbar($ruta = ''){
    global $dir_base, $conexion;

    if(empty($conexion)){
        require_once 'db.php';
    }

    $titulo_notificaciones = '';
    $clase_notificaciones = '';
    $sql = "select count(id_notificaciones) from notificaciones where estado_visto = 0";
    $res = mysqli_query($conexion, $sql);

    if($res){
        $f = mysqli_fetch_row($res);
        $cantidad = $f[0];
        $clase_notificaciones = $cantidad > 0 ? 'text-danger' : '';
        $titulo_notificaciones = $cantidad == 1 ? "Tiene una notificación" : "Tiene $cantidad notificaciones";
    }

    $html = <<<EOD
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">    

    <a class="navbar-brand mr-1" href="{$dir_base}app/main.php">Evaluación 360</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            
            <li class="nav-item">
                <a class="nav-link" href="{$dir_base}app/admin/catalogos/notificaciones/" role="button" title="$titulo_notificaciones">
                    <i class="fas fa-bell fa-fw $clase_notificaciones"></i>                
                </a>            
            </li>       
            
            
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{$dir_base}app/token.php">Solicitar cambio de contraseña</a>
                    <a class="dropdown-item" href="{$dir_base}app/admin/configuracion/email/changeEmail.php">Configurar correo electrónico</a>                
                    <a class="dropdown-item" href="{$dir_base}app/admin/configuracion/email/mailConfig.php">Configurar envío e-mail</a>                
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
EOD;

    echo $html;
}

function getFooter(){
    $anio_footer = date('Y');

    $html = <<<EOD
<!-- Sticky Footer -->
<footer class="sticky-footer">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright © {$anio_footer} Internacional de Contenedores Asociados de Veracruz, S.A. de C.V. </span>
        </div>
    </div>
</footer>
EOD;
    echo $html;
}

function getModalLogout($ruta = ''){
    global $dir_base;

    $html = <<<EOD
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Deseas salir del sistema?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Da clic en el botón <b>salir</b> para terminar tu sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="{$dir_base}app/logout.php">Salir</a>
            </div>
        </div>
    </div>
</div>
EOD;

    echo $html;
}


function getTopIncludes($ruta = ''){
    $html = <<<EOD
    <link rel="shortcut icon" type="image/png" href="{$ruta}img/favicon.png"/>
    
    <!-- Custom fonts for this template-->
    <link href="{$ruta}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{$ruta}vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{$ruta}css/sb-admin.css" rel="stylesheet" type="text/css">

    <link href="{$ruta}css/estilos.css" rel="stylesheet" type="text/css">

    <script src="{$ruta}vendor/jquery/jquery.min.js"></script>   

    <script src="{$ruta}vendor/js-cookie/js.cookie-2.2.1.min.js"></script>
EOD;
    echo $html;
}

function getBottomIncudes($ruta = ''){
    global $dir_base;

    $html = <<<EOD
    <!-- Bootstrap core JavaScript-->    
    <script src="{$ruta}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{$ruta}vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Page level plugin JavaScript-->    
    <script src="{$ruta}vendor/datatables/jquery.dataTables.js"></script>
    <script src="{$ruta}vendor/datatables/dataTables.bootstrap4.js"></script>
        
    <!-- Custom scripts for all pages-->
    <script src="{$ruta}js/sb-admin.js"></script>

    <script>
        var dir_base = '$dir_base';
    </script>
    <script src="{$ruta}js/demo/datatables-demo.js"></script>
EOD;

    echo $html;
}
?>
