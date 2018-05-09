<script>
    window.onload = function () {
        var objDiv = document.getElementById("scroll");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
</script>

<?php
$usuario = $_SESSION['usuario'];
$destinatario = UsuarioController::buscarDestinatario();
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="chat-panel panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-comments fa-fw"></i> Conversa
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu slidedown">
                            <li>
                                <a href="index.php">
                                    <i class="fa fa-close fa-fw"></i> Fechar
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.php?classe=Mensagem&acao=excluir&id=<?= $_GET['id'] ?>">
                                    <i class="fa fa-trash fa-fw"></i> Excluir
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="index.php?classe=Mensagem&acao=enviar&id=<?= $_GET['id'] ?>" method="post">
                    <!-- /.panel-heading -->
                    <div class="panel-body" id="scroll">
                        <ul class="chat">
                            <?php
                            $mensagens = MensagemController::buscarConversa();
                            if (!empty($mensagens)) {
                                foreach ($mensagens as $m) {
                                    if ($m->getIddestino() == $destinatario->getIdusuario()) {
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
                                                    <strong class="pull-right primary-font"><?= $destinatario->getNome(); ?></strong>
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
                            <input id="btn-input" type="text" class="form-control input-sm" name="texto" placeholder="Escreva aqui..." required/>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-warning btn-sm" id="btn-chat">
                                    Enviar
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
                <!-- /.panel-footer -->
            </div>
            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>