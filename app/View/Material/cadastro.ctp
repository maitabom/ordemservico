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
            <li><a href="#"><i class="fa fa-puzzle-piece"></i>Materiais</a></li>
            <?php if ($id_material > 0): ?>
                <li class="active"><a href="#"><i class="fa fa-edit"></i>Edição do Material</a></li>
            <?php else: ?>
                <li class="active"><a href="#"><i class="fa fa-plus-circle"></i>Novo Material</a></li>
            <?php endif; ?>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <?php
                    echo $this->Form->create("Material", array(
                        "url" => array(
                            "controller" => "material",
                            "action" => "save"),
                        "role" => "form"
                    ));

                    echo $this->Form->hidden("id", array("value" => $id_material));
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("descricao", "Descrição") ?>
                            <?= $this->Form->text("descricao", array("class" => "form-control", "maxlength" => 100)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("fabricante", "Fabricante") ?>
                            <?= $this->Form->text("fabricante", array("class" => "form-control", "maxlength" => 50)) ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <label>Outras Opções</label><br/>
                            <?= $this->Form->checkbox("ativo") ?>Ativo
                        </div>
                        <div style="text-align: right;">
                            <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('material') ?>'" type="button" class="btn btn-primary">Voltar</button>
                            <button type="reset" class="btn btn-primary">Limpar</button>
                            <button type="submit" class="btn btn-success" onclick="return validar()">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>