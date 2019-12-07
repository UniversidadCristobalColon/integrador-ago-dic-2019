<?php

    // Requires
    require_once '../../../../config/global.php';
    require_once '../../../../config/db.php';
    define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad

    $errores = '';
    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        // echo 'Es GET';
        $pagina_actual = isset( $_GET['pagina'] ) ? (int) $_GET['pagina'] : 1;
        $notificaciones_por_pagina = 10;

        $inicio = ( $pagina_actual > 1 ) ? ( $pagina_actual * $notificaciones_por_pagina - $notificaciones_por_pagina ) : 0;

        // SELECT DATOS DE LAS NOTIFICACIONES Y CALCULAR EL TOTAL DE ELLAS
        $sql = 'SELECT SQL_CALC_FOUND_ROWS 
                    notificaciones.id_notificaciones, 
                    notificaciones.estado_visto, 
                    notificaciones.fecha_creacion, 
                    ( SELECT CONCAT(empleados.nombre, " " , empleados.apellidos) FROM empleados WHERE empleados.id = notificaciones.id_evaluado ) AS NOMBRE_EVALUADO, 
                    ( SELECT CONCAT(empleados.nombre, " " , empleados.apellidos) FROM empleados WHERE empleados.id = notificaciones.id_evaluador ) AS NOMBRE_EVALUADOR 
                FROM notificaciones 
                ORDER BY notificaciones.fecha_creacion
                LIMIT '.$inicio.','.$notificaciones_por_pagina.'';
        $sql = $conexion->query( $sql );

        // Calcular el número total de páginas
        $total_notificaciones = $conexion->query(
            'SELECT FOUND_ROWS() as TOTAL'
        );
        $total_notificaciones = $total_notificaciones->fetch_assoc();
        $numero_paginas = ceil( $total_notificaciones['TOTAL'] / $notificaciones_por_pagina );

        // Armar HTML
        $html_notificaciones = '';
        while ( $row = $sql->fetch_assoc() ) {
            if ( $row['estado_visto'] == 0 ) {
                // Cambiar estado a visto para que puedan contar solo las que el usuario no ha visto
                $sql_update = '
                    UPDATE notificaciones
                    SET notificaciones.estado_visto = 1
                    WHERE notificaciones.id_notificaciones = '.$row['id_notificaciones'].'';
                $conexion->query( $sql_update );
            }
            $html_notificaciones .= '
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1 text-center">
                            <i class="fas fa-check-circle py-2 text-success" style="font-size: 1.5em; text-shadow: 0 0 5px #eee;"></i>
                        </div>
                        <div class="col-11">
                            <p class="my-0">
                               '.$row['NOMBRE_EVALUADOR'].' ha concluido el proceso de evaluación asignado a '.$row['NOMBRE_EVALUADO'].' 
                            </p>
                            <small>
                                Fecha: '.$row['fecha_creacion'].'
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <hr>';
        }

        if ( $numero_paginas == 0 || $pagina_actual > $numero_paginas ) {
            $errores .= 'No se han encontrado notificaciones.<br>';
        }
    }

    // QUERY PARA SABER EL TOTAL DE NOTIFICACIONES SIN VER
    /* 
        $sql_unseen = '
            SELECT COUNT( notificaciones.id_notificaciones ) AS TOTAL_SIN_VER 
            FROM notificaciones
            WHERE notificaciones.estado_visto = 0';

    */

    // Index.View
    require_once 'index.view.php';
?>