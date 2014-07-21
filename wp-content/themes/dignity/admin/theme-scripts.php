<?php
function dignity_scripts() 
{ 

    $options = get_option('dignity_wp');

	
    wp_enqueue_script('jquery');
    wp_enqueue_script("bootstrap", get_stylesheet_directory_uri(). "/bootstrap/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("modernizr-custom", get_stylesheet_directory_uri(). "/javascripts/modernizr.custom.js",array(),false,true);
    wp_enqueue_script("jquery-easing", get_stylesheet_directory_uri(). "/javascripts/jquery.easing.1.3.js",array(),false,true);
    wp_enqueue_script("preloader", get_stylesheet_directory_uri(). "/javascripts/pace.min.js",array(),false,true);
    wp_enqueue_script("retina", get_stylesheet_directory_uri(). "/javascripts/retina.js",array(),false,true);
    wp_enqueue_script("classie", get_stylesheet_directory_uri(). "/javascripts/classie.js",array(),false,true);
    wp_enqueue_script("modal-effects", get_stylesheet_directory_uri(). "/javascripts/modalEffects.js",array(),false,true);
    wp_enqueue_script("slidingmenu", get_stylesheet_directory_uri(). "/javascripts/slidingmenu.js",array(),false,true);
    wp_enqueue_script("text-rotator", get_stylesheet_directory_uri(). "/javascripts/nova-text-rotator.js",array(),false,true);
    wp_enqueue_script("waypoints", get_stylesheet_directory_uri(). "/javascripts/waypoints.min.js",array(),false,true);
    wp_enqueue_script("touchSwipe", get_stylesheet_directory_uri(). "/javascripts/jquery.touchSwipe.js",array(),false,true);
    wp_enqueue_script("sudoSlider-designova", get_stylesheet_directory_uri(). "/javascripts/jquery.sudoSlider.designova.js",array(),false,true);
    wp_enqueue_script("owl-carousel", get_stylesheet_directory_uri(). "/javascripts/owl.carousel.js",array(),false,true);
    wp_enqueue_script("mixitup", get_stylesheet_directory_uri(). "/javascripts/jquery.mixitup.js",array(),false,true);
    wp_enqueue_script("flexslider", get_stylesheet_directory_uri(). "/javascripts/flexslider.js",array(),false,true);
    wp_enqueue_script("prettyPhoto", get_stylesheet_directory_uri(). "/javascripts/prettyPhoto.js",array(),false,true);
    wp_enqueue_script("magnific-popup", get_stylesheet_directory_uri(). "/javascripts/jquery.magnific-popup.js",array(),false,true);
    
    if($options['twitter_id'] != '')
    {
        wp_enqueue_script("tweet", get_stylesheet_directory_uri(). "/javascripts/jquery.tweet.js",array(),false,true);
        wp_enqueue_script("tweet-init", get_stylesheet_directory_uri(). "/javascripts/init-tweet.js",array(),false,true);
    }
    wp_enqueue_script("stellar", get_stylesheet_directory_uri(). "/javascripts/jquery.stellar.js",array(),false,true);
    wp_enqueue_script("smooth-scroll", get_stylesheet_directory_uri(). "/javascripts/smooth-scroll.js",array(),false,true);
    wp_enqueue_script("appear-animation", get_stylesheet_directory_uri(). "/javascripts/jquery.appear.js",array(),false,true);
    wp_enqueue_script("mb-bgndGallery", get_stylesheet_directory_uri(). "/javascripts/mb.bgndGallery.js",array(),false,true);
    wp_enqueue_script("sudoslider-touch-init", get_stylesheet_directory_uri(). "/javascripts/sudoslider-touch-init.js",array(),false,true);
    wp_enqueue_script("portfolio", get_stylesheet_directory_uri(). "/javascripts/portfolio.js",array(),false,true);
    wp_enqueue_script("device-lib", get_stylesheet_directory_uri(). "/javascripts/device.min.js",array(),false,true);
    wp_enqueue_script("animate-init", get_stylesheet_directory_uri(). "/javascripts/animate-init.js",array(),false,true);
    if($options['home_bg_type'] == 'slider')
    {
        if($options['slide_img_src'] == 'splash_slider')
        {
            wp_enqueue_script("bgslider-init", get_stylesheet_directory_uri(). "/javascripts/bgslider-init.js",array(),false,true);
        }
        else
        {
            wp_enqueue_script("flickr-lib", get_stylesheet_directory_uri(). "/javascripts/jquery.mb.flickr.js",array(),false,true);
            wp_enqueue_script("bgslider-flickr-init", get_stylesheet_directory_uri(). "/javascripts/bgslider-flickr-init.js",array(),false,true);
        }
    }
    if($options['home_bg_type'] == 'youtube_video')
    {
        wp_enqueue_script("ytplayer-lib", get_stylesheet_directory_uri(). "/javascripts/jquery.mb.YTPlayer.js",array(),false,true);
        
        wp_enqueue_script("jquery-metadata", get_stylesheet_directory_uri(). "/javascripts/jquery.metadata.js",array(),false,true);
        wp_enqueue_script("bgvideo-youtube-init", get_stylesheet_directory_uri(). "/javascripts/bgvideo-youtube-init.js",array(),false,true);
    }

    if($options['home_bg_type'] == 'vimeo_video')
    {
        wp_enqueue_script("okvideo-lib", get_stylesheet_directory_uri(). "/javascripts/okvideo.js",array(),false,true);
        wp_enqueue_script("bgvideo-vimeo-init", get_stylesheet_directory_uri(). "/javascripts/bgvideo-vimeo-init.js",array(),false,true);
    }
    wp_enqueue_script("form-validation", get_stylesheet_directory_uri(). "/javascripts/form-validation.js",array(),false,true);
    wp_enqueue_script("main-script", get_stylesheet_directory_uri(). "/javascripts/main.js",array(),false,true);
    
    
    
    
	
}

function dignity_admin_scripts()
{  
	wp_enqueue_script("uploader", get_stylesheet_directory_uri(). "/admin/options/js/uploader.js");
    wp_enqueue_script("farbtastic", get_stylesheet_directory_uri(). "/admin/options/js/farbtastic.js");
    wp_enqueue_script("farbtastic-invoke", get_stylesheet_directory_uri(). "/admin/options/js/color_picker_invoke.js");
    wp_enqueue_script("add-portfolio-slide", get_stylesheet_directory_uri(). "/javascripts/add-portfolio-slide.js",array(),false,true);
}


?>