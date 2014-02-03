<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Recipes');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Recipes'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Recipe']['name'], $this->here);
	$this->viewVars['title_for_layout'] = 'Recipes: ' . $this->data['Recipe']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), $this->here);
}

echo $this->Form->create('Recipe');

?>
<div class="events row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Recipe'), '#event');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='event' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Nom',
				));				
                                echo $this->Form->input('place_id', array(
					'label' => 'Lieu de l\'Evènement',
				));
				echo $this->Form->input('from_date', array(
					'label' => 'Date de début', 'dateFormat' => 'YMD', 'minYear' => date('Y'), 'maxYear' => date('Y')+5
				));
				echo $this->Form->input('to_date', array(
					'label' => 'Date de fin', 'dateFormat' => 'YMD', 'minYear' => date('Y'), 'maxYear' => date('Y')+5
				));
                                echo $this->Form->input('text_date', array(
					'label' => 'Date sous forme de texte',
				));                                
                                echo $this->Form->input('price_presale', array(
					'label' => 'Prix en prévente', 'default' => '0'
				));
                                echo $this->Form->input('price_doors', array(
					'label' => 'Prix aux portes', 'default' => '0'
				));
				echo $this->Form->input('price_member_bibli', array(
					'label' => 'Prix pour les membres Bibliothèque', 'default' => '0'
				));
                                echo $this->Form->input('price_member_pereolive', array(
					'label' => 'Prix pour les membres Fleurus PereOlive', 'default' => '0'
				));
				echo $this->Form->input('excerpt', array(
					'label' => 'Accroche',
				));             
                                echo $this->Form->input('body', array(
					'label' => 'Description longue',
				));
				echo $this->Form->input('website', array(
					'label' => 'Site web de l\'artiste',
				));
                                echo $this->Form->input('video_url', array(
					'label' => 'Vidéo promotionnelle (lien Youtube)',
				));
                                echo $this->Form->input('social_facebook_event', array(
					'label' => 'Page Facebook de l\'evènement',
				));
                                echo $this->Form->input('social_facebook_page', array(
					'label' => 'Page Facebook de l\'artiste',
				));
                                echo $this->Form->input('social_twitter_page', array(
					'label' => 'Page Twitter de l\'artiste',
				));
								
//				echo $this->Form->input('active', array(
//					'label' => 'Active',
//				));
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
                        $this->Form->input('active', array('label' => 'Publié','class' => false,)) .
                        $this->Form->input('is_promoted_slider', array('label' => 'Promu dans le bandeau défilant','class' => false,)) .
                        $this->Form->input('is_promoted', array('label' => 'Promu à la une','class' => false,)) .
                        $this->Form->input('is_soldout', array('label' => 'Soldout','class' => false,)) .                        
                        $this->Form->input('is_cancelled', array('label' => 'Annulé','class' => false,)) .
                        $this->Form->input('is_lastminute', array('label' => 'Dernières places disponibles','class' => false,)) .                        
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
