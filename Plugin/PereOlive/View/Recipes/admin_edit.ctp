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
//				echo $this->Form->input('recipecategory_id', array(
//					'label' => 'Recipecategory Id',
//				));
				echo $this->Form->input('product_id', array(
					'label' => 'Produit lié',
				));
				echo $this->Form->input('name', array(
					'label' => 'Nom',
				));
				echo $this->Form->input('exerpt', array(
					'label' => 'Petite description',
				));
//				echo $this->Form->input('body', array(
//					'label' => 'Body',
//				));
				echo $this->Form->input('ingredients', array(
					'label' => 'Ingrédients (liste à puce)',
				));
				echo $this->Form->input('recipe', array(
					'label' => 'Instructions de la recette (liste à chiffres)',
				));
				echo $this->Form->input('tip', array(
					'label' => 'Petit conseil',
				));
//				echo $this->Form->input('type', array(
//					'label' => 'Type',
//				));
				echo $this->Form->input('budget', array(
					'label' => 'Budget (échelle de 1 à 6)',
				));
				echo $this->Form->input('servings', array(
					'label' => 'Convives (échelle de 1 à 6)',
				));
				echo $this->Form->input('difficulty', array(
					'label' => 'Difficulté (échelle de 1 à 6)',
				));
				echo $this->Form->input('preparation_time', array(
					'label' => 'Durée de la préparation (en minutes)',
				));
				echo $this->Form->input('cooking_time', array(
					'label' => 'Durée de la cuisson (en minutes)',
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
                        $this->Form->input('is_featured', array('label' => 'Promu à la une','class' => false,)) .
                        $this->Media->iframe('PereOlive.Recipe', $this->Form->value('Recipe.id')).
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
