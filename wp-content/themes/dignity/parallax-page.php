<?php
/**
 * Template Name: Parallax Page
 *
 * @author Designova (designova.net)
 * @theme Dignity
*/
 get_header();	
 $dignity_options = get_option('dignity_wp');
?>
<div class="clear"></div>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
	$dignity_parallax_bg =  get_post_meta(get_the_ID(),'parallax_bg',true);
?>
	<section id="inner-page" class="dignity-page-section page-section second-page pad-top pad-bottom-half parallax-bg" data-stellar-background-ratio="1.5" style="background: url('<?php echo $dignity_parallax_bg;?>') repeat;">
        <div class="inner-page-content"><?php the_content();?></div>
		<div class="clear"></div>
    	<div class="post_footer">
            <?php comments_template( '', true ); ?>
        </div>
	</section>

<div class="clear"></div>
<?php endwhile; // end of the loop. ?>	


<?php
get_footer();
?>