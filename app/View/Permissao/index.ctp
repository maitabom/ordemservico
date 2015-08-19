<script type="text/javascript">
    function excluir(id) {
        $("#permissao_excluir").dialog("open");
        $("#questionParameter").val(id);
    }
</script>
<?= $this->Session->flash() ?>
<?= $this->element('menu'); ?>
<?=
$this->element("question", array(
    "name" => "permissao_excluir",
    "form_name" => "frm_permissao_excluir",
    "message" => "Deseja excluir esta permissão? É preciso primeiramente desassociar todos os usuários para esta permissão.",
    "action" => array(
        "controller" => "permissao",
        "action" => "delete"),
    "buttons" => array(
        "ok" => "Sim",
        "cancel" => "Não"
    )
))
?>
<div class = "content-wrapper">
    <section class = "content-header">
        <h1>Lista de Permissões</h1>
        <ol class = "breadcrumb">
            <li><a href = "<?= $this->Url->relative('/painel') ?>"><i class = "fa fa-home"></i> Home</a></li>
            <li><a href = "#"><i class = "fa fa-users"></i>Usuários</a></li>
            <li class = "active"><a href = "#"><i class = "fa fa-shield"></i>Permissões</a></li>
        </ol>
    </section>
    <section class = "content">
        <div class = "row">
            <div class = "col-xs-12">
                <div class = "box">

                    <div class = "box-body">
                        <div id = "wrapper" class = "dataTables_wrapper form-inline" role = "grid">

                            <div style = "text-align: right;">
                                <?php if ($this->Membership->handleRole("ADICIONAR_PERMISSOES")): ?>
                                    <button id = "btnNovo" class = "btn btn-success" onclick = "<?= 'window.location = \'' . $this->Url->make('permissao', 'add') . '\'' ?>">Novo</button>
                                <?php endif; ?>
                            </div>
                            <div style = "min-height: 30px">

                            </div>
                            <table id = "example1" class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style = "width: 85%">Nome</th>
                                        <th>Ativo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($permissoes as $permissao):
                                        ?>
                                        <tr>
                                            <td><?= $permissao["Permissao"]["nome"] ?></td>
                                            <td><?= $permissao["Permissao"]["ativo"] ? "Sim" : "Não" ?></td>
                                            <td>
                                                <?php if ($this->Membership->handleRole("EDITAR_PERMISSOES")): ?>
                                                    <a href="<?= $this->Url->relative('permissao/edit/' . $permissao["Permissao"]["id"]) ?>" class="btn btn-bitbucket" title="Editar">
                                                        <i class="fa fa-edit">
                                                        </i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($this->Membership->handleRole("EXCLUIR_PERMISSOES")): ?>
                                                    <a class="btn btn-google-plus" href="#" onclick="excluir(<?= $permissao["Permissao"]["id"] ?>)" title="Excluir">
                                                        <i class="fa fa-trash">
                                                        </i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?= $this->element("pagination", array("qtd_total" => $qtd_permissoes)) ?>
                </div>
            </div>
        </div>
    </section>
</div>