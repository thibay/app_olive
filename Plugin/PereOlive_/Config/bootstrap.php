<?php
/**
 * Routes
 *
 * pereolive_routes.php will be loaded in main app/config/routes.php file.
 */
Croogo::hookRoutes('PereOlive');

/**
 * Behavior
 *
 * This plugin's PereOlive behavior will be attached whenever Node model is loaded.
 */
Croogo::hookBehavior('Node', 'PereOlive.PereOlive', array());

/**
 * Component
 *
 * This plugin's PereOlive component will be loaded in ALL controllers.
 */
Croogo::hookComponent('*', 'PereOlive.PereOlive');

/**
 * Helper
 *
 * This plugin's PereOlive helper will be loaded via NodesController.
 */
Croogo::hookHelper('Nodes', 'PereOlive.PereOlive');

/**
 * Admin menu (navigation)
 */

CroogoNav::add('extensions.children.pereolive', array(
	'title' => 'Père Olive',
	'url' => '#',
	'children' => array(
		                
                
		'recipes' => array(
			'title' => 'Recettes',
			'url' => array(
				'admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'recipes',
				'action' => 'index',
			),
		),
		'products' => array(
			'title' => 'Produits',
			'url' => array(
				'admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'products',
				'action' => 'index',
			),
		),
                'news' => array(
			'title' => 'Actualités',
			'url' => array(
				'admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'news',
				'action' => 'index',
			),
		),               
	),
));

Croogo::mergeConfig('Wysiwyg.actions', array(
    'Recipes/admin_add' => array(
        array(
            'elements' => 'RecipesBody',
        ),
    ),
    'Recipes/admin_edit' => array(
        array(
            'elements' => 'RecipesBody',
        ),
    ),    
    'News/admin_add' => array(
        array(
            'elements' => 'NewsBodyFull',
        ),
    ),    
    'News/admin_edit' => array(
        array(
            'elements' => 'NewsBodyFull',
        ),
    ), 
     
));

/**
 * Admin row action
 *
 * When browsing the content list in admin panel (Content > List),
 * an extra link called 'PereOlive' will be placed under 'Actions' column.
 */
//Croogo::hookAdminRowAction('Nodes/admin_index', 'PereOlive', 'plugin:pereolive/controller:pereolive/action:index/:id');
//
///* Row action with link options */
//Croogo::hookAdminRowAction('Nodes/admin_index', 'Button with Icon', array(
//	'plugin:pereolive/controller:pereolive/action:index/:id' => array(
//		'options' => array(
//			'icon' => 'key',
//			'button' => 'success',
//		),
//	),
//));

/* Row action with icon */
//Croogo::hookAdminRowAction('Nodes/admin_index', 'Icon Only', array(
//	'plugin:pereolive/controller:pereolive/action:index/:id' => array(
//		'title' => false,
//		'options' => array(
//			'icon' => 'picture',
//			'tooltip' => array(
//				'data-title' => 'A nice and simple action with tooltip',
//				'data-placement' => 'left',
//			),
//		),
//	),
//));

/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'PereOlive' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
Croogo::hookAdminTab('Nodes/admin_add', 'PereOlive', 'pereolive.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_edit', 'PereOlive', 'pereolive.admin_tab_node');
