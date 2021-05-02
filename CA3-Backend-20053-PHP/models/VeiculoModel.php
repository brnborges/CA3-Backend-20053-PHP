<?php
    class VeiculoModel{

        var $result;
        var $connection;

        // Database req
        function __construct(){
            require_once("bd/Database.php");
            $Oconn = new Database();
            $Oconn -> openConnect();
            $this  -> connection = $Oconn -> getConnect();
        }

        // Post
        public function cadastrarVeiculo($array){
            $sql = "INSERT INTO veiculos (nomeDono, marca, modelo, ano, placa)
                    VALUES ('".$array['nomeDono']."',
                    '".$array['marca']."', 
                    '".$array['modelo']."',
                    '".$array['ano']."', 
                    '".$array['placa']."');";
            $this -> connection -> query($sql);
            $this -> result  = $this -> connection -> insert_id;
            $id = $this -> result;
            $sql = "";
            foreach($array['caracteristica'] as $caracteristica){
                $sql .= "INSERT INTO caracteristicas_veiculos(idCaracteristica, idVeiculo) 
                        VALUES ('".$caracteristica."','".$id."');";
            }
            if($sql != ""){
                $this -> connection -> multi_query($sql);
                $this -> result  = $this -> connection -> insert_id;
            }
        }

        // Get

        public function listarVeiculo(){
            $sql = "SELECT * FROM veiculos";
            $this -> result = $this -> connection -> query($sql);
        }

        // Update

        public function alterarVeiculo($array){
            $sql = "UPDATE veiculos
                    SET nomeDono='".$array['nomeDono']."', 
                    marca='".$array['marca']."',
                    modelo='".$array['modelo']."',
                    ano='".$array['ano']."',
                    placa='".$array['placa']."'
                    WHERE id=".$array['id'].";";
            $this -> connection -> query($sql);

            $sql = "DELETE FROM caracteristicas_veiculos 
                    WHERE idVeiculo=".$array['id'].";";
            $this -> connection -> query($sql);

            foreach($array['caracteristica'] as $caracteristica){
                $sql = "INSERT INTO caracteristicas_veiculos(idCaracteristica, idVeiculo) 
                        VALUES ('".$caracteristica."','".$array['id']."');";
                $this -> connection -> query($sql);
                $this -> result  = $this -> connection -> insert_id;
            }
        }

        // Delete

        public function deletarVeiculo($id){
            $sql = "DELETE FROM veiculos
                    WHERE id='".$id."';";
            $this -> connection -> query($sql);
        }

        public function consultId($id){
            $sql = "SELECT * FROM veiculos
                    WHERE id=$id";
            $this -> result = $this -> connection -> query($sql);
        }

        // Search

        public function pesquisarVeiculo($dado){
            $sql = "SELECT v.id, v.nomeDono, v.marca, v.modelo, v.ano, v.placa
                    FROM veiculos v 
                    LEFT JOIN caracteristicas_veiculos cv 
                        on v.id = cv.idVeiculo 
                    LEFT JOIN caracteristicas c 
                        on c.id = cv.idCaracteristica
                    WHERE v.nomeDono 
                        LIKE '%".$dado."%' 
                            or  v.placa 
                        LIKE '%".$dado."%'
                            or c.nome 
                        LIKE '%".$dado."%'
                        GROUP BY v.id";
            $this -> result = $this -> connection -> query($sql);
            
        }

        public function getConsult(){
            return $this -> result;
        }      
    }
?>