<?php 
    $this->Html->addCrumb('News');
    //$this->Html->addCrumb($news['News']['title']);  
    //debug($modeles);
?>

<div class="news index">
    <h1><?php echo __('Actualités'); ?></h1>

    <?php
    $classes = array('alpha','omega');
    foreach ($news as $index=>$news): ?>
    <li class="eight columns <?php echo $classes[($index) % 2] ?>">   
        <?php
                //Image
                $news['Media'] = array_values($news['Media']);             
                if(isset($news['Thumb']['file'])){                
                    $img = $this->Media->resizedUrl($news['Thumb']['file'], 240, 220); 
                }
                else if (isset($news['Media'][0])){
                    $img = $this->Media->resizedUrl($news['Media'][0]['file'], 240, 220); 
                }        
                else{
                    $img = "http://ima.gs/ffffff/000000/NONE/f-240x220.png"; 
                }                 
                 echo "<span class='date four rouge columns alpha omega'>{$this->Time->format('d/m', $news['News']['published_date'])}</span>";         
                 echo $this->Html->Image($img, array('class'=>'four columns alpha omega'));
                 echo "<h1 class='eight columns alpha omega'>{$news['News']['title']}</h1>";         
                 echo '<p>';
                 //echo $news['News']['body_small'];         
                 echo $this->Html->link('Lire plus', array('action'=>'view', $news['News']['slug']), array('class'=>'more'));         
                 echo '</p>';

        ?>           
    </li>
    <?php endforeach; ?>
</div>
