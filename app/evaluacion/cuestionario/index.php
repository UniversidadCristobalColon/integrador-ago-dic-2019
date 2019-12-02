<?php

    require_once '../../../config/global.php';
    require_once "../../../config/db.php";

    define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad

    $errores = '';
    if ( $_SERVER['REQUEST_METHOD']  ==  'GET' ) {

        // GET HASH
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
                    evaluaciones.fin 
                    FROM aplicaciones 
                    INNER JOIN empleados
                    ON aplicaciones.id_evaluado = empleados.id
                    INNER JOIN puestos
                    ON empleados.id_puesto=puestos.id
                    INNER JOIN evaluaciones
                    ON aplicaciones.id_evaluacion=evaluaciones.id
                    WHERE aplicaciones.hash = "'.$hash_evaluacion.'"';
            $sql = $conexion->query( $sql );
            $sql = $sql->fetch_assoc();

            // TEXTO DEL BOTÓN
            if ( $sql == NULL ) {
                $errores .= 'No se ha encontrado la evaluación.<br>';
            } else {
                switch ( $sql['estado'] ) {
                    case 'A':
                        $texto_boton = 'Comenzar evaluación';
                        break;
                    case 'B':
                        $texto_boton = 'Continuar evaluación';
                        break;
                    case 'C':
                        $texto_boton = 'Evaluación terminada';
                        break;
                    default:
                        # code...
                        break;
                }
    
                // GUARDAR INFORMACIÓN DE LA EVALUACIÓN
                $id_aplicacion = $sql['id'];
                $nombre_evaluado = $sql['nombre'] . ' ' . $sql['apellidos'];
                $puesto_evaluado = $sql['puesto'];
                $evaluacion_fin = $sql['fin'];
    
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
    }

    require_once 'views/index.view.php';

?>