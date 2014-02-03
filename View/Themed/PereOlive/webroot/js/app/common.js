require([
    'jquery',
    'jquery-ui',
    'waypoints',
    "flex",
    "rotate",
    "pendulum",
    "typekit",
//     "jquery.smooth-scroll.min",     
     "infield",
     "hover",
//     "responsivesslides.min",
//     "jquery.colorbox-min", 
    ], function($,UI,WAY,FL,ROT,PEN,TYPE,INF,HOV){
      

    $(function() {

      try{Typekit.load();}catch(e){}
      
      //$(window).scrollTop();  
      $('#loading').fadeOut('fast', function(){$(this).hide();});
      $('body').css('position','relative').css('overflow','auto');

      $('#home_social').flexslider({
          selector:".slides li",
//          animation: "slide",
          pauseOnHover: true,
//          pauseOnAction: true, 
//          slideshow: false,
          controlNav: false,
          directionNav: false,
          //directionsContainer:'.directions',               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
          slideshowSpeed: 5000,
          animationSpeed: 800,
          //prevText : ' < ',
          //nextText : ' > ',

      });        
      $('#home_recipes').flexslider({
          selector:".slides.recipes > li.recipe",
//          animation: "slide",
//          pauseOnHover: true,
//          pauseOnAction: true, 
//          slideshow: false,
          controlNav: false,
          directionNav: true,
          directionsContainer:'.directions',               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
          slideshowSpeed: 5000,
          animationSpeed: 800,
          prevText : ' < ',
          nextText : ' > ',

          after: function(slider) { 
          jQuery('.slide-caption').show("slide", { direction: "down"}, 700);
          },

          before: function(slider) {  
          jQuery('.slide-caption').hide("fade", 800);
          },

          // image loader
          start: function(slider) {
          slider.removeClass('loading');
          }

      });
      function run() {
       $('.progress_bar_container').detach().appendTo('#home_recipes');   
       $('.progress_bar').animate({'width': "100%"}, 5000, run).width(0);
      }
      run();

     
         
    
        ///////
        //RESIZE
        ///////                
        var ratio = 1.78313253012048;
        function resizeSlider(){
            var width  = $(window).width();            
            var height = header_height = $(window).height() - $('#nav').outerHeight();                     
            $('#slider').css({
                'height': height
            });
            $('#slider li').css({
                'height': height,               
            });
            if(width/header_height > ratio){
                //PRIORITE hauteur
                $('.vimeo, .vimeo_about').css({ 
                    'width':width,
                    'margin-left': 0-width/2,
                    'height':(width/ratio),                    
                    'margin-top':-(width/ratio)/2+($('#nav').outerHeight()/2),                                        
                    'position':'absolute',
                    'top':'50%',
                    'left':'50%',                                   
                });
            }
            else{
                //PRIORITE largeur
                $('.vimeo, .vimeo_about').css({ 
                    'width':header_height*ratio,
                    'margin-left': -(header_height*ratio)/2,
                    'height':header_height,
                    'margin-top':-header_height/2+($('#nav').outerHeight()/2),                                        
                    'position':'absolute',
                    'top':'50%',
                    'left':'50%',                
                });
            } 
            
            /*product_page*/
            $('.category .table.block').css({
                'width':width,
                'margin-left': -(width - $('.category').width())/2,
            });

        }
        resizeSlider();
        $(window).resize(function() {
            resizeSlider();
        });  
          
        //ROTATE OLIVETOP
        $(window).on('scroll', function () {            
            $("#top_olive").rotate({
                duration: 2000, /* why wait? No easing needed now, either */
                angle: $('#top_olive').getRotateAngle(),                
                animateTo: 180 * $(window).scrollTop() / ($(document).height() - $(window).height())
            });
            
        });
       
       /////////
       //ANIMATE
       /////////
       //
       //
       //
       $('#header quote, #heaer a.more').hide();
       $('#header').waypoint({          
           triggerOnce: true,           
           handler:
            function(direction) {
                 $('quote').fadeIn('slow', function(){
                     $('a.more').fadeIn('fast');
                 });
            }
       });
       
       //TOPOLIVE
       $('#top_olive').css('left','-100%');
       $('#home_products h3, #home_products h4, #home_products .more').css({           
           'opacity':0,
           'margin-left':'200px',           
       });
       $('#home_products').waypoint({
           offset: function() {
                return $(this).outerHeight()/4;
           }, 
           triggerOnce: true,           
           handler:
            function(direction) {
                 $('#top_olive').animate({
                     left:'-10%',                     
                 }, 200, 'easeOutCirc', function(){
                     $('#home_products h3').animate({
                        'margin-left':0,                     
                        'opacity':1,                     
                     }, 200, 'easeOutCirc', function(){
                        $('#home_products h4').animate({
                            'margin-left':0,                     
                            'opacity':1,                     
                         }, 200, 'easeOutCirc', function(){
                             $('#home_products .more').animate({
                                'margin-left':0,                     
                                'opacity':1,                     
                             }, 200, 'easeOutCirc');
                         });                         
                     });                                  
                 });                                  
            }
       });
       
       //CHEFHAT
       $('#chef_hat').css('top', -$('#chef_hat').outerHeight()).css('opacity', 0);
       $('#home_recipes').waypoint({
           offset: function() {
                return $(this).outerHeight()/4;
           }, 
           triggerOnce: true,           
           handler:
            function(direction) {
                 $('#chef_hat').animate({
                     top:'110',    
                     opacity:1,
                 }, 200, 'easeOutCirc');
            }
       });
       
       //SOCIAL
       $('#smeg').css('bottom', -$('#smeg').outerHeight());       
       $('#plant_1').css('bottom', -$('#plant_1').outerHeight());       
       $('#plant_2').css('bottom', -$('#plant_2').outerHeight());
       $('#lightcone_wrapper').hide();       
       $('#home_social').waypoint({
           offset: function() {
                return $(this).outerHeight()/4;
           }, 
           triggerOnce: true,           
           handler:
            function(direction) {
                $('#smeg').animate({
                     bottom:'0',                         
                 }, 600, 'easeOutCirc', function(){
                        $('#plant_1').animate({
                            bottom:'-75',                                
                        }, 400, 'easeOutCirc', function(){
                            $('#plant_2').animate({
                                bottom:'-45',                                
                            }, 200, 'easeOutCirc', function(){
                                $('#lightcone_wrapper').show();
                                neonSign();
                            });
                        });
                 });
                blackBoard();
            }
       });
       
       //BLACKBOARD CLICK
       $("#blackboard_wrapper").click(function(){           
           blackBoard();
       });
       
       function blackBoard(){
           $("#blackboard").pendulum({
                    'startingAngle' : 45,
                    'rodLength' : 0,
                    'damping' :2,
                    'period' :2.4,
                    'overallDuration' :15
           });
       }       
       
       function neonSign(){
            var randSeconds = Math.ceil(Math.random()*0.2)+0.1; // max 7 sec, min 3 sec
            var randDelay = randSeconds*1000;
            var speed=300; // transition speed going form opacity 1 to 0.2 or 0.2 to 1
            var $light=$('#lightcone_wrapper');
            $light.delay(randDelay).animate({'opacity':0},speed,function(){
                $light.animate({'opacity':1},speed,neonSign() );
            });
       }
       
       
       //RECIPES INDEX
       $('.recipes.index .all li a.thumb').hover(function(){
           console.log('chk');
           $(this).find('span').animate({'top': '0%','opacity':0.8}, 'fast');
       },function(){
           $(this).find('span').animate({'top': '100%','opacity':0}, 'fast');
       });

       //JOB
       $("label").inFieldLabels();
       
       //PRODUCTS       
       function productEnter(elt){
           if (elt.type != 'mouseenter') elt = $(elt);
           else elt = $(this);
           $('.products.index li').removeClass('active');
           elt.addClass('active');
           elt.closest('.category').find('.block-body')
                   .html($('<img>').attr('src', elt.find('img').attr('data-href')).fadeIn('slow'))
                   .append($('<h1>').html(elt.find('a.link').text()).addClass('shadowed').fadeIn('slow'))
                   .append($('<p>').html(elt.find('a.link').attr('data-href')).addClass('shadowed').fadeIn('slow'));
       }
       function productOut(){
//           $(this).removeClass('active');
//           $('#productsindex_header .wrapper .block-body').delay(1000).empty();
       }
       var config = {    
        sensitivity: 2, // number = sensitivity threshold (must be 1 or higher)    
        interval: 0, // number = milliseconds for onMouseOver polling interval    
        over: productEnter, // function = onMouseOver callback (REQUIRED)    
        timeout: 0, // number = milliseconds delay before onMouseOut    
        out: productOut // function = onMouseOut callback (REQUIRED)
       };
//       $('.products.index li').mouseenter(productEnter);
       $('.products.index li').hoverIntent(config);
 
       $('.products.index .flexslider').flexslider({
            animation: "slide",
            animationLoop: true,
            itemWidth: 210,
            itemMargin: 0,
            minItems: 2,
            maxItems: 4,
            controlNav: false,
            directionNav: true,   
            pauseOnHover: true,
            start:function(slider){
                $(slider.slides.eq(slider.currentSlide)[0]).trigger('mouseenter');
                productEnter(slider.slides.eq(slider.currentSlide)[0]);
            },  
            after:function(slider){
                $(slider.slides.eq(slider.currentSlide*4)[0]).trigger('mouseenter');
//                  productEnter(slider.slides.eq(slider.currentSlide*4)[0]);
            }            
       });        
             
});




});



require([
    'jquery',
    'sharrre'
//     "responsivesslides.min",
//     "jquery.colorbox-min", 
    ], function($,SHA){
      
    $(function() {
        $('#share').sharrre({
            share: {
              facebook: true,
              twitter: true,
              linkedin: true,
              googlePlus: true,
            },
            buttons: {
              googlePlus: {size: 'tall', annotation:'bubble'},
              facebook: {layout: 'box_count'},
              twitter: {count: 'vertical'},
              linkedin: {counter: 'top'},
            },
            hover: function(api, options){
              $(api.element).find('.buttons').fadeIn();
            },
            hide: function(api, options){
              $(api.element).find('.buttons').fadeOut();
            },
            enableTracking: true
        });
    });
});