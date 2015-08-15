<script type="text/javascript">
    function validar() {
        var mensagem = "";

        if ($("#UsuarioNome").val() === "") {
            mensagem += "- O nome do usuário é obrigatório.\n";
            $("#UsuarioNome").css("border-color", "red");
        } else {
            $("#UsuarioNome").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioEndereco").val() === "") {
            mensagem += "- O endereço do usuário é obrigatório.\n";
            $("#UsuarioEndereco").css("border-color", "red");
        } else {
            $("#UsuarioEndereco").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioCidade").val() === "") {
            mensagem += "- A cidade de residência do usuário é obrigatória.\n";
            $("#UsuarioCidade").css("border-color", "red");
        } else {
            $("#UsuarioCidade").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioUf").val() === "") {
            mensagem += "- O estado de residência do usuário é obrigatório.\n";
            $("#UsuarioUf").css("border-color", "red");
        } else {
            $("#UsuarioUf").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioCep").val() === "") {
            mensagem += "- O CEP de residência do usuário é obrigatório.\n";
            $("#UsuarioCep").css("border-color", "red");
        } else {
            $("#UsuarioCep").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioCelular").val() === "") {
            mensagem += "- O telefone celular do usuário é obrigatório.\n";
            $("#UsuarioCelular").css("border-color", "red");
        } else {
            $("#UsuarioCelular").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioCargo").val() === "") {
            mensagem += "- O cargo do usuário é obrigatório.\n";
            $("#UsuarioCargo").css("border-color", "red");
        } else {
            $("#UsuarioCargo").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioSetor").val() === "") {
            mensagem += "- O setor do usuário é obrigatório.\n";
            $("#UsuarioSetor").css("border-color", "red");
        } else {
            $("#UsuarioSetor").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioEmail").val() === "") {
            mensagem += "- O e-mail do usuário é obrigatório.\n";
            $("#UsuarioEmail").css("border-color", "red");
        } else {
            $("#UsuarioEmail").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioNickname").val() === "") {
            mensagem += "- O nickname do usuário é obrigatório.\n";
            $("#UsuarioNickname").css("border-color", "red");
        } else {
            $("#UsuarioNickname").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioSenha").val() === "") {
            mensagem += "- A senha do usuário é obrigatória.\n";
            $("#UsuarioSenha").css("border-color", "red");
        } else {
            $("#UsuarioSenha").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioSenha-confirma").val() === "") {
            mensagem += "- É necesário que você confirme a sua senha criada.\n";
            $("#UsuarioSenha-confirma").css("border-color", "red");
        } else {
            $("#UsuarioSenha-confirma").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioGrupo").val() === "") {
            mensagem += "- O grupo de usuário é obbrigatório.\n";
            $("#UsuarioGrupo").css("border-color", "red");
        } else {
            $("#UsuarioGrupo").css("border-color", "#D2D6DE");
        }

        if ($("#UsuarioSenha").val() != "" && $("#UsuarioSenha-confirma").val() != "") {
            if ($("#UsuarioSenha").val() !== $("#UsuarioSenha-confirma").val()) {
                mensagem += "- A senha e a confirmação estão diferentes.\n";
                $("#UsuarioSenha").css("border-color", "red");
                $("#UsuarioSenha").css("background-color", "khaki");
                $("#UsuarioSenha-confirma").css("border-color", "red");
                $("#UsuarioSenha-confirma").css("background-color", "khaki");
            } else {
                $("#UsuarioSenha").css("border-color", "#FFF");
                $("#UsuarioSenha").css("background-color", "#D2D6DE");
                $("#UsuarioSenha-confirma").css("border-color", "#FFF");
                $("#UsuarioSenha-confirma").css("background-color", "#D2D6DE");
            }
        }

        if (mensagem == "") {
            return true;
        } else {
            $("#cadastro_erro").dialog("open");
            $("#txtmaisdetalhes").val(mensagem);
            return false;
        }
    }

    $(function () {
        VMasker(document.querySelector("#UsuarioCep")).maskPattern("99999-999");
        VMasker(document.querySelector("#UsuarioTelefone")).maskPattern("(99)9999-9999");
        VMasker(document.querySelector("#UsuarioCelular")).maskPattern("(99)99999-9999");

        //Mantenha a senha e a de confirmaçao ativa
        $("#UsuarioSenha-confirma").val($("#UsuarioSenha").val());
    });
</script>
<?= $this->Session->flash() ?>
<?=
$this->element('message', array(
    'name' => 'cadastro_erro',
    'type' => 'error',
    'message' => 'Ocorreu um erro ao efetuar o cadastro.',
    'details' => ''
))
?>
<?= $this->element('menu') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_for_layout ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="<?= $this->Url->relative('/usuario') ?>"><i class="fa fa-user"></i>Cadastro de Usuários</a></li>
            <?php if ($id_usuario > 0): ?>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Edição do Usuário</a></li>
            <?php else: ?>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Novo Usuário</a></li>
            <?php endif; ?>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box">
                    <?php
                    echo $this->Form->create("Usuario", array(
                        "url" => array(
                            "controller" => "usuario",
                            "action" => "save"),
                        "role" => "form"));

                    echo $this->Form->hidden("id", array("value" => $id_usuario));
                    echo $this->Form->hidden("destino", array("value" => serialize(array("action" => "cadastro", $id_usuario))));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("nome", "Nome") ?>
                            <?= $this->Form->text("nome", array("class" => "form-control", "maxlength" => 150)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("endereco", "Endereço") ?>
                            <?= $this->Form->text("endereco", array("class" => "form-control", "maxlength" => 255)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("bairro", "Bairro") ?>
                            <?= $this->Form->text("bairro", array("class" => "form-control", "maxlength" => 80)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("cidade", "Cidade") ?>
                            <?= $this->Form->text("cidade", array("class" => "form-control", "maxlength" => 80)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("uf", "Estado") ?>
                            <?= $this->Form->select("uf", $estados, array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("cep", "CEP") ?>
                            <?= $this->Form->text("cep", array("class" => "form-control", "maxlength" => 9)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("telefone", "Telefone") ?>
                            <?= $this->Form->text("telefone", array("class" => "form-control", "maxlength" => 13)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("celular", "Celular") ?>
                            <?= $this->Form->text("celular", array("class" => "form-control", "maxlength" => 14)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("cargo", "Cargo") ?>
                            <?= $this->Form->text("cargo", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("setor", "Setor") ?>
                            <?= $this->Form->text("setor", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("email", "E-mail") ?>
                            <?= $this->Form->text("email", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("nickname", "Usuário") ?>
                            <?= $this->Form->text("nickname", array("class" => "form-control", "maxlength" => 32)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("senha", "Senha") ?>
                            <?= $this->Form->password("senha", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("senha-confirma", "Confirme a Senha") ?>
                            <?= $this->Form->password("senha-confirma", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("grupo", "Grupo de Usuários") ?>
                            <?= $this->Form->select("grupo", $permissoes, array("class" => "form-control", "style" => "width: 30%")) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Outras Opções</label><br/>
                            <?= $this->Form->checkbox("ativo") ?>Ativo &nbsp;&nbsp;&nbsp;
                            <?= $this->Form->checkbox("verificar") ?>Obrigar o usuário a trocar senha.
                        </div>
                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('usuario') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="submit" onclick="return validar()" class="btn btn-success">Salvar</button>
                        </div>
                    </div><!-- /.box-body -->
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>