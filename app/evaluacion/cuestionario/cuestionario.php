<?php
    require_once "../../../config/global.php";
    require_once "../../../config/db.php";
    define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    
    $errores = '';
    if ( $_SERVER['REQUEST_METHOD']  ==  'GET' ) {
        if ( isset($_GET['id']) && $_GET['id'] !== '' ) {
            $hash_evaluacion = $_GET['id'];
        } else {
            $errores .= 'No se ha proporcionado información.<br>';
        }
        
        if ( isset( $hash_evaluacion ) && $hash_evaluacion !== '' ) {
            //SELECT DATA EVALUACIÓN
            $sql = 'SELECT 	aplicaciones.id, 
                    aplicaciones.estado, 
                    empleados.nombre, 
                    empleados.apellidos, 
                    puestos.puesto, 
                    evaluaciones.fin,
                    cuestionarios.cuestionario
                    FROM aplicaciones 
                    INNER JOIN empleados
                    ON aplicaciones.id_evaluado = empleados.id
                    INNER JOIN puestos
                    ON empleados.id_puesto=puestos.id
                    INNER JOIN evaluaciones
                    ON aplicaciones.id_evaluacion=evaluaciones.id
                    INNER JOIN cuestionarios
                    ON evaluaciones.id_cuestionario=cuestionarios.id
                    WHERE aplicaciones.hash = "'.$hash_evaluacion.'"';
            $sql = $conexion->query( $sql );
            $sql = $sql->fetch_assoc();

            if ( $sql == NULL ) {
                $errores .= 'No se ha encontrado la evaluación.<br>';
            } else {

                // GUARDAR INFORMACIÓN DE LA EVALUACIÓN
                $id_aplicacion = $sql['id'];
                $estado_aplicacion = $sql['estado'];
                $nombre_evaluado = $sql['nombre'] . ' ' . $sql['apellidos'];
                $puesto_evaluado = $sql['puesto'];
                $evaluacion_fin = $sql['fin'];
                $nombre_cuestionario = $sql['cuestionario'];
    
                switch ( $estado_aplicacion ) {
                    case 'A':
                        $conexion->query(
                            'UPDATE aplicaciones SET aplicaciones.estado = "B" 
                            WHERE aplicaciones.id = '.$id_aplicacion.''
                        );
                        break;
                    case 'C':
                        $errores .= 'Este cuestionario se encuentra cerrado. <br>';
                        break;
                    default:
                        # code...
                        break;
                }
    
                $sql = 'SELECT DISTINCT preguntas.pagina
                        AS TOTAL_PAGINAS 
                        FROM preguntas 
                        INNER JOIN cuestionarios 
                        ON preguntas.id_cuestionario = cuestionarios.id
                        INNER JOIN evaluaciones 
                        ON cuestionarios.id = evaluaciones.id_cuestionario 
                        INNER JOIN aplicaciones 
                        ON evaluaciones.id = aplicaciones.id_evaluacion 
                        WHERE aplicaciones.id = '.$id_aplicacion.' 
                        ORDER BY preguntas.pagina 
                        DESC LIMIT 1';
                        
                $sql = $conexion->query( $sql );
                $sql = $sql->fetch_assoc();
                $total_paginas =  $sql['TOTAL_PAGINAS'];
    
                $sql = 'SELECT DISTINCT aplicaciones.pagina 
                        AS PAGINA_ACTUAL
                        FROM aplicaciones 
                        WHERE aplicaciones.id = '.$id_aplicacion.'';
    
                $sql = $conexion->query( $sql );
                $sql = $sql->fetch_assoc();
                $pagina_actual =  $sql['PAGINA_ACTUAL'];
                
                $pagina_actual = ( $pagina_actual == 0 ) ? 1 : $pagina_actual;
    
                $sql = 'SELECT preguntas.id, preguntas.orden, preguntas.pagina,             preguntas.pregunta, preguntas.tipo
                        FROM preguntas
                        INNER JOIN cuestionarios
                        ON preguntas.id_cuestionario = cuestionarios.id
                        INNER JOIN evaluaciones
                        ON cuestionarios.id = evaluaciones.id_cuestionario
                        INNER JOIN aplicaciones
                        ON evaluaciones.id = aplicaciones.id_evaluacion
                        WHERE aplicaciones.id = '.$id_aplicacion.'
                        AND preguntas.pagina = '.$pagina_actual.'
                        ORDER BY preguntas.orden';
    
                //GET PREGUNTAS DE LA PÁGINA ACTUAL
                $sql_preguntas_pagina = $conexion->query( $sql );

                // GET TOTAL DE RESPUESTAS Y PREGUNTAS PARA PODER SACAR EL PORCENTAJE COMPLETADO
                $sql = 'SELECT COUNT(preguntas.id) 
                        AS PREGUNTAS 
                        FROM preguntas 
                        INNER JOIN cuestionarios 
                        ON preguntas.id_cuestionario = cuestionarios.id 
                        INNER JOIN evaluaciones 
                        ON cuestionarios.id = evaluaciones.id_cuestionario 
                        INNER JOIN aplicaciones 
                        ON evaluaciones.id = aplicaciones.id_evaluacion
                        WHERE aplicaciones.id = '.$id_aplicacion.'';
                $sql = $conexion->query( $sql );
                $row = $sql->fetch_assoc();
                $total_preguntas =  $row['PREGUNTAS'];
                
                $sql = 'SELECT COUNT( resultados.id_pregunta ) 
                        AS RESULTADOS
                        FROM resultados 
                        WHERE resultados.id_aplicacion = '.$id_aplicacion.'';
                $sql = $conexion->query( $sql );
                $row = $sql->fetch_assoc();
                $total_respuestas =  $row['RESULTADOS'];
    
                // CALCULAR EL PORCENTAJE COMPLETADO
                $porcentaje_completado = ( $total_respuestas == 0 ) ? 0 : ( 100/$total_preguntas ) * $total_respuestas;
    
                // REDONDEAR PORCENTAJE COMPLETADO
                $porcentaje_completado = round( $porcentaje_completado, 0, PHP_ROUND_HALF_UP );
                if ( $porcentaje_completado > 100 ) {
                    $porcentaje_completado = 100  . '%';
                } else {
                    $porcentaje_completado = $porcentaje_completado  . '%';
                }
                $numero_pregunta = $total_respuestas + 1;
                $echo_pregunta = '';
                while ( $row = $sql_preguntas_pagina->fetch_assoc() ) {
                        $echo_pregunta .= '<div class="form-group pt-3 pb-3">';
    
                        $echo_pregunta .= '<p>'. $numero_pregunta++ . '.-' . $row['pregunta'].'</p>';
    
                        if ( $row['tipo'] == 'A' ) {
                            $echo_pregunta .= '
                            <div class="container">
                                <input type="text" class="form-control" id="'.$row['id'].'" name="'.$row['id'].'|'.$numero_pregunta.'" placeholder="Respuesta" required>
                            </div>';
                        } else {
                            $sql = 'SELECT respuestas.id ,respuestas.respuesta
                                    FROM respuestas
                                    INNER JOIN preguntas_respuestas
                                    ON respuestas.id = preguntas_respuestas.id_respuesta
                                    WHERE preguntas_respuestas.id_pregunta = '.$row['id'].'';
                            $sql_respuestas_m = $conexion->query( $sql );
                            $total_rows_sql_respuestas_m = $sql_respuestas_m->num_rows;
                            // $contador_row = 0;
                            while ( $row_respuesta = $sql_respuestas_m->fetch_assoc() ) {
                                // $contador_row++;
                                // if ( $contador_row == $total_rows_sql_respuestas_m ) {
                                //     $echo_pregunta .= '
                                //     <div class="form-check ml-4 mr-4">
                                //         <label class="form-check-label">
                                //             <input class="form-check-input" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="'.$row_respuesta['id'].'" required>
                                //                 '.$row_respuesta['respuesta'].'
                                //         </label>
                                //         <input style="visibility: hidden;" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="none" checked">
                                //     </div>';
                                //     // $echo_pregunta .= '
                                //     // <div class="form-check ml-4 mr-4">
                                //     //     <label class="form-check-label">
                                //     //         <input class="form-check-input" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="'.$row_respuesta['id'].'" required>
                                //     //             '.$row_respuesta['respuesta'].'
                                //     //     </label>
                                //     //     <input style="visibility: hidden;" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="none" checked">
                                //     // </div>';
                                // } else {
                                //     $echo_pregunta .= '
                                //     <div class="form-check ml-4 mr-4">
                                //         <label class="form-check-label">
                                //             <input class="form-check-input" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="'.$row_respuesta['id'].'" required>
                                //                 '.$row_respuesta['respuesta'].'
                                //         </label>
                                //     </div>';
                                // }
                                $echo_pregunta .= '
                                <div class="form-check ml-4 mr-4">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="'.$row_respuesta['id'].'" required>
                                            '.$row_respuesta['respuesta'].'
                                    </label>
                                </div>';
                                // $echo_pregunta .= '
                                // <div class="form-check ml-4 mr-4">
                                //     <label class="form-check-label">
                                //         <input class="form-check-input" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="'.$row_respuesta['id'].'" required>
                                //             '.$row_respuesta['respuesta'].'
                                //     </label>
                                //     <input style="visibility: hidden;" type="radio" name="'.$row['id'].'|'.$numero_pregunta.'" value="none" checked">
                                // </div>';
                            }
                        }
                        $echo_pregunta .= '</div>';
                        $echo_pregunta .= '<hr>';
                }
    
            }
            $conexion->close();
        }
        $vista_html = true;
    }

    
    if ( $_SERVER['REQUEST_METHOD']  ==  'POST' ) {
        // var_dump( $_POST );
        $id_aplicacion = $_POST['id_aplicacion'];

        $sql = $conexion->query(
            'SELECT 
                aplicaciones.hash AS EVALUACION_HASH
            FROM aplicaciones
            WHERE aplicaciones.id = '.$id_aplicacion.''
        );
        $sql = $sql->fetch_assoc();
        $hash_evaluacion = $sql['EVALUACION_HASH'];

        // COMPROBAR QUE TODAS LAS PREGUNTAS TENGAN RESPUESTA
        foreach ($_POST as $key => $value) {
            if ( $key == 'id_aplicacion' ) {
                continue;
            }

            $explode_pregunta = explode ("|",$key);
            $numero_pregunta = $explode_pregunta[1];
            if ( $value == 'none' || $value == '' ) {
                $errores .= 'No se ha respondido la pregunta número '.($numero_pregunta-1).'<br>';
            }
        }

        if ( $errores == '' ) {
            // POR CADA VALOR DE $POST COMO $KEY SACAR $VALUE
            foreach ($_POST as $key => $value) {
                $explode_pregunta = explode ("|",$key);
                $id_pregunta = $explode_pregunta[0];
                // SI SE LLEGA AL ID_APLICACION QUE NO HAGA NADA
                if ( $key != 'id_aplicacion' ) {

                    // GET TIPO Y ORDEN PREGUNTA
                    $sql = '
                        SELECT
                            preguntas.tipo AS TIPO_PREGUNTA,
                            preguntas.orden AS ORDEN_PREGUNTA
                        FROM preguntas
                        INNER JOIN cuestionarios
                        ON preguntas.id_cuestionario = cuestionarios.id
                        INNER JOIN evaluaciones
                        ON cuestionarios.id = evaluaciones.id_cuestionario
                        INNER JOIN aplicaciones
                        ON evaluaciones.id = aplicaciones.id_evaluacion
                        WHERE aplicaciones.id = '.$id_aplicacion.'
                        AND preguntas.id = '.$id_pregunta.'';
                    $sql = $conexion->query( $sql );
                    $sql = $sql->fetch_assoc();
                    $tipo_pregunta = $sql['TIPO_PREGUNTA'];
                    $orden_pregunta = $sql['ORDEN_PREGUNTA'];
                    
                    if ( $tipo_pregunta == 'M' ) {
                        // GET PUNTOS, ID_RESPUESTA
                        $sql = '
                            SELECT 
                                preguntas_respuestas.puntos,
                                preguntas_respuestas.id_respuesta
                            FROM preguntas_respuestas
                            WHERE preguntas_respuestas.id_pregunta = '.$id_pregunta.'
                            AND preguntas_respuestas.id_respuesta = '.$value.'';
                        $sql = $conexion->query( $sql );
                        $sql = $sql->fetch_assoc();
                        $puntos_pregunta = $sql['puntos'];
                        $id_respuesta = $sql['id_respuesta'];


                        $sql_resultado_existe = '
                            SELECT resultados.id
                            FROM resultados
                            WHERE id_aplicacion = '.$id_aplicacion.'
                            AND id_pregunta = '.$id_pregunta.'
                            AND id_respuesta = '.$id_respuesta.'
                            AND orden = '.$orden_pregunta.'
                            AND puntos = '.$puntos_pregunta.'';
                        $sql_resultado_existe = $conexion->query( $sql_resultado_existe );
                        if ( $sql_resultado_existe->num_rows == 0 ) {
                            // INSERT RESPUESTA
                            $sql = '
                                INSERT INTO resultados (
                                    id,
                                    id_aplicacion,
                                    id_pregunta,
                                    id_respuesta,
                                    orden,
                                    creacion,
                                    puntos,
                                    texto_libre,
                                    ip
                                ) VALUES (
                                    NULL,
                                    '.$id_aplicacion.',
                                    '.$id_pregunta.',
                                    '.$id_respuesta.',
                                    '.$orden_pregunta.',
                                    NOW(),
                                    '.$puntos_pregunta.',
                                    NULL,
                                    "'.$_SERVER['REMOTE_ADDR'].'"
                                )';
                            $conexion->query( $sql );
                        }
                    } else {
                        $sql_resultado_existe = '
                            SELECT resultados.id
                            FROM resultados
                            WHERE id_aplicacion = '.$id_aplicacion.'
                            AND id_pregunta = '.$id_pregunta.'
                            AND id_respuesta = -1
                            AND orden = '.$orden_pregunta.'
                            AND texto_libre = "'.$value.'"';
                        $sql_resultado_existe = $conexion->query( $sql_resultado_existe );
                        if ( $sql_resultado_existe->num_rows == 0 ) {
                            $sql = '
                                INSERT INTO resultados (
                                    id,
                                    id_aplicacion,
                                    id_pregunta,
                                    id_respuesta,
                                    orden,
                                    creacion,
                                    puntos,
                                    texto_libre,
                                    ip
                                ) VALUES (
                                    NULL,
                                    '.$id_aplicacion.',
                                    '.$id_pregunta.',
                                    -1,
                                    '.$orden_pregunta.',
                                    NOW(),
                                    NULL,
                                    "'.$value.'",
                                    "'.$_SERVER['REMOTE_ADDR'].'"
                                )';
                            $conexion->query( $sql );
                        }
                    }

                }
            }

            $sql = '
                SELECT 
                    aplicaciones.pagina AS PAGINA_ACTUAL
                    FROM aplicaciones
                    WHERE aplicaciones.id = '.$id_aplicacion.'';
            $sql = $conexion->query( $sql );
            $sql = $sql->fetch_assoc();
            $pagina_actual = $sql['PAGINA_ACTUAL'];

            $sql = '
                SELECT DISTINCT 
                    preguntas.pagina AS TOTAL_PAGINAS
                    FROM preguntas
                    INNER JOIN cuestionarios
                    ON preguntas.id_cuestionario = cuestionarios.id
                    INNER JOIN evaluaciones
                    ON cuestionarios.id = evaluaciones.id_cuestionario
                    INNER JOIN aplicaciones
                    ON evaluaciones.id = aplicaciones.id_evaluacion
                    WHERE aplicaciones.id = '.$id_aplicacion.'
                    ORDER BY preguntas.pagina
                    DESC LIMIT 1';
            $sql = $conexion->query( $sql );
            $sql = $sql->fetch_assoc();
            $total_paginas = $sql['TOTAL_PAGINAS'];

            if ( $pagina_actual == $total_paginas ) {
                $conexion->query(
                    'UPDATE aplicaciones
                    SET aplicaciones.estado = "C",
                        aplicaciones.finalizado = NOW()
                    WHERE aplicaciones.id = '.$id_aplicacion.''
                );

                $sql = $conexion->query(
                    'SELECT
                        id_evaluado,
                        id_evaluador
                    FROM aplicaciones
                    WHERE aplicaciones.id = '.$id_aplicacion.''
                );

                $sql = $sql->fetch_assoc();
                $id_evaluado = $sql['id_evaluado'];
                $id_evaluador = $sql['id_evaluador'];

                $sql_resultado_existe = '
                    SELECT notificaciones.id_notificaciones
                    FROM notificaciones
                    WHERE id_evaluado = '.$id_evaluado.'
                    AND id_evaluador = '.$id_evaluador.'
                    AND id_aplicacion = '.$id_aplicacion.'';
                $sql_resultado_existe = $conexion->query( $sql_resultado_existe );
                if ( $sql_resultado_existe->num_rows == 0 ) {
                    $conexion->query(
                        'INSERT INTO notificaciones (
                            id_notificaciones,
                            id_evaluado,
                            id_evaluador,
                            id_aplicacion,
                            estado_visto,
                            fecha_creacion,
                            fecha_visto
                        ) VALUES (
                            NULL,
                            '.$id_evaluado.',
                            '.$id_evaluador.',
                            '.$id_aplicacion.',
                            0,
                            NOW(),
                            NULL
                        )'
                    );
                }
            } else {
                $pagina_actualizada = $pagina_actual + 1;
                $sql = $conexion->query(
                    'UPDATE aplicaciones
                    SET aplicaciones.pagina = '.$pagina_actualizada.'
                    WHERE aplicaciones.id = '.$id_aplicacion.''
                );
                header( 'Location: cuestionario.php?id=' . $hash_evaluacion . '' );
            }

        }

        $vista_html = false;
    }

    require_once 'views/cuestionario.view.php';

?>