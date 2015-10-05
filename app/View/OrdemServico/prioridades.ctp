<script type="text/javascript">
    $(function () {
        $("#prioridades").sortable({
            revert: true
        });

        $("#prioridades").disableSelection();

        $(".btn-danger").click(function () {
            if (confirm("Deseja cancelar esta ordem de serviço?")) {
                var id = $(this).val();
                var retorno = '<?= serialize(["controller" => "ordem_servico", "action" => "prioridades"]) ?>';

                $.ajax({
                    type: "POST",
                    data: {
                        param: id,
                        callback: retorno
                    },
                    url: "<?= $this->Url->relative('/ordem_servico/cancelar/') ?>" + id,
                    dataType: "html",
                    beforeSend: function () {
                        $("#loading").dialog("open");
                    },
                    complete: function (msg) {
                        $("#loading").dialog("close");
                        alert("Ordem de serviço cancelada com sucesso.");
                        $("li#" + id).hide();
                    }
                });
            }
        });

        $(".btn-success").click(function () {
            if (confirm("Deseja marcar esta ordem de serviço como concluído?")) {
                var id = $(this).val();
                var retorno = '<?= serialize(["controller" => "ordem_servico", "action" => "prioridades"]) ?>';

                $.ajax({
                    type: "POST",
                    data: {
                        param: id,
                        callback: retorno
                    },
                    url: "<?= $this->Url->relative('/ordem_servico/concluir/') ?>" + id,
                    dataType: "html",
                    beforeSend: function () {
                        $("#loading").dialog("open");
                    },
                    complete: function (msg) {
                        $("#loading").dialog("close");
                        alert("Ordem de serviço concluida com sucesso.");
                        $("li#" + id).hide();
                    }
                });
            }
        });
    });
</script>
<?= $this->element('menu'); ?>
<?= $this->element('loading') ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Lista de Tarefas</h1>
        <ol class="breadcrumb">
            <li><a href="<?= $this->Url->relative('/painel') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-files-o"></i>Ordem de Serviço</a></li>
            <li class="active"><a href="#"><i class="fa fa-bars"></i>Lista de Tarefas</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="box-body">
                <?php if (count($ordens_servico) == 0): ?>
                    <div>
                        <h2>Nenhuma ordem de serviço encontrada. Para gerar a nova ordem de serviço, <?= $this->Html->link("clique aqui", array("controller" => "ordem_servico", "action" => "add")) ?>.</h2>
                    </div>
                <?php else: ?>
                    <ul id="prioridades" class="todo-list">
                        <?php foreach ($ordens_servico as $ordem_servico): ?>
                            <li id="<?= $ordem_servico["OrdemServico"]["id"] ?>" class="<?= $this->Business->priorityColor($ordem_servico["OrdemServico"]["prioridade"]) . " row" ?>  bg-black row">
                                <div class="col-md-10">
                                    <h1 style="color: whitesmoke; font-weight: bold"><?= $this->Format->zeroPad($ordem_servico["OrdemServico"]["id"]) ?> : <?= $ordem_servico["OrdemServico"]["servico"] ?></h1>
                                    <p style="font-size: x-large"><b>Cliente:</b> <abbr title="<?= $ordem_servico['Cliente']['nome_fantasia'] ?>"><?= $ordem_servico["Cliente"]["razao_social"] ?></abbr></p>
                                    <p style="font-size: x-large"><b>Prazo:</b> <?= $this->Date->format($ordem_servico["OrdemServico"]["prazo"]) ?></p>
                                </div>
                                <div class="col-md-2" style="text-align: right">
                                    <?php if ($this->Membership->handleRole("VISUALIZAR_ORDEM_SERVICO")): ?>
                                        <button id="btvisualizar" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', $ordem_servico["OrdemServico"]["id"]) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                                    <?php endif; ?>
                                    <?php if ($this->Membership->handleRole("CANCELAR_ORDEM_SERVICO")): ?>
                                        <button id="btcancelar" value="<?= $ordem_servico["OrdemServico"]["id"] ?>" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    <?php if ($this->Membership->handleRole("CONCLUIR_ORDEM_SERVICO")): ?>
                                        <button id="btconcluido" value="<?= $ordem_servico["OrdemServico"]["id"] ?>" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                                        <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>