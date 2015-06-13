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
                "action" => "remember"
        )));

        echo $this->Form->hidden("verificar", array("value" => "1"));
        ?>

        <div class="form-group has-feedback">
            <?= $this->Form->text("email", array("class" => "form-control", "placeholder" => "Digite seu e-mail")) ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <?= $this->Form->button("Voltar", array("class" => "btn btn-primary btn-block btn-flat", "type" => "button", "onclick" => "window.location ='" . $this->Url->make("system", "login") . "'")) ?>
            </div>
            <div class="col-xs-6">
                <?= $this->Form->submit("Enviar e-mail", array("class" => "btn btn-primary btn-block btn-flat")) ?>
            </div><!-- /.col -->
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>