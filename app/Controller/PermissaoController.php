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
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {

        $options = array(
            "order" => array(
                "Permissao.nome" => "ASC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;

        $permissoes = $this->paginate("Permissao");
        $qtd_permissoes = $this->Permissao->find("count");
        $title = "Lista de Permissões";
        $this->set("title_for_layout", $title);
        $this->set("permissoes", $permissoes);
        $this->set("qtd_permissoes", $qtd_permissoes);
    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function delete() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data["question"]["parameter"];

            $marcado = $this->Permissao->read(null, $id);
            $usuarios = $this->Usuario->find("count", array(
                "conditions" => array(
                    "Usuario.grupo" => $id
                )
            ));
            $nome = $marcado["Permissao"]["nome"];

            if ($usuarios > 0) {
                $mensagem = "Ocorreu um erro no sistema ao excluir uma permissão.";
                $detalhe = ($usuarios == 1) ? "Existe $usuarios usuário associado ao grupo de permissão $nome." : "Existem $usuarios usuários associados ao grupo de permissão $nome.";
                $this->Dialog->error($mensagem, $detalhe);
                $this->redirect(array("action" => "index"));
            } else {
                try {
                    //Exclui as associações entre grupo selecionado e as funções
                    $query = "delete from funcoes_grupos ";
                    $query.= "where grupos_id = $id; ";

                    $this->Permissao->query($query);

                    //Exclui a permissão
                    $this->Permissao->id = $id;
                    $this->Permissao->delete();

                    $this->Dialog->alert("O grupo de permissões $nome foi excluido do sucesso!");
                    $this->redirect(array("action" => "index"));
                } catch (Exception $ex) {
                    $mensagem = "Ocorreu um erro no sistema ao excluir o grupo de permissões.";
                    $this->Dialog->error($mensagem, $ex->getMessage());
                    $this->redirect(array("action" => "index"));
                }
            }
        }
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

                $this->Session->delete("USER_FUNCTIONS");
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
