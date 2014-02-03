<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Places'), h($place['Place']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Places'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Place'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Place'), array('action' => 'edit', $place['Place']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Place'), array('action' => 'delete', $place['Place']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Places'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Place'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="places view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($place['Place']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($place['Place']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address Steet'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address_steet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address Zipcode'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address_zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address City'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone'); ?></dt>
		<dd>
			<?php echo h($place['Place']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($place['Place']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($place['Place']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Latitude'); ?></dt>
		<dd>
			<?php echo h($place['Place']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Longitude'); ?></dt>
		<dd>
			<?php echo h($place['Place']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($place['Place']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($place['Place']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
