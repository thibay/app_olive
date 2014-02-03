<!DOCTYPE html>
<html>
    
<head>
	<?php echo $this->Html->charset(); ?>
	
        <title><?php echo $title_for_layout . ' | ' . Configure::read('Site.title'); ?></title>
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>        
        <![endif]-->   
        <?php 
            echo $this->Layout->meta();
            echo $this->Layout->feed();
            
            echo $this->Html->css('reset');                
            echo $this->Html->css('flexslider');
            echo $this->Html->css('screen');                
            echo $this->Html->css('colorbox');            
            
            echo $this->Layout->js();
            echo $this->Html->script('lib/require', array('data-main'=>'/theme/PereOlive/js/app/main.js'));		                                     
            echo $scripts_for_layout;
        ?>
    
        
        <script type="text/javascript"> //try{Typekit.load();}catch(e){}</script>
        <link rel="icon" type="image/png" href="/img/favicon.png" /> 
        <link rel="shortcut icon" type="image/png" href="/img/favicon.png" />        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>    
    
    <body>        
                <div id='loading'></div>
            
                <header id="header" class="clearfix">
                        <h1 id="logo" class=""><a href="/" class=""><?php echo $this->Html->image('pereolive_logo.png'); ?></a></h1>                                               
                        <section id="nav" class="clearfix">
                            <?php echo $this->Layout->menu('main'); ?>
                        </section>                      
                        <?php echo $this->Layout->blocks('header'); ?>                                                
                </header>                                                                       
            
                <section id="main" class="clearfix <?php echo $mainclass ?>">
                    <?php echo $this->Layout->blocks('top_content'); ?>
                    <?php echo $this->Layout->blocks('content'); ?>
                   
                    <?php //echo $this->Session->flash(); ?>
                    <?php echo $content_for_layout; ?>
                    <?php //echo $this->element('sql_dump'); ?>
                </section>                                   
            
                <footer id="footer" class="clearfix">
                    <?php echo $this->Layout->blocks('footer'); ?>
                </footer>
        
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=200576376631994";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <?php echo $this->Js->writeBuffer();?>                
        
    </body>
</html>



