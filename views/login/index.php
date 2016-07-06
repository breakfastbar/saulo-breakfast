<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading" style="background-color: #204d74">
                    <h1 class="text-center" style="color: #fff">Breakfast</h1>
                </div>
                <br>
                <p class="text-center">Conecte-se para continuar</p>
                <div class="panel-body">
                    <form action="login/run" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Login" name="login" type="text" autofocus required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Senha" name="password" type="password" value="" required="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Entrar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div align="center">© <?=date('Y')?> - Breakfast</div>
        </div>
    </div>
</div>
