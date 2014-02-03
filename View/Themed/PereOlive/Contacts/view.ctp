<section class="contacts view sixteen columns alpha omega">
<div id="map_canvas" class="sixteen columns alpha omega"></div>
<div class="negative">
<h2><?php echo __('Contactez-nous');?></h2>
<section class="featured">
<div id="contact-<?php echo $contact['Contact']['id']; ?>" class="one-third column omega rouge block-info">    
        <div class="address">
            Père Olive      
            <p>Rue Géron 43 </p>
            <p>5300 Andenne</p>
            <p>Belgium</p>
        </div>
	<?php if ($contact['Contact']['message_status']):  ?>
	<div class="contact-form">
	<?php
		echo $this->Form->create('Message', array(
			'url' => array(
				'plugin' => 'contacts',
				'controller' => 'contacts',
				'action' => 'view',
				$contact['Contact']['alias'],
			),
		));
		echo $this->Form->input('Message.name', array('label' => __d('croogo', 'Your name')));
		echo $this->Form->input('Message.email', array('label' => __d('croogo', 'Your email')));
		echo $this->Form->input('Message.title', array('label' => __d('croogo', 'Subject')));
		echo $this->Form->input('Message.body', array('label' => __d('croogo', 'Message')));
		if ($contact['Contact']['message_captcha']):
			echo $this->Recaptcha->display_form();
		endif;
		echo $this->Form->end(__d('croogo', 'Send'));
	?>
	</div>
	<?php endif; ?>
</div>
</section>
<div class="two-thirds column alpha body">
        <div class="contact-body">
	<?php echo $contact['Contact']['body']; ?>
	</div>    
</div>
</div>
</section>

<?php echo $this->Html->script("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",array('inline'=>false)); ?>

<?php 
    echo $this->Html->scriptBlock('
    function initialize() {
      var myLatlng = new google.maps.LatLng(50.5047864,5.119764499999974);
      
var styles =[
  {
    "featureType": "road.arterial",
    "stylers": [
      { "saturation": -100 },
      { "weight": 0.2 },
      { "visibility": "simplified" }
    ]
  },{
    "featureType": "road",
    "elementType": "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape.natural",
    "stylers": [
      { "visibility": "simplified" },
      { "lightness": -14 },
      { "hue": "#cbcb33" }
    ]
  },{
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      { "visibility": "on" },
      { "weight": 3.3 }
    ]
  },{
    "featureType": "transit",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "water",
    "stylers": [
      { "visibility": "simplified" },
      { "saturation": -100 }
    ]
  },{
    "featureType": "poi",
    "stylers": [
      { "visibility": "simplified" },
      { "saturation": -100 },
      { "lightness": 62 }
    ]
  },{
    "featureType": "road",
    "stylers": [
      { "saturation": -100 },
      { "weight": 0.5 },
      { "visibility": "on" }
    ]
  },{
    "featureType": "administrative.locality",
    "stylers": [
      { "visibility": "on" }
    ]
  }
];

      var mapOptions = {
        zoom: 13,
        scrollwheel: false,
        disableDefaultUI: true,
        zoomControl:true,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
      map.setOptions({styles: styles});

      var marker = new google.maps.Marker({
          icon: {
            path: google.maps.SymbolPath.CIRCLE,
            strokeColor: \'#0d6133\',
            scale: 12
          },
          position: myLatlng,
          map: map,          
      });
    }
    initialize();
    ');?>