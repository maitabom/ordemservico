<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP MaterialController
 * @author valentim
 */
class MaterialController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Material');
        $this->loadModel('OrdemServico');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {
        $options = array(
            "order" => array(
                "Material.descricao" => "ASC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;
        $materiais = $this->paginate("Material");
        $qtd_materiais = $this->Material->find("count");

        $title = "Lista de Materiais";
        $this->set("title_for_layout", $title);
        $this->set("qtd_materiais", $qtd_materiais);
        $this->set("materiais", $materiais);
    }

    public function add() {
        $this->redirect(array("action" => "cadastro", 0));
    }

    public function edit($id) {
        $this->redirect(array("action" => "cadastro", $id));
    }

    public function cadastro($id) {
        $title = ($id > 0) ? "Editar Material" : "Novo Material";

        if ($id > 0) {
            $data = $this->Material->read(null, $id);
            $this->request->data = $data;
        }

        $this->set("title_for_layout", $title);
        $this->set("id_material", $id);
    }

    public function save() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;

            try {
                $this->Material->save($data);

                $this->Dialog->alert("O material foi salvo com sucesso!");
                $id = $this->Material->id;
                $this->redirect(array("action" => "cadastro", $id));
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao salvar o material.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "cadastro", $data["Material"]["id"]));
            }
        }
    }

    public function delete() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data["question"]["parameter"];

            $marcado = $this->Material->read(null, $id);
            $nome = $marcado["Material"]["descricao"];
            $fabricante = $marcado["Material"]["fabricante"];

            $servicos = $this->OrdemServico->find('count', array(
                "conditions" => array(
                    "OrdemServico.material" => $id
                )
            ));

            if ($servicos > 0) {
                $mensagem = "Ocorreu um erro no sistema ao excluir um material.";
                $detalhe = ($servicos == 1) ? "Existe $servicos serviço associado ao material $nome do fabricante $fabricante." : "Existem $servicos serviços associados ao equipamento $nome do fabricante $fabricante.";

                $this->Dialog->error($mensagem, $detalhe);
                $this->redirect(array("action" => "index"));
            } else {
                try {
                    $this->Material->id = $id;
                    $this->Material->delete();

                    $this->Dialog->alert("O material $nome, do fabricante $fabricante foi excluido do sucesso!");
                    $this->redirect(array("action" => "index"));
                } catch (Exception $ex) {
                    $mensagem = "Ocorreu um erro no sistema ao excluir o material.";
                    $this->Dialog->error($mensagem, $ex->getMessage());
                    $this->redirect(array("action" => "index"));
                }
            }
        }
    }

}
