<?php
    //Image     
    $thumbs['Media'] = $evenement['Media'];            
    $evenement['Media'] = array_values($evenement['Media']);             
    if(isset($evenement['Thumb']['file'])){                
        $img = $this->Media->resizedUrl($evenement['Thumb']['file'], 940, 500); 
        $thumb = $this->Media->resizedUrl($evenement['Thumb']['file'], 250, 250); 
    }
    else if (isset($work['Media'][0])){
        $img = $this->Media->resizedUrl($evenement['Media'][0]['file'], 940, 500); 
        $thumb = $this->Media->resizedUrl($evenement['Thumb']['file'], 250, 250); 
    }        
    else{
        $img = "http://ima.gs/ffffff/000000/NONE/f-940x500.png"; 
        $thumb = "http://ima.gs/ffffff/b32929/NONE/f-250x250.png"; 
    }
   
    echo $this->Html->meta(array('property' => 'og:type', 'content' => 'event'), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:type', 'content' => 'ogbeta:events.event'), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'event:start_time', 'content' => $evenement['Evenement']['from_date']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'event:location:latitude', 'content' => $evenement['Place']['latitude']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'event:location:longitude', 'content' => $evenement['Place']['longitude']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:image', 'content' => $thumb), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:title', 'content' => $evenement['Evenement']['name']), NULL, array('inline' => false));
    echo $this->Html->meta(array('property' => 'og:description', 'content' =>  $this->Text->truncate(strip_tags($evenement['Evenement']['body']), 250)), NULL, array('inline' => false));
    
    ?>

<div class="evenements view">
    
     <?php
            
            echo $this->Html->Image($img, array('class'=>'main'));
        ?>
    
        <h1 class="sixteen columns alpha omega">
                    <span class="wrapper">
                        <?php echo $this->Text->truncate($evenement['Evenement']['name'], 50, array('ellipsis'=>'…', 'exact'=>false)); ?>
                        <span class="date"><?php echo $this->Time->format('d/m/Y', $evenement['Evenement']['from_date']); ?></span>
<!--                        <span class="place"><?php echo $this->Text->truncate($evenement['Place']['name'], 20, array('ellipsis'=>'…', 'exact'=>false)); ?></span>                -->
                    </span>
        </h1>
<?php 
   //NEIGHTBORS  
    //debug(min($neighbors));
    if(min($neighbors) || max($neighbors)){
            echo '<div class="neighbors sixteen columns alpha omega">';
            //debug($neighbors);
            //$html->link($item['Brand']['name'].' '.$item['Modele']['name'], );		    
            if(!empty($neighbors['prev'])) echo $this->Html->link(__('< Evènement précédent', true), array(($neighbors['prev']['Evenement']['slug'])), array('class'=>'prev'));
            if(!empty($neighbors['next'])) echo $this->Html->link(__('Evènement suivant >', true), array(($neighbors['next']['Evenement']['slug'])), array('class'=>'next'));
            echo '</div>';
    };	
?>


<section class="two-thirds column alpha body">
        <div class="two-thirds columns alpha omega clearfix">

    <?php echo $evenement['Evenement']['body']; ?> 
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
                        array('escape'=>false, 'rel'=>'colorbox', 'title'=>$evenement['Evenement']['name'], 'target'=>'_blank')
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
    <?php if ($evenement['Evenement']['price_doors']>0) {?>
    <span class="price doors"><?php echo $this->Number->currency($evenement['Evenement']['price_doors'], 'EUR'); ?> sur place</span>
    <?php } else {?>
    <span class="price doors">Entrée Libre</span>
    <?php }?>        
    <?php if ($evenement['Evenement']['price_presale']>0) {?><span class="price presale"><?php echo $this->Number->currency($evenement['Evenement']['price_presale'], 'EUR'); ?> en prévente</span><?php } ?>
    <?php if ($evenement['Evenement']['price_member_bibli']>0) {?><span class="price bibli"><?php echo $this->Number->currency($evenement['Evenement']['price_member_bibli'], 'EUR'); ?> membres la source</span><?php } ?>
    <?php if ($evenement['Evenement']['price_member_culture']>0) {?><span class="price culture"><?php echo $this->Number->currency($evenement['Evenement']['price_member_culture'], 'EUR'); ?> membres culture</span><?php } ?>
    
    <span class="date"><?php echo $evenement['Evenement']['text_date']; ?><br />A partir de <?php echo $this->Time->format('H:i', $evenement['Evenement']['from_date']); ?></span>        
    <span class="place name"><?php echo $evenement['Place']['name']; ?></span>    
    <span class="place address"><?php echo $evenement['Place']['address_steet'] . ' - ' . $evenement['Place']['address_zipcode'] . ' ' . $evenement['Place']['address_city']; ?></span>    
    <span class="place phone">Réservations / infos : <?php echo $evenement['Place']['phone']; ?></span>    
    <span class="place email">Courriel : <a href="mailto:<?php echo $evenement['Place']['email']; ?>" target="_blank"><?php echo $evenement['Place']['email']; ?></a></span>    
    <span class="place website"><a href="<?php echo $evenement['Place']['website']; ?>" target="_blank"><?php echo $evenement['Place']['website']; ?></a></span>    
    <?php 
        if($evenement['Evenement']['website'] != '' ||
                $evenement['Evenement']['social_facebook_page'] != '' ||
                $evenement['Evenement']['social_twitter_page'] != '' ||
                $evenement['Evenement']['social_facebook_event'] != ''){
            echo '<span class="separator"></span>';
        }
    ?>
    <?php if ($evenement['Evenement']['website'] != '') {?><span class="place website"><a  href="<?php echo $evenement['Evenement']['website']; ?>" target="_blank"><?php echo $evenement['Evenement']['website']; ?></a></span><?php } ?>    
    <?php if ($evenement['Evenement']['social_facebook_page'] != '') {?><span class="place website"><a  href="<?php echo $evenement['Evenement']['social_facebook_page']; ?>" target="_blank">Page Facebook de l'artiste</a></span><?php } ?>    
    <?php if ($evenement['Evenement']['social_twitter_page'] != '') {?><span class="place website"><a  href="<?php echo $evenement['Evenement']['social_twitter_page']; ?>" target="_blank">Page Twitter de l'artiste</a></span><?php } ?>    
    <?php if ($evenement['Evenement']['social_facebook_event'] != '') {?><span class="place website"><a  href="<?php echo $evenement['Evenement']['social_facebook_event']; ?>" target="_blank">Page Facebook de l'évènement</a></span><?php } ?>    
    <div class='fb'><div class="fb-like" data-width="280" data-layout="button_count" data-action="recommend" data-show-faces="false" data-send="true"></div></div>
    </div>
    <div id="map_canvas" class="one-third column alpha omega"></div>    
</section>

    
</div>


<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",array('inline'=>false)); ?>

<?php 
    echo $this->Js->buffer("
    function initialize() {
      var myLatlng = new google.maps.LatLng(".$evenement['Place']['latitude'].",".$evenement['Place']['longitude'].");"."
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
