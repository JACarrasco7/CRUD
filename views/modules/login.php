<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <center>
                <img class="img-responsive" src="views/img/plantilla/logo-login.png" alt="Logo login">
            </center>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="margin-bottom: 145px;">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicio de sesión</p>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="usuario" placeholder="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat ml-2" style="width:80px;"> Acceder</button>
                        </div>
                    </div>
                    <?php
                    $login = new usuariosController();
                    $login->ctrIngresoUsuario();
                    ?>
                </form>
            </div> <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>