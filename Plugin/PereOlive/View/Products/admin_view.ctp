<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Products'), h($product['Product']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Products'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Product'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Product'), array('action' => 'edit', $product['Product']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Product'), array('action' => 'delete', $product['Product']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Products'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Product'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="products view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Productcategory Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['productcategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Exerpt'); ?></dt>
		<dd>
			<?php echo h($product['Product']['exerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Body'); ?></dt>
		<dd>
			<?php echo h($product['Product']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Nutrition'); ?></dt>
		<dd>
			<?php echo h($product['Product']['nutrition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Is Featured'); ?></dt>
		<dd>
			<?php echo h($product['Product']['is_featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Updated'); ?></dt>
		<dd>
			<?php echo h($product['Product']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
