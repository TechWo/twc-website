<?php
/*--Basic Config calling---*/


//Theme Options
require_once (dirname( __FILE__ ) . "/admin/theme-options.php" );
//Common functions
require_once (dirname( __FILE__ ) . "/admin/common-functions.php" );

//Metaboxes
require_once (dirname( __FILE__ ) . "/admin/custom-metabox.php" );
//Custom Post types
require_once (dirname( __FILE__ ) . "/admin/custom-post-types.php" );
//Theme Styles
require_once (dirname( __FILE__ ) . "/admin/theme-styles.php" );
//Theme scripts
require_once (dirname( __FILE__ ) . "/admin/theme-scripts.php" );





/*---------------------------------------
---------Dignity Initialiszation---------
-----------------------------------------*/
function dignity_setup() 
  {
		
		register_nav_menu('primary', __( 'Primary Navigation','dignitylang'));
		register_nav_menu('dignity_nav', __( 'Dignity Navigation','dignitylang'));
		
		add_theme_support('post-thumbnails' );
		add_theme_support('post-thumbnails', array('dignity_portfolio','post') );
		set_post_thumbnail_size( 300, 300, true ); // Standard Size Thumbnails
        //Feed links
		add_theme_support( 'automatic-feed-links' );
		//Nav menu
		
		
		//Sidebar
		$args = array(
		'name'          => __( 'Dignity Sidebar', 'dignitylang' ),
		'id'            => 'dignity_side',
		'description'   => '',
	    'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s side_block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sub-heading"><span class="highlight-txt">',
		'after_title'   => '</span></h4>' );
		register_sidebar( $args ); 
        //Content width
		if ( ! isset( $content_width ) ) $content_width = 900;
		//Initiate custom post types
        add_action( 'init', 'dignity_portfolio_type' );
		add_action( 'init', 'dignity_slider_type' );
        
		
        //Load the text domain
		load_theme_textdomain('dignitylang', get_template_directory() . '/languages');
  }

add_action( 'after_setup_theme', 'dignity_setup' );


/*---------------------------------------
--------Script and Style Enqueue---------
-----------------------------------------*/
global $dignity_pagenow;
if (!is_admin() AND 'wp-login.php' != $dignity_pagenow) 
{ 

    add_action( 'wp_enqueue_scripts', 'dignity_scripts' );
    add_action( 'wp_enqueue_scripts', 'dignity_styles' );
}

add_action( 'admin_enqueue_scripts', 'dignity_admin_scripts' );
add_action( 'admin_enqueue_scripts', 'dignity_admin_styles' );

if ( is_singular() ) wp_enqueue_script( "comment-reply" );




/*---------------------------------
Important Plugin Activation Check
-----------------------------------*/
function dignity_plugin_error(){
    echo '<div class="error">
       <p>Current theme needs <strong>Dignity-Shortcodes</strong> Plugin to work properly.</p>
    </div>';
}
function metabox_plugin_error(){
    echo '<div class="error">
       <p>Current theme needs <strong>Meta-box</strong> Plugin activated to work properly.</p>
    </div>';
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('dignity-shortcodes/shortcodes.php')) 
{
}
else{
     add_action('admin_notices', 'dignity_plugin_error');
}

//Post formats
add_theme_support(
	'post-formats', array(
		'image',
		'audio',
		'link',
		'quote',
		'video'
	)
);

function dignity_is_home_page(){
	if(is_front_page())
    {
    	if(is_page_template('the-onepage.php'))
    	{	
        	$is_home = true;
    	}
    	else
    	{
    		$is_home = false;
    	}
    }
    else
    {
      $is_home = false;
    }

    return $is_home;
}

function dignity_favicon(){
	
	$options = get_option('dignity_wp');

	if($options['fav_icon'] != '')
    { 

    	$fav_icon = '<link rel="shortcut icon" href="'.$options['fav_icon'].'">';
 
    }
    else
    {
    	$fav_icon = '';
    }

    echo $fav_icon;
}

function dignity_color_scheme(){

	require_once(get_template_directory().'/color-scheme.php');
}

function dignity_custom_style(){

	$options = get_option('dignity_wp');
	$custom_style = '';
	if($options['additional_css'] != '')
	{
	   $custom_style = '<style>'.$options['additional_css'].'</style>';
	}
	
	echo $custom_style;
}


function dignity_IE_fix()
{
	$ie_fix = '<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	  <link href="'. get_stylesheet_directory_uri() .'/stylesheets/ie8.css" rel="stylesheet">
	<![endif]-->';

	return $ie_fix;
}





/*---------------------------------------
---------Customised Menu-----------------
-----------------------------------------*/
function dignity_sliding_menu()
{
	$locations = get_nav_menu_locations();
	$is_home = dignity_is_home_page();

	if ($is_home == false)
	{ 
		$nav_class = " inner-page"; 
		$root_url = site_url();
		$scroll_class = '';
	} 
	else
	{ 
		$nav_class = " front-page"; 
		$root_url = '';
		$scroll_class = 'scroll';
	}

	if(!isset($locations['dignity_nav']))
	{
		$return = '<h3 class="clearfix white-txt '.$nav_class.'">Please configure the navigation menu</h3>';
	}
	else
	{
		$menu = wp_get_nav_menu_object($locations['dignity_nav']);

		$return = '';

		if(empty($menu))
		{
			$return = '<h3 class="clearfix white-txt '.$nav_class.'">Please configure the navigation menu</h3>';
		}

		else
		{
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			
			_wp_menu_item_classes_by_context( $menu_items );

			$return = '<div id="dignity-sliding-navi" class="clearfix dignity-sliding-nav '.$nav_class.'">' . "\n";
			
			$menunu = array();
			foreach((array)$menu_items as $key => $menu_item )
			{
				$menunu[ (int) $menu_item->db_id ] = $menu_item;
			}
			unset($menu_items);

			foreach ( $menunu as $i => $men ){
				if($men->menu_item_parent == '0')
				{
						//Specific additions
						$submenu_icon = '';
						$has_sub_menu = 0;
						foreach ( $menunu as $submenu )
						{
							if($submenu->menu_item_parent == $men->ID)
							{
								$has_sub_menu = 1;
								$submenu_icon = '<span class="submenu-icon">+</span> ';
							}
						}

						if(( 'page' == $men->object ))
						{
				            $incl_onepage = get_post_meta($men->object_id,'one_page',true);
				            $small_title  = strtolower(preg_replace('/\s+/', '-', $men->post_excerpt));

		                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
		                    {
								$href =  $root_url.'#'.$small_title;
								$identifyClass = $scroll_class." is_onepage";
								$link_target = '';
						    }
						    else
						    {
		                       $href = $men->url;
		                       $identifyClass = "not_onepage";
		                       if($men->target != '')
		                       	{
		                       		$link_target = 'target="_blank"';
		                       	}
		                       	else{
		                       		$link_target = '';
		                       	}
						    }				
						} 
						else 
						{
							$href =  $men->url;
							$identifyClass = "not_onepage";
							$small_title  = strtolower(preg_replace('/\s+/', '-', $men->title));
							if($men->target != '')
	                       	{
	                       		$link_target = 'target="_blank"';
	                       	}
	                       	else{
	                       		$link_target = '';
	                       	}
						}
						$return .= '<a href="'. $href .'" '.$link_target.' class="'.$identifyClass.'" data-soffset="0">'.$submenu_icon. $men->title .'</a>';
						
						
						
						if($has_sub_menu == 1)
						{
							$return .= '<div class="submenu-wrap">' . "\n";
						
							foreach ( $menunu as $submenu )
							{
								if($submenu->menu_item_parent == $men->ID)
								{
									if(( 'page' == $submenu->object ))
									{
							            $incl_onepage = get_post_meta($submenu->object_id,'one_page',true);
							            $small_title  = strtolower(preg_replace('/\s+/', '-', $submenu->post_excerpt));

					                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
					                    {
											$href =  $root_url.'#'.$small_title;
											$identifyClass = $scroll_class." is_onepage";
											$link_target = '';
									    }
									    else
									    {
					                       $href = $submenu->url;
					                       $identifyClass = "not_onepage";
					                       if($men->target != '')
					                       	{
					                       		$link_target = 'target="_blank"';
					                       	}
					                       	else{
					                       		$link_target = '';
					                       	}
									    }				
									} 
									else 
									{
										$href =  $submenu->url;
										$identifyClass = "not_onepage";
										$small_title  = strtolower(preg_replace('/\s+/', '-', $submenu->title));
										if($men->target != '')
				                       	{
				                       		$link_target = 'target="_blank"';
				                       	}
				                       	else{
				                       		$link_target = '';
				                       	}
									}
									$return .= '<a href="'. $href .'" '.$link_target.' class="'.$identifyClass.'" data-soffset="0">'. $submenu->title .'</a>';
									
								}
							}
							$return .= '</div>' . "\n";
						}
						
				}
			}
			
			unset($menunu);	
				$return .= '</div>' . "\n";
		}
	}
	echo $return;
}



function dignity_std_nav()
{
	$locations = get_nav_menu_locations();
	$is_home = dignity_is_home_page();

	if ($is_home == false)
	{ 
		$nav_class = " inner-page"; 
		$root_url = site_url();
		$scroll_class = '';
	} 
	else
	{ 
		$nav_class = " front-page"; 
		$root_url = '';
		$scroll_class = 'scroll';
	}

	if(!isset($locations['dignity_nav']))
	{
		$return = '<h3 class="clearfix white-txt '.$nav_class.'">Please configure the navigation menu</h3>';
	}
	else
	{
		$menu = wp_get_nav_menu_object($locations['dignity_nav']);

		$return = '';

		if(empty($menu))
		{
			$return = '<h3 class="clearfix white-txt '.$nav_class.'">Please configure the navigation menu</h3>';
		}

		else
		{
			$menu_items = wp_get_nav_menu_items($menu->term_id);
			
			_wp_menu_item_classes_by_context( $menu_items );

			$return = '<ul id="standard-nav" class="standard-nav visible-lg '.$nav_class.'">' . "\n";
			
			$menunu = array();
			foreach((array)$menu_items as $key => $menu_item )
			{
				$menunu[ (int) $menu_item->db_id ] = $menu_item;
			}
			unset($menu_items);
			
			foreach ( $menunu as $i => $men ){
				if($men->menu_item_parent == '0')
				{
						//Specific additions
						
						$has_sub_menu = 0;
						foreach ( $menunu as $submenu )
						{
							if($submenu->menu_item_parent == $men->ID)
							{
								$has_sub_menu = 1;
								
							}
						}

						if(( 'page' == $men->object ))
						{
				            $incl_onepage = get_post_meta($men->object_id,'one_page',true);
				            $small_title  = strtolower(preg_replace('/\s+/', '-', $men->post_excerpt));

		                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
		                    {
								$href =  $root_url.'#'.$small_title;
								$identifyClass = $scroll_class." is_onepage";
								$link_target = '';
						    }
						    else
						    {
		                       $href = $men->url;
		                       $identifyClass = "not_onepage";
		                       if($men->target != '')
		                       	{
		                       		$link_target = 'target="_blank"';
		                       	}
		                       	else{
		                       		$link_target = '';
		                       	}
						    }				
						} 
						else 
						{
							$href =  $men->url;
							$identifyClass = "not_onepage";
							$small_title  = strtolower(preg_replace('/\s+/', '-', $men->title));
							if($men->target != '')
	                       	{
	                       		$link_target = 'target="_blank"';
	                       	}
	                       	else{
	                       		$link_target = '';
	                       	}
						}
						$return .='<li>';
						$return .= '<a href="'. $href .'" '.$link_target.' class="'.$identifyClass.'" data-soffset="0">'. $men->title .'</a>';
						
						
						
						if($has_sub_menu == 1)
						{
							$return .= '<ul class="submenu-wrap">' . "\n";
						
							foreach ( $menunu as $submenu )
							{
								if($submenu->menu_item_parent == $men->ID)
								{
									if(( 'page' == $submenu->object ))
									{
							            $incl_onepage = get_post_meta($submenu->object_id,'one_page',true);
							            $small_title  = strtolower(preg_replace('/\s+/', '-', $submenu->post_excerpt));

					                    if($incl_onepage == 'yes' OR $incl_onepage == 'Yes')
					                    {
											$href =  $root_url.'#'.$small_title;
											$identifyClass = $scroll_class." is_onepage";
											$link_target = '';
									    }
									    else
									    {
					                       $href = $submenu->url;
					                       $identifyClass = "not_onepage";
					                       if($men->target != '')
					                       	{
					                       		$link_target = 'target="_blank"';
					                       	}
					                       	else{
					                       		$link_target = '';
					                       	}
									    }				
									} 
									else 
									{
										$href =  $submenu->url;
										$identifyClass = "not_onepage";
										$small_title  = strtolower(preg_replace('/\s+/', '-', $submenu->title));
										if($men->target != '')
				                       	{
				                       		$link_target = 'target="_blank"';
				                       	}
				                       	else{
				                       		$link_target = '';
				                       	}
									}
									$return .= '<li><a href="'. $href .'" '.$link_target.' class="'.$identifyClass.'" data-soffset="0">'. $submenu->title .'</a><li>';
									
								}
							}
							$return .= '</ul>' . "\n";
						}
					$return .= '</li>' . "\n";
				}
			}
			
			unset($menunu);	
				$return .= '</ul>' . "\n";
		}
	}
	echo $return;
}





/* CUSTOM EXCERPTS */

function dignity_clean($excerpt, $substr=0) {
		$string = strip_tags(str_replace('[...]', '...', $excerpt));
		if ($substr>0) {
			$string = substr($string, 0, $substr);
		}
		return $string;
	}


/* PAGINATION */
	
	
	function dignity_getpagenavi(){
	?>
	<div id="blog_pagination" class="blog_pagination pad-bottom-medium">
	<?php if(function_exists('wp_pagenavi')) : ?>
	<?php wp_pagenavi(); ?>
	<?php else : ?>
			<div class="older pagenavi-holder"><?php next_posts_link(__('Older Entries','dignitylang')) ?></div>
			<div class="newer pagenavi-holder"><?php previous_posts_link(__('Newer Entries','dignitylang')) ?></div>
			<div class="clear"></div>
	<?php endif; ?>
	
	</div>
	
	<?php
	}




/*---------------------------------------
---------Format comment Callback-----------
-----------------------------------------*/

function format_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="panel clearfix cmntparent <?php
                        $authID = get_the_author_meta('ID');
                                                    
                        if($authID == $comment->user_id)
                           echo "cmntbyauthor";
                       else
                           echo "";
                        ?>">
			<div class="comment">


            				<div class="avatarbox">
            					<?php 
                                $defimg = get_stylesheet_directory_uri(). "/assets/img/human.png";
                                if(get_avatar($comment)):
                                	echo get_avatar($comment,$size='75');
                                else:
                                ?>
                                <img src="<?php echo $defimg; ?>"  alt="avatar" />
            					<?php endif; ?>
            				</div>
            				<div class="cmntbox">
            					<?php printf(__('<h4 class="">%s</h4>'), get_comment_author_link()) ?>
            					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
            					
            					<?php edit_comment_link(__('Edit','dignitylang'),'<span class="edit-comment">', '</span>'); ?>
                                
                                <?php if ($comment->comment_approved == '0') : ?>
                   					<div class="alert-box success">
                      					<?php _e('Your comment is awaiting moderation.','dignitylang') ?>
                      				</div>
            					<?php endif; ?>
                                
                                <?php comment_text() ?>
                                
                                <!-- removing reply link on each comment since we're not nesting them -->
            					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                            </div>


			</div>
		</article>

<?php
}
function awesome_comment_form_submit_button($button) 
{
	$button =
		'<input name="submit" type="submit" class="form-submit" tabindex="5" id="[args:id_submit]" value="[args:label_submit]" />' .
		get_comment_id_fields();
	return $button;
}
add_filter('comment_form_submit_button', 'awesome_comment_form_submit_button');

function dignity_get_rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}



function dignity_gradient($HexFrom, $HexTo, $ColorSteps) {
  $FromRGB['r'] = hexdec(substr($HexFrom, 0, 2));
  $FromRGB['g'] = hexdec(substr($HexFrom, 2, 2));
  $FromRGB['b'] = hexdec(substr($HexFrom, 4, 2));

  $ToRGB['r'] = hexdec(substr($HexTo, 0, 2));
  $ToRGB['g'] = hexdec(substr($HexTo, 2, 2));
  $ToRGB['b'] = hexdec(substr($HexTo, 4, 2));

  $StepRGB['r'] = ($FromRGB['r'] - $ToRGB['r']) / ($ColorSteps - 1);
  $StepRGB['g'] = ($FromRGB['g'] - $ToRGB['g']) / ($ColorSteps - 1);
  $StepRGB['b'] = ($FromRGB['b'] - $ToRGB['b']) / ($ColorSteps - 1);

  $GradientColors = array();

  for($i = 0; $i <= $ColorSteps; $i++) {
    $RGB['r'] = floor($FromRGB['r'] - ($StepRGB['r'] * $i));
    $RGB['g'] = floor($FromRGB['g'] - ($StepRGB['g'] * $i));
    $RGB['b'] = floor($FromRGB['b'] - ($StepRGB['b'] * $i));

    $HexRGB['r'] = sprintf('%02x', ($RGB['r']));
    $HexRGB['g'] = sprintf('%02x', ($RGB['g']));
    $HexRGB['b'] = sprintf('%02x', ($RGB['b']));

    $GradientColors[] = implode(NULL, $HexRGB);
  }
  $GradientColors = array_filter($GradientColors, "len");
  return $GradientColors;
}

function len($val){
  return (strlen($val) == 6 ? true : false );
}

?>