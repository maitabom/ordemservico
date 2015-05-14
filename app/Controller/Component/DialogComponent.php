<?php

/**
 * Compoment de controle e exibição da caixa de diálogo do sistema.
 * @author valentim
 */
class DialogComponent extends Component {

    public $components = array("Session");

    /**
     * Exibe uma janela de diálogo de mensagem com modelo padrão.
     * @param String $message Mensagem a ser exibida
     */
    public function alert($message) {
        $this->Session->setFlash($message, "alert", array("type" => "default", "details" => ""));
    }

    /**
     * Exibe uma janela de diálogo de mensagem de erro.
     * @param String $message Mensagem a ser exibida.
     * @param String $details Detalhes sobre o erro do sistema.
     */
    public function error($message, $details = "") {
        $this->Session->setFlash($message, "alert", array("type" => "error", "details" => $details));
    }

}
