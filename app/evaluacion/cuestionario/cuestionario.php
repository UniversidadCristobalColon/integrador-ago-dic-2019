<?php
    require_once "../../../config/global.php";
    require_once "../../../config/db.php";
    define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad

    $errores = '';
    if ( $_SERVER['REQUEST_METHOD']  ==  'GET' ) {
        if ( isset($_GET['id']) ) {
            $hash_evaluacion = $_GET['id'];
        }
        
        if ( isset( $hash_evaluacion ) && $hash_evaluacion !== '' ) {
            //SELECT ESTADO APLICACIÓN (EVALUACIÓN)
            $sql = 'SELECT estado FROM aplicaciones
            WHERE aplicaciones.hash = "'.$hash_evaluacion.'"';
            $query_result = $conexion->query( $sql );
            if ( $query_result->num_rows > 0 ) {
                while ( $row = $query_result->fetch_assoc() ) {
                    if ( $row['estado'] == 'A' ) {
                        $sql = $conexion->query(
                            'UPDATE aplicaciones SET aplicaciones.estado = "B"'
                        );
                    }
                    if ( $row['estado'] == 'C' ) {
                        $errores .= 'Este cuestionario se encuentra cerrado. <br>';
                    }
                }
            }

            //GET ID EVALUACIÓN
            $sql = $conexion->query(
                'SELECT id AS ID_APLICACION FROM aplicaciones WHERE hash = "'.$hash_evaluacion.'"'
            );
            $sql = $sql->fetch_assoc();
            $id_evaluacion = $sql['ID_APLICACION'];

            //PAGINACIÓN
            $sql = $conexion->query(
                'SELECT DISTINCT preguntas.pagina AS TOTAL_PAGINAS
                FROM preguntas
                INNER JOIN cuestionarios
                ON preguntas.id_cuestionario = cuestionarios.id
                INNER JOIN evaluaciones
                ON cuestionarios.id = evaluaciones.id_cuestionario
                INNER JOIN aplicaciones
                ON evaluaciones.id = aplicaciones.id_evaluacion
                WHERE aplicaciones.hash = "'.$hash_evaluacion.'"
                ORDER BY preguntas.pagina DESC LIMIT 1'
            );
            $sql = $sql->fetch_assoc();
            $total_paginas = $sql['TOTAL_PAGINAS'];

            $sql = $conexion->query(
                'SELECT aplicaciones.pagina AS PAGINA_ACTUAL FROM aplicaciones WHERE aplicaciones.hash = "'.$hash_evaluacion.'"'
            );
            $sql = $sql->fetch_assoc();
            $pagina_actual = $sql['PAGINA_ACTUAL'];
            $pagina_actual = ( $pagina_actual == 0 ) ? 1 : $pagina_actual;

            //GET PREGUNTAS DE LA PÁGINA ACTUAL
            $sql_preguntas_pagina = $conexion->query(
                'SELECT preguntas.id, preguntas.orden, preguntas.pagina, preguntas.pregunta, preguntas.tipo
                FROM preguntas
                INNER JOIN cuestionarios
                ON preguntas.id_cuestionario = cuestionarios.id
                INNER JOIN evaluaciones
                ON cuestionarios.id = evaluaciones.id_cuestionario
                INNER JOIN aplicaciones
                ON evaluaciones.id = aplicaciones.id_evaluacion
                WHERE aplicaciones.hash = "'.$hash_evaluacion.'"
                AND preguntas.pagina = '.$pagina_actual.'
                ORDER BY preguntas.orden'
            );
            $echo_pregunta = '';
            while ($row = $sql_preguntas_pagina->fetch_assoc()) {
                    $echo_pregunta .= '<div class="form-group pt-3 pb-3">';

                    $echo_pregunta .= '<p>'.$row['pregunta'].'</p>';

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

            //SELECT PREGUNTAS CUESTIONARIO
            $sql = 'SELECT SQL_CALC_FOUND_ROWS preguntas.id, preguntas.pregunta, preguntas.tipo
            FROM preguntas
            INNER JOIN cuestionarios
            ON preguntas.id_cuestionario = cuestionarios.id
            INNER JOIN evaluaciones
            ON cuestionarios.id = evaluaciones.id_cuestionario
            INNER JOIN aplicaciones
            ON evaluaciones.id = aplicaciones.id_evaluacion
            WHERE aplicaciones.hash = "'.$hash_evaluacion.'"
            ORDER BY preguntas.orden';

            $calc_preguntas = $conexion->query( $sql );

            if ( !($calc_preguntas->num_rows > 0) ) {
                $errores .= 'No se ha encontrado el cuestionario.<br>';
            }

            //SELECT TOTAL PREGUNTAS
            $total_preguntas = $conexion->query( 
                'SELECT FOUND_ROWS() as TOTAL_PREGUNTAS'
            );
            $total_preguntas = $total_preguntas->fetch_assoc();
            $total_preguntas = $total_preguntas['TOTAL_PREGUNTAS'];

            //SELECT DE LAS PREGUNTAS QUE TIENEN RESPUESTAS PERO COMO SE GUARDAN EN PREGUNTAS RESPUESTAS BASTA CON HACER EL QUERY DE AHÍ
            $total_respuestas = $conexion->query(
                'SELECT SQL_CALC_FOUND_ROWS resultados.id_pregunta
                FROM resultados
                WHERE resultados.id_aplicacion = (SELECT id FROM aplicaciones WHERE aplicaciones.hash = "'.$hash_evaluacion.'")'
            );

            $total_respuestas = $conexion->query(
                'SELECT FOUND_ROWS() as TOTAL_RESPUESTAS'
            );
            $total_respuestas = $total_respuestas->fetch_assoc();
            $total_respuestas = $total_respuestas['TOTAL_RESPUESTAS'];

            if ( $total_preguntas != 0 ) {
                $porcentaje_completado = ( 100/$total_preguntas ) * $total_respuestas;
                $porcentaje_completado = round( $porcentaje_completado, 0, PHP_ROUND_HALF_UP ) . '%';
            }

            //GET ID EVALUACIÓN
            $sql = $conexion->query(
                'SELECT id AS ID_APLICACION FROM aplicaciones WHERE hash = "'.$hash_evaluacion.'"'
            );
            $sql = $sql->fetch_assoc();
            $id_evaluacion = $sql['ID_APLICACION'];

            $sql = $conexion->query(
                'SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, evaluaciones.fin, cuestionarios.cuestionario
                FROM empleados 
                INNER JOIN puestos 
                ON empleados.id_puesto = puestos.id 
                INNER JOIN aplicaciones 
                ON empleados.id = aplicaciones.id_evaluado 
                INNER JOIN evaluaciones
                ON aplicaciones.id_evaluacion = evaluaciones.id
                INNER JOIN cuestionarios
                ON cuestionarios.id = evaluaciones.id_cuestionario
                WHERE aplicaciones.hash = "'.$hash_evaluacion.'"'
            );
            $evaluacion_info = $sql->fetch_assoc();

            $vista_html = true;

            $conexion->close();
        } else {    
            $errores .= 'No se ha proporcionado información.<br>';
        }

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
                        $sql = 'SELECT preguntas_respuestas.puntos, preguntas_respuestas.id_respuesta 
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
            $sql = $conexion->query(
                'SELECT aplicaciones.pagina AS PAGINA_ACTUAL FROM aplicaciones WHERE aplicaciones.id = '.$_POST['id_aplicacion'].''
            );
            $sql = $sql->fetch_assoc();
            $pagina_actual = $sql['PAGINA_ACTUAL'];

            //LLEGA A LA PÁGINA FINAL
            $sql = $conexion->query(
                'SELECT DISTINCT preguntas.pagina AS TOTAL_PAGINAS
                FROM preguntas
                INNER JOIN cuestionarios
                ON preguntas.id_cuestionario = cuestionarios.id
                INNER JOIN evaluaciones
                ON cuestionarios.id = evaluaciones.id_cuestionario
                INNER JOIN aplicaciones
                ON evaluaciones.id = aplicaciones.id_evaluacion
                WHERE aplicaciones.id = '.$_POST['id_aplicacion'].'
                ORDER BY preguntas.pagina DESC LIMIT 1'
            );
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