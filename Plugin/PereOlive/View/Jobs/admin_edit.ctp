<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Jobs');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Jobs'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Job']['titre'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Jobs: ' . $this->data['Job']['titre'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}
?>

<?php echo $this->Form->create('Job'); ?>
<div class="row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Job'), '#product');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='product' class="tab-pane">    
	<fieldset>
		<legend><?php echo __('Admin Edit Job'); ?></legend>
	<?php
		echo $this->Form->input('id');
                $this->Form->inputDefaults(array( 'class' => 'span10'));
		echo $this->Form->input('titre');
		echo $this->Form->input('accroche');
		echo $this->Form->input('description');
		echo $this->Form->input('profil');
		echo $this->Form->input('contact');
		echo $this->Form->input('contrat');
	?>
	</fieldset>
			</div>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Form->input('is_featured', array('label' => 'Promu à la une','class' => false,)) .
                        $this->Html->endBox();
		?>
	</div>

</div>    
<?php echo $this->Form->end(__('Submit')); ?>

