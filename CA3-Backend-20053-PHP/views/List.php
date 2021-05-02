<div class="imagem-fundo layout-listagem text-center">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-11"> 
                <h1>List of vehicles registered</h1>
            </div>
        </div>
        <?php if(!empty($array)){?>
            <div class="row">
                <form class="form-inline" action="?controller=veiculo&acao=pesquisarVeiculo" method="POST">
                    <div class="form-group mb-2 ml-5">
                        <label class="titulo-pesquisa" for="">
                            Search for: Owner, Plate and characteristics.
                        </label>
                        <input type="text" name="pesquisa" class="form-control mx-sm-3" />
                        <button type="submit" class="btn btn-secondary fa fa-search"></button>  
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table cor-table">
                        <tr>    
                            <th>ID</th>
                            <th>Owner Name</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Plate</th>
                            <th>Characteristics</th>
                            <th colspan="2">Actions</th>
                        </tr>
                        <?php
                        require_once("controllers/Caracteristica.php");
                        foreach ($array as $veiculo){
                            $caracteristica = new CaracteristicaController();
                            $resultado = $caracteristica -> listarCaracteristicaPorId($veiculo['id']);?>
                            <tr>
                                <td ><?=$veiculo["id"]?></td>
                                <td><?=$veiculo["nomeDono"]?></td>
                                <td><?=$veiculo["marca"]?></td>
                                <td><?=$veiculo["modelo"]?></td> 
                                <td><?=$veiculo["ano"]?></td> 
                                <td><?=$veiculo["placa"]?></td> 
                                <td>
                                    <?php 
                                    $count = 0;
                                    foreach($resultado as $r){
                                        ++$count;
                                        echo($r['nomeCaracteristica']);
                                        echo(count($resultado) > $count ? ", " : ".");
                                    } ?>
                                </td>
                                <td><a href="?controller=veiculo&acao=alterarVeiculo&id=<?=$veiculo['id'];?>" type="button" name="editar"class="btn btn-primary">Editar </a></td>
                                <td><button type="button" data-id="<?=$veiculo['id'];?>" name="deletar" class="btn btn-danger openModal" data-toggle="modal" >Deletar </button></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <div class="card mt-5">
                <div class="card-body">
                    No results.
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Option to check if the user want to delete the item -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Item</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            Do you want to delete this item?
        </div>
        <div class="modal-footer">
            <a href="" id="href" class="btn btn-primary">Yes</a>
            <a class="btn btn-default" data-dismiss="modal">No</a>
        </div>
        </div>
    </div>
</div>