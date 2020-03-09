<?php
    session_start();
    require_once '../models/modelo/consolidado_early.modelo.php';
    require_once '../models/modelo/envioSMS.php';

    $objConsolidado = new ConsolidadoModelo();
    $objMensaje = new envioSMS();

    if(isset($_GET["operacion"])){


        if($_GET["operacion"] == 'getdatos'){

            $resultado = $objConsolidado->getDatos($_GET["region"]);

            
            $_SESSION["destinatarios"] = $resultado;
            
            echo json_encode($resultado);


        }

        if($_GET["operacion"] == "enviar"){

            //ENVIAR MENSAJE

            if( count($_SESSION["destinatarios"]) > 0){

                //ENVIANDO MENSAJES
                foreach($_SESSION["destinatarios"] as $fila){

                    /*
                    $alta = floatval($fila->early_alta);
                    $porta = floatval($fila->early_porta);
                    $reno = floatval($fila->early_reno);*/


                    //ARMANDO MENSAJE
                    $mensaje = "Estimado $fila->destinatario:   Se envia reporte de early al $fila->fecha_reg:
                    Earlys:
                    $fila->early
                    $fila->operacion - $fila->region : $fila->valor_early
                    Saludos";


                    echo $mensaje."<br>";


                    //$objMensaje->EnviarMensaje($fila->linea_dest,$mensaje);

                }
            }else{
                echo "vacio";
            }

            

           

        }

    }


?>