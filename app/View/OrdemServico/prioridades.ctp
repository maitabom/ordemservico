<script type="text/javascript">
    $(function () {
        $("#prioridades").sortable({
            revert: true
        });

        $("#prioridades").disableSelection();
    });
</script>
<?= $this->element('menu'); ?>
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
                <ul id="prioridades" class="todo-list">
                    <li class="bg-blue row">
                        <div class="col-md-10">
                            <h3 style="color: whitesmoke;">Letreiro de Loja</h3>
                            <p><b>Cliente:</b> Rei das Tintas</p>
                            <p><b>Prazo:</b> 12/03/2015</p>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button id="concluido" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', 123456) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                            <button id="concluido" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                            <button id="concluido" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                        </div>
                    </li>
                    <li class="bg-yellow row">
                        <div class="col-md-10">
                            <h3 style="color: whitesmoke;">Adesivo - Preços para Cardapio</h3>
                            <p><b>Cliente:</b> Restaurante Super Lanche - Brasilia</p>
                            <p><b>Prazo:</b> 12/03/2015</p>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button id="concluido" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', 123456) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                            <button id="concluido" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                            <button id="concluido" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                        </div>
                    </li>
                    <li class="bg-red row">
                        <div class="col-md-10">
                            <h3 style="color: whitesmoke;">Cartões de Visitas de Apresentação</h3>
                            <p><b>Cliente:</b>HS Assessoria Jurídica</p>
                            <p><b>Prazo:</b> 10/03/2015</p>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button id="concluido" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', 123456) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                            <button id="concluido" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                            <button id="concluido" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                        </div>
                    </li>
                    <li class="bg-blue row">
                        <div class="col-md-10">
                            <h3 style="color: whitesmoke;">Panfleto de Divulgação</h3>
                            <p><b>Cliente:</b> Celina Mattos</p>
                            <p><b>Prazo:</b> 12/03/2015</p>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button id="concluido" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', 123456) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                            <button id="concluido" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                            <button id="concluido" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                        </div>
                    </li>
                    <li class="bg-blue row">
                        <div class="col-md-10">
                            <h3 style="color: whitesmoke;">Painel de quadro de horários</h3>
                            <p><b>Cliente:</b> Colégio Santa Mônica</p>
                            <p><b>Prazo:</b> 17/03/2015</p>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            <button id="concluido" class="btn btn-info" onclick="<?= 'window.open(\'' . $this->Url->makeParams('ordem_servico', 'documento', 123456) . '\')' ?>" title="Visualizar"><i class="fa fa-eye"></i></button>
                            <button id="concluido" class="btn btn-danger" title="Cancelar"><i class="fa fa-times"></i></button>
                            <button id="concluido" class="btn btn-success" title="Concluído"><i class="fa fa-check"></i></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>