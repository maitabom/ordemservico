<?php

/**
 * Classe que auxilia na manipulação e tratamento de dados nas regras de negócio
 * @author valentim
 */
class BusinessHelper extends AppHelper {

    public $helpers = array();

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    /**
     * Formata o texto de acordo com a prioridade da ordem de serviço.
     * @param int $priority Valor representando a prioridade
     * @return string Texto relacionado ao valor da prioridade.
     */
    public function priorityText($priority) {
        $texto = "";

        switch ($priority) {
            case 0:
                $texto = "Baixa";
                break;
            case 1:
                $texto = "Média";
                break;
            case 2:
                $texto = "Alta";
                break;
            default:
                $texto = "Não definido";
                break;
        }

        return $texto;
    }

}
