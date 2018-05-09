
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Agenda de Contatos</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-lg-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user fa-fw"></i> Usuarios
                    <?php if ($_SESSION["usuario"]->getAdmin() == 1) { ?>
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <a href="index.php?classe=Usuario&acao=listartodos">
                                        <i class="fa fa-gear fa-fw"></i> Gerenciar Usuários
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.panel-heading USUARIOS DO SISTEMA-->
                <?php $usuarios = UsuarioController::listar(); ?>
                <div class="panel-body">
                    <div class="list-group">
                        <?php
                        if (isset($usuarios)) {
                            foreach ($usuarios as $u) {
                                ?>
                                <a data-toggle="modal" data-target="#myModal<?= $u->getIdusuario(); ?>" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> <?= $u->getNome(); ?>
                                    <span class="pull-right text-muted small">
                                    </span>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal<?= $u->getIdusuario(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel"><?= $u->getNome() ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <label>Email: <?= $u->getEmail() ?></label><p></p>
                                                <label>Data de nascimento: <?= $u->getDatanasc() ?></label><p></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" onclick="window.location = 'index.php?classe=Mensagem&acao=abrirConversa&id=<?= $u->getIdusuario(); ?>'">Conversar</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- /.list-group 
                    <a href="#" class="btn btn-default btn-block">Visualizar todos</a> -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-group fa-fw"></i> Grupos
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a data-toggle="modal" data-target="#NovoGrupo">
                                    <i class="fa fa-plus fa-fw"></i> Novo Grupo
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <div class="list-group">
                        <?php
                        $grupos = GrupoController::listargrupos();
                        if (!empty($grupos)) {
                            foreach ($grupos as $g) {
                                ?>
                                <a href="index.php?classe=Mensagem&acao=abrirConversaGrupo&id=<?= $g->getId(); ?>" class="list-group-item">
                                    <i class="fa fa-group fa-fw"></i> <?= $g->getNome(); ?>
                                    <span class="pull-left text-muted small">
                                    </span>
                                </a>
                                <?php
                            }
                        } else {
                            echo "Você não possui grupos.";
                        }
                        ?>
                    </div>
                    <!-- /.list-group 
                    <a href="#" class="btn btn-default btn-block">Visualizar todos</a> -->
                </div>
                <!-- /.panel-body -->
                <!-- Modal ADICIONAR MEMBROS AO GRUPO -->
                <div class="modal fade" id="NovoGrupo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Novo Grupo</h4>
                            </div>
                            <form action="index.php?classe=Grupo&acao=inserir&id=<?= $_SESSION['usuario']->getIdusuario(); ?>" method="post">
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nome do grupo" name="nome" type="text" required>
                                        </div>
                                        <div class="list-user">
                                            <?php
                                            if (isset($usuarios)) {
                                                foreach ($usuarios as $u) {
                                                    ?>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="usuarios[]" type="checkbox" value="<?= $u->getIdusuario() ?>"><?= $u->getNome() ?>
                                                        </label>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Criar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

