<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gerenciamento de usuários
                    <div class="btn-group pull-right">
                        <button type="button" data-toggle="modal" data-target="#NovoUsuario" class="btn btn-default btn-xs dropdown-toggle" >
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <!-- Modal -->
                <div class="modal fade" id="NovoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Novo Usuario</h4>
                            </div>
                            <form action="index.php?classe=Usuario&acao=inserir" method="post">
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nome" name="nome" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Data de Nascimento" name="datanasc" type="date" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Senha" name="senha" type="password" value="" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Cadastrar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Data de Nascimento</th>
                                    <th>Email</th>
                                    <th>Senha</th>
                                    <th>Editar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($usuarios)) {
                                    foreach ($usuarios as $u) {
                                        ?>
                                        <tr>
                                            <td><?= $u->getIdusuario() ?></td>
                                            <td><?= $u->getNome() ?></td>
                                            <td><?= $u->getDatanasc() ?></td>
                                            <td><?= $u->getEmail() ?></td>
                                            <td><?= $u->getSenha() ?></td>
                                            <td><a href="index.php?classe=Usuario&acao=recuperar&id=<?= $u->getIdusuario() ?>"><i class="fa fa-edit fa-fw"></i></a></td>
                                            <td><a href="index.php?classe=Usuario&acao=excluirusuario&id=<?= $u->getIdusuario() ?>"><i class="fa fa-trash fa-fw"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>