<div class="places index">
	<h2><?php echo __('Places'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address_steet'); ?></th>
			<th><?php echo $this->Paginator->sort('address_zipcode'); ?></th>
			<th><?php echo $this->Paginator->sort('address_city'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['address_steet']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['address_zipcode']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['address_city']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['phone']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['email']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['website']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['created']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $place['Place']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $place['Place']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $place['Place']['id']), null, __('Are you sure you want to delete # %s?', $place['Place']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Place'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
