<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP PermissaoController
 * @author valentim
 */
class PermissaoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Usuario');
        $this->loadModel('Permissao');
        $this->loadModel('Funcao');
        parent::beforeFilter();
    }

    public function index() {

    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function save() {
        if ($this->request->is('post') || $this->request->is('put')) {

            $data = $this->request->data;
            $mensagem = "";

            try {
                $this->Permissao->save($data);

                //Limpando toda as permissões antes de salvar
                $query = "delete from funcoes_grupos where grupos_id = " . $data['Permissao']['id'];
                $this->Permissao->query($query);

                //Adicionando as permissões a salvar


                $query = "insert into funcoes_grupos (funcoes_id, grupos_id) values ()";
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao salvar a permissão.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "cadastro", $data["Permissao"]["id"]));
            }
        }
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Editar Permissão" : "Nova Permissão";
        $funcoes = $this->Funcao->find('all', array('fields' => array('nome', 'chave')));

        $this->set("title_for_layout", $title);
        $this->set("id_permissao", $id);
        $this->set("funcoes", $funcoes);
    }

}
