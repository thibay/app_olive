

<div class="jobs index">
	<h2><?php echo __('Chez Pere Olive'); ?></h2>
        <section class="featured">
             Des produits rigoureusement sélectionnés et contrôlés ainsi 
                qu'une main-d'œuvre qualifiée permettent de rencontrer les 
                exigences de qualité des consommateurs.
        </section>
        <h2 class="emploi">Nos Offres d'emplois</h2>
        <ul class="offres">
            <?php foreach ($jobs as $job): ?>
            <li class="offre clearfix">
                <?php echo $this->Html->image('../img/imgaccroche.png');?>
                <div class="details">
                    <h3><?php echo h($job['Job']['titre']); ?>&nbsp;</h3>
                    <p class="accroche"><?php echo h($job['Job']['accroche']); ?></p>
                    <?php echo $this->Html->link(__('Découvrir l\'offre'), array('action' => 'view', strtolower($job['Job']['slug']))); ?>
                </div>               
            </li>                         						
            <?php endforeach; ?>
        </ul>
        
	
</div>