<div class="news view">
<h2><?php  echo __('News'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['News']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($news['News']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published Date'); ?></dt>
		<dd>
			<?php echo h($news['News']['published_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body Small'); ?></dt>
		<dd>
			<?php echo h($news['News']['body_small']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body Full'); ?></dt>
		<dd>
			<?php echo h($news['News']['body_full']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($news['News']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Dir'); ?></dt>
		<dd>
			<?php echo h($news['News']['image_dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Promoted'); ?></dt>
		<dd>
			<?php echo h($news['News']['promoted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($news['News']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($news['News']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($news['News']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit News'), array('action' => 'edit', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete News'), array('action' => 'delete', $news['News']['id']), null, __('Are you sure you want to delete # %s?', $news['News']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New News'), array('action' => 'add')); ?> </li>
	</ul>
</div>
