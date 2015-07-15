<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP OrdemServico
 * @author valentim
 */
class OrdemServico extends AppModel {

    public $name = "OrdemServico";
    public $useTable = "ordens_servico";
    public $belongsTo = array(
        "Cliente" => array(
            "className" => "Cliente",
            "foreignKey" => "id_cliente"
        ),
        "Responsavel" => array(
            "className" => "Usuario",
            "foreignKey" => "responsavel"
        ),
        "Equipamento" => array(
            "className" => "Equipamento",
            "foreignKey" => "equipamento"
        ),
        "ModoEntrega" => array(
            "className" => "ModoEntrega",
            "foreignKey" => "modo_entrega"
        )
    );

}
