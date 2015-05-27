<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Permissao
 * @author valentim
 */
class Permissao extends AppModel {

    public $name = "Permissao";
    public $useTable = "grupos";
    public $hasAndBelongsToMany = array(
        "Funcao" => array(
            "className" => "Funcao",
            "joinTable" => "funcoes_grupos",
            "foreignKey" => "funcoes_id",
            "associationForeignKey" => "grupos_id"
        )
    );

}
