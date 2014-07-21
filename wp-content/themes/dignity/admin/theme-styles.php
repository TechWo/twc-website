<?php
function dignity_styles() 
{
  wp_enqueue_style("bootstrap", get_stylesheet_directory_uri(). "/bootstrap/css/bootstrap.css");
  wp_enqueue_style("bootstrap-theme", get_stylesheet_directory_uri(). "/bootstrap/css/bootstrap-theme.css");
  wp_enqueue_style("typography",get_stylesheet_directory_uri()."/fonts/fonts.css");
  wp_enqueue_style("preloader",get_stylesheet_directory_uri()."/stylesheets/pace.preloader.css");
  wp_enqueue_style("sliding-menu",get_stylesheet_directory_uri()."/stylesheets/slidingmenu.css");
  wp_enqueue_style("text-rotator", get_stylesheet_directory_uri(). "/stylesheets/simpletextrotator.css");
  wp_enqueue_style("animated-buttons",get_stylesheet_directory_uri()."/stylesheets/animated-buttons.css");
  wp_enqueue_style("owl-carousel",get_stylesheet_directory_uri()."/stylesheets/owl.carousel.css");
  wp_enqueue_style("owl-theme",get_stylesheet_directory_uri()."/stylesheets/owl.theme.css");
  wp_enqueue_style("prettyPhoto",get_stylesheet_directory_uri()."/stylesheets/prettyPhoto.css");
  wp_enqueue_style("magnific-popup",get_stylesheet_directory_uri()."/stylesheets/magnific-popup.css");
  wp_enqueue_style("jquery-tweet",get_stylesheet_directory_uri()."/stylesheets/jquery.tweet.css");
  wp_enqueue_style("animate",get_stylesheet_directory_uri()."/stylesheets/animate.css");
  wp_enqueue_style("effects",get_stylesheet_directory_uri()."/stylesheets/effects.css");
  wp_enqueue_style("modal",get_stylesheet_directory_uri()."/stylesheets/md_modal.css");
  wp_enqueue_style("main-retina",get_stylesheet_directory_uri()."/stylesheets/main-retina.css");
  wp_enqueue_style("style",get_stylesheet_directory_uri()."/style.css");
  wp_enqueue_style("main-responsive",get_stylesheet_directory_uri()."/stylesheets/main-responsive.css");
  
}
function dignity_admin_styles()
{
 
  wp_enqueue_style("metastyles", get_stylesheet_directory_uri(). "/stylesheets/meta-styles.css");  
  wp_enqueue_style("farbtastic-style", get_stylesheet_directory_uri(). "/admin/options/css/farbtastic.css");  
}


?>