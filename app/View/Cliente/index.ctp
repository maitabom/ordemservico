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
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="exampleInputEmail1">Nome</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="col-xs-4">
                                    <label for="exampleInputEmail1">E-mail</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class=" col-xs-4">
                                    <label for="exampleInputEmail1">Cidade</label><br/>
                                    <input type="text" class="form-control" id="exampleInputEmail1">
                                </div>
                            </div>
                            <div style="min-height: 15px">

                            </div>
                            <div style="text-align: right;">
                                <button id="btnNovo" class="btn btn-success" onclick="<?= 'window.location = \'' . $this->Url->make('cliente', 'add') . '\'' ?>">Novo</button>
                                <button class="btn btn-primary">Buscar</button>
                            </div>
                            <div style="min-height: 30px">

                            </div>
                            <?php if (count($clientes) == 0): ?>
                                <div>
                                    <h2>Nenhum cliente cadastrado encontrado. Para cadastrar seu primeiro cliente, <?= $this->Html->link("clique aqui", array("controller" => "cliente", "action" => "add")) ?>.</h2>
                                </div>
                            <?php else: ?>
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Documento Fiscal</th>
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
                                                <td><?= $cliente["Cliente"]["documento_fiscal"] ?></td>
                                                <td><?= "P" . $cliente["Cliente"]["tipo_cliente"] ?></td>
                                                <td><?= $cliente["Cliente"]["email"] ?></td>
                                                <td><?= $cliente["Cliente"]["cidade"] . " - " . $cliente["Cliente"]["uf"] ?></td>
                                                <td>Sim</td>
                                                <td>
                                                    <a href="<?= $this->Url->relative('cliente/edit/' . $cliente["Cliente"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                    </a>
                                                    <a class="btn btn-google-plus" href="#" onclick="excluir(<?= $cliente["Cliente"]["id"] ?>)" title="Excluir">
                                                        <i class="fa fa-trash">
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>