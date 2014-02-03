<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Association Categories');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Association Categories'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['AssociationCategory']['name'], $this->here);
	$this->viewVars['title_for_layout'] = 'Association Categories: ' . $this->data['AssociationCategory']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), $this->here);
}

echo $this->Form->create('AssociationCategory');

?>
<div class="associationCategories row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Association Category'), '#association-category');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='association-category' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('color', array(
					'label' => 'Color',
				));
				
				echo $this->Croogo->adminTabs();
			?>
			</div>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
