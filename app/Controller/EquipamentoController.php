<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP EquipamentoController
 * @author valentim
 */
class EquipamentoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Equipamento');
        $this->controlAuth();
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

    public function cadastro($id) {
        $title = ($id > 0) ? "Editar Equipamento" : "Novo Equipamento";

        if ($id > 0) {
            $data = $this->Equipamento->read(null, $id);
            $data["Equipamento"]["data_aquisicao"] = $this->formatDateView($data["Equipamento"]["data_aquisicao"]);

            $this->request->data = $data;
        }

        $this->set("title_for_layout", $title);
        $this->set("id_equipamento", $id);
    }

    public function save() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;

            $data["Equipamento"]["data_aquisicao"] = $this->formatDateDB($data["Equipamento"]["data_aquisicao"]);

            try {
                $this->Equipamento->save($data);

                $this->Dialog->alert("O equipamento foi salvo com sucesso!");
                $id = $this->Equipamento->id;
                $this->redirect(array("action" => "cadastro", $id));
            } catch (Exception $ex) {
                $mensagem = "Ocorreu um erro no sistema ao salvar o equipamento.";
                $this->Dialog->error($mensagem, $ex->getMessage());
                $this->redirect(array("action" => "cadastro", $data["Cliente"]["id"]));
            }
        }
    }

}
