<?php 
    $this->Html->addCrumb('News', array('action'=>'index'));
    $this->Html->addCrumb($news['News']['title']);  
    //debug($modeles);
?>
<div class="recipes news view">

    <?php
            //Image              
            $thumbs['Media'] = $news['Media'];            
            $news['Media'] = array_values($news['Media']);              
            if(isset($news['Thumb']['file'])){                
                $img = $this->Media->resizedUrl($news['Thumb']['file'], 940, 500); 
            }
            else if (isset($news['Media'][0])){
                $img = $this->Media->resizedUrl($news['Media'][0]['file'], 940, 500); 
            }        
            else{
                    $img = "http://ima.gs/ffffff/000000/NONE/f-940x500.png"; 
            }            
        ?>
    
<?php



            echo $this->Html->meta(
                    'description',
                    $news['News']['body_small'],
                    array('type' => 'description', 'inline'=>false)
            );    
            echo '<meta name="og:image" content="'."$img".'">';
            echo '<link rel="image_src" type="image/jpeg" href="'."$img".'" />';    
            echo "<meta property='og:title' content='{$news['News']['title']}'/>";
            echo "<meta property='og:description' content='{$news['News']['body_small']}'/>";
         
         echo $this->Html->Image($img, array('class'=>'main'));         
         ?>
         <h1 class="fifteen columns alpha omega">
                    <span class="wrapper">
                        <?php echo $this->Text->truncate($news['News']['title'], 50, array('ellipsis'=>'…', 'exact'=>false)); ?>                        
                    </span>
        </h1>
        <?php
         
        
   //NEIGHTBORS  
    //debug(min($neighbors));
    if(min($neighbors) || max($neighbors)){
            echo '<div class="neighbors sixteen columns alpha omega">';
            //debug($neighbors);
            //$html->link($item['Brand']['name'].' '.$item['Modele']['name'], );		    
            if(!empty($neighbors['prev'])) echo $this->Html->link(__('< Actualité précédente', true), array(($neighbors['prev']['News']['slug'])), array('class'=>'prev'));
            if(!empty($neighbors['next'])) echo $this->Html->link(__('Actualité suivante >', true), array(($neighbors['next']['News']['slug'])), array('class'=>'next'));
            echo '</div>';
    };	
?>

<section class="two-thirds column alpha body">        
   <?php echo $news['News']['body_full'];?>                       
</section>
    
<section class="one-third column omega block-info rouge clearfix">
    <div class="wrapper">
        <span class="date">Actualité publiée le <?php echo $this->Time->format('j F Y', $news['News']['published_date']); ?></span>
        Publier sur les réseaux sociaux
        <ul class="likes">
            <?php $url = "http://www.fleuruspereolive.be".$this->Html->url(array('controller'=>'News', 'action'=>'view', $news['News']['id']));?>
            <li><div class="fb-like" data-href="<?php echo $url; ?>" data-send="false" data-layout="button_count" data-width="150" data-show-faces="true"></div></li>                            
            <li><a href="https://twitter.com/share" class="twitter-share-button" data-via="klijkens" data-lang="fr">Tweeter</a></li>
        </ul>
    </div>
</section>

</div>

<?php echo $this->Js->buffer("!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');"); ?>