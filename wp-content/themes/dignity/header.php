<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> <?php wp_title("|",true); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo get_bloginfo('description'); ?>"/>
	<meta name="keywords" content="<?php bloginfo('categories'); ?>"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_stylesheet_directory_uri();?>/bootstrap/js/html5shiv.js"></script>
      <script src="<?php echo get_stylesheet_directory_uri();?>/bootstrap/js/respond.min.js"></script>
    <![endif]-->
    

	<?php

        

        $dignity_options = get_option('dignity_wp');
        
        dignity_favicon();
        dignity_color_scheme();
        //dignity_custom_style();

        add_theme_support( 'custom-header'); 
        add_theme_support( 'custom-background');
        add_editor_style();
        
        wp_head();  
     ?>
</head>

<body <?php body_class(); ?>>

    <?php
    //var_dump($dignity_options)
    if($dignity_options['home_bg_type'] == 'youtube_video' && $dignity_options['youtube_vdo_src'] != '')
    {
        //echo '<a id="bgndVideo" class="player" data-property="{videoURL:'; echo "'".$dignity_options['youtube_vdo_src']."',containment:'body',autoPlay:true, mute:true, startAt:1, opacity:1}"; echo '">bg</a>';
    ?>
        <a id="bgndVideo" class="player" data-property="{videoURL:'<?php echo $dignity_options['youtube_vdo_src'];?>',containment:'body',autoPlay:true, mute:true, startAt:1, opacity:1}">bg</a>
    <?php    
    }
    
    ?>
    <!-- Sliding Navigation : starts -->
    <nav class="menu <?php if($dignity_options['navigation_type'] == 'standard' || $dignity_options['navigation_opt'] == 'default') { echo 'visible-xs visible-sm visible-md'; }?>" id="sm">
        <div class="sm-wrap">
            <h1 class="sm-logo">
                <?php if (isset($dignity_options['logo']) && $dignity_options['logo'] != '') {
                ?>
                <img src="<?php echo $dignity_options['logo'];?>" style="height: 40px;" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                <?php    
                }
                else
                    echo get_bloginfo('name');
                ?>
            </h1>
            <i class="icon-remove menu-close"></i>
            <?php 
                dignity_sliding_menu();
            ?>
        </div>
        <!-- Navigation Trigger Button -->
        <div id="sm-trigger"></div>
    </nav>
    <!-- Sliding Navigation : ends -->
    

    <!-- Master Wrap : starts -->
    <section id="mastwrap" class="sliding">


    <?php
    if($dignity_options['navigation_opt'] == 'default')
    {
        ?>

        <!-- masthead : starts -->
        <header id="masthead" class="clearfix">
            <h1 class="logo standard-spacing">
                <?php if (isset($dignity_options['logo']) && $dignity_options['logo'] != '') {
                ?>
                <img src="<?php echo $dignity_options['logo'];?>" style="height: 30px;" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                <?php    
                }
                else
                    echo get_bloginfo('name');
                ?>
            </h1>
            <?php
            wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'default-wp-nav-menu visible-lg' ) );
            ?>
        </header>
        <!-- masthead : ends -->
        <?php
    }
    else
    {

        if($dignity_options['navigation_type'] == 'sliding')
        {
        ?>
        <!-- masthead : starts -->
        <header id="masthead" class="clearfix trans-header">
            <h1 class="logo">
                <?php if (isset($dignity_options['logo']) && $dignity_options['logo'] != '') {
                ?>
                <img src="<?php echo $dignity_options['logo'];?>" style="height: 30px;" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                <?php    
                }
                else
                    echo get_bloginfo('name');
                ?>
            </h1>
        </header>
        <!-- masthead : ends -->
        <?php
        }
        else
        {
        ?>
        <!-- masthead : starts -->
        <header id="masthead" class="clearfix">
            <h1 class="logo standard-spacing">
                <?php if (isset($dignity_options['logo']) && $dignity_options['logo'] != '') {
                ?>
                <img src="<?php echo $dignity_options['logo'];?>" style="height: 30px;" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                <?php    
                }
                else
                    echo get_bloginfo('name');
                ?>
            </h1>
            <?php
            dignity_std_nav();
            ?>
        </header>
        <!-- masthead : ends -->
        <?php    
        }
    }
    
    ?>
