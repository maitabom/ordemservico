<script type="text/javascript">
    function validar() {
        var mensagem = "";

        if ($("#EquipamentoNome").val() === "") {
            mensagem += "- O nome do equipamento é obrigatório.\n";
            $("#EquipamentoNome").css("border-color", "red");
        } else {
            $("#EquipamentoNome").css("border-color", "#D2D6DE");
        }

        if ($("#EquipamentoFabricante").val() === "") {
            mensagem += "- O fabricante do equipamento é obrigatório.\n";
            $("#EquipamentoFabricante").css("border-color", "red");
        } else {
            $("#EquipamentoFabricante").css("border-color", "#D2D6DE");
        }

        if ($("#EquipamentoModelo").val() === "") {
            mensagem += "- O modelo do equipamento é obrigatório.\n";
            $("#EquipamentoModelo").css("border-color", "red");
        } else {
            $("#EquipamentoModelo").css("border-color", "#D2D6DE");
        }

        if ($("#EquipamentoDataAquisicao").val() === "") {
            mensagem += "- A data de aquisição do equipamento é obrigatório.\n";
            $("#EquipamentoDataAquisicao").css("border-color", "red");
        } else {
            $("#EquipamentoDataAquisicao").css("border-color", "#D2D6DE");
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
        VMasker(document.querySelector("#EquipamentoDataAquisicao")).maskPattern("99/99/9999");

        $("#EquipamentoDataAquisicao").datepicker({
            format: "dd/mm/yyyy",
            todayBtn: "linked",
            language: "pt-BR",
            autoclose: true,
            todayHighlight: true
        });
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
        <h1><?= $title_for_layout ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-gear"></i>Outros</a></li>
            <li><a href="#"><i class="fa fa-print"></i>Equipamentos</a></li>
            <?php if ($id_equipamento > 0): ?>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Edição do Equipamento</a></li>
            <?php else: ?>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Novo Equipamento</a></li>
            <?php endif; ?>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php
                    echo $this->Form->create("Equipamento", array(
                        "url" => array(
                            "controller" => "equipamento",
                            "action" => "save"),
                        "role" => "form"
                    ));

                    echo $this->Form->hidden("id", array("value" => $id_equipamento));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("nome", "Nome") ?>
                            <?= $this->Form->text("nome", array("class" => "form-control", "maxlength" => 80)) ?>
                        </div>
                        <div class="form-group col-xs-4">
                            <?= $this->Form->label("fabricante", "Fabricante") ?>
                            <?= $this->Form->text("fabricante", array("class" => "form-control", "maxlength" => 80)) ?>
                        </div>
                        <div class="form-group col-xs-4">
                            <?= $this->Form->label("modelo", "Modelo") ?>
                            <?= $this->Form->text("modelo", array("class" => "form-control", "maxlength" => 30)) ?>
                        </div>
                        <div class="form-group col-xs-4">
                            <?= $this->Form->label("data_aquisicao", "Data de Aquisição") ?>
                            <?= $this->Form->text("data_aquisicao", array("class" => "form-control")) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Outras Opções</label><br/>
                            <?= $this->Form->checkbox("ativo") ?>Ativo
                        </div>
                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('equipamento') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="submit" class="btn btn-success" onclick="return validar()">Salvar</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>