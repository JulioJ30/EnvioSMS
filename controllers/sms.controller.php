<?php


    require_once '../models/envioSMS.php';
    $sms = new envioSMS();

    if(isset($_GET["operacion"])){

        if($_GET['operacion'] == "enviarSMS"){

            $sms->EnviarMensaje($_GET["numero"],$_GET["mensaje"]);

        }

    }


?>