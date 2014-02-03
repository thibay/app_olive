<section id="slides" class="sixteen columns alpha omega block">                       
<?php $items = $this->requestAction('media/medias/home_random/3');?>
<?php if($items):?>
<ul class="slides rslides" id="home_slider">              
<?php foreach($items as $index=>$item): ?>
    <li>       
        <?php
            //Image             
            //$item['Media'] = array_values($item['Media']);                                     
            echo $this->Media->image($item['Media']['file'], 940, 500);
        ?>    
    </li>
<?php endforeach; ?>
</ul>
<?php endif;?>
    
</section>         