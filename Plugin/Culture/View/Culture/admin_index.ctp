<?php
$this->extend('/Common/admin_index');
$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb('Culture', array('controller' => 'culture', 'action' => 'index'));
?>
<?php $this->start('actions'); ?>
<?php
	echo $this->Croogo->adminAction(
		'Lieux d\'Evènements',
		array('admin' => true,
				'plugin' => 'culture',
				'controller' => 'places',
				'action' => 'index')
	);
	echo $this->Croogo->adminAction(
		'Evènements',
		array('admin' => true,
				'plugin' => 'culture',
				'controller' => 'evenements',
				'action' => 'index')
	);
	echo $this->Croogo->adminAction(
		'Catégories d\'Associations',
		array('admin' => true,
				'plugin' => 'culture',
				'controller' => 'associationcategories',
				'action' => 'index')
	);
	echo $this->Croogo->adminAction(
		'Associations',
		array('admin' => true,
				'plugin' => 'culture',
				'controller' => 'associations',
				'action' => 'index')
	);	              
        
?>
<?php $this->end(); ?>

