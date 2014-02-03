<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Recipes'), h($recipe['Recipe']['name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));
	
?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Recipe'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Recipe'), array('action' => 'edit', $recipe['Recipe']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Recipe'), array('action' => 'delete', $recipe['Recipe']['id']), array('button' => 'default'), __d('croogo', 'Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Recipes'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Recipe'), array('action' => 'add'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="recipes view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Recipecategory Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['recipecategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['Product']['name'], array('controller' => 'products', 'action' => 'view', $recipe['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Name'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Exerpt'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['exerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Body'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Ingredients'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['ingredients']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Recipe'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['recipe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tip'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['tip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Type'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Budget'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['budget']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Servings'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['servings']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Difficulty'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['difficulty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Preparation Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['preparation_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Cooking Time'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['cooking_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Is Featured'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['is_featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Udpated'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['udpated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
