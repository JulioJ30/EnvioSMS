<?php


    class Conexion{

        private $db ="enviosms";                //BASE DE DATOS
        private $host ="JULIO-PC";              //IP - HOST
        private $user ="";                      //USUARIO
        private $clave ="";                     //CLAVE


        function Conectar(){

            try{

            $cn = new PDO("sqlsrv:server=".$this->host.";database=".$this->db,$this->user,$this->clave);
                return $cn;

            }catch(Exception $e){
                die($e->getMessage());
            }

        }


    }



?>