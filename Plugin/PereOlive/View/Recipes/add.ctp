<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Recipes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Recipe']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Recipes: ' . $this->data['Recipe']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Recipe');

?>
<div class="recipes row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Recipe'), '#recipe');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='recipe' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('recipecategory_id', array(
					'label' => 'Recipecategory Id',
				));
				echo $this->Form->input('product_id', array(
					'label' => 'Product Id',
				));
				echo $this->Form->input('name', array(
					'label' => 'Name',
				));
				echo $this->Form->input('exerpt', array(
					'label' => 'Exerpt',
				));
				echo $this->Form->input('body', array(
					'label' => 'Body',
				));
				echo $this->Form->input('ingredients', array(
					'label' => 'Ingredients',
				));
				echo $this->Form->input('recipe', array(
					'label' => 'Recipe',
				));
				echo $this->Form->input('tip', array(
					'label' => 'Tip',
				));
				echo $this->Form->input('type', array(
					'label' => 'Type',
				));
				echo $this->Form->input('budget', array(
					'label' => 'Budget',
				));
				echo $this->Form->input('servings', array(
					'label' => 'Servings',
				));
				echo $this->Form->input('difficulty', array(
					'label' => 'Difficulty',
				));
				echo $this->Form->input('preparation_time', array(
					'label' => 'Preparation Time',
				));
				echo $this->Form->input('cooking_time', array(
					'label' => 'Cooking Time',
				));
				echo $this->Form->input('is_featured', array(
					'label' => 'Is Featured',
				));
				echo $this->Form->input('udpated', array(
					'label' => 'Udpated',
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
