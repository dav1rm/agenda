   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Acessar sistema</h3>
                    </div>
                    <div class="panel-body">
                        <form action="index.php?classe=Usuario&acao=acessarsistema" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Lembre-me" disabled>Lembre-me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Entrar" class="btn btn-lg btn-success btn-block">
                                <a href="index.php?classe=Usuario&acao=novo" class="btn btn-lg btn-default btn-block">Cadastre-se</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>