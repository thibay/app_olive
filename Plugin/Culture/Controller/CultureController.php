<?php

App::uses('CultureAppController', 'Culture.Controller');

/**
 * Culture Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class CultureController extends CultureAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Culture';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Setting');

            
        
/**
 * admin_index
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', 'Culture');
	}

/**
 * admin_chooser
 *
 * @return void
 */
	public function admin_chooser() {
		$this->set('title_for_layout', 'Chooser Culture');
	}

/**
 * index
 *
 * @return void
 */
	public function index() {
		$this->set('title_for_layout', 'Culture');
		$this->set('cultureVariable', 'value here');
	}

	public function admin_add() {
	}

	public function admin_rte_culture() {
		$notice = 'If editors are not displayed correctly, check that `Ckeditor` plugin is loaded after `Culture` plugin.';
		$this->Session->setFlash($notice, 'default', array('class' => 'success'));
	}

}
