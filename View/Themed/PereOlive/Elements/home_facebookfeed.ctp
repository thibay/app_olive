<?php 
    $items = $this->requestAction('facebook_feeds/facebook_feeds/feed');
//    debug($items);
?>


<h2 class="disc">Social</h2>
<div id="lightcone_wrapper" class="moving_item"><div id="lightcone"></div></div>
<div id="light" class="moving_item"></div>
<div id="plant_1" class="moving_item"></div>
<div id="plant_2" class="moving_item"></div>
<div id="smeg" class="moving_item"></div>
<div id="blackboard_wrapper" class="moving_item"><div id="blackboard" class="moving_item"></div></div>
<div id="likebox" class="moving_item">
    <div class="fb-like" data-href="https://www.facebook.com/lapinoalbinocompany" data-width="150" data-height="300" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="false" data-send="false"></div>
</div>



<?php
if($items){
    echo '<ul class="slides">';
    foreach ($items as $index=>$entry){
        if($index > 2) break;
//        debug($entry);
        echo '<li>';
        echo '<span class="timeago">'.$this->Time->timeAgoInWords($entry[1], array('accuracy' => array('hour' => 'hour'))).'</span>';
        echo '<quote class="shadowed">'.
                $entry[0].
//                preg_replace(
//                    '/(<img[^>]+>)/',
//                    "Check the picture we posted",
//                    $entry[3]
//                ).
//                preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a target=\"_blank\" href=\"\\0\">\\0</a>", $entry[3]).
                $this->Html->link(__('Lire Plus'), $entry[2], array('class'=>'', 'target'=>'_blank')).
             '</quote>';
        echo '</li>';
    }  
    echo '</ul>';
}                      
?>
