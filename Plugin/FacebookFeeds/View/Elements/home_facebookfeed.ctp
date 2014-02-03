<?php 
    $items = $this->requestAction('facebook_feeds/facebook_feeds/feed');
//    debug($items);
?>
<?php
if($items){
    echo '<ul class="facebook feed">';
    foreach ($items as $index=>$entry){
        if($index > 2) break;
//        debug($entry);
        echo '<li class="clearfix item">';
        echo '<span class="date">'.$this->Time->timeAgoInWords($entry[1], array('accuracy' => array('hour' => 'hour'))).'</span>';
        echo '<p class="message">'.
                $entry[0].
//                preg_replace(
//                    '/(<img[^>]+>)/',
//                    "Check the picture we posted",
//                    $entry[3]
//                ).
//                preg_replace("/(http:\/\/)(.*?)\/([\w\.\/\&\=\?\-\,\:\;\#\_\~\%\+]*)/", "<a target=\"_blank\" href=\"\\0\">\\0</a>", $entry[3]).
                $this->Html->link(__('Read More'), $entry[2], array('class'=>'more', 'target'=>'_blank')).
             '</p>';
        echo '</li>';
    }  
    echo '</ul>';
}                      
?>
<div class="fb-like" data-href="https://www.facebook.com/lapinoalbinocompany" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>        
