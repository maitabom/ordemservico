<?php

/**
 * CakePHP DateHelper
 * @author valentim
 */
class DateHelper extends AppHelper {

    public $helpers = array();

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    /**
     * Converte a data no formato de banco para o formato da data compreensível ao usuário.
     * @param string $data A data usada no formato do banco de dados.
     * @return string A data no formato do usuário.
     */
    public function format($data, $complete = false) {
        $data;

        if ($complete) {
            $data = date("d/m/Y H:i:s", strtotime($data));
        } else {
            $data = date("d/m/Y", strtotime($data));
        }

        return $data;
    }

}
