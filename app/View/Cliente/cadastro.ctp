<style>
    #radio_tipo_cliente label{
        font-weight: normal;
    }
</style>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
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
                    ?>
                    <div class="box-body">
                        <div class="form-group col-xs-12">
                            <?= $this->Form->label("razao_social", "Razão Social") ?>
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
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div><!-- /.box-body -->
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>