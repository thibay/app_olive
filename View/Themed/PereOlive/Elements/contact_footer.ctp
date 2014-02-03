<?php 
    echo $this->Form->create('Contact', array('url'=>array('controller'=>'contacts', 'action'=>'add_footer')));          
    echo '<div class="one-third column alpha">'.    $this->Form->input('contact_name', array('error'=>false, 'label'=>__('Nom & Prénom'),'div'=>true)).'</div>';     
    echo '<div class="one-third column">'.          $this->Form->input('phone', array('error'=>false, 'label'=>__('Téléphone'), 'div'=>true)).'</div>';     
    echo '<div class="one-third column omega">'.    $this->Form->input('email', array('error'=>false, 'label'=>__('E-mail'), 'div'=>true)).'</div>';     
    echo '<div class="sixteen columns alpha omega">'.    $this->Form->input('message', array('error'=>false, 'rows'=>'3', 'label'=>__('Message'), 'div'=>true)).'</div>';    
    echo '<div class="eight columns alpha">'.       $this->Captcha->input(null, array('after'=>false, 'div'=>true)).'</div>'; 
    echo '<div class="eight columns omega">'.       $this->Js->submit(__('Envoyer',true), array('url'=>array('controller'=>'contacts', 'action'=>'add_footer'), 'div'=>true, 'update' => '#contact_update', 'success'=>'$("label").inFieldLabels();', 'evalScripts'=>true)).'</div>';
    echo $this->Form->end();        
    echo $this->Html->scriptBlock(
        '$("label").inFieldLabels();',
        array('inline' => true)
    );
    echo $this->Js->writeBuffer();
?>