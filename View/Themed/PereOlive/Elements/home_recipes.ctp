<?php 
    $items = $this->requestAction('pere_olive/recipes/featured');
?>
<h2 class="disc"><?php echo __('Recettes'); ?></h2>
<div id="olive_branch" class="moving_item"></div>
<div id="chef_hat" class="moving_item"></div>


<?php
if($items){
    $numbers = array('zero','one','two','three','four','five','six','seven','eight');
    echo '<ul class="slides recipes">';
    foreach ($items as $index=>$item){
//        debug($entry);
        echo '<li class="recipe">';       
?>
        <section class="details">
            <h3 class="shadowed"><?php echo $item['Recipe']['name']; ?></h3>
            <h4 class="shadowed"><?php echo $item['Recipe']['exerpt']; ?></h4>
            <ul class="ratings ">
                <li><label><?php echo __('Préparation'); ?>: </label><span><?php echo $item['Recipe']['preparation_time'].__(' minutes'); ?></span></li>
                <li><label><?php echo __('Cuisson'); ?>: </label><span><?php echo $item['Recipe']['cooking_time'].__(' minutes'); ?></span></li>
                <li><label><?php echo __('Difficulté'); ?>: </label><span class="rating difficulty <?php echo $numbers[$item['Recipe']['difficulty']]; ?>"></span></li>
                <li><label><?php echo __('Budget'); ?>: </label><span class="rating difficulty <?php echo $numbers[$item['Recipe']['budget']]; ?>"></span></li>
                <li><label><?php echo __('Personnes'); ?>: </label><span class="rating difficulty <?php echo $numbers[$item['Recipe']['servings']]; ?>"></span></li>
            </ul>
    <?php echo $this->Html->link(__('Découvrir la recette'), array('plugin'=>'pere_olive', 'controller'=>'recipes', 'action'=>'view', $item['Recipe']['slug']), array('class'=>'more')); ?><br />
            <?php //echo $this->Html->link(__('Voir toutes les recettes'), array('plugin'=>'PereOlive', 'controller'=>'recipes', 'action'=>'index'), array('class'=>'more')); ?>            
        </section>

        <section class="thumbs">
        <ul class="slides">
            <li>
                 <?php echo $this->Html->Image($this->Media->thumb($item,320,240), array('class'=>'')); ?>                  
            </li>
        </ul>
        <div class="controls"></div>
        </Section>
<?php
        
        
        echo '</li>';
    }  
    echo '</ul>';
}                      
?>
<div class="directions"></div>
<div class="progress_bar_container">
<div class="progress_bar"></div>
</div>


    