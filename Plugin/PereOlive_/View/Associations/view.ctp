<div class="associations view">
<h2><?php  echo __('Association'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($association['Association']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($association['Association']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Association Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($association['AssociationCategory']['name'], array('controller' => 'association_categories', 'action' => 'view', $association['AssociationCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Street'); ?></dt>
		<dd>
			<?php echo h($association['Association']['address_street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Zipcode'); ?></dt>
		<dd>
			<?php echo h($association['Association']['address_zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address City'); ?></dt>
		<dd>
			<?php echo h($association['Association']['address_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 1 Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_1_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 1 Value'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_1_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 2 Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_2_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 2 Value'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_2_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 3 Name'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_3_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 3 Value'); ?></dt>
		<dd>
			<?php echo h($association['Association']['phone_3_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($association['Association']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($association['Association']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($association['Association']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($association['Association']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($association['Association']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($association['Association']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($association['Association']['longitude']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Association'), array('action' => 'edit', $association['Association']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Association'), array('action' => 'delete', $association['Association']['id']), null, __('Are you sure you want to delete # %s?', $association['Association']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Associations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Association Categories'), array('controller' => 'association_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association Category'), array('controller' => 'association_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
