<div class="recipes view clearfix">
    <section class="details"> 
        <h1 class=""><?php echo $recipe['Recipe']['name'] ?></h1> 
        <div id="share" data-url="http://sharrre.com" data-text="Partagez cette recette sur les réseaux sociaux." data-title="<?php echo __('Partager'); ?>"></div>
        <a href="" class="print">Imprimer</a>
        <p class="exerpt"><?php echo $recipe['Recipe']['exerpt'] ?></p>
        <ul class="ratings ">
            <li><label><?php echo __('Préparation');?>: </label><span>10 minutes</span></li>
            <li><label><?php echo __('Cuisson');?>: </label><span>25 minutes</span></li>
            <li><label><?php echo __('Difficulté');?>: </label><span class="rating difficulty one"></span></li>
            <li><label><?php echo __('Budget');?>: </label><span class="rating difficulty three"></span></li>
        </ul>    
        <h3><?php echo __('Préparation') ?>.</h3>
        <p class="recipe"><?php echo $recipe['Recipe']['recipe']; ?></p>        
    </section>
    <section class="ingredients"> 
        <?php 
            echo $this->Html->Image($this->Media->thumb($recipe,400,400), array('class'=>'recipe_square'));                    
        ?>
        <h3><?php echo __('Ingrédients pour') . ' ' . $recipe['Recipe']['servings'] . ' ' . __('personnes') ?>.</h3>
        <p><?php echo $recipe['Recipe']['ingredients']; ?></p>
    </section>
    <section class="related">
        <h3>En scène : <?php echo $product['Product']['name'];?></h3>
        <?php echo $this->Html->Image($this->Media->thumb($product,200,200), array('class'=>'product_square')); ?>                  
        <p><?php echo $product['Product']['exerpt'];?></p>
    </section>
    <?php 
   //NEIGHTBORS  
    //debug(min($neighbors));
    if(min($neighbors) || max($neighbors)){
            echo '<div class="neighbors sixteen columns alpha omega">';
            //debug($neighbors);
            //$html->link($item['Brand']['name'].' '.$item['Modele']['name'], );		    
            if(!empty($neighbors['prev'])) echo $this->Html->link(__('< Recette précédente', true), array(($neighbors['prev']['Recipe']['slug'])), array('class'=>'prev'));
            if(!empty($neighbors['next'])) echo $this->Html->link(__('Recette suivante >', true), array(($neighbors['next']['Recipe']['slug'])), array('class'=>'next'));
            echo '</div>';
    };	
?>
</div>
<?php 
    echo $this->Html->meta(array('property' => 'og:image', 'content' => $this->Media->thumb($recipe,400,400)), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:title', 'content' => $recipe['Recipe']['name']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:description', 'content' =>  $this->Text->truncate(strip_tags($recipe['Recipe']['exerpt']), 250)), NULL, array('inline' => false));
    echo $this->Html->meta(array('name' => 'description', 'content' =>  $this->Text->truncate(strip_tags($recipe['Recipe']['exerpt']), 250)), NULL, array('inline' => false));
?>
