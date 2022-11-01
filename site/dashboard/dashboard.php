<?php 
    include '../../globalConfig.php';
    include '../../class/clsConnectDB.php';
    include '../../class/clsDashboard.php';

    $Dashboard = new Dashboard();
    $listClients = $Dashboard->listadoClientes();

    include '../header.php';
?>
<link rel="stylesheet" href="../../assets/css/styles/dashboard.scss">
<div class="   h-100 p-3  flex-column">
    <header class="masthead mb-auto">

    </header>


    <div class="row">
        <div class="col-md-9">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        <!-- <th scope="col">Comentario</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if(isset($listClients['ErrorStatus']) && $listClients['ErrorStatus'] ==  1){
                        ?>
                    <tr>
                        <td colspan="4">No hay datos</td>
                    </tr>
                    <?php
                    }else{
                        foreach($listClients as $client){ ?>
                    <tr>
                        <td><?=$client['id']?></td>
                        <td><?= ucwords($client['firstname'])?></td>
                        <td><?= ucwords($client['lastname'])?></td>
                        <td><?=$client['email']?></td>
                        <td><?=$client['phone']?></td>
                        <td><?=$client['commentary']?></td>
                        <!-- <td><?=$client['commentary']?></td> -->
                        <td>
                            <button class="btn btn-warning" onClick="editarCliente(<?= $client['id']?>)">
                                <span class="fa fa-edit"></span>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger " onClick="eliminarCliente(<?= $client['id']?>)">
                                <span class="fa fa-trash"></span>
                            </button>
                        </td>
                    </tr>
                    <?php
                        }
                     } ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-3">

            <form class="formulario">
                <div class="form-group">
                    <div class="iconoClients">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" placeholder="idCliente" class="form-control" id="idCliente" >
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Nombre" class="form-control" id="nombre" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="apellido" class="form-control" id="apellido">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="E-mail" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Teléfono" class="form-control" id="telefono">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="comentario" placeholder="Comentario"></textarea>
                </div>

                <button type="button" onclick="guardarDatos()" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>


    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Jorge luis verbel diaz , by <a href="#">@GeorkingWeb</a>.</p>
        </div>
    </footer>

</div>
<script src="../../assets/plugins/jquery/jquery.js"></script>
<script src="dashboard.js"></script>
<?php include '../footer.php';  