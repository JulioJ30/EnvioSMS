<?php

    require_once '../core/model.master.php';

    class ConsolidadoModelo extends ModelMaster{


        private $pdo;

        function __CONSTRUCT(){
            $this->pdo = parent::getConexion();
        }


        function getDatos($codigo){

            $comando = $this->pdo->prepare("exec spu_getdatos_consolidado_early ?");
            $comando->execute(
                array($codigo)
            );

            return $comando->fetchAll(PDO::FETCH_OBJ);

        }

    }


?>