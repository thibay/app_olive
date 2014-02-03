<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Products');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Products'), array('action' => 'index'));

?>

<div class="products index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
<!--		<th><?php echo $this->Paginator->sort('productcategory_id'); ?></th>-->
		<th><?php echo $this->Paginator->sort('name'); ?></th>
<!--		<th><?php echo $this->Paginator->sort('exerpt'); ?></th>
		<th><?php echo $this->Paginator->sort('body'); ?></th>
		<th><?php echo $this->Paginator->sort('nutrition'); ?></th>-->
		<!--<th><?php echo $this->Paginator->sort('is_featured'); ?></th>-->
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
<!--		<td><?php echo h($product['Product']['productcategory_id']); ?>&nbsp;</td>-->
		<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
<!--		<td><?php echo h($product['Product']['exerpt']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['body']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['nutrition']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($product['Product']['is_featured']); ?>&nbsp;</td>-->
		<td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $product['Product']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $product['Product']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $product['Product']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
