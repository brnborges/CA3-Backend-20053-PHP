<?php
    class CaracteristicaController{

        var $caracteristica;


        function __construct(){
            require_once("models/CaracteristicaModel.php");
            $this -> caracteristica = new CaracteristicaModel();
        }

        // Categories funcion method
        public function caracteristicaSelecionada($idCaracteristica, $idVeiculo) {
            $this -> caracteristica -> selecionarCaracteristicaPorId($idCaracteristica, $idVeiculo);
            $result = $this -> caracteristica -> getConsult();

            $array = array();
            while($line = $result -> fetch_assoc()){
                array_push($array, $line);
            }
            if (!empty($array)) {
                return "checked";
            }
            return "";
        }

        public function listarCaracteristica(){
            $this -> caracteristica -> listarCaracteristica();
            $result = $this -> caracteristica -> getConsult();

            $array = array();

            while($line = $result->fetch_assoc()){
                array_push($array, $line);
            }
            return $array;
        }

        

        public function listarCaracteristicaPorId($id){
            $this -> caracteristica -> listarCaracteristicaPorId($id);
            $result = $this -> caracteristica -> getConsult();

            $array = array();
            while($line = $result -> fetch_assoc()){
                array_push($array, $line);
            }
            return $array;
        }

    }
?>