<?php

App::uses('AppModel', 'Model');

/**
 * CakePHP Usuario
 * @author valentim
 */
class Usuario extends AppModel {

    public $name = "Usuario";
    public $useTable = "usuarios";
    public $belongsTo = array(
        "Permissao" => array(
            "className" => "Permissao",
            "foreignKey" => "grupo"
        )
    );

}
