<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Recipes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));

?>

<div class="events index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('from_date'); ?></th>
		<th><?php echo $this->Paginator->sort('to_date'); ?></th>
		<th><?php echo $this->Paginator->sort('place_id'); ?></th>				
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php               
        foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</td>		
		<td><?php echo h($recipe['Recipe']['from_date']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['to_date']); ?>&nbsp;</td>		
		<td>
			<?php echo $this->Html->link($recipe['Place']['name'], array('controller' => 'places', 'action' => 'view', $recipe['Place']['id'])); ?>
		</td>				
		<td><?php echo h($recipe['Recipe']['created']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php //echo $this->Croogo->adminRowAction('', array('action' => 'view', $recipe['Recipe']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $recipe['Recipe']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $recipe['Recipe']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
