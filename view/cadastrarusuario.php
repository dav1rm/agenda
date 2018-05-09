   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cadastro de usuario</h3>
                    </div>
                    <div class="panel-body">
                        <form action="index.php?classe=Usuario&acao=inserir" method="post">
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
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Cadastrar" class="btn btn-lg btn-success btn-block">
                                <a href="index.php" class="btn btn-lg btn-default btn-block">Voltar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>