<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Products');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Products'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Product']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Products: ' . $this->data['Product']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Product');

?>
<div class="products row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Product'), '#product');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='product' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
//				echo $this->Form->input('productcategory_id', array(
//					'label' => 'Productcategory Id',
//				));
                                 echo $this->Form->input('productcategory_id', array(
                                    'type'    => 'select',
                                    'options' => array(0=>'Les natures', 1=>'Les classiques', 2=>'Les découvertes', 3=>'Les tartinables', 4=>'Les antipasti', 5=>'Les exclusives'),
                                    'empty'   => false,
                                    'label' => __('Catégorie')
                                )); 
				echo $this->Form->input('name', array(
					'label' => 'Nom',
				));
				echo $this->Form->input('exerpt', array(
					'label' => 'Petite Description',
				));
//				echo $this->Form->input('body', array(
//					'label' => 'Body',
//				));
				echo $this->Form->input('nutrition', array(
					'label' => 'Informations Nutritionelles',
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
//			$this->Form->input('is_featured', array('label' => 'Promu en page d\'accueil','class' => false,)) .
                        $this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
