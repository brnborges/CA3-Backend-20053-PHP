<?php
    class VeiculoController{

        var $veiculo;

        function __construct(){
            require_once("models/VeiculoModel.php");
            $this -> veiculo = new VeiculoModel();
        }

        public function index(){
            require_once("views/Header.php");
            require_once("views/Register.php");
            require_once("views/Footer.php");
        }

        // Html methods called

        public function cadastroVeiculo(){
            require_once("views/Header.php");
            require_once("views/Register.php");
            require_once("views/Footer.php");
        }

        // Post options to create a new item

        public function cadastroVeiculoAc(){
            $array['nomeDono'] = $_POST["nomeDono"];
            $array['marca'] = $_POST['marca'];
            $array['modelo'] = $_POST['modelo'];
            $array['ano'] = $_POST['ano'];
            $array['placa'] = $_POST['placa'];
            $array['caracteristica'] = $_POST['caracteristica'];

            $this -> veiculo -> cadastrarVeiculo($array);
            $id = $this -> veiculo -> getConsult();
            $this -> cadastroVeiculo();
        }


        // Get list method
        public function listagem(){
            $this -> veiculo -> listarVeiculo();
            $result = $this -> veiculo -> getConsult();
    
            $array = array();
    
            while($line = $result->fetch_assoc()){
                array_push($array, $line);
            }
            require_once ("views/Header.php");
            require_once ("views/List.php");
            require_once ("views/Footer.php");
        }

        // Html page Update method

        public function alterarVeiculo($id){
            $this -> veiculo -> consultId($id);
            $result = $this -> veiculo -> getConsult();

            if ($array = $result -> fetch_assoc()){
                require_once ("views/Header.php");
                require_once ("views/Update.php");
                require_once ("views/Footer.php");
            }
        }

        // Update method

        public function alterarVeiculoAc(){
            $array["id"] = $_POST["id"]; 
            $array['nomeDono'] = $_POST["nomeDono"];
            $array['marca'] = $_POST['marca'];
            $array['modelo'] = $_POST['modelo'];
            $array['ano'] = $_POST['ano'];
            $array['placa'] = $_POST['placa'];
            $array['caracteristica'] = $_POST['caracteristica'];

            $this -> veiculo -> alterarVeiculo($array);
            $this -> listagem();
        }

        // Delete 
        
        public function deletarVeiculo($id){
            $this -> veiculo -> deletarVeiculo($id);
            $this -> listagem();
        }

        // Search itens using categories

        public function pesquisarVeiculo($dado){
            $this -> veiculo -> pesquisarVeiculo($dado);
            $result = $this -> veiculo -> getConsult();
            
            $array = array();
    
            while($line = $result->fetch_assoc()){
                array_push($array, $line);
            }
            require_once ("views/Header.php");
            require_once ("views/List.php");
            require_once ("views/Footer.php");
        }

    }
?>