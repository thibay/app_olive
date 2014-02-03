<?php
$this->extend('/Common/admin_index');
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb('PereOlive', array('controller' => 'pereolive', 'action' => 'index'));
?>
<?php $this->start('actions'); ?>
<?php
	echo $this->Croogo->adminAction(
		'Lieux d\'Evènements',
		array('admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'places',
				'action' => 'index')
	);
	echo $this->Croogo->adminAction(
		'Evènements',
		array('admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'recipes',
				'action' => 'index')
	);
	echo $this->Croogo->adminAction(
		'Catégories d\'Associations',
		array('admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'associationcategories',
				'action' => 'index')
	);
	echo $this->Croogo->adminAction(
		'Associations',
		array('admin' => true,
				'plugin' => 'pereolive',
				'controller' => 'associations',
				'action' => 'index')
	);	              
        
?>
<?php $this->end(); ?>

