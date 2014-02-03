<div class="places view">
<h2><?php  echo __('Place'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($place['Place']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($place['Place']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Steet'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address_steet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Zipcode'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address_zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address City'); ?></dt>
		<dd>
			<?php echo h($place['Place']['address_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($place['Place']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($place['Place']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($place['Place']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($place['Place']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($place['Place']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($place['Place']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($place['Place']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Place'), array('action' => 'edit', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($place['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('From Date'); ?></th>
		<th><?php echo __('To Date'); ?></th>
		<th><?php echo __('Excerpt'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Media Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($place['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['name']; ?></td>
			<td><?php echo $event['slug']; ?></td>
			<td><?php echo $event['from_date']; ?></td>
			<td><?php echo $event['to_date']; ?></td>
			<td><?php echo $event['excerpt']; ?></td>
			<td><?php echo $event['body']; ?></td>
			<td><?php echo $event['place_id']; ?></td>
			<td><?php echo $event['media_id']; ?></td>
			<td><?php echo $event['active']; ?></td>
			<td><?php echo $event['created']; ?></td>
			<td><?php echo $event['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
