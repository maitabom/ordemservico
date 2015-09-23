<script type="text/javascript">

    $(function () {
        $("#OrdemServicoModeloCliente").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?= $this->Url->relative('/cliente/listar') ?>",
                    dataType: "json",
                    data: {
                        nome: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                $("#OrdemServicoModeloCliente").val(ui.item.Cliente.razao_social);
                $("#OrdemServicoModeloIdCliente").val(ui.item.Cliente.id);

                return false;
            },
            minLength: 3
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<a><b><big>" + item.Cliente.razao_social + "</big></b><br><i>" + item.Cliente.nome_fantasia + "</i></a>")
                    .appendTo(ul);
        };

    });

    function validar() {
        var mensagem = "";

        if ($("#OrdemServicoModeloIdCliente").val() === "") {
            mensagem += "- É obrigatorio informar o nome do cliente cadastrado no sistema.\n";
            $("#OrdemServicoModeloCliente").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloCliente").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloServico").val() === "") {
            mensagem += "- É obrigatório informar o tipo de serviço a ser prestado na ordem de serviço.\n";
            $("#OrdemServicoModeloServico").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloServico").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloMaterial").val() === "") {
            mensagem += "- É obrigatório informar o materal a ser utilizado no serviço.\n";
            $("#OrdemServicoModeloMaterial").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloMaterial").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloFormato").val() === "") {
            mensagem += "- E obrigatorio informar o formato.\n";
            $("#OrdemServicoModeloFormato").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloFormato").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloFormatoFinal").val() === "") {
            mensagem += "- É obrigatório informar o formato final.\n";
            $("#OrdemServicoModeloFormatoFinal").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloFormatoFinal").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloQuantidadeProducao").val() === "") {
            mensagem += "- É obrigatório informar a quantidade de produção.\n";
            $("#OrdemServicoModeloQuantidadeProducao").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloQuantidadeProducao").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloQuantidadeCliente").val() === "") {
            mensagem += "- É obrigatório informar a quantidade dada ao cliente.\n";
            $("#OrdemServicoModeloQuantidadeCliente").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloQuantidadeCliente").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloAcabamento").val() === "") {
            mensagem += "- É obrigatório informar o acabamento a respeito da ordem de serviço.\n";
            $("#OrdemServicoModeloAcabamento").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloAcabamento").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloEquipamento").val() === "") {
            mensagem += "- É obrigatório informar o equipamento relacionado à ordem de serviço.\n";
            $("#OrdemServicoModeloEquipamento").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloEquipamento").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModeloModoEntrega").val() === "") {
            mensagem += "- É obrigatório informar a forma de entrega à ordem de serviço.\n";
            $("#OrdemServicoModeloModoEntrega").css("border-color", "red");
        } else {
            $("#OrdemServicoModeloModoEntrega").css("border-color", "#D2D6DE");
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
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element('message', array(
    'name' => 'cadastro_erro',
    'type' => 'error',
    'message' => 'Ocorreu um erro ao salvar os dados.',
    'details' => ''
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar Modelo de Ordem de Serviço <small><?= $this->Format->zeroPad($id) ?></small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li><a href="<?= $this->Url->make('templates') ?>"><i class="fa fa-bookmark"></i>Templates</a></li>
            <li class="active"><a href="#"><i class="fa fa-edit"></i>Editar Modelo de Ordem de Serviço</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box">
                    <?php
                    echo $this->Form->create("OrdemServicoModelo", array(
                        "url" => array(
                            "controller" => "ordem_servico",
                            "action" => "template_save"),
                        "role" => "form"
                    ));

                    echo $this->Form->hidden("id");
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("cliente", "Cliente") ?>
                            <?= $this->Form->hidden("id_cliente") ?>
                            <?= $this->Form->text("cliente", array("class" => "form-control", "maxlength" => 255, "value" => $nome_cliente)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("servico", "Servico") ?>
                            <?= $this->Form->text("servico", array("class" => "form-control", "maxlength" => 300)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("material", "Material") ?>
                            <?= $this->Form->select("material", $materiais, array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("formato", "Formato") ?>
                            <?= $this->Form->text("formato", array("class" => "form-control", "maxlength" => 30)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("formato_final", "Formato Final") ?>
                            <?= $this->Form->text("formato_final", array("class" => "form-control", "maxlength" => 30)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("quantidade_producao", "Quantidade Produção") ?>
                            <?= $this->Form->text("quantidade_producao", array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("quantidade_cliente", "Quantidade Cliente") ?>
                            <?= $this->Form->text("quantidade_cliente", array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("acabamento", "Acabamento") ?>
                            <?= $this->Form->text("acabamento", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("equipamento", "Equipamento Para Saída") ?>
                            <?= $this->Form->select("equipamento", $equipamentos, array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("modo_entrega", "Modo de Entrega") ?>
                            <?= $this->Form->select("modo_entrega", $modos_entregas, array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("contato_cliente", "Contato do Cliente") ?>
                            <?= $this->Form->text("contato_cliente", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>

                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('ordem_servico', 'templates') ?>'" type="button" class="btn btn-primary">Voltar</button>
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