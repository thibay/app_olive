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
//Croogo::hookBehavior('Node', 'PereOlive.PereOlive', array());

/**
 * Component
 *
 * This plugin's PereOlive component will be loaded in ALL controllers.
 */
//Croogo::hookComponent('*', 'PereOlive.PereOlive');

/**
 * Helper
 *
 * This plugin's PereOlive helper will be loaded via NodesController.
 */
//Croogo::hookHelper('Nodes', 'PereOlive.PereOlive');

/**
 * Admin menu (navigation)
 */

CroogoNav::add('content.children.list.children.jobs', array(
        'title' => 'Offres d\'Emploi',
			'url' => array(
				'admin' => true,
				'plugin' => 'pere_olive',
				'controller' => 'jobs',
				'action' => 'index',
			),
    ));
CroogoNav::add('content.children.list.children.recipes', array(
        'title' => 'Recettes',
			'url' => array(
				'admin' => true,
				'plugin' => 'pere_olive',
				'controller' => 'recipes',
				'action' => 'index',
			),
    ));
CroogoNav::add('content.children.list.children.products', array(
        'title' => 'Produits',
			'url' => array(
				'admin' => true,
				'plugin' => 'pere_olive',
				'controller' => 'products',
				'action' => 'index',
			),
    ));
CroogoNav::add('content.children.create.children.jobs', array(
        'title' => 'Offre d\'Emploi',
			'url' => array(
				'admin' => true,
				'plugin' => 'pere_olive',
				'controller' => 'jobs',
				'action' => 'add',
			),
    ));
CroogoNav::add('content.children.create.children.recipes', array(
        'title' => 'Recette',
			'url' => array(
				'admin' => true,
				'plugin' => 'pere_olive',
				'controller' => 'recipes',
				'action' => 'add',
			),
    ));
CroogoNav::add('content.children.create.children.products', array(
        'title' => 'Produit',
			'url' => array(
				'admin' => true,
				'plugin' => 'pere_olive',
				'controller' => 'products',
				'action' => 'add',
			),
    ));
//CroogoNav::add('content.children.pere_olive', array(
//	'title' => 'Père Olive',
//	'url' => '#',
//	'children' => array(		                
//        	'jobs' => array(
//			'title' => 'Offres d\'Emploi',
//			'url' => array(
//				'admin' => true,
//				'plugin' => 'pere_olive',
//				'controller' => 'jobs',
//				'action' => 'index',
//			),
//		),        
//		'recipes' => array(
//			'title' => 'Recettes',
//			'url' => array(
//				'admin' => true,
//				'plugin' => 'pere_olive',
//				'controller' => 'recipes',
//				'action' => 'index',
//			),
//		),
//		'products' => array(
//			'title' => 'Produits',
//			'url' => array(
//				'admin' => true,
//				'plugin' => 'pere_olive',
//				'controller' => 'products',
//				'action' => 'index',
//			),
//		),                        
//	),
//));

Croogo::mergeConfig('Wysiwyg.actions', array(
    'Recipes/admin_add' => array(
//        array(
//            'elements' => 'RecipeBody',
//        ),    
        array(
            'elements' => 'RecipeIngredients',
        ),
        array(
            'elements' => 'RecipeRecipe',
        ),
        array(
            'elements' => 'RecipeTip',
        ),
    ),    
    'Recipes/admin_edit' => array(
//        array(
//            'elements' => 'RecipeBody',
//        ),    
        array(
            'elements' => 'RecipeIngredients',
        ),
        array(
            'elements' => 'RecipeRecipe',
        ),
        array(
            'elements' => 'RecipeTip',
        ),
    ),
    'Products/admin_add' => array(
//        array(
//            'elements' => 'ProductBody',
//        ),    
        array(
            'elements' => 'ProductNutrition',
        ),
    ),
    'Products/admin_edit' => array(
//        array(
//            'elements' => 'ProductBody',
//        ),    
        array(
            'elements' => 'ProductNutrition',
        ),
    ),
   
    'Jobs/admin_add' => array(
        array(
            'elements' => 'JobDescription',
        ),    
        array(
            'elements' => 'JobProfil',
        ),
    ),  
    'Jobs/admin_edit' => array(
        array(
            'elements' => 'JobProfil',
        ),    
        array(
            'elements' => 'JobDescription',
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
