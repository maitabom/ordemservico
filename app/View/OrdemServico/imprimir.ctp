<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                Moreth e Lopes
                <small class="pull-right">Data: <?= $this->Date->format($ordem_servico["OrdemServico"]["data_criacao"], true) ?></small>
            </h2>
        </div><!-- /.col -->
    </div>
    <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
            <address>
                <strong><?= $ordem_servico["Cliente"]["razao_social"] ?></strong><br>
                <?= $ordem_servico["Cliente"]["endereco"] ?> - <?= $ordem_servico["Cliente"]["bairro"] ?><br>
                <?= $ordem_servico["Cliente"]["cidade"] ?> - <?= $ordem_servico["Cliente"]["uf"] ?><br>
                Telefone: <?= $this->Format->phone($ordem_servico["Cliente"]["telefone"]) ?><br/>
                Email: <?= $ordem_servico["Cliente"]["email"] ?>
            </address>
        </div>
        <div class="col-sm-6 invoice-col">
            <b>Ordem de Produção #<?= $this->Format->zeroPad($id) ?></b><br/>
            <br/>
            <b>Modo de Entrega:</b> <?= $ordem_servico["ModoEntrega"]["nome"] ?><br/>
            <b>Prazo de Entrega:</b> <?= $this->Date->format($ordem_servico["OrdemServico"]["prazo"]) ?><br/>
            <b>Prioridade:</b> <?= $this->Business->priorityText($ordem_servico["OrdemServico"]["prioridade"]) ?><br/>
        </div><!-- /.col -->
    </div><!-- /.row  -->
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>
                            <b>Serviço</b><br/>
                            <span><?= $ordem_servico["OrdemServico"]["servico"] ?></span>
                        </td>
                        <td>
                            <b>Material</b><br/>
                            <span><?= $ordem_servico["Material"]["descricao"] ?></span>
                        </td>
                        <td>
                            <b>Acabamento</b><br/>
                            <span><?= $ordem_servico["OrdemServico"]["acabamento"] ?></span>
                        </td>
                        <td>
                            <b>Equipamento Para Saída</b><br/>
                            <span><?= $ordem_servico["Equipamento"]["nome"] ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Formato</b><br/>
                            <span><?= $ordem_servico["OrdemServico"]["formato"] ?></span>
                        </td>
                        <td>
                            <b>Formato Final</b><br/>
                            <span><?= $ordem_servico["OrdemServico"]["formato_final"] ?></span>
                        </td>
                        <td>
                            <b>Quantidade Produção</b><br/>
                            <span><?= $ordem_servico["OrdemServico"]["quantidade_producao"] ?></span>
                        </td>
                        <td>
                            <b>Quantidade Cliente</b><br/>
                            <span><?= $ordem_servico["OrdemServico"]["quantidade_cliente"] ?></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 invoice-col">
            <b>Observações</b><br/>
            <span><?= $ordem_servico["OrdemServico"]["observacoes"] ?></span>
        </div>
        <div class="col-sm-6 invoice-col">
            <b>Arquivo para produção</b><br/>
            <span><?= $ordem_servico["OrdemServico"]["arquivo"] ?></span>
        </div>
    </div>

</section>