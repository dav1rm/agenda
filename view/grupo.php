<?php
$usuario = $_SESSION['usuario'];
$grupo = GrupoController::recuperar();
$membros = GrupoController::listarmembros();
$membrosidade = GrupoController::listarmembrosporIdade();
$usuarios = UsuarioController::listar();
?>
<script>
    window.onload = function () {
        var objDiv = document.getElementById("scroll");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="chat-panel panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-fw"></i> <?= $grupo->getNome(); ?>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a data-toggle="modal" data-target="#Membros" >
                                    <i class="fa fa-group fa-fw"></i> Membros
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a data-toggle="modal" data-target="#Aniversariantes">
                                    <i class="fa fa-calendar fa-fw"></i> Aniversariantes
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-close fa-fw"></i> Fechar
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a data-toggle="modal" data-target="#Editar">
                                    <i class="fa fa-edit fa-fw"></i> Alterar Nome
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.php?classe=Grupo&acao=excluir&id=<?= $_GET['id'] ?>">
                                    <i class="fa fa-trash fa-fw"></i> Excluir Grupo
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <form action="index.php?classe=Mensagem&acao=enviarparagrupo&id=<?= $grupo->getId(); ?>" method="post">
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="scroll">
                        <ul class="chat">
                            <?php
                            $mensagensgrupo = MensagemController::buscarConversaGrupo();
                            if (!empty($mensagensgrupo)) {
                                foreach ($mensagensgrupo as $m) {
                                    if ($m->getIdusuario() == $usuario->getIdusuario()) {
                                        ?>
                                        <li class="left clearfix">
                                            <span class="chat-img pull-left">
                                                <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <strong class="primary-font"><?= $usuario->getNome(); ?></strong>
                                                    <small class="pull-right text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i><?= $m->getData(); ?>
                                                    </small>
                                                </div>
                                                <p><?= $m->getTexto(); ?></p>
                                            </div>
                                        </li>
                                    <?php } else { ?>
                                        <li class="right clearfix">
                                            <span class="chat-img pull-right">
                                                <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header">
                                                    <small class=" text-muted">
                                                        <i class="fa fa-clock-o fa-fw"></i><?= $m->getData(); ?></small>
                                                    <?php
                                                    foreach ($membros as $mg) {
                                                        if ($mg->getIdusuario() == $m->getIdusuario()) {
                                                            ?>
                                                            <strong class="pull-right primary-font"><?= $mg->getNome(); ?></strong>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <p><?= $m->getTexto(); ?></p>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </ul>

                    </div>
                    <!-- /.panel-body -->
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm" name="texto" placeholder="Escreva aqui..." />
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                                    Enviar
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
                <!-- Modal MEMBROS DO GRUPO -->
                <div class="modal fade" id="Membros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="index.php?classe=Grupo&acao=removermembros&id=<?= $_GET['id']; ?>" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Membros</h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    if (isset($membrosidade)) {
                                        foreach ($membrosidade as $mi) {
                                            ?>
                                            <a class="list-group-item">
                                                <i class="fa fa-user fa-fw"></i> <?= $mi->getNome(); ?>
                                                <?php
                                                if ($usuario->getIdusuario() == $grupo->getIdDono()) {
                                                    if ($mi->getIdusuario() == $grupo->getIdDono()) {
                                                        ?>
                                                        <input class="checkbox pull-right" type="checkbox" value="<?= $mi->getIdusuario(); ?>" name="membros[]" disabled>
                                                    <?php } else { ?>
                                                        <input class="checkbox pull-right" type="checkbox" value="<?= $mi->getIdusuario(); ?>" name="membros[]">
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <span class="pull-right text-muted small">
                                                </span>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <?php if ($grupo->getIdDono() == $usuario->getIdusuario()) { ?>
                                        <button type="submit" class="btn btn-danger">Remover membro</button>
                                        <button type="button" data-toggle="modal" data-target="#Adicionar"  class="btn btn-primary">Adicionar membro</button>
                                    <?php } ?>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <!-- Modal ANIVERSARIANTES -->
                <div class="modal fade" id="Aniversariantes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Aniversariantes</h4>
                            </div>
                            <div class="modal-body">
                                <div class="list-user">

                                    <?php
                                    //echo substr(date("Y-m-d"), 5);
                                    if (isset($membros)) {
                                        ?>
                                        <li class="list-group-item">Hoje:</li>
                                        <?php
                                        foreach ($membros as $m) {
                                            if (substr($m->getDatanasc(), 5) == date('m-d')) {
                                                ?>

                                                <li class="list-group-item">
                                                    <i class="fa fa-user fa-fw"></i> <?= $m->getNome(); ?>
                                                    <span class="pull-right text-muted small">
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <li class="list-group-item">Desta semana:</li>
                                        <?php
                                        foreach ($membros as $m) {
                                            if (substr($m->getDatanasc(), 5, -3) == date('m') && substr($m->getDatanasc(), 8) <= (date("d") + 7) && substr($m->getDatanasc(), 8) >= date("d")) { ?>
                                                <li class="list-group-item">
                                                    <i class="fa fa-user fa-fw"></i> <?= $m->getNome(); ?>
                                                    <span class="pull-right text-muted small">
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <li class="list-group-item">Deste mês:</li>
                                        <?php
                                        foreach ($membros as $m) {
                                            if (substr($m->getDatanasc(), 5, -3) == date('m')) {
                                                ?>

                                                <li class="list-group-item">
                                                    <i class="fa fa-user fa-fw"></i> <?= $m->getNome(); ?>
                                                    <span class="pull-right text-muted small">
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <!-- Modal ADICIONAR MEMBROS GRUPO -->
                <div class="modal fade" id="Adicionar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Adicionar membro</h4>
                            </div>
                            <form action="index.php?classe=Grupo&acao=adicionarmembro&id=<?= $_GET['id']; ?>" method="post">
                                <div class="modal-body">
                                    <?php
                                    if (isset($usuarios)) {
                                        foreach ($usuarios as $u1) {
                                            if (in_array($u1, $membrosidade) == false) {
                                                ?>
                                                <a class="list-group-item">
                                                    <i class="fa fa-user fa-fw"></i> <?= $u1->getNome(); ?>
                                                    <input class="checkbox pull-right" type="checkbox" value="<?= $u1->getIdusuario(); ?>" name="membros[]">
                                                    <span class="pull-right text-muted small">
                                                    </span>
                                                </a>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="concluido" class="btn btn-primary" >Concluido</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- Modal -->
                <div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="myModalLabel">Alterar Nome</h4>
                            </div>
                            <form action="index.php?classe=Grupo&acao=editar&id=<?= $grupo->getId(); ?>" method="post">
                                <div class="modal-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nome do grupo" name="nome" value="<?= $grupo->getNome(); ?>" type="text" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Salvar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- /.panel-footer -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>