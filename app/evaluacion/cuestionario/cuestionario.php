<?php
    require_once "../../../config/global.php";
    require_once "../../../config/db.php";
    define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad

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
                            'UPDATE aplicaciones SET aplicaciones.estado = "B"'
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
    
                $echo_pregunta = '';
                while ( $row = $sql_preguntas_pagina->fetch_assoc() ) {
                        $echo_pregunta .= '<div class="form-group pt-3 pb-3">';
    
                        $echo_pregunta .= '<p>'. $row['orden'] . '.-' . $row['pregunta'].'</p>';
    
                        if ( $row['tipo'] == 'A' ) {
                            $echo_pregunta .= '
                            <div class="container">
                                <input type="text" class="form-control" id="'.$row['id'].'" name="'.$row['id'].'" placeholder="Respuesta">
                            </div>';
                        } else {
                            $sql = 'SELECT respuestas.id ,respuestas.respuesta
                                    FROM respuestas
                                    INNER JOIN preguntas_respuestas
                                    ON respuestas.id = preguntas_respuestas.id_respuesta
                                    WHERE preguntas_respuestas.id_pregunta = '.$row['id'].'';
                            $sql_respuestas_m = $conexion->query( $sql );
                            $total_rows_sql_respuestas_m = $sql_respuestas_m->num_rows;
                            $contador_row = 0;
                            while ( $row_respuesta = $sql_respuestas_m->fetch_assoc() ) {
                                $contador_row++;
                                if ( $contador_row == $total_rows_sql_respuestas_m ) {
                                    $echo_pregunta .= '
                                    <div class="form-check ml-4 mr-4">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="'.$row['id'].'" value="'.$row_respuesta['id'].'">
                                                '.$row_respuesta['respuesta'].'
                                        </label>
                                        <input style="visibility: hidden;" type="radio" name="'.$row['id'].'" value="none" checked>
                                    </div>';
                                } else {
                                    $echo_pregunta .= '
                                    <div class="form-check ml-4 mr-4">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="'.$row['id'].'" value="'.$row_respuesta['id'].'">
                                                '.$row_respuesta['respuesta'].'
                                        </label>
                                    </div>';
                                }
                            }
                        }
                        $echo_pregunta .= '</div>';
                        $echo_pregunta .= '<hr>';
                }
    
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
    
            }
            $conexion->close();
        }
        $vista_html = true;
    }

    
    if ( $_SERVER['REQUEST_METHOD']  ==  'POST' ) {
        foreach ($_POST as $key => $value) {
            if ( $value == 'none' || $value == '' ) {
                $errores .= 'No se han respondido todas las preguntas.<br>';
            }
            if ( $key == 'id_aplicacion' ) {
                break;
            }
        }

        if ( $errores == '' ) {
            $respuesta_existe = 0;
            foreach ($_POST as $key => $value) {
                if ( $key != 'id_aplicacion' ) {
                    $sql = 'SELECT preguntas.tipo, preguntas.orden 
                            AS ORDEN_PREGUNTA 
                            FROM preguntas 
                            INNER JOIN cuestionarios 
                            ON preguntas.id_cuestionario = cuestionarios.id INNER JOIN evaluaciones 
                            ON cuestionarios.id = evaluaciones.id_cuestionario INNER JOIN aplicaciones 
                            ON evaluaciones.id = aplicaciones.id_evaluacion WHERE aplicaciones.id = '.$_POST['id_aplicacion'].'
                            AND preguntas.id = '.$key.'';
                    $sql = $conexion->query( $sql );
                    $sql = $sql->fetch_assoc();
                    $orden_pregunta = $sql['ORDEN_PREGUNTA'];
                    $tipo_pregunta = $sql['tipo'];

                    $sql = 'SELECT resultados.id_respuesta
                            FROM resultados
                            WHERE id_pregunta = '.$key.'
                            AND resultados.id_aplicacion = '.$_POST['id_aplicacion'].'';
                    $sql = $conexion->query( $sql );
                    $respuesta_existe += $sql->num_rows;

                    if ( $tipo_pregunta == 'M' ) {
                        $sql = 'SELECT preguntas_respuestas.puntos,                     preguntas_respuestas.id_respuesta 
                                FROM preguntas_respuestas 
                                WHERE preguntas_respuestas.id_pregunta = '.$key.'';
                        $sql = $conexion->query( $sql );
                        $sql = $sql->fetch_assoc();
                        $pregunta_puntos = $sql['puntos'];
                        $id_respuesta = $sql['id_respuesta'];

                        $sql = 'SELECT resultados.id_respuesta
                                FROM resultados
                                WHERE id_pregunta = '.$key.'
                                AND resultados.id_aplicacion = '.$_POST['id_aplicacion'].'';
                        $sql = $conexion->query( $sql );

                        if ( $respuesta_existe == 0 ) {
                            $sql = 'INSERT INTO resultados (id, id_aplicacion, id_pregunta, id_respuesta, orden, creacion, puntos, texto_libre, ip) VALUES (NULL, '.$_POST['id_aplicacion'].', '.$key.', '.$id_respuesta.', '.$orden_pregunta.', NOW(), '.$pregunta_puntos.', NULL, "'.$_SERVER['REMOTE_ADDR'].'")';
                            $conexion->query( $sql );
                        }
                    } else {
                        $sql = 'SELECT resultados.id_respuesta
                                FROM resultados
                                WHERE id_pregunta = '.$key.'
                                AND resultados.id_aplicacion = '.$_POST['id_aplicacion'].'';
                        $sql = $conexion->query( $sql );

                        if ( $respuesta_existe == 0 ) {
                            $sql = 'INSERT INTO resultados (id, id_aplicacion, id_pregunta, id_respuesta ,orden, creacion, puntos, texto_libre, ip) VALUES (NULL, '.$_POST['id_aplicacion'].', '.$key.', -1, '.$orden_pregunta.', NOW(), NULL, "'.$value.'", "'.$_SERVER['REMOTE_ADDR'].'")';
                            $conexion->query( $sql );
                        }
                    }
                   
                }
            }

            $sql = 'SELECT aplicaciones.pagina 
                    AS PAGINA_ACTUAL 
                    FROM aplicaciones 
                    WHERE aplicaciones.id = '.$_POST['id_aplicacion'].'';
            $sql = $conexion->query( $sql );
            $sql = $sql->fetch_assoc();
            $pagina_actual = $sql['PAGINA_ACTUAL'];

            //LLEGA A LA PÁGINA FINAL
            $sql = 'SELECT DISTINCT preguntas.pagina AS TOTAL_PAGINAS
                    FROM preguntas
                    INNER JOIN cuestionarios
                    ON preguntas.id_cuestionario = cuestionarios.id
                    INNER JOIN evaluaciones
                    ON cuestionarios.id = evaluaciones.id_cuestionario
                    INNER JOIN aplicaciones
                    ON evaluaciones.id = aplicaciones.id_evaluacion
                    WHERE aplicaciones.id = '.$_POST['id_aplicacion'].'
                    ORDER BY preguntas.pagina DESC LIMIT 1';
            $sql = $conexion->query( $sql );
            $sql = $sql->fetch_assoc();
            $total_paginas = $sql['TOTAL_PAGINAS'];

            if ( $pagina_actual == $total_paginas && $respuesta_existe == 0 ) {
                $sql = $conexion->query(
                    'UPDATE aplicaciones SET aplicaciones.estado = "C"'
                );
            } else {
                if ( $respuesta_existe == 0 ) {
                    $pagina_actualizada = $pagina_actual + 1;
                    $sql = $conexion->query(
                        'UPDATE aplicaciones SET aplicaciones.pagina = '.$pagina_actualizada.' WHERE aplicaciones.id = '.$_POST['id_aplicacion'].''
                    );
                    $sql = $conexion->query(
                        'SELECT aplicaciones.hash AS EVALUACION_HASH FROM aplicaciones WHERE aplicaciones.id = '.$_POST['id_aplicacion'].''
                    );
                    $sql = $sql->fetch_assoc();
                    $hash_evaluacion = $sql['EVALUACION_HASH'];
                    header( 'Location: cuestionario.php?id='.$hash_evaluacion.'' );
                }
            }

        }

        $vista_html = false;
    }

    require_once 'views/cuestionario.view.php';

?>