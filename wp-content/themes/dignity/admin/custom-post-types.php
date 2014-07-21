<?php
function dignity_portfolio_type() 
{
	/*---Portfolio custom post ----*/
	register_post_type( 'dignity_portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio' ,'dignitylang'),
				'singular_name' => __( 'Project' ,'dignitylang'),
				'add_new' => __( 'Add New Project' ,'dignitylang'),
				'add_new_item' => __( 'Add New Project' ,'dignitylang'),
				'edit' => __( 'Edit Project','dignitylang' ),
				'edit_item' => __( 'Edit Project','dignitylang' ),
			),
			'description' => __( 'Portfolio Items.','dignitylang' ),
			'public' => true,
			'supports' => array( 'title','editor','thumbnail' ),
			'rewrite' => array( 'slug' => 'dignity-portfolio', 'with_front' => false ),
			'has_archive' => true,
			'show_in_menu' => true,
			'menu_position' => 100,
			'menu_icon' => get_template_directory_uri() . '/admin/options/img/custom/glyphicons_155_show_thumbnails.png',
		)
	);
	register_taxonomy( 'dignity_portfolio_category', array( 'dignity_portfolio' ),
	array( 'hierarchical' => true, 'label' => "Categories","singular_label" => "Category" ) );	
}



function dignity_slider_type()
{

		/*---Slider custom post ----*/
	register_post_type('dignity_slider',
		array(
			'labels' => array(
				'name' => __( ' Splash Slider' ,'dignitylang'),
				'singular_name' => __( 'Slide' ,'dignitylang'),
				'add_new' => __( 'Add New Slide' ,'dignitylang'),
				'add_new_item' => __( 'Add New Slide' ,'dignitylang'),
				'edit' => __( 'Edit Slide','dignitylang' ),
				'edit_item' => __( 'Edit Slide','dignitylang' ),
			),
			'description' => __( 'Slides','dignitylang' ),
			'public' => true,
			'supports' => array( 'title', 'thumbnail'),
			'rewrite' => array( 'slug' => 'dignity-slider', 'with_front' => false ),
			'has_archive' => true,
            'show_in_menu' => true,
            'menu_position' => 100,
            'menu_icon' => get_template_directory_uri() . '/admin/options/img/custom/glyphicons_159_picture.png',
		)
	);
}

?>
