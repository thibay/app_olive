<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Recipes');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));

?>

<div class="recipes index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name', 'Nom'); ?></th>		
                <th><?php echo $this->Paginator->sort('product_id', 'Produit Lié'); ?></th>
		<th><?php echo $this->Paginator->sort('is_featured', 'Promu'); ?></th>
		<th><?php echo $this->Paginator->sort('created', 'Créé'); ?></th>
		<th><?php echo $this->Paginator->sort('updated', 'Mis à jour'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($recipes as $recipe): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['id']); ?>&nbsp;</td>		
		<td><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</td>
                <td>
			<?php echo $this->Html->link($recipe['Product']['name'], array('controller' => 'products', 'action' => 'view', $recipe['Product']['id'])); ?>
		</td>                
		<td><?php echo h($recipe['Recipe']['is_featured']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['created']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $recipe['Recipe']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $recipe['Recipe']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $recipe['Recipe']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
