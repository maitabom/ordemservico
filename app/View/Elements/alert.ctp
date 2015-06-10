<?php
$style = "";
$style_button = "";

switch ($type) {
    case "default":
        $style = "";
        $style_button = "btn-success";
        break;

    case "error":
        $style = "modal-danger";
        $style_button = "btn-warning";
        break;
}
?>

<script type="text/javascript">
    $(function () {
        $("#message-modal").dialog({
            modal: true
        });

        $("#dialog-modal").draggable();

        $("#btn-default-modal").click(function () {
            $("#message-modal").dialog("close");
        });

        $("#btn-modal-close").click(function () {
            $("#message-modal").dialog("close");
        });

        $("#lnkmaisdetalhes").click(function () {
            $("#mais-detalhes").show();
        });
    });
</script>

<div id="message-modal" class="modal <?= $style ?>">
    <div id="dialog-modal" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="cursor: move">
                <button id="btn-modal-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-bell"></i>&nbsp;&nbsp;Sistema de Ordem de Serviço</h4>
            </div>
            <div class="modal-body">
                <p><?= h($message) ?></p>
                <?php if ($type == "error"): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <a id="lnkmaisdetalhes" href="#" style="color: yellow">Mais detalhes</a>
                        </div>
                        <div id="mais-detalhes" style="display: none" class="col-md-12">
                            <textarea id="txtmaisdetalhes" class="form-control" style="cursor: text; resize: vertical;" readonly><?= h($details) ?></textarea>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button id="btn-default-modal" type="button" class="btn <?= $style_button ?>">OK</button>
            </div>
        </div>
    </div>
</div>