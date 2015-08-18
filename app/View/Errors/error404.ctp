<script type="text/javascript">
    $(function () {
        $("#mais_detalhes").click(function () {
            $("#mais_detalhes").toggle();
            $("#details").toggle();
        });
    });
</script>
<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">

    </section>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
                <h1><i class="fa fa-search text-yellow"></i> Página não encontrada</h1>
                <p style="font-size: large">Não foi possível encontrar a página que você estava procurando. Enquanto isso, você pode retorna para a <?= $this->Html->link("página inicial", array("controller" => "system", "action" => "board")) ?>. Caso o problema persista, contate ao administrador do sistema.</p>
                <form class="search-form">
                    <div style="text-align: center;">
                        <button id="mais_detalhes" type="button" class="btn btn-flat bg-red-gradient margin">Mais detalhes</button>
                    </div>
                    <div id="details" style="display: none;">
                        <p class="alert alert-error">
                            <button class="close" data-dismiss="alert">×</button>
                            <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
                            <?php echo h($error->getMessage()); ?>
                        </p>
                        <?php if (!empty($error->queryString)) : ?>
                            <p class="alert alert-info">
                                <button class="close" data-dismiss="alert">×</button>
                                <strong><?php echo __d('cake_dev', 'SQL Query'); ?>: </strong>
                                <?php echo $error->queryString; ?>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($error->params)) : ?>
                            <strong><?php echo __d('cake_dev', 'SQL Query Params'); ?>: </strong>
                            <?php echo Debugger::dump($error->params); ?>
                        <?php endif; ?>
                        <?php echo $this->element('exception_stack_trace'); ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>