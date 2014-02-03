<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'News');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'News'), array('action' => 'index'));

?>

<div class="events index">
	<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('title'); ?></th>
		<th><?php echo $this->Paginator->sort('published_date'); ?></th>
		<th><?php echo $this->Paginator->sort('promoted'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>				
                <th><?php echo $this->Paginator->sort('first_pos'); ?></th>				
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('updated'); ?></th>
		<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>
	<?php               
        foreach ($news as $news): ?>
	<tr>
		<td><?php echo h($news['News']['id']); ?>&nbsp;</td>
		<td><?php echo h($news['News']['title']); ?>&nbsp;</td>		
		<td><?php echo h($news['News']['published_date']); ?>&nbsp;</td>
		<td><?php echo h($news['News']['promoted']); ?>&nbsp;</td>		
                <td><?php echo h($news['News']['active']); ?>&nbsp;</td>		
                <td><?php echo h($news['News']['first_pos']); ?>&nbsp;</td>		
		<td><?php echo h($news['News']['created']); ?>&nbsp;</td>
		<td><?php echo h($news['News']['updated']); ?>&nbsp;</td>
		<td class="item-actions">
			<?php //echo $this->Croogo->adminRowAction('', array('action' => 'view', $news['News']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $news['News']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $news['News']['id']), array('icon' => 'trash'), __d('croogo', 'Are you sure you want to delete # %s?', $news['News']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>