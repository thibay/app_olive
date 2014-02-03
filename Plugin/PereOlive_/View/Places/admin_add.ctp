<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Places');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Places'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Place']['name'], $this->here);
	$this->viewVars['title_for_layout'] = 'Places: ' . $this->data['Place']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), $this->here);
}

echo $this->Form->create('Place');

?>
<div class="places row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Place'), '#place');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='place' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('address_steet', array(
					'label' => 'Address Steet',
				));
				echo $this->Form->input('address_zipcode', array(
					'label' => 'Address Zipcode',
				));
				echo $this->Form->input('address_city', array(
					'label' => 'Address City',
				));
				echo $this->Form->input('phone', array(
					'label' => 'Phone',
				));
				echo $this->Form->input('email', array(
					'label' => 'Email',
				));
				echo $this->Form->input('website', array(
					'label' => 'Website',
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
