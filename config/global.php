<?php
define('PAGE_TITLE', 'Evaluación 360');

function getSidebar($ruta = ''){
    $html = <<<EOD
<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{$ruta}index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Inicio</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Páginas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Sección</h6>            
            <a class="dropdown-item" href="#">Página W</a>
            <a class="dropdown-item" href="#">Página X</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Otra sección</h6>
            <a class="dropdown-item" href="#">Página Y</a>
            <a class="dropdown-item active" href="#">Página Z</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{$ruta}charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Gráficos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{$ruta}tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tablas</span>
        </a>
    </li>
</ul>
EOD;

    echo $html;
}

function getNavbar($ruta = ''){
    $html = <<<EOD
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="{$ruta}index.php">Evaluación 360</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <!--<div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                   aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>-->
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>
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
    $html = <<<EOD
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{$ruta}login.php">Logout</a>
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
EOD;
    echo $html;
}

function getBottomIncudes($ruta = ''){
    $html = <<<EOD
    <!-- Bootstrap core JavaScript-->    
    <script src="{$ruta}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{$ruta}vendor/jquery-easing/jquery.easing.min.js"></script>
    
    <!-- Page level plugin JavaScript-->
    <script src="{$ruta}vendor/chart.js/Chart.min.js"></script>
    <script src="{$ruta}vendor/datatables/jquery.dataTables.js"></script>
    <script src="{$ruta}vendor/datatables/dataTables.bootstrap4.js"></script>
        
    <!-- Custom scripts for all pages-->
    <script src="{$ruta}js/sb-admin.min.js"></script>

    <script src="{$ruta}js/demo/chart-area-demo.js"></script>
    <script src="{$ruta}js/demo/chart-bar-demo.js"></script>
    <script src="{$ruta}js/demo/chart-pie-demo.js"></script>


    <script src="{$ruta}js/demo/datatables-demo.js"></script>
EOD;

    echo $html;
}
?>
