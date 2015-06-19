<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP EquipamentoController
 * @author valentim
 */
class EquipamentoController extends AppController {

    public function beforeFilter() {
        $this->loadModel('Equipamento');
        $this->loadModel('OrdemServico');
        $this->controlAuth();
        parent::beforeFilter();
    }

    public function index() {
        $options = array(
            "order" => array(
                "Equipamento.nome" => "ASC"
            ),
            "limit" => $this->limit_pagination
        );

        $this->paginate = $options;
        $equipamentos = $this->paginate("Equipamento");
        $qtd_equipamentos = $this->Equipamento->find("count");

        $title = "Lista de Equipamentos";
        $this->set("title_for_layout", $title);
        $this->set("qtd_equipamentos", $qtd_equipamentos);
        $this->set("equipamentos", $equipamentos);
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

    public function delete() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $id = $data["question"]["parameter"];

            $marcado = $this->Equipamento->read(null, $id);
            $nome = $marcado["Equipamento"]["nome"];

            $servicos = $this->OrdemServico->find('count', array(
                "conditions" => array(
                    "OrdemServico.equipamento" => $id
                )
            ));

            if ($servicos > 0) {
                $mensagem = "Ocorreu um erro no sistema ao excluir um equipamento.";
                $detalhe = ($servicos == 1) ? "Existe $servicos serviço associado ao equipamento $nome." : "Existem $servicos serviços associados ao equipamento $nome.";

                $this->Dialog->error($mensagem, $detalhe);
                $this->redirect(array("action" => "index"));
            } else {
                try {
                    $this->Equipamento->id = $id;
                    $this->Equipamento->delete();

                    $this->Dialog->alert("O equimamento $nome foi excluido do sucesso!");
                    $this->redirect(array("action" => "index"));
                } catch (Exception $ex) {
                    $mensagem = "Ocorreu um erro no sistema ao excluir o equipamento.";
                    $this->Dialog->error($mensagem, $ex->getMessage());
                    $this->redirect(array("action" => "index"));
                }
            }
        }
    }

}
