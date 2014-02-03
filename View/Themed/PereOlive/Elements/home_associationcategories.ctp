<?php $items = $this->requestAction('culture/associationcategories/home_index');?>
<section class="associationcategories index home block eight columns alpha">
<h2>Catégories des Associations</h2>
<?php if($items):?>
<ul>
<?php foreach($items as $index=>$item): ?>
    <li><?php echo $this->Html->link($item['AssociationCategory']['name'], array('plugin'=>'culture', 'controller'=>'associations','action'=>'index','#'=>$item['AssociationCategory']['slug']), array('style'=>"background-color:#".$item['AssociationCategory']['color'])); ?></li>
<?php endforeach; ?>
</ul>
<?php endif;?>
</section>