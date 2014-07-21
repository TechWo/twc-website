<?php
/**
 * Template Name: Splash Page
 *
 * @author Designova (designova.net)
 * @theme Dignity
*/
 get_header();	
 $dignity_options = get_option('dignity_wp');
?>

<?php
    if($dignity_options['home_bg_type'] == 'slider')
    {
  ?>
    <!-- top-banner (variant2 only) : starts -->
		<div id="splash-page" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';}?> class="dignity-page-section splash-page <?php if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
			<div class="vertical-center <?php if($dignity_options['home_page_layout'] == 'regular'){echo 'regular-layout';} ?>">
				<?php the_content();?>
			</div>
		</div>
		
  <?php
    }

    if($dignity_options['home_bg_type'] == 'parallax')
    {
    ?>
    <section class="dignity-page-section intro-parallax-bg" style="background: url('<?php echo $dignity_options['home_bg_img'];?>') repeat;" data-stellar-background-ratio="1.5" data-stellar-vertical-offset="0" data-stellar-horizontal-offset="0">
      <!-- top-banner (variant2 only) : starts -->
      <div id="splash-page" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';} ?> class="splash-page <?php if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
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
    <section class="dignity-page-section intro-parallax-bg" style="background: url('<?php echo $dignity_options['home_bg_img'];?>') repeat;" data-stellar-background-ratio="1" data-stellar-vertical-offset="0" data-stellar-horizontal-offset="0">
      <!-- top-banner (variant2 only) : starts -->
      <div id="splash-page" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';}?> class="splash-page <?php if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
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
    <div id="splash-page" <?php if($dignity_options['home_page_layout'] != 'regular'){echo'style="background-color: '.$dignity_options['home_split_color'].'"';}?> class="dignity-page-section splash-page <?php  if($dignity_options['show_mask'] == '1'){echo ' mask-bg';} if($dignity_options['home_page_layout'] == 'leftSplit'){echo ' left-split';} if($dignity_options['home_page_layout'] == 'rightSplit'){echo ' right-split';}?>">
      <div class="vertical-center <?php if($dignity_options['home_page_layout'] == 'regular'){echo 'regular-layout';} ?>">
        <?php the_content();?>
      </div>
    </div>
    
    <?php
      }
  	?>
      	<div class="clear"></div>
<?php
get_footer();
?>      	