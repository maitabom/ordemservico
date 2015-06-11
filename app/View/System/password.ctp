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
                "action" => "confirmy"
        )));

        echo $this->Form->hidden("verificar", array("value" => "1"));
        ?>

        <div class="form-group has-feedback">
            <?= $this->Form->password("senha", array("class" => "form-control", "placeholder" => "Senha")) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?= $this->Form->password("senha-confirma", array("class" => "form-control", "placeholder" => "Confirme sua senha")) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="row">

            <div class="col-xs-12">
                <?= $this->Form->submit("Mudar Senha", array("class" => "btn btn-primary btn-block btn-flat")) ?>
            </div><!-- /.col -->
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>