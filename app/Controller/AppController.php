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
    protected $limit_pagination = 15;
    public $components = ["Geo", "Session", "Cookie", "Dialog", "Tokin", "Sender", "Date", "Format", "Membership"];

    public function beforeFilter() {
        $this->set("limit_pagination", $this->limit_pagination);
        $this->set("fullscreen", false);
        parent::beforeFilter();
    }

    public function beforeRender() {
        $this->handleError();
        parent::beforeRender();
    }

    public function afterFilter() {
        $this->accessRole();
        parent::afterFilter();
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
        $controller = $this->request->controller;
        $action = $this->request->action;
        $url = ["controller" => $controller, "action" => $action];

        if (!$this->Membership->handlePublicRole($url)) {
            if (!$this->isAuthorized()) {
                $this->redirectLogin("A sessão foi expirada!");
            }
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
     * Faz o tratamento de erros
     */
    private function handleError() {
        if ($this->name == "CakeError") {
            if (!$this->isAuthorized()) {
                $this->layout = "empty";
            } else {
                $this->set("fullscreen", true);
            }
        }
    }

    /**
     * Verifica se o usuário possui a permissão de acessar a tela do sistema.
     * @throws ForbiddenException O usuário não tem a permissão de acessar a determinada tela do sistema.
     */
    protected function accessRole() {
        $controller = $this->request->controller;
        $action = $this->request->action;
        $url = ["controller" => $controller, "action" => $action];

        if (!$this->Membership->handleRole($url, $this->Session->read("UsuarioID"))) {
            throw new ForbiddenException();
        }
    }

}
