<div class="associationCategories index">
	<h2><?php echo __('Association Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('color'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('udpated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($associationCategories as $associationCategory): ?>
	<tr>
		<td><?php echo h($associationCategory['AssociationCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['color']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['udpated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $associationCategory['AssociationCategory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $associationCategory['AssociationCategory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $associationCategory['AssociationCategory']['id']), null, __('Are you sure you want to delete # %s?', $associationCategory['AssociationCategory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Association Category'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Associations'), array('controller' => 'associations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Association'), array('controller' => 'associations', 'action' => 'add')); ?> </li>
	</ul>
</div>
