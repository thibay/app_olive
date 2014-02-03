<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Associations');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Associations'), array('action' => 'index'));

?>

<div class="associations index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>		
		<th><?php echo $this->Paginator->sort('association_category_id'); ?></th>		
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>		
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($associations as $association): ?>
	<tr>
		<td><?php echo h($association['Association']['id']); ?>&nbsp;</td>
		<td><?php echo h($association['Association']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($association['AssociationCategory']['name'], array('controller' => 'association_categories', 'action' => 'view', $association['AssociationCategory']['id'])); ?>
		</td>		
		<td><?php echo h($association['Association']['created']); ?>&nbsp;</td>
		<td><?php echo h($association['Association']['updated']); ?>&nbsp;</td>		
		<td class="item-actions">
			<?php //echo $this->Croogo->adminRowAction('', array('action' => 'view', $association['Association']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $association['Association']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $association['Association']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $association['Association']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
