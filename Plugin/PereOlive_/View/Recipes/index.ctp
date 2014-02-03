<div class="recipes index">
    
    <h1 class='sixteen columns alpha omega'>Nos Evènements à venir</h1>
    
    <ul class="sixteen columns alpha omega">
    <?php 
        $classes = array('alpha','','','omega');
        $previous_month = 0;
        $offset = 0;
    ?>
    <?php foreach ($recipes as $index=>$recipe): ?>
        
        <?php 
        
                $this_month = $this->Time->format('ym', $recipe['Recipe']['from_date']);
                if($this_month != $previous_month){
                    echo '<li class="four vert month columns '.$classes[($index+$offset) % 4].'"><div class="wrapper">'.
                            '<span class="month">'.$this->Time->format('M', $recipe['Recipe']['from_date']).'</span> '.
                            '<span class="year">'.$this->Time->format('Y', $recipe['Recipe']['from_date']).'</span>'
                            .'</div></li>';
                    $previous_month = $this->Time->format('ym', $recipe['Recipe']['from_date']);
                    $offset++;
                }               
        
        ?>
        
        <li class="recipe four columns <?php echo $classes[($index+$offset) % 4] ?>">
            <a href="<?php echo $this->Html->url(array('action'=>'view', $recipe['Recipe']['slug'])); ?>">
            <?php                                
                echo '<span class="date vert two columns alpha omega">'.$this->Time->format('d', $recipe['Recipe']['from_date']).'</span>';
                
                //Image
                //$recipe['Media'] = array_values($recipe['Media']);             
                if(isset($recipe['Thumb']['file'])){                
                    $img = $this->Media->resizedUrl($recipe['Thumb']['file'], 120, 120); 
                }
                else if (isset($work['Media'][0])){
                    $img = $this->Media->resizedUrl($recipe['Media'][0]['file'], 120, 120); 
                }        
                else{
                    $img = "http://ima.gs/ffffff/3a6655/NONE/f-120x120.png"; 
                }
                echo $this->Html->Image($img, array('class'=>'two columns thumb alpha omega'));
                echo '<span class="name four columns alpha omega"><span class="wrapper">'.$this->Text->truncate($recipe['Recipe']['name'], 90, array('ellipsis'=>'…', 'exact'=>false)).'</span></span>';
            ?>
            </a>
        </li>
    <?php endforeach; ?>
    </ul>
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

<div class="archives index sixteen columns alpha omega">
    
    <h1 class='sixteen columns alpha omega'>Nos Evènements passés</h1>
    <ul>
        <?php foreach ($archives as $index=>$recipe): ?>
        <li class="sixteen columns alpha omega">
            <span class="name sixteen columns alpha omega"><?php echo $recipe['Recipe']['name']; ?></span>
            <span class="date three columns alpha"><?php echo $recipe['Recipe']['text_date']; ?></span>
            <span class="place six columns"><?php echo $recipe['Place']['name']; ?></span>
            <span class="link sixteen columns alpha omega"><?php echo $this->Html->link('En savoir plus', array('action'=>'view', $recipe['Recipe']['slug'])); ?></span>
        </li>
        <?php endforeach; ?>
    </ul>

</div>