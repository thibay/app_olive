<div class="products index">
<?php 
    $cats = array(0=>__('Les natures'), 1=>__('Les classiques'), 2=>__('Les découvertes'), 3=>__('Les tartinables'), 4=>__('Les antipasti'), 5=>__('Les exclusives'));
?>
    
<?php foreach ($cats as $index=>$cat): ?>
    <section class="<?php echo strtolower(Inflector::slug($cat, ''));?> category">
        <div class="table block index header"><div class="wrapper clearfix"><div class="block-body"></div></div></div>
        <div class="slider">
        <h2><?php echo $cat; ?></h2> 
        <div class="flexslider">
        <ul class="all cat<?php echo $index ?> slides">
	<?php foreach ($products as $product): ?>
            <?php if($product['Product']['productcategory_id'] != $index) continue; ?>
            <li>
                <div class="product">
            <?php 
                    $img = $this->Media->thumb($product,120,120);                 
                    $imgFull = $this->Media->thumb($product,420,420);                 
                   
                    echo $this->Html->Image($img, array('data-href'=>$imgFull));                
                    echo $this->Html->link($product['Product']['name'], 
                         array(
                            'plugin'=>'pere_olive', 
                            'controller'=>'products', 
                            'action'=>'view', 
                            $product['Product']['slug']
                        ), 
                        array(
                            'class'=>'link',
                            'data-href'=>$product['Product']['exerpt'])
                     );
            
            ?>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
        </div>
        </div>
    </section>
<?php endforeach; ?>
    <!--
    <section class="olives category">
        <div class="table block index header"><div class="wrapper clearfix"><div class="block-body"></div></div></div>
        <div class="slider">
        <h2><?php echo __('Nos Variétés d\'Olives'); ?></h2> 
        <div class="flexslider">
        <ul class="all cat0 slides">
	<?php foreach ($products_cat0 as $product): ?>
            <li>
                <div class="product">
            <?php 
                    $img = $this->Media->thumb($product,120,120);                 
                    $imgFull = $this->Media->thumb($product,420,420);                 
                   
                    echo $this->Html->Image($img, array('data-href'=>$imgFull));                
                    echo $this->Html->link($product['Product']['name'], 
                         array(
                            'plugin'=>'pere_olive', 
                            'controller'=>'products', 
                            'action'=>'view', 
                            $product['Product']['slug']
                        ), 
                        array(
                            'class'=>'link',
                            'data-href'=>$product['Product']['exerpt'])
                     );
            
            ?>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
        </div>
        </div>
    </section>
    <!--
    <section class="tapenades category">
        <div class="table block index header"><div class="wrapper clearfix"><div class="block-body"></div></div></div>      
        <div class="slider">
        <h2><?php echo __('Nos Variétés de Tapenades'); ?></h2> 
        <div class="flexslider">
        <ul class="all cat1 slides">
	<?php foreach ($products_cat1 as $product): ?>
            <li>
                <div class="product">
            <?php 
                    $product['Media'] = array_values($product['Media']);
                    if(isset($product['Thumb']['file'])){                
                        $img = $this->Media->resizedUrl($product['Thumb']['file'], 120, 120); 
                        $imgFull = $this->Media->resizedUrl($product['Thumb']['file'], 420, 420); 
                    }
                    else if (isset($product['Media'][0])){
                        $img = $this->Media->resizedUrl($product['Media'][0]['file'], 120, 120); 
                        $imgFull = $this->Media->resizedUrl($product['Media'][0]['file'], 420, 420); 
                    }        
                    else{
                        $img = "http://ima.gs/ffffff/3a6655/NONE/f-120x120.png"; 
                        $imgFull = "http://ima.gs/ffffff/3a6655/NONE/f-420x420.png"; 
                    }  
                    echo $this->Html->Image($img, array('data-href'=>$imgFull));                
                    echo $this->Html->link($product['Product']['name'], 
                         array(
                            'plugin'=>'pere_olive', 
                            'controller'=>'products', 
                            'action'=>'view', 
                            $product['Product']['slug']
                        ), 
                        array(
                            'class'=>'link',
                            'data-href'=>$product['Product']['exerpt'])
                     );
            
            ?>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
        </div>
        </div>
    </section>    
 <section class="condiments category">
        <div class="table block index header"><div class="wrapper clearfix"><div class="block-body"></div></div></div>      
        <div class="slider">
        <h2><?php echo __('Nos Variétés de Condiments'); ?></h2> 
        <div class="flexslider">
        <ul class="all cat1 slides">
	<?php foreach ($products_cat2 as $product): ?>
            <li>
                <div class="product">
            <?php 
                    $product['Media'] = array_values($product['Media']);
                    if(isset($product['Thumb']['file'])){                
                        $img = $this->Media->resizedUrl($product['Thumb']['file'], 120, 120); 
                        $imgFull = $this->Media->resizedUrl($product['Thumb']['file'], 420, 420); 
                    }
                    else if (isset($product['Media'][0])){
                        $img = $this->Media->resizedUrl($product['Media'][0]['file'], 120, 120); 
                        $imgFull = $this->Media->resizedUrl($product['Media'][0]['file'], 420, 420); 
                    }        
                    else{
                        $img = "http://ima.gs/ffffff/3a6655/NONE/f-120x120.png"; 
                        $imgFull = "http://ima.gs/ffffff/3a6655/NONE/f-420x420.png"; 
                    }  
                    echo $this->Html->Image($img, array('data-href'=>$imgFull));                
                    echo $this->Html->link($product['Product']['name'], 
                         array(
                            'plugin'=>'pere_olive', 
                            'controller'=>'products', 
                            'action'=>'view', 
                            $product['Product']['slug']
                        ), 
                        array(
                            'class'=>'link',
                            'data-href'=>$product['Product']['exerpt'])
                     );
            
            ?>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>
        </div>
        </div>
    </section>        -->
</div>	