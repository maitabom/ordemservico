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

    /**
     * Retorna a cor de acordo com a prioridade da ordem de serviço.
     * A cor informada é baseada na folha de estilos definida para este site.
     * @param int $priority Valor representando a prioridade
     * @return string Cor relacionada a prioridade
     */
    public function priorityColor($priority) {
        $cor = "";

        switch ($priority) {
            case 0:
                $cor = "bg-blue";
                break;
            case 1:
                $cor = "bg-yellow";
                break;
            case 2:
                $cor = "bg-red";
                break;
            default:
                $cor = "bg-black";
                break;
        }

        return $cor;
    }

}
