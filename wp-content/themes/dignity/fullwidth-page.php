<?php
/**
 * Template Name: Full-width Page
 *
 * @author Designova (designova.net)
 * @theme Dignity
*/
 get_header();	
 $dignity_options = get_option('dignity_wp');
?>
<div class="clear"></div>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>
	<section id="inner-page" class="page-section second-page pad-top pad-bottom-half" style="background: <?php echo get_post_meta(get_the_ID(), 'page_bgcolor',true);?>;">
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