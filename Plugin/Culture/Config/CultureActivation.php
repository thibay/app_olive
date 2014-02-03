<?php
/**
 * Culture Activation
 *
 * Activation class for Culture plugin.
 * This is optional, and is required only if you want to perform tasks when your plugin is activated/deactivated.
 *
 * @package  Croogo
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class CultureActivation {

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
		$controller->Croogo->addAco('Culture/Evenements/index', array('contenteditor', 'public')); // CultureController::index()
		$controller->Croogo->addAco('Culture/Evenements/view', array('contenteditor', 'public')); // CultureController::index()
		$controller->Croogo->addAco('Culture/Evenements/home_calendar', array('contenteditor', 'public')); // CultureController::index()
		$controller->Croogo->addAco('Culture/Evenements/home_promoted', array('contenteditor', 'public')); // CultureController::index()
                $controller->Croogo->addAco('Culture/News/index', array('contenteditor', 'public')); // CultureController::index()
		$controller->Croogo->addAco('Culture/News/view', array('contenteditor', 'public')); // CultureController::index()
                $controller->Croogo->addAco('Culture/News/home_promoted', array('contenteditor', 'public')); // CultureController::index()
                $controller->Croogo->addAco('Culture/Associations/index', array('contenteditor', 'public')); // CultureController::index()
                
                
                
		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: add an Culture link
		$mainMenu = $this->Link->Menu->findByAlias('main');
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $mainMenu['Menu']['id'],
			),
		));
		$this->Link->save(array(
			'menu_id' => $mainMenu['Menu']['id'],
			'title' => 'Culture',
			'link' => 'plugin:culture/controller:culture/action:index',
			'status' => 1,
			'class' => 'culture',
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
		$controller->Croogo->removeAco('Culture'); // CultureController ACO and it's actions will be removed

		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: delete Culture link
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
				'Link.link' => 'plugin:culture/controller:culture/action:index',
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
