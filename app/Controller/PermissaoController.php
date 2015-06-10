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

        $permissoes = $this->Permissao->find("all");
        $title = "Lista de Permissões";
        $this->set("title_for_layout", $title);
        $this->set("permissoes", $permissoes);
    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function save() {
        $this->autoRender = false;

        if ($this->request->is('post') || $this->request->is('put')) {

            $data = $this->request->data;
            $mensagem = "";

            try {
                $this->Permissao->save($data);
                $id_permissao = $this->Permissao->id;

                //Limpando todas as permissões antes de salvar
                $query = "delete from funcoes_grupos where grupos_id = " . $id_permissao;
                $this->Permissao->query($query);

                //Adicionando as permissões a salvar
                foreach ($data["Permissao"] as $key => $value) {
                    //Insere os valores na tabela de funções_grupos
                    if ((strpos($key, "CHK_") !== false) && ($value == 1)) {
                        $chave = str_replace("CHK_", "", $key);
                        $funcao = $this->Funcao->findByChave($chave);
                        $id_funcao = $funcao["Funcao"]["id"];

                        $query = "insert into funcoes_grupos (funcoes_id, grupos_id) values ($id_funcao, $id_permissao)";
                        $this->Permissao->query($query);
                    }
                }

                $this->Dialog->alert("A permissão foi salva com sucesso.");
                $this->redirect(array("action" => "cadastro", $id_permissao));
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
        $fs = array();

        if ($id > 0) {
            $this->request->data = $this->Permissao->read(null, $id);

            $query = "select fn.nome, fn.chave ";
            $query.= "from funcoes fn ";
            $query.= "inner join funcoes_grupos fg ";
            $query.= "on fn.id = fg.funcoes_id ";
            $query.= "where fg.grupos_id = $id; ";

            $fs = $this->Permissao->query($query);
        }

        $this->set("title_for_layout", $title);
        $this->set("id_permissao", $id);
        $this->set("funcoes", $funcoes);
        $this->set("funcoes_selecionadas", $fs);
    }

}
