<div class="products view">
<h2><?php echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Productcategory Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['productcategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Exerpt'); ?></dt>
		<dd>
			<?php echo h($product['Product']['exerpt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($product['Product']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nutrition'); ?></dt>
		<dd>
			<?php echo h($product['Product']['nutrition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Featured'); ?></dt>
		<dd>
			<?php echo h($product['Product']['is_featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($product['Product']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Recipes'); ?></h3>
	<?php if (!empty($product['Recipe'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Recipecategory Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Exerpt'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Ingredients'); ?></th>
		<th><?php echo __('Recipe'); ?></th>
		<th><?php echo __('Tip'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Budget'); ?></th>
		<th><?php echo __('Servings'); ?></th>
		<th><?php echo __('Difficulty'); ?></th>
		<th><?php echo __('Preparation Time'); ?></th>
		<th><?php echo __('Cooking Time'); ?></th>
		<th><?php echo __('Is Featured'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Udpated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product['Recipe'] as $recipe): ?>
		<tr>
			<td><?php echo $recipe['id']; ?></td>
			<td><?php echo $recipe['recipecategory_id']; ?></td>
			<td><?php echo $recipe['product_id']; ?></td>
			<td><?php echo $recipe['name']; ?></td>
			<td><?php echo $recipe['exerpt']; ?></td>
			<td><?php echo $recipe['body']; ?></td>
			<td><?php echo $recipe['ingredients']; ?></td>
			<td><?php echo $recipe['recipe']; ?></td>
			<td><?php echo $recipe['tip']; ?></td>
			<td><?php echo $recipe['type']; ?></td>
			<td><?php echo $recipe['budget']; ?></td>
			<td><?php echo $recipe['servings']; ?></td>
			<td><?php echo $recipe['difficulty']; ?></td>
			<td><?php echo $recipe['preparation_time']; ?></td>
			<td><?php echo $recipe['cooking_time']; ?></td>
			<td><?php echo $recipe['is_featured']; ?></td>
			<td><?php echo $recipe['created']; ?></td>
			<td><?php echo $recipe['udpated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recipes', 'action' => 'view', $recipe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recipes', 'action' => 'edit', $recipe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recipes', 'action' => 'delete', $recipe['id']), null, __('Are you sure you want to delete # %s?', $recipe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
