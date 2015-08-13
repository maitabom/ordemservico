<script type="text/javascript">
    $(function () {
        $("#OrdemServicoCliente").autocomplete({
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
                $("#OrdemServicoCliente").val(ui.item.Cliente.razao_social);
                $("#OrdemServicoIdCliente").val(ui.item.Cliente.id);

                return false;
            },
            minLength: 3
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<a><b><big>" + item.Cliente.razao_social + "</big></b><br><i>" + item.Cliente.nome_fantasia + "</i></a>")
                    .appendTo(ul);
        };

        VMasker(document.querySelector("#OrdemServicoPrazo")).maskPattern("99/99/9999");

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

        if ($("#OrdemServicoIdCliente").val() === "") {
            mensagem += "- É obrigatorio informar o nome do cliente cadastrado no sistema.\n";
            $("#OrdemServicoCliente").css("border-color", "red");
        } else {
            $("#OrdemServicoCliente").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoServico").val() === "") {
            mensagem += "- É obrigatório informar o tipo de serviço a ser prestado na ordem de serviço.\n";
            $("#OrdemServicoServico").css("border-color", "red");
        } else {
            $("#OrdemServicoServico").css("border-color", "#D2D6DE");
        }

        if ($("#OrdemServicoMaterial").val() === "") {
            mensagem += "- É obrigatório informar o materal a ser utilizado no serviço.\n";
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

        if ($("#OrdemServicoPrioridade").val() === "") {
            mensagem += "- É obrigatório informar a prioridade da ordem de serviço.\n";
            $("#OrdemServicoPrioridade").css("border-color", "red");
        } else {
            $("#OrdemServicoPrioridade").css("border-color", "#D2D6DE");
        }

        if (mensagem == "") {
            return true;
        } else {
            $("#cadastro_erro").dialog("open");
            $("#txtmaisdetalhes").val(mensagem);
            return false;
        }
    }

    function criarModelo() {
        if (validar()) {
            $("#OrdemServicoAddForm").attr("action", "<?= $this->Url->relative('/ordem_servico/template_create') ?>");
            $("#OrdemServicoAddForm").submit();
        }
    }
</script>
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
        <h1>Gerar Ordem de Serviço</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Gerar Ordem de Serviço</a></li>
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

                    echo $this->Form->hidden("data_criacao");
                    echo $this->Form->hidden("concluido");
                    echo $this->Form->hidden("responsavel");
                    echo $this->Form->hidden("cancelado");
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("cliente", "Cliente") ?>
                            <?= $this->Form->hidden("id_cliente") ?>
                            <?= $this->Form->text("cliente", array("class" => "form-control", "maxlength" => 255)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("servico", "Servico") ?>
                            <?= $this->Form->text("servico", array("class" => "form-control", "maxlength" => 300)) ?>
                        </div>
                        <div class="form-group col-xs-3">
                            <?= $this->Form->label("material", "Material") ?>
                            <?= $this->Form->text("material", array("class" => "form-control", "maxlength" => 100)) ?>
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
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("observacoes", "Observações") ?>
                            <?= $this->Form->textarea("observacoes", array("class" => "form-control")) ?>
                        </div>

                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('ordem_servico') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="button" onclick="criarModelo()" class="btn btn-warning">Criar Template</button>
                            <button type="submit" onclick="return validar();" class="btn btn-success">Salvar</button>
                        </div>
                    </div><!-- /.box-body -->
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>