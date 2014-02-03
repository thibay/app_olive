<div class="jobs view">
<h2><?php echo __('Job'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo h($job['Job']['titre']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($job['Job']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accroche'); ?></dt>
		<dd>
			<?php echo h($job['Job']['accroche']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($job['Job']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Profil'); ?></dt>
		<dd>
			<?php echo h($job['Job']['profil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($job['Job']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contrat'); ?></dt>
		<dd>
			<?php echo h($job['Job']['contrat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($job['Job']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($job['Job']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Job'), array('action' => 'edit', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Job'), array('action' => 'delete', $job['Job']['id']), null, __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?> </li>
	</ul>
</div>
