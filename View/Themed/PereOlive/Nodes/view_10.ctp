<div id="prod_header" class="block header">
</div>
<?php $this->Nodes->set($node); ?>

<div class="jobs index">
    <h2><?php echo $this->Nodes->field('title'); ?></h2>
    <section class="featured">
        <?php
		echo $this->Nodes->excerpt();
	?>        
    </section>
    <section class="content">
        <?php
		echo $this->Nodes->body();
	?>
    </section>	
</div>
