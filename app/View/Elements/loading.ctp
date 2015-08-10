<script type="text/javascript">
    $(function () {
        $("#loading").dialog({
            modal: true,
            autoOpen: false
        });

        $("#loading-modal").draggable();
    });
</script>

<div id="loading" class="modal modal-warning">
    <div id="loading-modal" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="cursor: move">
                <h4 class="modal-title"><i class="fa fa-bell"></i>&nbsp;&nbsp;Sistema de Ordem de Serviço</h4>
            </div>
            <div class="modal-body">
                <center>
                    <?= $this->Html->image('loading.gif') ?>
                    <br/><br/>
                    <p>Aguarde, enquanto a operação está sendo efetuada.</p>
                </center>
            </div>
        </div>
    </div>
</div>