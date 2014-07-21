<?php
/**
 * Template Name: One Page Layout
 *
 * @author Designova (designova.net)
 * @theme Dignity
*/
  get_header();
  $dignity_options = get_option('dignity_wp');
?>

<?php

  
  
  $dignity_count = 0; 
  $dignity_countPages = wp_count_posts('page')->publish;
  $dignity_pages = get_pages( 'sort_order=asc&sort_column=menu_order');
//Count published pages
foreach($dignity_pages as $dignity_pag):

  setup_postdata($dignity_pag);
 
  //Anchor point and title
  $dignity_newanchorpoint = strtolower(preg_replace('/\s+/', '-', $dignity_pag->post_name)); 
  $dignity_new_title      = $dignity_newanchorpoint;
  $dignity_templ_name     = get_post_meta( $dignity_pag->ID, '_wp_page_template', true );
  $dignity_filename       = preg_replace('"\.php$"', '', $dignity_templ_name); 

  //Check wether to include in one page
  $dignity_include_onepage =  get_post_meta($dignity_pag->ID,'one_page',true);

  $page_bgcolor =  get_post_meta($dignity_pag->ID,'page_bgcolor',true);
  $parallax_bg =  get_post_meta($dignity_pag->ID,'parallax_bg',true);
  
  

  	if($dignity_filename == 'the-onepage' AND $dignity_include_onepage == 'yes')
 	  {

  	}
  	elseif($dignity_filename == 'splash-page' AND $dignity_include_onepage == 'yes')
  	{
      $dignity_count++;

      if($dignity_count == 2) 
      {
        $dignity_change_nav_style_class = 'second-page ';
      }
      else
      {
        $dignity_change_nav_style_class = '';
      }
	  ?>  
      <?php
        if($dignity_options['home_bg_type'] == 'slider')
        {
      ?>
	    <!-- top-banner (variant2 only) : starts -->
  		<div id="<?php echo $dignity_new_title; ?>" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';}?> class="dignity-page-section splash-page <?php echo ' '.$dignity_change_nav_style_class; if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
  			<div class="vertical-center <?php if($dignity_options['home_page_layout'] == 'regular'){echo 'regular-layout';} ?>">
  				<?php the_content();?>
  			</div>
  		</div>
  		
      <?php
        }

        if($dignity_options['home_bg_type'] == 'parallax')
        {
        ?>
        <section class="dignity-page-section intro-parallax-bg <?php echo $dignity_change_nav_style_class; ?>" style="background: url('<?php echo $dignity_options['home_bg_img'];?>') repeat;" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="0" data-stellar-horizontal-offset="0">
          <!-- top-banner (variant2 only) : starts -->
          <div id="<?php echo $dignity_new_title; ?>" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';} ?> class="splash-page <?php if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
            <div class="vertical-center <?php if($dignity_options['home_page_layout'] == 'regular'){echo 'regular-layout';} ?>">
              <?php the_content();?>
            </div>
          </div>
          <!-- top-banner : ends -->
        </section>
        <?php  
        }
        if($dignity_options['home_bg_type'] == 'image')
        {
        ?>
        <section class="dignity-page-section intro-parallax-bg <?php echo $dignity_change_nav_style_class; ?>" style="background: url('<?php echo $dignity_options['home_bg_img'];?>') repeat;" data-stellar-background-ratio="1" data-stellar-vertical-offset="0" data-stellar-horizontal-offset="0">
          <!-- top-banner (variant2 only) : starts -->
          <div id="<?php echo $dignity_new_title; ?>" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';}?> class="splash-page <?php if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
            <div class="vertical-center <?php if($dignity_options['home_page_layout'] == 'regular'){echo 'regular-layout';} ?>">
              <?php the_content();?>
            </div>
          </div>
          <!-- top-banner : ends -->
        </section>
        <?php  
        }
        if($dignity_options['home_bg_type'] == 'youtube_video' || $dignity_options['home_bg_type'] == 'vimeo_video')
        {
        ?>
        <!-- top-banner (variant2 only) : starts -->
        <div id="<?php echo $dignity_new_title; ?>" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';}?> class="dignity-page-section splash-page <?php echo ' '.$dignity_change_nav_style_class; if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
          <div class="vertical-center <?php if($dignity_options['home_page_layout'] == 'regular'){echo 'regular-layout';} ?>">
            <?php the_content();?>
          </div>
        </div>
        
        <?php
          }
      ?>
	  <?php
  	}
    elseif($dignity_filename == 'parallax-page' AND $dignity_include_onepage == 'yes')
    {
      $dignity_count++;

      if($dignity_count == 2) 
      {
        $dignity_change_nav_style_class = 'second-page ';
      }
      else
      {
        $dignity_change_nav_style_class = '';
      }
     ?>

      <section id="<?php echo $dignity_new_title; ?>" class="dignity-page-section page-section parallax-bg <?php echo $dignity_change_nav_style_class; ?>" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="750" style="background: url('<?php echo $parallax_bg;?>') repeat;">
        <?php the_content();?>
      </section>
    <?php
    }
    elseif($dignity_include_onepage == 'yes')
    {
      $dignity_count++;

      if($dignity_count == 2) 
      {
        $dignity_change_nav_style_class = 'second-page ';
      }
      else
      {
        $dignity_change_nav_style_class = '';
      }
    ?>
      <section id="<?php echo $dignity_new_title; ?>" class="dignity-page-section page-section <?php echo $dignity_change_nav_style_class; ?>" style="background: <?php echo $page_bgcolor;?>;">
        <?php the_content();?>
      </section>
    <?php
    }
endforeach;
?>



<?php
  get_footer();
?>