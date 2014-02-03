<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Evenements'), h($event['Evenement']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Evenements'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Evenement'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Evenement'), array('action' => 'edit', $event['Evenement']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Evenement'), array('action' => 'delete', $event['Evenement']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $event['Evenement']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Evenements'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Evenement'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="events view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Slug'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'From Date'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['from_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'To Date'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['to_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Excerpt'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['excerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Body'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Place'); ?></dt>
		<dd>
			<?php echo $this->Html->link($event['Place']['name'], array('controller' => 'places', 'action' => 'view', $event['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Media Id'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['media_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($event['Evenement']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
