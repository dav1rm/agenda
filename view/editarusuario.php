<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Editar Conta</h3>
                </div>
                <?php
                if (isset($usuario)) {
                    ?>
                    <div class="panel-body">
                        <form action="index.php?classe=Usuario&acao=editar&id=<?= $usuario->getIdusuario() ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nome" name="nome" value="<?= $usuario->getNome(); ?>" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Data de Nascimento" name="datanasc" value="<?= $usuario->getDatanasc(); ?>" type="date" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" value="<?= $usuario->getEmail(); ?>" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="campoSenha" placeholder="Senha" name="senha" type="password" disabled required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input id="senha" name="remember" onclick="ativarCampo()" type="checkbox" value="">Altrerar senha
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Atualizar" class="btn btn-lg btn-success btn-block">
                                <a href="index.php" class="btn btn-lg btn-default btn-block">Voltar</a>
                            </fieldset>
                        </form>
                    </div>
<?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    function ativarCampo() {
        if (document.getElementById("senha").checked == true) {
            document.getElementById("campoSenha").disabled = false;
        } else {
            document.getElementById("campoSenha").disabled = true;
        }
    }
</script>
