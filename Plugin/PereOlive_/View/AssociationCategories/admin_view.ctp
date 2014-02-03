<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Association Categories'), h($associationCategory['AssociationCategory']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Association Categories'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Association Category'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Association Category'), array('action' => 'edit', $associationCategory['AssociationCategory']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Association Category'), array('action' => 'delete', $associationCategory['AssociationCategory']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $associationCategory['AssociationCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Association Categories'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Association Category'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="associationCategories view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Color'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
