<?php 
/*=================================================
	Setting up the default thumbnail sizes
================================================== */


//Setting default thumbnail size for blog and portfolio
add_image_size('dignity_portfolio_thumb', 800, 800, true);


//Function to crop all thumbnails
if(false === get_option("thumbnail_crop")) {
add_option("thumbnail_crop", "1");
} else {
update_option("thumbnail_crop", "1");
}

?>