<?php

/**
 * CakePHP Classe de manipulação e formatação de data
 * @author valentim
 */
class DateComponent extends Component {

    public $components = array();

    /**
     * Converte a data no formato local, para o formato aceito do banco de dados.
     * @param string $data A data usada na tela, reconhecida pelo usuário
     * @return string A data no formato reconhecido pelo banco de dados.
     */
    public function formatDateDB($data) {
        return date("Y-m-d", strtotime(str_replace('/', '-', $data)));
    }

    /**
     * Converte a data no formato de banco para o formato da data compreensível ao usuário.
     * @param string $data A data usada no formato do banco de dados.
     * @return string A data no formato do usuário.
     */
    public function formatDateView($data) {
        return date("d/m/Y", strtotime($data));
    }

}
