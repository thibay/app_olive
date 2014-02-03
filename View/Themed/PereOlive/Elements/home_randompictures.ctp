<?php $items = $this->requestAction('media/medias/home_random');?>
<section class="randompictures thumbs index home block eight columns omega">
<h2>Archives Photographiques</h2>

<?php 
    if($items):
    echo '<ul>';
    $i=0;    
    foreach($items as $index=>$thumb){
//        $class = (($i % 6 == 5)?'last':'');
//        $i++;        
        echo '<li>'.
                $this->Html->link(
                    $this->Media->image($thumb['Media']['file'], 95, 95),
                    $this->Media->resizedUrl($thumb['Media']['file'], 800, 600),               
                    array('escape'=>false, 
                          'rel'=>'colorbox', 
                          'data-href'=>$this->Html->url(array('plugin'=>'culture','controller'=>'evenements','action'=>'view',$thumb['Media']['ref_id'])),                        
                          'target'=>'_blank')
                ).
              '</li>';    
    }     
    echo '</ul>';
    endif;
?>
</section>