<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Places');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Places'), array('action' => 'index'));

?>

<div class="places index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>		
		<th><?php echo $this->Paginator->sort('address_city'); ?></th>		
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>		
		<td><?php echo h($place['Place']['address_city']); ?>&nbsp;</td>		
		<td><?php echo h($place['Place']['created']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $place['Place']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $place['Place']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $place['Place']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $place['Place']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
