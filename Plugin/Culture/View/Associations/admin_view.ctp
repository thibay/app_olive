<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Associations'), h($association['Association']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Associations'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Association'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Association'), array('action' => 'edit', $association['Association']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Association'), array('action' => 'delete', $association['Association']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $association['Association']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Associations'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Association'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Association Categories'), array('controller' => 'association_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Association Category'), array('controller' => 'association_categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="associations view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($association['Association']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Slug'); ?></dt>
		<dd>
			<?php echo h($association['Association']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Association Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($association['AssociationCategory']['name'], array('controller' => 'association_categories', 'action' => 'view', $association['AssociationCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address Street'); ?></dt>
		<dd>
			<?php echo h($association['Association']['address_street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address Zipcode'); ?></dt>
		<dd>
			<?php echo h($association['Association']['address_zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Address City'); ?></dt>
		<dd>
			<?php echo h($association['Association']['address_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone 1 Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_1_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone 1 Value'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_1_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone 2 Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_2_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone 2 Value'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_2_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone 3 Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_3_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Phone 3 Value'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_3_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($association['Association']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($association['Association']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Active'); ?></dt>
		<dd>
			<?php echo h($association['Association']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Website'); ?></dt>
		<dd>
			<?php echo h($association['Association']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Email'); ?></dt>
		<dd>
			<?php echo h($association['Association']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Latitude'); ?></dt>
		<dd>
			<?php echo h($association['Association']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Longitude'); ?></dt>
		<dd>
			<?php echo h($association['Association']['longitude']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
