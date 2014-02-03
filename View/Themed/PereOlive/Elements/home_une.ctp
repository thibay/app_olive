
<?php 
$items = $this->requestAction('culture/news/home_promoted');
?>

<section id="home_une" class="one-third column rouge block home3blocks"><div class="wrapper">
<h2>A la une</h2>
<h3></h3>


<?php if($items):?>

<ul class="slides rslides" id="home_slider">              
<?php foreach($items as $index=>$item): ?>
    <li class="red">
        
        <?php echo $this->Html->link($item['News']['title'], array('plugin'=>'culture', 'controller'=>'news', 'action'=>'view',$item['News']['slug']), array('class'=>'title')); ?>
        <?php echo $this->Html->link(__('Voir +'), array('plugin'=>'culture', 'controller'=>'news', 'action'=>'view',$item['News']['slug']), array('class'=>'more')); ?>       
        
    </li>
<?php endforeach; ?>
</ul>



    

<?php endif;?>
</div></section>


