<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",array('inline'=>false)); ?>

<div class="associations index">
    
    <h1 class='sixteen columns alpha omega'>Nos Associations</h1>
    
    <ul class="sixteen columns alpha omega">
    <?php 
        $classes = array('alpha','','','omega');
        $previous = 0;
        $offset = 0;
        echo $this->Js->buffer("var initFunctions = {};");
        //debug($associations);
    ?>
    <?php foreach ($associations as $index=>$association): ?>
        
        <?php 
        
                $this_one = $association['AssociationCategory']['id'];
                if($this_one != $previous){
                    echo '<li id="'.$association['AssociationCategory']['slug'].'" name="'.$association['AssociationCategory']['slug'].'" style="background-color:#'.$association['AssociationCategory']['color'].'" class="associationcategory four columns '.$classes[($index+$offset) % 4].'"><div class="wrapper">'.
                            $association['AssociationCategory']['name']
                            .'</div></li>';
                    $previous = $association['AssociationCategory']['id'];
                    $offset++;
                }               
        
        ?>
        
        <li name='<?php echo $association['Association']['slug']; ?>' rel="<?php echo $association['Association']['id'] ?>" style='z-index:<?php echo 500-$index ?>; border-color:#<?php echo $association['AssociationCategory']['color']; ?>' class="association four columns <?php echo $classes[($index+$offset) % 4] ?>">
            <div class="abs" style="z-index:<?php echo 1000-$index ?>">
            <?php 
                //NAME
                echo '<span style="color:#'.$association['AssociationCategory']['color'].'" class="name four columns alpha omega"><span class="wrapper">'.$this->Text->truncate($association['Association']['name'], 120, array('ellipsis'=>'…', 'exact'=>false)).'</span></span>';
                echo '<span style="color:#'.$association['AssociationCategory']['color'].'" class="more four columns alpha omega">↯</span>';
                //ADDITIONAL DATA
                echo '<span style="color:#'.$association['AssociationCategory']['color'].'" class="data four columns alpha omega"><span class="wrapper">';
                if($association['Association']['excerpt'] != '') echo '<p class="excerpt">'.$association['Association']['excerpt'].'</p>';        
                if($association['Association']['website'] != '') echo '<span class="website">'.$this->Html->link('Site Web', $association['Association']['website']).'</span>';        
                if($association['Association']['social_facebook_page'] != '') echo '<span class="social_facebook_page">'.$this->Html->link('Page Facebook', $association['Association']['social_facebook_page']).'</span>';        
                if($association['Association']['social_twitter_page'] != '') echo '<span class="social_twitter_page">'.$this->Html->link('Page Twitter', $association['Association']['social_twitter_page']).'</span>';        
                if($association['Association']['address_1_name'] != '') {
                    echo '<p class="contact">'.
                            '<label>Personne de contact</label>'.
                            '<span class="contact">'.$association['Association']['address_1_name'].'</span>'.
                            '<span class="street">'.$association['Association']['address_1_street'].'</span>'.
                            '<span class="city">'.$association['Association']['address_1_zipcode'].' '.$association['Association']['address_1_city'].'</span>'.
                            '<span class="contact_phone">'.$association['Association']['phone_1_value'].'</span>'.                            
                            '</p>';        
                }
                if($association['Association']['address_2_name'] != '') {
                    echo '<p class="president">'.
                            '<label>Président</label>'.
                            '<span class="contact">'.$association['Association']['address_2_name'].'</span>'.
                            '<span class="street">'.$association['Association']['address_2_street'].'</span>'.
                            '<span class="city">'.$association['Association']['address_2_zipcode'].' '.$association['Association']['address_2_city'].'</span>'.
                            '<span class="contact_phone">'.$association['Association']['phone_2_value'].'</span>'.                                                        '</p>';        
                }
                if($association['Association']['address_3_name'] != '') {
                    echo '<p class="secrétaire">'.
                            '<label>Secrétaire</label>'.
                            '<span class="contact">'.$association['Association']['address_3_name'].'</span>'.
                            '<span class="street">'.$association['Association']['address_3_street'].'</span>'.
                            '<span class="city">'.$association['Association']['address_3_zipcode'].' '.$association['Association']['address_3_city'].'</span>'.
                            '<span class="contact_phone">'.$association['Association']['phone_3_value'].'</span>'.                                                        '</p>';        
                }
                echo '<div id="map_canvas_'.$association['Association']['id'].'" class="map four columns alpha omega"></div>';
                if(isset($association['Association']['latitude'])){
                echo $this->Js->buffer("
                      initFunctions['initialize_".$association['Association']['id']."'] = function(){
                          var myLatlng = new google.maps.LatLng(".$association['Association']['latitude'].",".$association['Association']['longitude'].");
                          var mapOptions = {                        
                          zoom: 12,                        
                          center: myLatlng,                        
                          mapTypeId: google.maps.MapTypeId.ROADMAP                      
                          }   
                          var map = new google.maps.Map(document.getElementById('map_canvas_".$association['Association']['id']."'), mapOptions); 
                          var marker = new google.maps.Marker({position: myLatlng,map: map});
                      }                    
                      
                      //initialize_".$association['Association']['id']."();                                          
                    ");                
                }
                echo '</span></span>';                
                
                //PHONE
                echo '<span style="color:#'.$association['AssociationCategory']['color'].'" class="phone four columns alpha omega"><span class="wrapper">'.$association['Association']['phone_1_value'].'</span></span>';
            ?>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
    
    <?php 
    echo $this->Js->buffer("
    //ASSOCS
        $('.associations.index ul li.association').toggle(function(){  
            //$(this).find('.abs').css('position','absolute');
            $(this).find('.phone, .more').fadeOut();                                                                   
            $(this).find('.abs').animate({'height':700}, function(){
                $.smoothScroll({scrollTarget:this, offset:-20});                
                $(this).find('.data').fadeIn();                                                       
                initFunctions['initialize_'+$(this).parent().attr('rel')](this);                
            });            
        }, function(){
            $(this).find('.data').fadeOut();
            $(this).find('.phone').fadeIn();                                                       
            $(this).find('.abs').animate({'height':220});
        });        
    ");?>
    <p>
        <?php
//        echo $this->Paginator->counter(array(
//        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
//        ));
        ?>
    </p>
    <div class="paging">
    <?php
//            echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
//            echo $this->Paginator->numbers(array('separator' => ''));
//            echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>