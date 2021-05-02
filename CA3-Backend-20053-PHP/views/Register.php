    <div class="imagem-fundo layout-cadastro">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-1 col-md-11">
                    <h1 class="titulo">Vehicles Registration Form</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form id="cadastro" action="?controller=veiculo&acao=cadastroVeiculoAc" method="POST" class="cor-form">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nomeDono">Owner Name:</label>
                                <input type="text" class="form-control" name="nomeDono" maxlength="17" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="marca">Make:</label>
                                <input type="text" class="form-control" name="marca" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="modelo">Model:</label>
                                <input type="text" class="form-control" name="modelo" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ano">Year:</label>
                                <input type="text" id="data" class="form-control" name="ano" maxlength="4" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="placa">Plate:</label>
                                <input type="text" class="form-control" id="placa" name="placa" minlength="7" maxlength="7" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <?php
                            require_once("controllers/Caracteristica.php");
                            $caracteristica = new CaracteristicaController();
                            $array = $caracteristica->listarCaracteristica();
                            foreach ($array as $caracteristica) { ?>
                                <div class="form-check form-check-inline col-md-3">
                                    <input class="form-check-input" name="caracteristica[]" id="caracteristica-<?= $caracteristica['id'] ?>" type="checkbox" value="<?= $caracteristica['id'] ?>">
                                    <label class="form-check-label" for="caracteristica-<?= $caracteristica['id'] ?>"><?= $caracteristica["nome"] ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-row">
                            <div class=" form-group offset-10 col-md-2">
                                <button type="submit" class="btn btn-danger">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>