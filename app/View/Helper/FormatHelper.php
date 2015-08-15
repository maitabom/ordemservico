<?php

/**
 * Classe de auxílio de manipulação de dados para formatação adequada ao usuário.
 * @author valentim
 */
class FormatHelper extends AppHelper {

    public $helpers = array();

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    /**
     * Formata para o número de telefone
     * @param string $value Valor original do telefone
     * @return string Telefone formatado
     */
    public function phone($value) {
        $pattern = '/(\d{2})(\d{4})(\d*)/';
        $result = preg_replace($pattern, '($1) $2-$3', $value);

        return $result;
    }

    /**
     * Formata para CEP.
     * @param string $value Valor original cep
     * @return string CEP Formatado
     */
    public function zipCode($value) {
        $pattern = '/^(\d{5})(\d{3})$/';
        $result = preg_replace($pattern, '\\1-\\2', $value);

        return $result;
    }

    /**
     * Formata um número colocando zeros a esquerda
     * @param string $value O valor a ser formatado
     * @param int $lenght A quantidade de zeros a ser adicionada. Por padrão, será 7.
     * @return string O valor formatado.
     */
    public function zeroPad($value, $lenght = 7) {
        return str_pad($value, $lenght, "0", STR_PAD_LEFT);
    }

    /**
     * Retorna o primeiro nome da pessoa.
     * @param string $name Nome completo da pessoa.
     * @return string Primeiro nome da pessoa.
     */
    public function firstName($name) {
        return explode(" ", $name)[0];
    }

}
