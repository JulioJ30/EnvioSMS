<?php

class envioSMS{

    //CODIGO PARA ENVIAR MENSAJES
    private $token = '';	//<<< COMPLETE ESTE VALOR

    //CODIGO DE CELULAR
    private $device_id = 0; 

    public function EnviarMensaje($numero, $mensaje){

        $array_fields['phone_number'] = $numero;
        $array_fields['message'] = $mensaje;
        $array_fields['device_id'] = $this->device_id;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://smsgateway.me/api/v4/message/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "[  " . json_encode($array_fields) . "]",
            CURLOPT_HTTPHEADER => array(
                "authorization: $this->token",
                "cache-control: no-cache"
            ),
        ));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
            echo "error";

        } else {
            echo $response;
        }
    }
}

?>