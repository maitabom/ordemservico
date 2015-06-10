<script type="text/javascript">
    function validar() {
        var mensagem = "";

        if ($("#PermissaoNome").val() === "") {
            mensagem += "- O nome do grupo de permissões é obrigatório.\n";
            $("#PermissaoNome").css("border-color", "red");
        } else {
            $("#PermissaoNome").css("border-color", "#D2D6DE");
        }

        if ($('#funcoes input:checked').length === 0) {
            mensagem += "- É obrigatório selecionar pelo menos uma função para este grupo de permissões.\n";
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

<?php

function funcao_selecionada($chave, $funcoes_selecionadas) {
    foreach ($funcoes_selecionadas as $fn) {
        if ($fn["fn"]["chave"] === $chave) {
            return true;
        }
    }

    return false;
}
?>
<?= $this->Session->flash() ?>
<?=
$this->element('message', array(
    'name' => 'cadastro_erro',
    'type' => 'error',
    'message' => 'Ocorreu um erro ao efetuar o cadastro.',
    'details' => ''
))
?>
<?= $this->element('menu'); ?>
<?php ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_for_layout ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="<?= $this->Url->relative('/permissao') ?>"><i class="fa fa-shield"></i>Permissões</a></li>
            <?php if ($id_permissao > 0): ?>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Editar Permissão</a></li>
            <?php else: ?>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Novo Grupo de Permissão</a></li>
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
                    echo $this->Form->create("Permissao", array(
                        "url" => array(
                            "controller" => "permissao",
                            "action" => "save"),
                        "role" => "form"));

                    echo $this->Form->hidden("id", array("value" => $id_permissao));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <label>Nome</label>
                            <?= $this->Form->text("nome", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div id="funcoes" class="form-group col-xs-12">
                            <label>Permissões</label><br/>
                            <?php
                            foreach ($funcoes as $funcao) {
                                echo $this->Form->checkbox("CHK_" . $funcao["Funcao"]["chave"], array("class" => "checkbox-inline", "checked" => funcao_selecionada($funcao["Funcao"]["chave"], $funcoes_selecionadas)));
                                echo ' ' . $funcao["Funcao"]["nome"];
                                echo '<br/>';
                            }
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Outras Opções</label><br/>
                            <?= $this->Form->checkbox("ativo") ?> Ativo
                        </div>
                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('permissao') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="submit" onclick="return validar()" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>