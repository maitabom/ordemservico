<?php

/**
 * Classe de formatação de textos em geral
 * @author valentim
 */
class FormatComponent extends Component {

    public $components = array();
    protected $charMask = ['.', '(', ')', '-', '/'];

    /**
     * Limpa a máscara de uma String
     * @param string $masked String com máscara.
     * @return string String sem máscara.
     */
    public function clearMask($masked) {
        return str_replace($this->charMask, "", $masked);
    }

}
