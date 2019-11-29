<?php

/*
TODO:
    - Mostrar a quien se está evaluando.
    - Contar con una fecha y hora de caducidad.
    - Mostrar en una o más páginas las preguntas a responder (paginación).
    - Mostrar al evaluador el porcentaje o información sobre su avance.
    - Validar que sean respondidas aquellas preguntas que sean obligatorias.
    - Guardar las respuestas que el evaluador ha registrado.
    - Permitir reanudar en otro momento al evaluador.
    - Validar que solo se ha contestada una vez.
    - Permitir desactivarla/cancelarla para prevenir sea respondida.
*/


    require_once '../../../config/global.php';
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
                    if ( $row['estado'] == 'C' ) {
                        $errores .= 'Este cuestionario se encuentra cerrado. <br>';
                    }
                }
            }

            $aplicacion_estado = $conexion->query( $sql );
            $aplicacion_estado = $aplicacion_estado->fetch_assoc();
            $aplicacion_estado = $aplicacion_estado['estado'];

            //GET ID EVALUACIÓN
            $sql = $conexion->query(
                'SELECT id AS ID_APLICACION FROM aplicaciones WHERE hash = "'.$hash_evaluacion.'"'
            );
            $sql = $sql->fetch_assoc();
            $id_evaluacion = $sql['ID_APLICACION'];

            $sql = $conexion->query(
                'SELECT empleados.id, empleados.nombre, empleados.apellidos, puestos.puesto, evaluaciones.fin
                FROM empleados 
                INNER JOIN puestos 
                ON empleados.id_puesto = puestos.id 
                INNER JOIN aplicaciones 
                ON empleados.id = aplicaciones.id_evaluado 
                INNER JOIN evaluaciones
                on aplicaciones.id_evaluacion = evaluaciones.id
                WHERE aplicaciones.id = '.$id_evaluacion.''
            );
            $evaluacion_info = $sql->fetch_assoc();

            //SELECT PREGUNTAS CUESTIONARIO
            $sql = 'SELECT SQL_CALC_FOUND_ROWS preguntas.id 
            FROM preguntas
            INNER JOIN cuestionarios
            ON preguntas.id_cuestionario = cuestionarios.id
            INNER JOIN evaluaciones
            ON cuestionarios.id = evaluaciones.id_cuestionario
            INNER JOIN aplicaciones
            ON evaluaciones.id = aplicaciones.id_evaluacion
            WHERE aplicaciones.hash = "'.$hash_evaluacion.'"
            ORDER BY preguntas.orden';

            $query_questions = $conexion->query( $sql );

            if ( !($query_questions->num_rows > 0) ) {
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

            $porcentaje_completado = ( 100/$total_preguntas ) * $total_respuestas;

            $porcentaje_completado = round( $porcentaje_completado, 0, PHP_ROUND_HALF_UP );
            if ( $porcentaje_completado > 100 ) {
                $porcentaje_completado = 100  . '%';
            } else {
                $porcentaje_completado = $porcentaje_completado  . '%';
            }


            $conexion->close();
        } else {    
            $errores .= 'No se ha proporcionado información.<br>';
        }

    }


    require_once 'views/index.view.php';