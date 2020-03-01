<?php


    class Conexion{

        private $db ="enviosms";
        private $host ="JULIO-PC";
        private $user ="Julio-PC\Julio";
        private $clave ="";
        private $charset ="";


        function Conectar(){

            try{

            $cn = new PDO("sqlsrv:server=".$this->host.";database=".$this->db,"","");
                return $cn;

            }catch(Exception $e){
                die($e->getMessage());
            }

        }


    }



?>