<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Recipes'), h($event['Recipe']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Recipe'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Recipe'), array('action' => 'edit', $event['Recipe']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Recipe'), array('action' => 'delete', $event['Recipe']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $event['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Recipes'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Recipe'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="events view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Slug'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'From Date'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['from_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'To Date'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['to_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Excerpt'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['excerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Body'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Place']['name'], array('controller' => 'places', 'action' => 'view', $event['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Media Id'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['media_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($event['Recipe']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
