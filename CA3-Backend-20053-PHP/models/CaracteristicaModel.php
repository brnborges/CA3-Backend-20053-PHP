<?php
    class CaracteristicaModel{

        var $result;
        var $connection;

        
        // Req database
        function __construct(){
            require_once("bd/Database.php");
            $Oconn = new Database();
            $Oconn -> openConnect();
            $this  -> connection = $Oconn -> getConnect();
        }

        // Req categories

        public function listarCaracteristica(){
            $sql = "SELECT * FROM caracteristicas";
            $this -> result = $this -> connection -> query($sql);
        }

        public function listarCaracteristicaPorId($id){
            $sql = "SELECT c.id as idCaracteristica, c.nome as nomeCaracteristica 
                    FROM caracteristicas c 
                    LEFT JOIN caracteristicas_veiculos cv ON c.id = cv.idCaracteristica
                    WHERE cv.idVeiculo='".$id."';";
            $this -> result = $this -> connection -> query($sql);
        }

        public function selecionarCaracteristicaPorId($idCaracteristica, $idVeiculo){
            $sql = "SELECT * FROM caracteristicas_veiculos 
                    WHERE idCaracteristica='".$idCaracteristica."' 
                        AND idVeiculo ='".$idVeiculo."';";
            $this -> result = $this -> connection -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }     
    }
?>