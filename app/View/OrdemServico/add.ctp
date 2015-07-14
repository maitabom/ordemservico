<script type="text/javascript">
    $(function () {
        $("#ClienteCliente").autocomplete({
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
                $("#ClienteCliente").val(ui.item.Cliente.razao_social);
                $("#ClienteIdCliente").val(ui.item.Cliente.id);

                return false;
            },
            minLength: 3
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                    .append("<a><b><big>" + item.Cliente.razao_social + "</big></b><br><i>" + item.Cliente.nome_fantasia + "</i></a>")
                    .appendTo(ul);
        };

        VMasker(document.querySelector("#ClientePrazo")).maskPattern("99/99/9999");

        $("#ClientePrazo").datepicker({
            showButtonPanel: true
        }, $.datepicker.regional[ "pt-BR" ]);
    });
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
                    echo $this->Form->create("Cliente", array(
                        "url" => array(
                            "controller" => "cliente",
                            "action" => "save"),
                        "role" => "form"
                    ));
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
                        <div class="form-group col-xs-4">
                            <label for="exampleInputEmail1">Equipamento Para Saída</label>
                            <select class="form-control">
                                <option value=""></option>
                                <option value="AC">CG 130 LX</option>
                                <option value="AC">HP Deskjet</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputEmail1">Modo de Entrega</label>
                            <select class="form-control">
                                <option value=""></option>
                                <option value="AC">Sedex</option>
                                <option value="AC">PAC</option>
                                <option value="AC">Transportadora</option>
                                <option value="AC">Motoboy</option>
                                <option value="AC">Cliente vem buscar</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-4">
                            <label for="exampleInputEmail1">Contato do Cliente</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-xs-12">
                            <label for="exampleInputEmail1">Observações</label>
                            <textarea class="form-control"></textarea>
                        </div>

                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('ordem_servico') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="button" class="btn btn-warning">Criar Template</button>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div><!-- /.box-body -->
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>