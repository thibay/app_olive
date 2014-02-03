<section id="home_newsletter" class="one-third column alpha vert block home3blocks"><div class="wrapper">
    <h2>Newsletter</h2>
    <h3>Inscrivez-vous !</h3>


<script>
    $(document).ready(function() {
	
	
	//$.fancybox.resize();	
        $("#SubscriberSubscribeForm").bind("submit", function() {
                
                $.ajax({
                        type	: "POST",
                        cache	: false,
                        url	: $(this).attr('action'),
                        data	: $(this).serializeArray(),
                        success: function(data) {                                  
                                $('#subscribe').html(data);                                
                                //$.fancybox(data);                                
                                //$.fancybox.resize();
                                //$.fancybox.center();
                        }
                });
                return false;
        });        
        
	
});
</script>

<div id="subscribe">

        <?php 
        echo $this->Form->create('Subscriber', array('id'=>'SubscriberSubscribeForm', 'url'=> array('plugin'=>'culture', 'controller'=>'subscribers', 'action'=>'subscribe')));     
        
        ?>        
        
        <div id="update">
        <?php                
        echo $this->Form->input('email', array('id'=>'votreadresse', 'label'=>'Tapez ici votre adresse email.', 'div'=>false));		
        echo $this->Form->submit('Envoyer +', array('class'=>'more', 'div'=>false));        
        ?>
        </div>
        <?php echo $this->Form->end(); ?>

</div>

</div></section>