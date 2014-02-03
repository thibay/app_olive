<section id="slides" class="sixteen columns alpha omega block">                       
<?php 
    $items = $this->requestAction('culture/evenements/home_promoted');
?>
<?php if($items):?>
<ul class="slides rslides" id="home_slider">              
<?php foreach($items as $index=>$item): ?>
    <li>
        <h3 class="fifteen columns alpha omega">
            <span class="wrapper">
                <?php echo $this->Html->link($this->Text->truncate($item['Evenement']['name'], 50, array('ellipsis'=>'…', 'exact'=>false)), array('plugin'=>'culture', 'controller'=>'evenements','action'=>'view',$item['Evenement']['slug'])); ?>
                <span class="date"><?php echo $this->Time->format('d/m/Y', $item['Evenement']['from_date']); ?></span>
                <span class="place"><?php echo $this->Text->truncate($item['Place']['name'], 20, array('ellipsis'=>'…', 'exact'=>false)); ?></span>                
            </span>
        </h3>
        <?php
            //Image             
            //$item['Media'] = array_values($item['Media']);                         
            if(isset($item['Thumb']['file'])){                
                $img = $this->Media->image($item['Thumb']['file'], 940, 500); 
            }
//            else if (isset($work['Media'][0])){
//                $img = $this->Media->image($item['Media'][0]['file'], 940, 500); 
//            }        
            else{
                $img = $this->Html->Image('error.gif'); 
            }
            echo $img;
        ?>    
    </li>
<?php endforeach; ?>
</ul>
<?php endif;?>
    
</section>         