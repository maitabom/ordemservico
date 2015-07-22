<?php

App::uses('AppController', 'Controller');

/**
 * CakePHP TokenController
 * @author valentim
 */
class TokenController extends AppController {

    private $horaLimite = 48;

    public function index($id) {

        $this->layout = "empty";
        $result = $this->Token->find("first", array(
            "conditions" => array(
                "Token.chave" => $id,
                "Token.resolvido" => FALSE,
                "Token.ativo" => TRUE
            ),
            "order" => array(
                "Token.datacriacao DESC"
            )
        ));

        if (empty($result)) {

            $this->Session->setFlash("O token informado é inválido ou inexistente no sistema. Favor, repetir a operação.");
        } else {

            $dataCriacao = $result["Token"]["datacriacao"];
            $intervalo = $this->Tokin->getInterval($dataCriacao);

            if ($intervalo >= $this->horaLimite) {
                $this->Session->setFlash("Infelizmente, o token informado perdeu a validade. Favor repetir a operação.");
                $this->Tokin->markUnresolved($id);
            } else {
                $produto = $result["Token"]["produto"];
                $idUsuario = $result["Token"]["usuario"];

                $this->Tokin->markResolved($id);
                $this->executarToken($produto, $idUsuario);
            }
        }
    }

    private function executarToken($produto, $idUsuario) {
        switch ($produto) {

            case "lembrarsenha":
                $this->redirect(array("controller" => "system", "action" => "remember", base64_encode($idUsuario)));
                break;

            default:
                $this->redirect(array("controller" => "system", "action" => "login"));
                break;
        }
    }

}
