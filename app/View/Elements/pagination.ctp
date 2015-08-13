<?php
$opcao_paginacao_number = array("tag" => "li", "separator" => "", "currentTag" => "a");
$opcao_paginacao_extra = array("tag" => "li", "disabledTag" => "a");

if (!isset($name)) {
    $name = "itens";
}

if (!isset($predicate)) {
    $predicate = "encontrados";
}

if (!isset($singular)) {
    $singular = "encontrado";
}
?>
<div class="box-footer clearfix">
    <?php if ($qtd_total > 0): ?>
        <?= $qtd_total . " " . $name . " " . (($qtd_total == 1) ? $singular : $predicate) ?>
        <?php if ($qtd_total > $limit_pagination): ?>
            <ul class="pagination pagination-sm no-margin pull-right">
                <?= $this->Paginator->prev('«', $opcao_paginacao_extra) ?>
                <?= $this->Paginator->numbers($opcao_paginacao_number) ?>
                <?= $this->Paginator->next('»', $opcao_paginacao_extra) ?>
            </ul>
        <?php endif; ?>
    <?php endif; ?>
</div>