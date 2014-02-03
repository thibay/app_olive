<div id="about_header" class="block header">
    <iframe class="vimeo_about" src="//player.vimeo.com/video/71802037?autoplay=1&loop=1" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>     
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
