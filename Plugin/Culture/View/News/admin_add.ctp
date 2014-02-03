<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'News');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'News'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['News']['title'], $this->here);
	$this->viewVars['title_for_layout'] = 'News: ' . $this->data['News']['title'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), $this->here);
}

echo $this->Form->create('News');

?>
<div class="events row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'News'), '#event');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='event' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('title', array(
					'label' => 'Titre',
				));				                                
				echo $this->Form->input('published_date', array(
					'label' => 'Date de publication', 'dateFormat' => 'YMD', 'minYear' => date('Y') - 5, 'maxYear' => date('Y')
				));				
				echo $this->Form->input('body_small', array(
					'label' => 'Accroche',
				));             
                                echo $this->Form->input('body_full', array(
					'label' => 'Description longue',
				));
			
				echo $this->Croogo->adminTabs();
			?>
			</div>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('title' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
                        $this->Form->input('active', array('label' => 'Publié','class' => false,)) .
                        $this->Form->input('promoted', array('label' => 'Promu à la une','class' => false,)) .
                        $this->Form->input('first_pos', array('label' => 'Première position','class' => false,)) .                        
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>


