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
            </div>
        </div>
    </section>
</div>