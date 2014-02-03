    
<div class="jobs view">
    <div class="header">
    </div>

	<dl>
		<dd class="titre">
                    <h1><?php echo h($job['Job']['titre']); ?></h1>
			&nbsp;
		</dd>
		<h4><dt><?php echo __('Description'); ?></dt></h4>
		<dd>
			<?php echo ($job['Job']['description']); ?>
			&nbsp;
		</dd>
		<h4><dt><?php echo __('Profil'); ?></dt></h4>
		<dd>
			<?php echo ($job['Job']['profil']); ?>
			&nbsp;
		</dd>
		<h4><dt><?php echo __('Contact'); ?></dt></h4>
		<dd>
			<?php echo ($job['Job']['contact']); ?>
			&nbsp;
		</dd>
                <h4><dt><?php echo __('Contrat'); ?></dt></h4>
		<dd>
			<?php echo ($job['Job']['contrat']); ?>
			&nbsp;
		</dd>


        </dl>
    <h2> Envoyez votre candidature</h2>
<div class="postulation">

   
    <?php echo $this->Form->create('Postulation', array(
                        'type'=>'file',
                        'action'=>'index'));?>&nbsp;
   <div class="nom"><?php echo $this->Form->input('nom',array("label"=>"Nom*","required")); ?>&nbsp;</div>
   <div class="prenom"> <?php echo $this->Form->input('prenom',array("label"=>"Prénom*","required"))?>&nbsp;</div>
  <div class="mail"> <?php echo $this->Form->input('email',array("label"=>"Email*","type"=>"email","required")); ?>&nbsp;</div>
   <div class="tel"><?php echo $this->Form->input('tel',array ("label"=>"Téléphone")); ?>&nbsp;</div>
   <div class="adresse"> <?php echo $this->Form->input('rue',array ("label"=>"Rue")); ?>&nbsp;</div>
    <div class="numero"> <?php echo $this->Form->input('numero',array ("label"=>"N°")); ?>&nbsp;</div>
    <div class="bte"><?php echo $this->Form->input('boite',array ("label"=>"Bte")); ?>&nbsp;</div>
    <div class="city"><?php echo $this->Form->input('ville',array ("label"=>"Ville")); ?>&nbsp;</div>
    <div class="zip"><?php echo $this->Form->input('code',array ("label"=>"Zip")); ?>&nbsp;</div>
    <div class="cv"><?php echo $this->Form->input('cv',array("label"=>"CV*: ","type"=>"file","required")); ?>&nbsp;</div>
    <div class="lettre"><?php echo $this->Form->input('lettre',array("label" =>"Lettre*: ","type"=>"file","required")); ?>&nbsp;</div>
    <?php echo $this->Form->button('Postuler');?>
    <p class="obligatoire"> * champs obligatoire </p><br/>
   <?php  echo $this->Form->end("Postuler"); ?>&nbsp;
   
   <script>



   </script>
   
   

</div>


<!--<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Job'), array('action' => 'edit', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Job'), array('action' => 'delete', $job['Job']['id']), null, __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?> </li>
	</ul>
</div>-->
</div>

