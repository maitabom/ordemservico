<script type="text/javascript">
    function validar() {
        var mensagem = "";

        if ($("#UsuarioSenhaAtualUsuario").val() === "") {
            mensagem += "- É obrigatório informar a sua senha atual de usuario de sistema.\n";
            $("#UsuarioSenhaAtualUsuario").css("border-color", "red");
        } else {
            if ($("#UsuarioSenhaAtual").val() !== $("#UsuarioSenhaAtualUsuario").val()) {
                mensagem += "- A senha atual do usuario está incorreta.\n";
                $("#UsuarioSenhaAtual").css("border-color", "red");
            } else {
                $("#UsuarioSenhaAtual").css("border-color", "#D2D6DE");
            }
        }

        if ($("#UsuarioSenhaNova").val() === "") {
            mensagem += "- É obrigatório informar a senha nova de usuário do sistema.\n";
            $("#UsuarioSenhaNova").css("border-color", "red");
        } else {
            if ($("#UsuarioSenhaNova").val() !== $("#UsuarioSenhaConfirma").val()) {
                mensagem += "- A nova senha e a sua confirmação são diferentes.\n";
                $("#UsuarioSenhaNova").css("border-color", "red");
                $("#UsuarioSenhaConfirma").css("border-color", "red");
            } else {
                $("#UsuarioSenhaNova").css("border-color", "#D2D6DE");
                $("#UsuarioSenhaConfirma").css("border-color", "#D2D6DE");
            }

            if ($("#UsuarioSenhaAtual").val() === $("#UsuarioSenhaNova").val()) {
                mensagem += "- A nova senha deve ser diferente da senha atual.\n";
                $("#UsuarioSenhaNova").css("border-color", "red");
            } else {
                $("#UsuarioSenhaNova").css("border-color", "#D2D6DE");
            }
        }

        if ($("#UsuarioSenhaConfirma").val() === "") {
            mensagem += "- É obrigatório confirmar a senha nova de usuário do sistema.\n";
            $("#UsuarioSenhaConfirma").css("border-color", "red");
        } else {
            $("#UsuarioSenhaConfirma").css("border-color", "#D2D6DE");
        }

        if (mensagem == "") {
            return true;
        } else {
            $("#cadastro_erro").dialog("open");
            $("#txtmaisdetalhes").val(mensagem);
            return false;
        }
    }
</script>
<?= $this->element('menu'); ?>
<?= $this->Session->flash() ?>
<?=
$this->element('message', array(
    'name' => 'cadastro_erro',
    'type' => 'error',
    'message' => 'Ocorreu o erro ao modificar a senha.',
    'details' => ''
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Alterar da Senha</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href=" <?= $this->Url->relative('/usuario') ?>"><i class="fa fa-user"></i>Cadastro de Usuários</a></li>
            <li class="active"><a href="#"><i class="fa fa-lock"></i>Alterar Senha</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php
                    echo $this->Form->create("Usuario", array(
                        "url" => array(
                            "controller" => "usuario",
                            "action" => "change"),
                        "role" => "form"));

                    echo $this->Form->hidden("id", array("value" => $id_usuario));
                    echo $this->Form->hidden("senha_atual", array("value" => $senha_atual));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("senha_atual_usuario", "Senha Atual") ?>
                            <?= $this->Form->password("senha_atual_usuario", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("senha_nova", "Nova Senha") ?>
                            <?= $this->Form->password("senha_nova", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("senha_confirma", "Confirme a Nova Senha") ?>
                            <?= $this->Form->password("senha_confirma", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = ' <?= $this->Url->makeParams('usuario', 'perfil', $nickname) ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="submit" onclick="return validar()" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>