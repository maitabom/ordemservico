<script type="text/javascript">
    function validar() {
        var mensagem = "";

        if ($("#ClienteRazaoSocial").val() === "") {
            mensagem += "- O nome ou a razão social do cliente é obrigatória.\n";
            $("#ClienteRazaoSocial").css("border-color", "red");
        } else {
            $("#ClienteRazaoSocial").css("border-color", "#D2D6DE");
        }

        if ($("#ClienteEndereco").val() === "") {
            mensagem += "- O endereço do cliente é obrigatório.\n";
            $("#ClienteEndereco").css("border-color", "red");
        } else {
            $("#ClienteEndereco").css("border-color", "#D2D6DE");
        }

        if ($("#ClienteCidade").val() === "") {
            mensagem += "- A cidade do cliente é obrigatória.\n";
            $("#ClienteCidade").css("border-color", "red");
        } else {
            $("#ClienteCidade").css("border-color", "#D2D6DE");
        }

        if ($("#ClienteUf").val() === "") {
            mensagem += "- O estado do cliente é obrigatório.\n";
            $("#ClienteUf").css("border-color", "red");
        } else {
            $("#ClienteUf").css("border-color", "#D2D6DE");
        }

        if ($("#ClienteCep").val() === "") {
            mensagem += "- O CEP do cliente é obrigatório.\n";
            $("#ClienteCep").css("border-color", "red");
        } else {
            $("#ClienteCep").css("border-color", "#D2D6DE");
        }

        if ($("#ClienteDocumentoFiscal").val() === "") {
            mensagem += "- O CPF ou o CNPJ do cliente é obrigatório.\n";
            $("#ClienteDocumentoFiscal").css("border-color", "red");
        } else {
            $("#ClienteDocumentoFiscal").css("border-color", "#D2D6DE");
        }

        if ($("#ClienteEmail").val() === "") {
            mensagem += "- É obrigatório informar o e-mail do cliente.\n";
            $("#ClienteEmail").css("border-color", "red");
        } else {
            $("#ClienteEmail").css("border-color", "#D2D6DE");
        }

        if ($("#radio_tipo_cliente input:checked").length === 0) {
            mensagem += "- É obrigatório informar se o cliente é pessoa física ou pessoa jurídica.\n";
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
        VMasker(document.querySelector("#ClienteCep")).maskPattern("99999-999");
        VMasker(document.querySelector("#ClienteTelefone")).maskPattern("(99)9999-9999");
        VMasker(document.querySelector("#ClienteCelular")).maskPattern("(99)99999-9999");
    });
</script>
<style>
    #radio_tipo_cliente label{
        font-weight: normal;
    }
</style>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element('message', array(
    'name' => 'cadastro_erro',
    'type' => 'error',
    'message' => 'Ocorreu um erro ao efetuar o cadastro.',
    'details' => ''
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_for_layout ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-briefcase"></i>Clientes</a></li>
            <?php if ($id_cliente > 0): ?>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Edição do Cliente</a></li>
            <?php else: ?>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Novo Cliente</a></li>
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
                    echo $this->Form->create("Cliente", array(
                        "url" => array(
                            "controller" => "cliente",
                            "action" => "save"),
                        "role" => "form"
                    ));

                    echo $this->Form->hidden("id", array("value" => $id_cliente));
                    echo $this->Form->hidden("data_cadastro");
                    echo $this->Form->hidden("data_alteracao");
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("razao_social", "Nome/Razão Social") ?>
                            <?= $this->Form->text("razao_social", array("class" => "form-control", "maxlength" => 255)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("nome_fantasia", "Nome Fantasia") ?>
                            <?= $this->Form->text("nome_fantasia", array("class" => "form-control", "maxlength" => 255)) ?>
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
                            <?= $this->Form->label("documento_fiscal", "Documento Fiscal (CPF/CNPJ)") ?>
                            <?= $this->Form->text("documento_fiscal", array("class" => "form-control", "maxlength" => 18)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("email", "E-mail") ?>
                            <?= $this->Form->text("email", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("tipo_cliente", "Tipo de Cliente") ?>
                            <div id="radio_tipo_cliente">
                                <?= $this->Form->radio("tipo_cliente", $tipos_cliente, array("class" => "checkbox-inline", "separator" => "&nbsp;&nbsp;&nbsp;&nbsp;", "legend" => false)) ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Outras Opções</label><br/>
                            <?= $this->Form->checkbox("ativo") ?>Ativo
                        </div>
                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('cliente') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="submit" class="btn btn-success" onclick="return validar()">Salvar</button>
                        </div>
                    </div><!-- /.box-body -->
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>