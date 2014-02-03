<?php
/**
 * Routes
 *
 * culture_routes.php will be loaded in main app/config/routes.php file.
 */
Croogo::hookRoutes('Culture');

/**
 * Behavior
 *
 * This plugin's Culture behavior will be attached whenever Node model is loaded.
 */
Croogo::hookBehavior('Node', 'Culture.Culture', array());

/**
 * Component
 *
 * This plugin's Culture component will be loaded in ALL controllers.
 */
Croogo::hookComponent('*', 'Culture.Culture');

/**
 * Helper
 *
 * This plugin's Culture helper will be loaded via NodesController.
 */
Croogo::hookHelper('Nodes', 'Culture.Culture');

/**
 * Admin menu (navigation)
 */

CroogoNav::add('extensions.children.fleurusculture', array(
	'title' => 'Fleurus Culture',
	'url' => '#',
	'children' => array(
		                
                'places' => array(
			'title' => 'Lieux d\'Evènements',
			'url' => array(
				'admin' => true,
				'plugin' => 'culture',
				'controller' => 'places',
				'action' => 'index',
			),
		),
		'events' => array(
			'title' => 'Evènements',
			'url' => array(
				'admin' => true,
				'plugin' => 'culture',
				'controller' => 'evenements',
				'action' => 'index',
			),
		),
		'associationcategories' => array(
			'title' => 'Catégories d\'Associations',
			'url' => array(
				'admin' => true,
				'plugin' => 'culture',
				'controller' => 'associationcategories',
				'action' => 'index',
			),
		),
		'associations' => array(
			'title' => 'Associations',
			'url' => array(
				'admin' => true,
				'plugin' => 'culture',
				'controller' => 'associations',
				'action' => 'index',
			),
		),   
                'news' => array(
			'title' => 'Actualités',
			'url' => array(
				'admin' => true,
				'plugin' => 'culture',
				'controller' => 'news',
				'action' => 'index',
			),
		),               
	),
));

Croogo::mergeConfig('Wysiwyg.actions', array(
    'Evenements/admin_add' => array(
        array(
            'elements' => 'EvenementBody',
        ),
    ),
    'Evenements/admin_edit' => array(
        array(
            'elements' => 'EvenementBody',
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
 * an extra link called 'Culture' will be placed under 'Actions' column.
 */
//Croogo::hookAdminRowAction('Nodes/admin_index', 'Culture', 'plugin:culture/controller:culture/action:index/:id');
//
///* Row action with link options */
//Croogo::hookAdminRowAction('Nodes/admin_index', 'Button with Icon', array(
//	'plugin:culture/controller:culture/action:index/:id' => array(
//		'options' => array(
//			'icon' => 'key',
//			'button' => 'success',
//		),
//	),
//));

/* Row action with icon */
//Croogo::hookAdminRowAction('Nodes/admin_index', 'Icon Only', array(
//	'plugin:culture/controller:culture/action:index/:id' => array(
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
 * an extra tab with title 'Culture' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
Croogo::hookAdminTab('Nodes/admin_add', 'Culture', 'culture.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_edit', 'Culture', 'culture.admin_tab_node');
