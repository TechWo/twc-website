<?php
$dignity_options = get_option('dignity_wp');
?>
	<!-- page-section : starts -->
	<footer id="mastfoot" class="mastfoot">
		<?php
		if(isset($dignity_options['custom_footer_content']) && !isset($dignity_options['hide_footer_widget']))
		{
		?>
		<div class="clearfix" style="background: <?php echo $dignity_options['custom_footer_bg']; ?>">
			<?php
				echo do_shortcode($dignity_options['custom_footer_content']);
			?>
		</div>
		<?php
		}
		?>

		<!-- inner-section : starts -->
		<section class="inner-section footer-bottom">

			<!-- container : starts -->
			<section class="container">
		
			<div class="row">
				<article class="col-md-6 text-left">
					<h3>@twitter</h3>
				              <article id="ticker" class="tweets-ticker query"></article>	
				</article>
				<article class="col-md-6 text-right">
					<ul class="footer-social">
						<?php 
	            		if($dignity_options['dignity_email'] != '') 
	                    {
	                    ?>
	                    <li><a href="mailto:<?php echo $dignity_options['dignity_email']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/email.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_twitter'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_twitter']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/twitter.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_dribble'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_dribble']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/dribble.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_facebook'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_facebook']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/facebook.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_gplus'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_gplus']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/google.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_linkedin'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_linkedin']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/linkedin.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_pintrest'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_pintrest']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/pintrest.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_behance'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_behance']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/behance.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_github'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_github']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/github.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_flickr'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_flickr']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/flickr.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_tumblr'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_tumblr']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/tumblr.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_soundcloud'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_soundcloud']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/soundcloud.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_instagram'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_instagram']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/instagram.png"/></a></li>
	                    <?php 
	                    }
	                    if($dignity_options['dignity_vimeo'] != '') 
	                    {
	                    ?>
	                    <li><a href="<?php echo $dignity_options['dignity_vimeo']; ?>" target="_blank"><img alt="<?php echo get_bloginfo('name'); ?>"  src="<?php echo get_stylesheet_directory_uri();?>/images/social_icons/vimeo.png"/></a></li>
	                    <?php 
	                    }
	                    ?>
						
					</ul>
					<div class="credits">
						<p><?php echo $dignity_options['credit']; ?> <br/><?php echo $dignity_options['copy_txt']; ?></p>
					</div>
				</article>
			</div>

			</section>

		</section>
		<!-- inner-section : ends -->


	</footer>
	<!-- page-section : ends -->



</section>
<!-- Master Wrap : ends -->

	<button class="md-trigger launch_modal hidden" data-modal="modal-5">Launch modal</button>
    <div class="md-modal md-effect-5" id="modal-5">
		<div class="md-content">
			<h3><?php if($dignity_options['thanks_msg_header']){ echo $dignity_options['thanks_msg_header']; }?></h3>
			<div>
				<p><?php if($dignity_options['thanks_msg']){ echo $dignity_options['thanks_msg']; }?></p>
				<div class="clear add-top-small"></div>
				<button class="md-close button dignity-button"><?php _e('Close','dignitylang');?></button>
			</div>
		</div>
	</div>
	<div class="md-overlay"></div>

    

	<?php
		

		if($dignity_options['home_bg_type'] == 'slider')
		{
			if($dignity_options['slide_img_src'] == 'splash_slider')
			{
				$loop = new WP_Query( array( 'post_type' => 'dignity_slider', 'orderby' => 'date', 'order' => 'DESC', 'paged'=> false, 'posts_per_page' => '-1' ) ); 
			    $slider_images = array();
			    if ($loop->have_posts()) { //$first = true;
			        while ($loop->have_posts()) : $loop->the_post();

			            $img_url = get_post_meta($post->ID,'dignity_slide_image',true);
			            array_push($slider_images, $img_url);

			        endwhile; 
				}
			    else
			    {
					array_push($slider_images, get_stylesheet_directory_uri().'/images/bg/01.jpg');
			    	array_push($slider_images, get_stylesheet_directory_uri().'/images/bg/02.jpg');
			    }
		    	
		    	$slider_options = array('slides' => $slider_images, 'fx' => $dignity_options['home_slider_fx']);
			    wp_localize_script('bgslider-init', 'slider_options', $slider_options);
			}
			
    	}
    	if($dignity_options['home_bg_type'] == 'vimeo_video' && $dignity_options['vimeo_vdo_src'] != '')
		{
			wp_localize_script('bgvideo-vimeo-init', 'video_url', $dignity_options['vimeo_vdo_src']);
		}

		if($dignity_options['twitter_id'] != '')
    	{
			$twitter_options = array( 'twitter_id' => $dignity_options['twitter_id'], 'path' => get_stylesheet_directory_uri());
			wp_localize_script('tweet-init', 'tweetobj', $twitter_options);
		}
		dignity_custom_style();
		
        wp_footer();
    ?>
	
	

	
</body>
</html>