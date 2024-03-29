<script type="text/javascript">
    $(function () {
        $("#OrdemServicoNomeMaterial").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?= $this->Url->relative('/material/listar') ?>",
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
                $("#OrdemServicoNomeMaterial").val(ui.item.Material.descricao);
                $("#OrdemServicoMaterial").val(ui.item.Material.id);

                return false;
            },
            minLength: 3

        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<a><b><big>" + item.Material.descricao + "</big></b><br><i>" + item.Material.fabricante + "</i></a>")
                    .appendTo(ul);
        };

        VMasker(document.querySelector("#OrdemServicoPrazo")).maskPattern("99/99/9999");

        if (!$("#OrdemServicoPrazo").prop("readonly"))
            $("#OrdemServicoPrazo").datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                language: "pt-BR",
                autoclose: true,
                todayHighlight: true
            });

    });

    function validar() {
        var mensagem = "";

        if ($("#OrdemServicoServico").val() === "") {
            mensagem += "- É obrigatório informar o tipo de serviço a ser prestado na ordem de serviço.\n";
            $("#OrdemServicoServico").css("border-color", "red");
        } else {
            $("#OrdemServicoServico").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoMaterial").val() === "") {
            mensagem += "- É obrigatório informar o materal válido a ser utilizado no serviço.\n";
            $("#OrdemServicoMaterial").css("border-color", "red");
        } else {
            $("#OrdemServicoMaterial").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoFormato").val() === "") {
            mensagem += "- E obrigatorio informar o formato.\n";
            $("#OrdemServicoFormato").css("border-color", "red");
        } else {
            $("#OrdemServicoFormato").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoFormatoFinal").val() === "") {
            mensagem += "- É obrigatório informar o formato final.\n";
            $("#OrdemServicoFormatoFinal").css("border-color", "red");
        } else {
            $("#OrdemServicoFormatoFinal").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoQuantidadeProducao").val() === "") {
            mensagem += "- É obrigatório informar a quantidade de produção.\n";
            $("#OrdemServicoQuantidadeProducao").css("border-color", "red");
        } else {
            $("#OrdemServicoQuantidadeProducao").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoQuantidadeCliente").val() === "") {
            mensagem += "- É obrigatório informar a quantidade dada ao cliente.\n";
            $("#OrdemServicoQuantidadeCliente").css("border-color", "red");
        } else {
            $("#OrdemServicoQuantidadeCliente").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoAcabamento").val() === "") {
            mensagem += "- É obrigatório informar o acabamento a respeito da ordem de serviço.\n";
            $("#OrdemServicoAcabamento").css("border-color", "red");
        } else {
            $("#OrdemServicoAcabamento").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoPrazo").val() === "") {
            mensagem += "- É obrigatório informar o prazo de execução da ordem de serviço.\n";
            $("#OrdemServicoPrazo").css("border-color", "red");
        } else {
            $("#OrdemServicoPrazo").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoEquipamento").val() === "") {
            mensagem += "- É obrigatório informar o equipamento relacionado à ordem de serviço.\n";
            $("#OrdemServicoEquipamento").css("border-color", "red");
        } else {
            $("#OrdemServicoEquipamento").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoModoEntrega").val() === "") {
            mensagem += "- É obrigatório informar a forma de entrega à ordem de serviço.\n";
            $("#OrdemServicoModoEntrega").css("border-color", "red");
        } else {
            $("#OrdemServicoModoEntrega").css("border-color", "#D2D6DE");
        }

        if (mensagem == "") {
            return true;
        } else {
            $("#cadastro_erro").dialog("open");
            $("#txtmaisdetalhes").val(mensagem);
            return false;
        }
    }

    function cancelar(id) {
        $("#ordem_servico_cancelar").dialog("open");
        $("#questionParameter").val(id);
    }

    function concluir(id) {
        $("#ordem_servico_concluir").dialog("open");
        $("#questionParameter").val(id);
    }

    function criarModelo() {
        if (validar()) {
            $("#OrdemServicoSaveForm").attr("action", "<?= $this->Url->relative('/ordem_servico/template_create') ?>");
            $("#OrdemServicoSaveForm").submit();
        }
    }
</script>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element('message', array(
    'name' => 'cadastro_erro',
    'type' => 'error',
    'message' => 'Ocorreu um erro ao alterar os dados da ordem de serviço.',
    'details' => ''
))
?>

<?=
$this->element("question", array(
    "name" => "ordem_servico_cancelar",
    "form_name" => "frm_servico_cancelar",
    "message" => "Deseja cancelar esta ordem de serviço?",
    "action" => array(
        "controller" => "ordem_servico",
        "action" => "cancelar", $id),
    "callback" => array(
        "controller" => "ordem_servico",
        "action" => "documento", $id),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>

<?=
$this->element("question", array(
    "name" => "ordem_servico_concluir",
    "form_name" => "frm_servico_cancelar",
    "message" => "Deseja marcar esta ordem de serviço como concluído?",
    "action" => array(
        "controller" => "ordem_servico",
        "action" => "concluir", $id),
    "callback" => array(
        "controller" => "ordem_servico",
        "action" => "documento", $id),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar Ordem de Serviço <small><?= $this->Format->zeroPad($id) ?></small></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li class="active"><a href="#"><i class="fa fa-edit"></i>Editar Ordem de Serviço</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box">
                    <?php
                    echo $this->Form->create("OrdemServico", array(
                        "url" => array(
                            "controller" => "ordem_servico",
                            "action" => "save"),
                        "role" => "form"
                    ));

                    echo $this->Form->hidden("id");
                    echo $this->Form->hidden("cancelado");
                    echo $this->Form->hidden("concluido");
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("cliente", "Cliente") ?>
                            <?= $this->Form->hidden("id_cliente") ?>
                            <?= $this->Form->text("cliente", array("class" => "form-control", "readonly" => true, "value" => $nome_cliente)) ?>
                        </div>
                        <?php if ($cancelado == false && $concluido == false): ?>
                            <div class="form-group col-xs-12">
                                <?= $this->Form->label("servico", "Servico") ?>
                                <?= $this->Form->text("servico", array("class" => "form-control", "maxlength" => 300)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->hidden("material") ?>
                                <?= $this->Form->label("material", "Material") ?>
                                <?= $this->Form->text("nome_material", array("class" => "form-control", "value" => $descricao_material, "maxlength" => 100)) ?>
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
                                <?= $this->Form->text("quantidade_producao", array("class" => "form-control", "maxlength" => 50)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("quantidade_cliente", "Quantidade Cliente") ?>
                                <?= $this->Form->text("quantidade_cliente", array("class" => "form-control", "maxlength" => 50)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("acabamento", "Acabamento") ?>
                                <?= $this->Form->text("acabamento", array("class" => "form-control", "maxlength" => 300)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("prazo", "Prazo") ?>
                                <?= $this->Form->text("prazo", array("class" => "form-control")) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("arquivo", "Arquivo") ?>
                                <?= $this->Form->text("arquivo", array("class" => "form-control", "maxlength" => 255)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("equipamento", "Equipamento Par Saída") ?>
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
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("prioridade", "Prioridade") ?>
                                <?= $this->Form->select("prioridade", $prioridades, array("class" => "form-control")) ?>
                            </div>
                        <?php else: ?>
                            <div class="form-group col-xs-12">
                                <?= $this->Form->label("servico", "Servico") ?>
                                <?= $this->Form->text("servico", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->hidden("material") ?>
                                <?= $this->Form->label("material", "Material") ?>
                                <?= $this->Form->text("nome_material", array("class" => "form-control", "readonly" => true, "value" => $descricao_material)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("formato", "Formato") ?>
                                <?= $this->Form->text("formato", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("formato_final", "Formato Final") ?>
                                <?= $this->Form->text("formato_final", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("quantidade_producao", "Quantidade Produção") ?>
                                <?= $this->Form->text("quantidade_producao", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("quantidade_cliente", "Quantidade Cliente") ?>
                                <?= $this->Form->text("quantidade_cliente", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("acabamento", "Acabamento") ?>
                                <?= $this->Form->text("acabamento", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("prazo", "Prazo") ?>
                                <?= $this->Form->text("prazo", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("arquivo", "Arquivo") ?>
                                <?= $this->Form->text("arquivo", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("equipamento", "Equipamento Par Saída") ?>
                                <?= $this->Form->select("equipamento", $equipamentos, array("class" => "form-control", "disabled" => true)) ?>
                                <?= $this->Form->hidden("equipamento"); ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("modo_entrega", "Modo de Entrega") ?>
                                <?= $this->Form->select("modo_entrega", $modos_entregas, array("class" => "form-control", "disabled" => true)) ?>
                                <?= $this->Form->hidden("modo_entrega"); ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("contato_cliente", "Contato do Cliente") ?>
                                <?= $this->Form->text("contato_cliente", array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                            <div class="form-group col-xs-3">
                                <?= $this->Form->label("prioridade", "Prioridade") ?>
                                <?= $this->Form->select("prioridade", $prioridades, array("class" => "form-control", "readonly" => true)) ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("observacoes", "Observações") ?>
                            <?= $this->Form->textarea("observacoes", array("class" => "form-control")) ?>
                        </div>

                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('ordem_servico') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <?php if (($this->Membership->handleRole("CANCELAR_ORDEM_SERVICO")) && ($cancelado == false && $concluido == false)): ?>
                                <button type="button" onclick="cancelar();" class="btn btn-danger">Cancelar</button>
                            <?php endif; ?>
                            <?php if ($this->Membership->handleRole("CADASTRAR_MODELO_ORDEM_SERVICO")): ?>
                                <button type="button" onclick="criarModelo()" class="btn btn-warning">Criar Template</button>
                            <?php endif; ?>
                            <?php if (($this->Membership->handleRole("CONCLUIR_ORDEM_SERVICO")) && ($cancelado == false && $concluido == false)): ?>
                                <button type="button" onclick="concluir();" class="btn btn-success">Marcar Concluído</button>
                            <?php endif; ?>
                            <button type="submit" onclick="return validar();" class="btn btn-success"><b>Salvar</b></button>
                        </div>
                    </div><!-- /.box-body -->
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>