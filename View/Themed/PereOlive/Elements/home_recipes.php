<?php 
    $items = $this->requestAction('pere_olive/recipes/featured');
?>
<h2 class="disc"><?php echo __('Recettes'); ?></h2>
<div id="olive_branch" class="moving_item"></div>
<div id="chef_hat" class="moving_item"></div>


<?php
if($items){
    echo '<ul class="slides recipes">';
    foreach ($items as $index=>$entry){
//        debug($entry);
        echo '<li class="recipe">';       
?>
        <section class="details">
            <h3 class="shadowed"><?php echo $item['Recipe']['name']; ?></h3>
            <h4 class="shadowed"><?php echo $item['Recipe']['exerpt']; ?></h4>
            <ul class="ratings ">
                <li><label>Préparation: </label><span><?php echo $item['Recipe']['preparation_time']; ?></span></li>
                <li><label>Cuisson: </label><span><?php echo $item['Recipe']['cookie_time']; ?></span></li>
                <li><label>Difficulté: </label><span class="rating difficulty one"></span></li>
                <li><label>Budget: </label><span class="rating difficulty three"></span></li>
                <li><label>Personnes: </label><span class="rating difficulty four"></span></li>
            </ul>
    <?php echo $this->Html->link(__('Découvrir la recette'), array('plugin'=>'PereOlive', 'controller'=>'recipes', 'action'=>'view', 'slug'=>$item['Recipe']['slug']), array('class'=>'more')); ?><br />
            <?php //echo $this->Html->link(__('Voir toutes les recettes'), array('plugin'=>'PereOlive', 'controller'=>'recipes', 'action'=>'index'), array('class'=>'more')); ?>            
        </section>

        <section class="thumbs">
        <ul class="slides">
            <li><img src="/theme/PereOlive/img/recipes/olive-tapenade-ck-226691-l.jpg" /></li>
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


    