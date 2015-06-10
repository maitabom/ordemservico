<script type="text/javascript">
    $(function () {
        $("<?= '#' . $name ?>").dialog({
            modal: true,
            autoOpen: false
        });

        $("#dialog-question").draggable();

        $("#btn-cancel-modal").click(function () {
            $("<?= '#' . $name ?>").dialog("close");
        });

        $("#btn-question-close").click(function () {
            $("<?= '#' . $name ?>").dialog("close");
        });

        $("#btn-default-modal").click(function () {
            $("#message-modal").dialog("close");
        });
    });
</script>

<div id="<?= $name ?>" class="modal">
    <div id="dialog-question" class="modal-dialog">
        <?php
        echo $this->Form->create(null, array(
            "url" => $action,
            "id" => $form_name,
            "role" => "form"
        ));

        echo $this->Form->hidden("question.parameter");
        ?>

        <div class="modal-content">
            <div class="modal-header" style="cursor: move">
                <button id="btn-question-close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-bell"></i>&nbsp;&nbsp;Sistema de Ordem de Serviço</h4>
            </div>
            <div class="modal-body">
                <p><?= h($message) ?></p>
            </div>
            <div class="modal-footer">
                <button id="btn-cancel-modal" type="button" class="btn btn-danger"><?= $buttons["cancel"] ?></button>
                <button id="btn-default-modal" type="submit" class="btn btn-success"><?= $buttons["ok"] ?></button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>