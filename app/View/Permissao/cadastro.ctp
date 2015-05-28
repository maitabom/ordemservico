<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title_for_layout ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
            <li class="active"><a href="<?= $this->Url->relative('/permissao') ?>"><i class="fa fa-shield"></i>Permissões</a></li>
            <?php if ($id_usuario > 0): ?>
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
                    <form action="#" role="form">
                        <div class="box-body">
                            <div class="form-group col-xs-12">
                                <label>Nome</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Permissões</label><br/>
                                <?php
                                foreach ($funcoes as $funcao) {
                                    echo $this->Form->checkbox($funcao["Funcao"]["chave"], array("class" => "checkbox-inline"));
                                    echo ' ' . $funcao["Funcao"]["nome"];
                                    echo '<br/>';
                                }
                                ?>
                            </div>
                            <div class="form-group col-xs-12">
                                <label>Outras Opções</label><br/>
                                <input type="checkbox" class="checkbox-inline"/>Ativo
                            </div>
                            <div style="text-align: right;">
                                <button id="btnVoltar" onclick="window.location = '<?= $this->Url->make('permissao') ?>'" type="button" class="btn btn-primary">Voltar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>