<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Evenements');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Evenements'), array('action' => 'index'));

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
        foreach ($evenements as $evenement): ?>
	<tr>
		<td><?php echo h($evenement['Evenement']['id']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['name']); ?>&nbsp;</td>		
		<td><?php echo h($evenement['Evenement']['from_date']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['to_date']); ?>&nbsp;</td>		
		<td>
			<?php echo $this->Html->link($evenement['Place']['name'], array('controller' => 'places', 'action' => 'view', $evenement['Place']['id'])); ?>
		</td>				
		<td><?php echo h($evenement['Evenement']['created']); ?>&nbsp;</td>
		<td><?php echo h($evenement['Evenement']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php //echo $this->Croogo->adminRowAction('', array('action' => 'view', $evenement['Evenement']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $evenement['Evenement']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $evenement['Evenement']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $evenement['Evenement']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
