<?= $this->element('menu'); ?>
<div class="content-wrapper">
    <section class="content-header">

    </section>
    <section class="content">
        <div class="error-page">
            <h1><i class="fa fa-warning text-yellow"></i> Esta página não pode ser encontrada</h1>
            <p style="font-size: large">Não foi possível encontrar a página que você estava procurando. Enquanto isso, você pode retorna para a <?= $this->Html->link("página inicial", array("controller" => "system", "action" => "board")) ?>. Caso o problema persista, contate ao administrador do sistema ou ao fornecedor do sistema.</p>
        </div>
    </section>
</div>