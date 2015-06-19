<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    protected $nameSystem = "Ordem de Serviço";
    protected $charMask = ['.', '(', ')', '-', '/'];
    protected $limit_pagination = 15;
    public $components = array("Geo", "Session", "Cookie", "Dialog", "Tokin");

    public function beforeFilter() {
        $this->set("limit_pagination", $this->limit_pagination);
        parent::beforeFilter();
    }

    /**
     * Limpa a máscara de uma String
     * @param string $masked String com máscara.
     * @return string String sem máscara.
     */
    protected function clearMask($masked) {
        return str_replace($this->charMask, "", $masked);
    }

    /**
     * Converte a data no formato local, para o formato aceito do banco de dados.
     * @param string $data A data usada na tela, reconhecida pelo usuário
     * @return string A data no formato reconhecido pelo banco de dados.
     */
    protected function formatDateDB($data) {
        return date("Y-m-d", strtotime(str_replace('/', '-', $data)));
    }

    /**
     * Converte a data no formato de banco para o formato da data compreensível ao usuário.
     * @param string $data A data usada no formato do banco de dados.
     * @return string A data no formato do usuário.
     */
    protected function formatDateView($data) {
        return date("d/m/Y", strtotime($data));
    }

    /**
     * Verifica se a sessão do usuário foi criada e ativa, ou seja, se o mesmo efetuou o login.
     * @return boolean Se o usuário está logado no sistema e com acesso
     */
    protected function isAuthorized() {
        return $this->Session->check("Usuario");
    }

    /**
     * Controle simplificado de autenticação do usuário
     */
    protected function controlAuth() {
        if (!$this->isAuthorized()) {
            $this->Session->setFlash("A sessão foi expirada.");
            $this->redirect(array("controller" => "system", "action" => "login"));
        }
    }

    /**
     * Redireciona para a tela de login com uma mensagem.
     * @param string $mensagem Mensagem de erro.
     */
    protected function redirectLogin($mensagem) {
        $this->Session->setFlash($mensagem);
        $this->redirect(array("controller" => "system", "action" => "login"));
    }

    /**
     * Envia um e-mail simples
     * @param string $name Nome do remetente
     * @param string $from Endereço de e-mail do remetente
     * @param string $to Endereço de e-mail do destinatário
     * @param string $subject Assunto da mensagem
     * @param string $message Mensagem
     * @return array Resultado do envio
     */
    protected function sendEmail($name, $from, $to, $subject, $message) {
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
    protected function sendEmailTemplate($headMail, $template, $params) {
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
