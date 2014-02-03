<?php
App::uses('AppModel', 'Model');

class Subscriber extends AppModel {

	public $name = 'Subscriber';
	public $useTable = false;

        public $_schema = array(
                'email' => array('type' => 'string', 'length' => 150)
                );
              
        public $validate = array(
            'email' => array('email')
        );        
        
}
?>