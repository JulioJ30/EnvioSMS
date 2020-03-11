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


                    //ARMANDO MENSAJE
                    $mensaje = "Estimado $fila->destinatario:   Se envia reporte de early al $fila->fecha_reg:
                    Earlys:\n";
                    
                    $array = explode(',',$fila->early);


                    //echo $fila->early;

                    for($i = 0;$i < count($array);$i++){
                        $mensaje .= $array[$i]."\n";

                        $objeto = $objConsolidado->getDatosOperacion($array[$i],$fila->destinatario);
                        //var_dump($objeto);
                        foreach($objeto as $fila2 ){
                            $mensaje .= $fila2->valor."\n";
                        }

                    }
                    
                    $mensaje .= "REGION: " . $fila->region;

                    //$objMensaje->EnviarMensaje($fila->linea_dest,$mensaje);

                }
            }else{
                echo "vacio";
            }

            

           

        }

    }


?>