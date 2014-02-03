<div class="news form">
<?php echo $this->Form->create('News'); ?>
	<fieldset>
		<legend><?php echo __('Add News'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('published_date');
		echo $this->Form->input('body_small');
		echo $this->Form->input('body_full');
		echo $this->Form->input('image');
		echo $this->Form->input('image_dir');
		echo $this->Form->input('promoted');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
	</ul>
</div>