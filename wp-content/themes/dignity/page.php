<?php
 get_header();	
 $dignity_options = get_option('dignity_wp');
?>
<div class="clearfix"></div>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
?>
	<section id="inner-page" class="page-section second-page pad-top pad-bottom-half" style="background: <?php echo get_post_meta(get_the_ID(), 'page_bgcolor',true);?>;">
        <div class="container">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="inner-page-content"><?php the_content();?></div>
	        		<div class="clearfix"></div>
                	<div class="post_footer">
	                    <?php comments_template( '', true ); ?>
	                </div>
	                <div class="hidden"><?php wp_link_pages(); ?></div>
	        	</div>
	        </div>
	    </div>
	</section>

<div class="clearfix"></div>
<?php endwhile; // end of the loop. ?>	


<?php
get_footer();
?>