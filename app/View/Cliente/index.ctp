<script type="text/javascript">
    function excluir(id) {
        $("#cliente_excluir").dialog("open");
        $("#questionParameter").val(id);
    }
</script>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element("question", array(
    "name" => "cliente_excluir",
    "form_name" => "frm_cliente_excluir",
    "message" => "Deseja excluir o cliente? Certifique que não haja nenhum serviço associado a este cliente. Você pode deixar inativo, se desejar.",
    "action" => array(
        "controller" => "cliente",
        "action" => "delete"),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Lista de Clientes</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-briefcase"></i>Clientes</a></li>
            <li class="active"><a href="#"><i class="fa fa-circle-o"></i>Lista de Clientes</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Busca</h3>
                    </div>
                    <div class="box-body">
                        <div id="wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <?php
                            echo $this->Form->create("Cliente", array(
                                "url" => array(
                                    "controller" => "cliente",
                                    "action" => "index"
                                ),
                                "role" => "form"));
                            ?>
                            <div class="row">
                                <div class="col-xs-3">
                                    <?= $this->Form->label("nome", "Nome") ?><br/>
                                    <?= $this->Form->text("nome", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class="col-xs-3">
                                    <?= $this->Form->label("email", "E-mail") ?><br/>
                                    <?= $this->Form->text("email", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class=" col-xs-3">
                                    <?= $this->Form->label("cidade", "Cidade") ?><br/>
                                    <?= $this->Form->text("cidade", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class="col-xs-3">
                                    <?= $this->Form->label("uf", "Estado") ?><br/>
                                    <?= $this->Form->select("uf", $estados, array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3">
                                    <?= $this->Form->label("documento_fiscal", "Documento Fiscal") ?><br/>
                                    <?= $this->Form->text("documento_fiscal", array("class" => "form-control", "style" => "width: 100%")) ?>
                                </div>
                                <div class="col-xs-3">
                                    <?= $this->Form->label("tipo_cliente", "Tipo de Cliente") ?>
                                    <?= $this->Form->select("tipo_cliente", $tipos_cliente, array("class" => "form-control", "style" => "width: 100%", "empty" => false)) ?>
                                </div>
                                <div class="col-xs-3">
                                    <?= $this->Form->label("mostra", "Mostrar") ?><br/>
                                    <?= $this->Form->select("mostra", $combo_mostra, array("class" => "form-control", "style" => "width: 100%", "empty" => false)) ?>
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <?php if ($this->Membership->handleRole("ADICIONAR_CLIENTES")): ?>
                                    <button id="btnNovo" type="button" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('cliente', 'add') . '\'' ?>">Novo</button>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                            <?php echo $this->Form->end(); ?>
                            <div style="min-height: 30px">

                            </div>
                            <?php if ($qtd_clientes == 0): ?>
                                <div>
                                    <h2>Nenhum cliente cadastrado encontrado. Para cadastrar seu primeiro cliente, <?= $this->Html->link("clique aqui", array("controller" => "cliente", "action" => "add")) ?>.</h2>
                                </div>
                            <?php else: ?>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Razão Social</th>
                                            <th>Nome Fantasia</th>
                                            <th>Tipo</th>
                                            <th>E-mail</th>
                                            <th>Localidade</th>
                                            <th>Ativo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($clientes as $cliente): ?>
                                            <tr>
                                                <td><?= $cliente["Cliente"]["razao_social"] ?></td>
                                                <td><?= $cliente["Cliente"]["nome_fantasia"] ?></td>
                                                <td><?= "P" . $cliente["Cliente"]["tipo_cliente"] ?></td>
                                                <td><?= $cliente["Cliente"]["email"] ?></td>
                                                <td><?= $cliente["Cliente"]["cidade"] . " - " . $cliente["Cliente"]["uf"] ?></td>
                                                <td><?= $cliente["Cliente"]["ativo"] ? "Sim" : "Não" ?></td>
                                                <td>
                                                    <?php if ($this->Membership->handleRole("EDITAR_CLIENTES")): ?>
                                                        <a href="<?= $this->Url->relative('cliente/edit/' . $cliente["Cliente"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if ($this->Membership->handleRole("EXCLUIR_CLIENTES")): ?>
                                                        <a class="btn btn-google-plus" href="#" onclick="excluir(<?= $cliente["Cliente"]["id"] ?>)" title="Excluir">
                                                            <i class="fa fa-trash">
                                                            </i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?= $this->element("pagination", array("qtd_total" => $qtd_clientes, "name" => "clientes")) ?>
                </div>
            </div>
        </div>
    </section>
</div>