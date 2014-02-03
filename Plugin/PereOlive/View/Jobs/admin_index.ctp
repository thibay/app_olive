<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Jobs');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Jobs'), array('action' => 'index'));

?>
<div class="jobs index">    
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
                        <th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($jobs as $job): ?>
	<tr>
		<td><?php echo h($job['Job']['id']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['titre']); ?>&nbsp;</td>
                <td><?php echo h($job['Job']['slug']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['created']); ?>&nbsp;</td>
		<td><?php echo h($job['Job']['updated']); ?>&nbsp;</td>
            
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $job['Job']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $job['Job']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $job['Job']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $job['Job']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	</div>
</div>


