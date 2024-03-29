<?php

App::uses('CakeEmail', 'Network/Email');

/**
 * Componente de envio de mensagens de e-mails
 * @author valentim
 */
class SenderComponent extends Component {

    public $components = array();

    /**
     * Envia um e-mail simples
     * @param string $name Nome do remetente
     * @param string $from Endereço de e-mail do remetente
     * @param string $to Endereço de e-mail do destinatário
     * @param string $subject Assunto da mensagem
     * @param string $message Mensagem
     * @return array Resultado do envio
     */
    public function sendEmail($name, $from, $to, $subject, $message) {
        $email = new CakeEmail("smtp");
        $email->from(array($from => $name));
        $email->to($to);
        $email->subject($subject);

        return $email->send($message);
    }

    /**
     * Envia um e-mail baseado num template
     * @param array $headMail Cabeçalho do e-mail
     * @param string $template Nome do template do envio do e-mail
     * @param array $params Parâmetros para serem usados no template do e-mail
     * @return array Resultado do envio de e-mail
     */
    public function sendEmailTemplate($headMail, $template, $params) {
        $email = new CakeEmail("smtp");
        $email->template($template);
        $email->emailFormat("html");
        $email->helpers(array('Html', 'Url'));
        $email->from(array($headMail["from"] => $headMail["name"]));
        $email->to($headMail["to"]);
        $email->subject($headMail["subject"]);
        $email->viewVars($params);

        return $email->send();
    }

}
