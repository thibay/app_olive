<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Association Categories');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Association Categories'), array('action' => 'index'));

?>

<div class="associationCategories index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('color'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($associationCategories as $associationCategory): ?>
	<tr>
		<td><?php echo h($associationCategory['AssociationCategory']['id']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['name']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['color']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['created']); ?>&nbsp;</td>
		<td><?php echo h($associationCategory['AssociationCategory']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php // echo $this->Croogo->adminRowAction('', array('action' => 'view', $associationCategory['AssociationCategory']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $associationCategory['AssociationCategory']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $associationCategory['AssociationCategory']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $associationCategory['AssociationCategory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
