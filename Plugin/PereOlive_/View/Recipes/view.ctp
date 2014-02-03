<?php
    //Image     
    $thumbs['Media'] = $recipe['Media'];            
    $recipe['Media'] = array_values($recipe['Media']);             
    if(isset($recipe['Thumb']['file'])){                
        $img = $this->Media->resizedUrl($recipe['Thumb']['file'], 940, 500); 
        $thumb = $this->Media->resizedUrl($recipe['Thumb']['file'], 250, 250); 
    }
    else if (isset($work['Media'][0])){
        $img = $this->Media->resizedUrl($recipe['Media'][0]['file'], 940, 500); 
        $thumb = $this->Media->resizedUrl($recipe['Thumb']['file'], 250, 250); 
    }        
    else{
        $img = "http://ima.gs/ffffff/000000/NONE/f-940x500.png"; 
        $thumb = "http://ima.gs/ffffff/b32929/NONE/f-250x250.png"; 
    }
   
    echo $this->Html->meta(array('property' => 'og:type', 'content' => 'event'), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:type', 'content' => 'ogbeta:events.event'), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'event:start_time', 'content' => $recipe['Recipe']['from_date']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'event:location:latitude', 'content' => $recipe['Place']['latitude']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'event:location:longitude', 'content' => $recipe['Place']['longitude']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:image', 'content' => $thumb), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:title', 'content' => $recipe['Recipe']['name']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:description', 'content' =>  $this->Text->truncate(strip_tags($recipe['Recipe']['body']), 250)), NULL, array('inline' => false));
    
    ?>

<div class="recipes view">
    
     <?php
            
            echo $this->Html->Image($img, array('class'=>'main'));
        ?>
    
        <h1 class="sixteen columns alpha omega">
                    <span class="wrapper">
                        <?php echo $this->Text->truncate($recipe['Recipe']['name'], 50, array('ellipsis'=>'…', 'exact'=>false)); ?>
                        <span class="date"><?php echo $this->Time->format('d/m/Y', $recipe['Recipe']['from_date']); ?></span>
<!--                        <span class="place"><?php echo $this->Text->truncate($recipe['Place']['name'], 20, array('ellipsis'=>'…', 'exact'=>false)); ?></span>                -->
                    </span>
        </h1>
<?php 
   //NEIGHTBORS  
    //debug(min($neighbors));
    if(min($neighbors) || max($neighbors)){
            echo '<div class="neighbors sixteen columns alpha omega">';
            //debug($neighbors);
            //$html->link($item['Brand']['name'].' '.$item['Modele']['name'], );		    
            if(!empty($neighbors['prev'])) echo $this->Html->link(__('< Evènement précédent', true), array(($neighbors['prev']['Recipe']['slug'])), array('class'=>'prev'));
            if(!empty($neighbors['next'])) echo $this->Html->link(__('Evènement suivant >', true), array(($neighbors['next']['Recipe']['slug'])), array('class'=>'next'));
            echo '</div>';
    };	
?>


<section class="two-thirds column alpha body">
        <div class="two-thirds columns alpha omega clearfix">

    <?php echo $recipe['Recipe']['body']; ?> 
        </div>
    <div class="thumbs two-thirds columns alpha omega clearfix">
    <?php
    //THUMBS
    if (is_array($thumbs['Media'])){                
        echo '<ul>';
        $i=0;
        foreach($thumbs['Media'] as $index=>$thumb){
            $class = (($i % 6 == 5)?'last':'');
            $i++;
            echo '<li class='.$class.'>'.
                    $this->Html->link(
                        $this->Media->image($thumb['file'], 95, 95),
                        $this->Media->resizedUrl($thumb['file'], 1024, 1024),               
                        array('escape'=>false, 'rel'=>'colorbox', 'title'=>$recipe['Recipe']['name'], 'target'=>'_blank')
                    ).
                  '</li>';    
        }     
        echo '</ul>';
    }   
    ?>    
    </div>   
</section>
    
<section class="one-third column omega block-info rouge clearfix">
    <div class="wrapper">
    <?php if ($recipe['Recipe']['price_doors']>0) {?>
    <span class="price doors"><?php echo $this->Number->currency($recipe['Recipe']['price_doors'], 'EUR'); ?> sur place</span>
    <?php } else {?>
    <span class="price doors">Entrée Libre</span>
    <?php }?>        
    <?php if ($recipe['Recipe']['price_presale']>0) {?><span class="price presale"><?php echo $this->Number->currency($recipe['Recipe']['price_presale'], 'EUR'); ?> en prévente</span><?php } ?>
    <?php if ($recipe['Recipe']['price_member_bibli']>0) {?><span class="price bibli"><?php echo $this->Number->currency($recipe['Recipe']['price_member_bibli'], 'EUR'); ?> membres la source</span><?php } ?>
    <?php if ($recipe['Recipe']['price_member_pereolive']>0) {?><span class="price pereolive"><?php echo $this->Number->currency($recipe['Recipe']['price_member_pereolive'], 'EUR'); ?> membres pereolive</span><?php } ?>
    
    <span class="date"><?php echo $recipe['Recipe']['text_date']; ?><br />A partir de <?php echo $this->Time->format('H:i', $recipe['Recipe']['from_date']); ?></span>        
    <span class="place name"><?php echo $recipe['Place']['name']; ?></span>    
    <span class="place address"><?php echo $recipe['Place']['address_steet'] . ' - ' . $recipe['Place']['address_zipcode'] . ' ' . $recipe['Place']['address_city']; ?></span>    
    <span class="place phone">Réservations / infos : <?php echo $recipe['Place']['phone']; ?></span>    
    <span class="place email">Courriel : <a href="mailto:<?php echo $recipe['Place']['email']; ?>" target="_blank"><?php echo $recipe['Place']['email']; ?></a></span>    
    <span class="place website"><a href="<?php echo $recipe['Place']['website']; ?>" target="_blank"><?php echo $recipe['Place']['website']; ?></a></span>    
    <?php 
        if($recipe['Recipe']['website'] != '' ||
                $recipe['Recipe']['social_facebook_page'] != '' ||
                $recipe['Recipe']['social_twitter_page'] != '' ||
                $recipe['Recipe']['social_facebook_event'] != ''){
            echo '<span class="separator"></span>';
        }
    ?>
    <?php if ($recipe['Recipe']['website'] != '') {?><span class="place website"><a  href="<?php echo $recipe['Recipe']['website']; ?>" target="_blank"><?php echo $recipe['Recipe']['website']; ?></a></span><?php } ?>    
    <?php if ($recipe['Recipe']['social_facebook_page'] != '') {?><span class="place website"><a  href="<?php echo $recipe['Recipe']['social_facebook_page']; ?>" target="_blank">Page Facebook de l'artiste</a></span><?php } ?>    
    <?php if ($recipe['Recipe']['social_twitter_page'] != '') {?><span class="place website"><a  href="<?php echo $recipe['Recipe']['social_twitter_page']; ?>" target="_blank">Page Twitter de l'artiste</a></span><?php } ?>    
    <?php if ($recipe['Recipe']['social_facebook_event'] != '') {?><span class="place website"><a  href="<?php echo $recipe['Recipe']['social_facebook_event']; ?>" target="_blank">Page Facebook de l'évènement</a></span><?php } ?>    
    <div class='fb'><div class="fb-like" data-width="280" data-layout="button_count" data-action="recommend" data-show-faces="false" data-send="true"></div></div>
    </div>
    <div id="map_canvas" class="one-third column alpha omega"></div>    
</section>

    
</div>


<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",array('inline'=>false)); ?>

<?php 
    echo $this->Js->buffer("
    function initialize() {
      var myLatlng = new google.maps.LatLng(".$recipe['Place']['latitude'].",".$recipe['Place']['longitude'].");"."
      var mapOptions = {
        zoom: 12,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,          
      });
    }
    initialize();
    ");?>
