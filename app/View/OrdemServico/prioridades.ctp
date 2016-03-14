<script type="text/javascript">
    $(function () {
        setTimeout(function () {
            window.location.reload(1);
        }, 60000);
    });
</script>

<?php if ($this->Session->check("Usuario")): ?>
    <script type = "text/javascript">
        $(function () {
            $("#prioridades").sortable({
                revert: true,
                stop: function (event, ui) {
                    ordenar();
                }
            });

            $("#prioridades").disableSelection();

            $("li #num_ordem").each(function (i) {
                $(this).val(i);

                var id = $(this).parent().attr("id");
                var param = id + "/" + i;

                $.ajax({
                    type: "POST",
                    data: {
                        param: param
                    },
                    url: "<?= $this->Url->relative('/ordem_servico/sort/') ?>" + param,
                    dataType: "html"
                });
            });


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

        function ordenar() {
            $("li #num_ordem").each(function (i) {
                $(this).val(i);

                var id = $(this).parent().attr("id");
                var param = id + "/" + i;

                $.ajax({
                    type: "POST",
                    data: {
                        param: param
                    },
                    url: "<?= $this->Url->relative('/ordem_servico/sort/') ?>" + param,
                    dataType: "html"
                });
            });
        }
    </script>
<?php endif; ?>
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
                        <?php
                        for ($i = 0; $i < count($ordens_servico); $i++):
                            ?>
                            <li id="<?= $ordens_servico[$i]["OrdemServico"]["id"] ?>" class="<?= $this->Business->priorityColor($ordens_servico[$i]["OrdemServico"]["prioridade"]) . " row" ?>  bg-black row">
                                <input type="hidden" id="num_ordem" value="<?= $ordens_servico[$i]["OrdemServico"]["ordem"] ?>"/>
                                <div class="col-md-10">
                                    <h1 style="color: whitesmoke; font-weight: bold"><?= $this->Format->zeroPad($ordens_servico[$i]["OrdemServico"]["id"]) ?> : <?= $ordens_servico[$i]["OrdemServico"]["servico"] ?></h1>
                                    <p style="font-size: x-large"><b>Cliente:</b> <?= $ordens_servico[$i]['Cliente']['nome_fantasia'] ?></p>
                                    <p style="font-size: x-large"><b>Prazo:</b> <?= $this->Date->format($ordens_servico[$i]["OrdemServico"]["prazo"]) ?></p>
                                </div>
                                <div class="col-md-2" style="text-align: right">
                                    <?php if ($this->Membership->handleRole("VISUALIZAR_ORDEM_SERVICO")): ?>
                                        <button id="btvisualizar" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', $ordens_servico[$i]["OrdemServico"]["id"]) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                                    <?php endif; ?>
                                    <?php if ($this->Membership->handleRole("CANCELAR_ORDEM_SERVICO")): ?>
                                        <button id="btcancelar" value="<?= $ordens_servico[$i]["OrdemServico"]["id"] ?>" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                                    <?php endif; ?>
                                    <?php if ($this->Membership->handleRole("CONCLUIR_ORDEM_SERVICO")): ?>
                                        <button id="btconcluido" value="<?= $ordens_servico[$i]["OrdemServico"]["id"] ?>" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                                        <?php endif; ?>
                                </div>
                            </li>
                        <?php endfor; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>