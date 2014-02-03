<div class="recipes index">
        <h2><?php echo __('Nos Recettes Favorites'); ?></h2>        
        <section class="featured">
            <ul>
            <?php foreach ($featured_recipes as $recipe):
                    $recipe['Media'] = array_values($recipe['Media']);             
                    if(isset($recipe['Thumb']['file'])){                
                        $img = $this->Media->resizedUrl($recipe['Thumb']['file'], 240, 240); 
                    }
                    else if (isset($recipe['Media'][0])){
                        $img = $this->Media->resizedUrl($recipe['Media'][0]['file'], 240, 240); 
                    }        
                    else{
                        $img = "http://ima.gs/ffffff/3a6655/NONE/f-240x240.png"; 
                    }                
                    echo '<li>';                        
                    echo $this->Html->link('', array('plugin'=>'pere_olive', 'controller'=>'recipes', 'action'=>'view', $recipe['Recipe']['slug']), array('class'=>'thumb', 'style'=>'background-image:url('.$img.')'));                
                    echo $this->Html->link($recipe['Recipe']['name'], array('plugin'=>'pere_olive', 'controller'=>'recipes', 'action'=>'view', $recipe['Recipe']['slug']));
                    echo '</li>';
                  endforeach; ?>
            </ul>
        </section>
    

        <h2><?php echo __('Rechercher une recette'); ?></h2>        
        
        <ul class="all">
	<?php foreach ($recipes as $recipe): ?>
            <li>
            <?php 
                    $recipe['Media'] = array_values($recipe['Media']);
                    if(isset($recipe['Thumb']['file'])){                
                        $img = $this->Media->resizedUrl($recipe['Thumb']['file'], 320, 240); 
                    }
                    else if (isset($recipe['Media'][0])){
                        $img = $this->Media->resizedUrl($recipe['Media'][0]['file'], 320, 240); 
                    }        
                    else{
                        $img = "http://ima.gs/ffffff/3a6655/NONE/f-320x240.png"; 
                    }  
                    echo $this->Html->Image($img);                
                    echo $this->Html->link($recipe['Recipe']['name'], array('plugin'=>'pere_olive', 'controller'=>'recipes', 'action'=>'view', $recipe['Recipe']['slug']));
            ?>
            </li>
        <?php endforeach; ?>
        </ul>
</div>	