<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Associations');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Associations'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Association']['name'], $this->here);
	$this->viewVars['title_for_layout'] = 'Associations: ' . $this->data['Association']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), $this->here);
}

echo $this->Form->create('Association');

?>
<div class="associations row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Association'), '#association');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='association' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('name', array(
					'label' => 'Nom',
				));
                                echo $this->Form->input('excerpt', array(
					'label' => 'Petite Description (max 255 car.)',
				));				
				echo $this->Form->input('slug', array(
					'label' => 'Slug', 'disabled'=>true
				));
				echo $this->Form->input('association_category_id', array(
					'label' => 'Catégorie d\'Association',
				));				

                                echo $this->Form->input('latitude', array(
					'label' => 'Latitude', 'disabled'=>true
				));
				echo $this->Form->input('longitude', array(
					'label' => 'Longitude', 'disabled'=>true
				));
                                echo $this->Form->input('website', array(
					'label' => 'Site Web',
				));
                                echo $this->Form->input('social_facebook_page', array(
					'label' => 'Page Facebook',
				));
                                echo $this->Form->input('social_twitter_page', array(
					'label' => 'Page Twitter',
				));
				echo $this->Form->input('address_1_name', array(
					'label' => 'Personne de contact : Nom',
				));                                
                                echo $this->Form->input('address_1_street', array(
					'label' => 'Personne de contact : Adresse (rue)',
				));
				echo $this->Form->input('address_1_zipcode', array(
					'label' => 'Personne de contact : Adresse (cp)',
				));
				echo $this->Form->input('address_1_city', array(
					'label' => 'Personne de contact : Adresse (ville)',
				));                                
                                echo $this->Form->input('phone_1_value', array(
					'label' => 'Personne de contact : Téléphone',
				));   
                                echo $this->Form->input('email', array(
					'label' => 'Personne de contact : Courriel',
				)); 
                                
                                
                                echo $this->Form->input('address_2_name', array(
					'label' => 'Président : Nom',
				));                                   
                                echo $this->Form->input('address_2_street', array(
					'label' => 'Président : Adresse (rue)',
				));
				echo $this->Form->input('address_2_zipcode', array(
					'label' => 'Président : Adresse (cp)',
				));
				echo $this->Form->input('address_2_city', array(
					'label' => 'Président : Adresse (ville)',
				));                                
                                echo $this->Form->input('phone_2_value', array(
					'label' => 'Président : Téléphone',
				));  
                                
                                
                                echo $this->Form->input('address_3_name', array(
					'label' => 'Secrétaire : Nom',
				));                                   
                                echo $this->Form->input('address_3_street', array(
					'label' => 'Secrétaire : Adresse (rue)',
				));
				echo $this->Form->input('address_3_zipcode', array(
					'label' => 'Secrétaire : Adresse (cp)',
				));
				echo $this->Form->input('address_3_city', array(
					'label' => 'Secrétaire : Adresse (ville)',
				));                                
                                echo $this->Form->input('phone_3_value', array(
					'label' => 'Secrétaire : Téléphone',
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
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
