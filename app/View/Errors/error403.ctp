<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">

    </section>
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-maroon"> 403</h2>
            <div class="error-content">
                <h1><i class="fa fa-ban text-maroon"></i> Não autorizado</h1>
                <p style="font-size: large">Você não tem permissão para acessar esta página. Enquanto isso, você pode retorna para a <?= $this->Html->link("página inicial", array("controller" => "system", "action" => "board")) ?>. Caso o problema persista, contate ao administrador do sistema.</p>
            </div>
        </div>
    </section>
</div>