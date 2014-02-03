 
    
requirejs.config({
    "baseUrl": "/theme/PereOlive/js/lib",
    "paths": {
      "app":"../app",
      "waypoints":"waypoints.min",
      "jquery":"jquery.min",
      "jquery-ui":'jquery-ui-1.10.3.effects.min',
      "typekit":"//use.typekit.net/nqm6bxh",
      "pendulum":"jquery.pendulum.min",
      "infield":"jquery.infieldlabel.min",
      "hover":"jquery.hoverIntent-min",
      "flex":"jquery.flexslider-min",
      "rotate":"jQueryRotateCompressed",
      "sharrre":"//raw.github.com/Julienh/Sharrre/master/jquery.sharrre.min"
    },
    shim: {
        'jquery-ui': ['jquery'],
        'sharrre': ['jquery'],
        'waypoints': ['jquery'],
        'pendulum': ['jquery'],
        'infield': ['jquery'],
        'hover': ['jquery'],
        'flex': ['jquery'],
        'rotate': ['jquery'],       
    }
});

requirejs(["app/common"]);


