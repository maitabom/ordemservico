<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Moreth e Lopes</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= $this->Session->flash() ?></p>
        <br><br><br><br>
        <?php echo $this->Html->link("Retornar", array("controller" => "system", "action" => "login")); ?>
    </div>
</div>