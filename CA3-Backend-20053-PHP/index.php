<?php
    session_start();

    if(!isset($_GET['controller'])){
        require_once("controllers/Veiculo.php");
        $veiculo = new VeiculoController();
        $veiculo -> index();
    }else{
        switch($_REQUEST['controller']){
            case 'veiculo':
                require_once("controllers/Veiculo.php");
                $veiculo = new VeiculoController();

                if(!isset($_GET['acao'])){
                    $page -> index();
                }else{
                    switch($_REQUEST['acao']){
                        case 'cadastroVeiculo': $veiculo -> cadastroVeiculo(); break;
                        case 'cadastroVeiculoAc': $veiculo -> cadastroVeiculoAc(); break; 
                        case 'listarVeiculo': $veiculo -> listagem(); break;
                        case 'alterarVeiculo': $id=$_GET['id']; $veiculo -> alterarVeiculo($id); break;
                        case 'alterarVeiculoAc': $veiculo -> alterarVeiculoAc(); break;
                        case 'deletarVeiculo': $id=$_GET['id']; $veiculo -> deletarVeiculo($id); break;
                        case 'pesquisarVeiculo': $dado=$_POST['pesquisa']; $veiculo -> pesquisarVeiculo($dado); break;
                    }
                }
                break;
        }
    }
?>