<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Moreth e Lopes</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= $this->Session->flash() ?></p>
        <?php
        echo $this->Form->create("Usuario", array(
            "url" => array(
                "controller" => "system",
                "action" => "logon"
        )));
        ?>
        <div class="form-group has-feedback">
            <?= $this->Form->text("Usuario", array("class" => "form-control", "placeholder" => "Usuário", "value" => $login)) ?>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->password("Senha", array("class" => "form-control", "placeholder" => "Senha")) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <?= $this->Form->checkbox("Lembrar") ?> Lembre-se de mim
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?= $this->Form->submit("Acessar", array("class" => "btn btn-primary btn-block btn-flat")) ?>
            </div><!-- /.col -->
        </div>
        <?php echo $this->Form->end(); ?>

        <a href="#">Esqueci minha senha</a><br>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
