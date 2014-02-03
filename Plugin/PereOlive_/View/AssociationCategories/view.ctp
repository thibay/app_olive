<div class="associationCategories view">
<h2><?php  echo __('Association Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Udpated'); ?></dt>
		<dd>
			<?php echo h($associationCategory['AssociationCategory']['udpated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Association Category'), array('action' => 'edit', $associationCategory['AssociationCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Association Category'), array('action' => 'delete', $associationCategory['AssociationCategory']['id']), null, __('Are you sure you want to delete # %s?', $associationCategory['AssociationCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Association Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Associations'); ?></h3>
	<?php if (!empty($associationCategory['Association'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Association Category Id'); ?></th>
		<th><?php echo __('Address Street'); ?></th>
		<th><?php echo __('Address Zipcode'); ?></th>
		<th><?php echo __('Address City'); ?></th>
		<th><?php echo __('Phone 1 Name'); ?></th>
		<th><?php echo __('Phone 1 Value'); ?></th>
		<th><?php echo __('Phone 2 Name'); ?></th>
		<th><?php echo __('Phone 2 Value'); ?></th>
		<th><?php echo __('Phone 3 Name'); ?></th>
		<th><?php echo __('Phone 3 Value'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Latitude'); ?></th>
		<th><?php echo __('Longitude'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($associationCategory['Association'] as $association): ?>
		<tr>
			<td><?php echo $association['id']; ?></td>
			<td><?php echo $association['name']; ?></td>
			<td><?php echo $association['slug']; ?></td>
			<td><?php echo $association['association_category_id']; ?></td>
			<td><?php echo $association['address_street']; ?></td>
			<td><?php echo $association['address_zipcode']; ?></td>
			<td><?php echo $association['address_city']; ?></td>
			<td><?php echo $association['phone_1_name']; ?></td>
			<td><?php echo $association['phone_1_value']; ?></td>
			<td><?php echo $association['phone_2_name']; ?></td>
			<td><?php echo $association['phone_2_value']; ?></td>
			<td><?php echo $association['phone_3_name']; ?></td>
			<td><?php echo $association['phone_3_value']; ?></td>
			<td><?php echo $association['created']; ?></td>
			<td><?php echo $association['updated']; ?></td>
			<td><?php echo $association['active']; ?></td>
			<td><?php echo $association['website']; ?></td>
			<td><?php echo $association['email']; ?></td>
			<td><?php echo $association['latitude']; ?></td>
			<td><?php echo $association['longitude']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'associations', 'action' => 'view', $association['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'associations', 'action' => 'edit', $association['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'associations', 'action' => 'delete', $association['id']), null, __('Are you sure you want to delete # %s?', $association['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
