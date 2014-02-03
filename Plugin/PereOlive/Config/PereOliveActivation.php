<?php
/**
 * PereOlive Activation
 *
 * Activation class for PereOlive plugin.
 * This is optional, and is required only if you want to perform tasks when your plugin is activated/deactivated.
 *
 * @package  Croogo
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class PereOliveActivation {

/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeActivation(&$controller) {
		return true;
	}

/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onActivation(&$controller) {
		// ACL: set ACOs with permissions
		$controller->Croogo->addAco('PereOlive/Recipes/index', array('contenteditor', 'public')); // PereOliveController::index()
		$controller->Croogo->addAco('PereOlive/Recipes/view', array('contenteditor', 'public')); // PereOliveController::index()
		$controller->Croogo->addAco('PereOlive/Recipes/home_recipes', array('contenteditor', 'public')); // PereOliveController::index()
		$controller->Croogo->addAco('PereOlive/Products/index', array('contenteditor', 'public')); // PereOliveController::index()
		$controller->Croogo->addAco('PereOlive/Products/view', array('contenteditor', 'public')); // PereOliveController::index()
                                               
		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: add an PereOlive link
		$mainMenu = $this->Link->Menu->findByAlias('main');
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $mainMenu['Menu']['id'],
			),
		));
		$this->Link->save(array(
			'menu_id' => $mainMenu['Menu']['id'],
			'title' => 'Père Olive',
			'link' => 'plugin:pereolive/controller:pereolive/action:index',
			'status' => 1,
			'class' => 'pereolive',
		));
	}

/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeDeactivation(&$controller) {
		return true;
	}

/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onDeactivation(&$controller) {
		// ACL: remove ACOs with permissions
		$controller->Croogo->removeAco('PereOlive'); // PereOliveController ACO and it's actions will be removed

		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: delete PereOlive link
		$link = $this->Link->find('first', array(
			'joins' => array(
				array(
					'table' => 'menus',
					'alias' => 'JoinMenu',
					'conditions' => array(
						'JoinMenu.alias' => 'main',
					),
				),
			),
			'conditions' => array(
				'Link.link' => 'plugin:pereolive/controller:pereolive/action:index',
			),
		));
		if (empty($link)) {
			return;
		}
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $link['Link']['menu_id'],
			),
		));
		if (isset($link['Link']['id'])) {
			$this->Link->delete($link['Link']['id']);
		}
	}
}
