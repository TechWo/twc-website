<?php 
	$dignity_options = get_option('dignity_wp');

	$rgb_code = dignity_get_rgb($dignity_options['highlight_color']);

	$rgb = $rgb_code[0].','.$rgb_code[1].','.$rgb_code[2];

	$menu_main = str_replace("#", "", $dignity_options['highlight_color']);
	$grad = dignity_gradient($menu_main,'FFFFFF',30);
	if($dignity_options['home_bg_img'] == '')
	{
		$static_bg = get_stylesheet_directory_uri().'/images/bg/01.jpg';
	}
	else
	{
		$static_bg = $dignity_options['home_bg_img'];
	}
	
?>
	<style>
		
		#masthead{
			background-color: rgba(0,0,0,<?php echo $dignity_options['navbar_opacity']; ?>);
		}

		.video-poster-image {
			background:url('<?php echo $static_bg;?>') no-repeat !important;
		}

		
		::selection {
			background: <?php echo $dignity_options['highlight_color'];?>; /* Safari */
			color: #fff;
		}
		::-moz-selection {
			background: <?php echo $dignity_options['highlight_color'];?>; /* Firefox */
			color: #fff;
		}
		.color-high{
			color: <?php echo $dignity_options['highlight_color'];?>;
		}
		.footer-top a:hover{
			color: <?php echo $dignity_options['highlight_color'];?>;
		}

		.project-info-tag > span{
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		#control_buttons a:hover {
		    color: <?php echo $dignity_options['highlight_color'];?>;
		border:solid 3px <?php echo $dignity_options['highlight_color'];?>;
		}
		#item_slider .flex-direction-nav li a:hover {
		    border: solid 2px <?php echo $dignity_options['highlight_color'];?>;
		    color: <?php echo $dignity_options['highlight_color'];?>;
		}
		div#portfolio_thumbs ul li div.item_info h3 {
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		div#portfolio_thumbs ul li div.item_info {
		    background: <?php echo $dignity_options['highlight_color'];?> url('<?php echo get_stylesheet_directory_uri();?>/images/icons/open.png') center center no-repeat;
		}

		ul#portfolioFilter li.active-filter {
		     background: <?php echo $dignity_options['highlight_color'];?>;
		     border:solid 1px <?php echo $dignity_options['highlight_color'];?>;
		}

		ul#portfolioFilter li:hover {
		     background: <?php echo $dignity_options['highlight_color'];?>;
		     border:solid 1px <?php echo $dignity_options['highlight_color'];?>;
		}
		.team-info{
			border-bottom: 8px solid <?php echo $dignity_options['highlight_color'];?>;
		}
		.item:hover > a > .thumb-title{
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.services-expansion{
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.liner-small > span{
			background: <?php echo $dignity_options['highlight_color'];?>;
		}

		.liner > span{
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.promo-heading{
			border-top: solid 1px <?php echo $dignity_options['highlight_color'];?>;
			border-bottom: solid 1px <?php echo $dignity_options['highlight_color'];?>;
		}
		.contact-alert .alert{
			background: <?php echo $dignity_options['highlight_color'];?>;
			color: #FFF;
			font-family: "OpenSansRegular";
		    font-size: 20px;
		    line-height: 31px;
		    text-transform: capitalize;
		}
		.cl-effect-10 a::before {
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.pace .pace-progress {
		  background: <?php echo $dignity_options['highlight_color'];?>;
		  }
		.menu a:hover, .menu a.active {
			background:<?php echo $dignity_options['highlight_color'];?>;
			color: #FFF;
		}

		.top-banner-caption-v1 h3 > span{
			border-bottom: solid 4px <?php echo $dignity_options['highlight_color'];?>;
		}
		.top-banner-caption-v2 h3 > span{
			color: #fff;
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.top-banner-caption-v3 h3 > span{
			color: #fff;
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.top-banner-caption-v4 h3 > span{
			color: #fff;
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.top-banner-caption-v5 h3 > span{
			color: #fff;
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.top-banner-caption-v9{
			background: <?php echo $dignity_options['highlight_color'];?> !important;
		}
		.btn-rounded-color:hover{
			color: #fff !important;
			background: <?php echo $dignity_options['highlight_color'];?> !important;
			border: solid 2px <?php echo $dignity_options['highlight_color'];?> !important;
		}

		.top-banner-caption-v6 h3 > span{
			color: #fff;
			background: <?php echo $dignity_options['highlight_color'];?>;
		}
		.btn-rounded-color2{
			color: #fff !important;
			background: <?php echo $dignity_options['highlight_color'];?> !important;
			border: solid 2px <?php echo $dignity_options['highlight_color'];?> !important;
		}
		.btn-rounded-color2:hover{
			color: #fff !important;
			background: #121212 !important;
			border: solid 2px #121212 !important;
		}

		/*.services-icon-wrap-yellow > .service-icon.current{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/triangle-yellow.png') center bottom no-repeat;
		}*/
		.services-icon-wrap-yellow > .service-icon.current{
			position: relative;
		}

		.services-icon-wrap-yellow > .service-icon.current::before{
			content: "";
			position: absolute;
			width: 30px;
			height: 30px;
			display: inline-block;
			left: 43%;
			bottom: -15px;
			background: <?php echo $dignity_options['highlight_color'];?>;
			z-index: 1;
			transform: rotate(45deg);
			-ms-transform: rotate(45deg); /* IE 9 */
			-webkit-transform: rotate(45deg); /* Safari and Chrome */
			-moz-transform: rotate(45deg); 
			-o-transform: rotate(45deg); 
		}

		.services-icon-wrap-red > .service-icon.current{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/triangle-red.png') center bottom no-repeat;
		}

		.services-icon-wrap-green > .service-icon.current{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/triangle-green.png') center bottom no-repeat;
		}

		.services-icon-wrap-blue > .service-icon.current{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/triangle-blue.png') center bottom no-repeat;
		}

		.testimonial-carousel-yellow{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/bg/testimonials-yellow.jpg') center center repeat;
		}
		.testimonial-carousel-red{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/bg/testimonials-red.jpg') center center repeat;
		}
		.testimonial-carousel-green{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/bg/testimonials-green.jpg') center center repeat;
		}
		.testimonial-carousel-blue{
			background: url('<?php echo get_stylesheet_directory_uri();?>/images/bg/testimonials-blue.jpg') center center repeat;
		}
		.standard-nav li > a.highlighted{
			color: <?php echo $dignity_options['highlight_color'];?> !important;
		}

		.standard-nav li > a:hover{
			color: <?php echo $dignity_options['highlight_color'];?> !important;
		}
		.det-overlay{
			background: <?php echo $dignity_options['highlight_color'];?> url('<?php echo get_stylesheet_directory_uri();?>/images/zoom.png') center center no-repeat;
		}
		.highlight-bg{background: <?php echo $dignity_options['highlight_color'];?>;}
		.highlight-txt, .highlight-txt *{color: <?php echo $dignity_options['highlight_color'];?> !important;}
		.btn-rounded:hover{
			background: <?php echo $dignity_options['highlight_color'];?> !important;
			border-color: <?php echo $dignity_options['highlight_color'];?> !important;
			color: #FFF !important;
			-webkit-transition: all .8s linear;
			   -moz-transition: all .8s linear;
				-ms-transition: all .8s linear;
				 -o-transition: all .8s linear;
					transition: all .8s linear;
		}
		.btn-rounded.highlight-btn{
			background: <?php echo $dignity_options['highlight_color'];?> !important;
			color: #FFF !important;
			border: none !important;
		}
		.btn-rounded.highlight-btn:hover{
			background: #121212 !important;
			border-color: #121212 !important;
		}
		.border-top-medium{ border-top: <?php echo $dignity_options['highlight_color'];?> solid 4px;}
		.border-bottom-medium{border-bottom: <?php echo $dignity_options['highlight_color'];?> solid 4px;}
		.border-top-thin{ border-top: <?php echo $dignity_options['highlight_color'];?> solid 2px;}
		.border-bottom-thin{border-bottom: <?php echo $dignity_options['highlight_color'];?> solid 2px;}
		.border-top-light{ border-top: <?php echo $dignity_options['highlight_color'];?> solid 1px;}
		.border-bottom-light{border-bottom: <?php echo $dignity_options['highlight_color'];?> solid 1px;}


		.dignity-sandbox-controls a{background: <?php echo $dignity_options['highlight_color'];?>;}
		.md-overlay{background: rgba(<?php echo $rgb;?>,0.8) url('<?php echo get_stylesheet_directory_uri();?>/images/modal-loader.gif') center center no-repeat;}
		
		.highlighted .price-plan-header{background: <?php echo $dignity_options['highlight_color'];?> !important;}
		.price-button:hover{color: #FFF; background: <?php echo $dignity_options['highlight_color'];?>; border: <?php echo $dignity_options['highlight_color'];?> solid 1px;}

		/*calendar*/

		#wp-calendar{
			width:100%;
			padding: 0px 0px;
			margin:0px 0px;
			border: <?php echo $dignity_options['highlight_color']; ?> solid 3px !important;
			color: #FFF !important;
			
			
		}
		#calendar_wrap{

			margin:0px auto;
			margin-top: 40px;
			
		}

		#wp-calendar caption{
			padding: 10px 5px 10px 5px ;
			font-size:22px;
			color:#FFF;
			text-transform: uppercase;
			border-bottom: rgba(0,0,0,.2) solid 3px;
			background: <?php echo $dignity_options['highlight_color']; ?> !important;
			
		}
		#wp-calendar thead{
			margin-bottom: 10px;
			background: <?php echo $dignity_options['highlight_color']; ?> !important;
		}
		
		#wp-calendar th{
			color: #FFF !important;
			
		}

		#wp-calendar th, #wp-calendar td{
			padding: 5px;
			text-align:center;
			
			background: #<?php echo $grad[4]; ?>;
		}
		#wp-calendar td{
			color:<?php echo $dignity_options['highlight_color']; ?> !important;
		}

		#wp-calendar td a{

			padding: 0px;
			border:none;
			color:#<?php echo $grad[4]; ?>;
			
		}
		#wp-calendar td a:hover{text-shadow:0px 0px 6px #FFF; text-decoration: none;}
		#wp-calendar td{
			background:transparent;
			border:none;
			color:#CCC;
		}
		#wp-calendar td, table#wp-calendar th{
			padding: 2px 0;
		}

		#searchform input[type="text"], #comments-form input[type="text"], #comments-form textarea
		{
		    border-radius:0px;
		    border: 1px solid <?php echo $dignity_options['highlight_color']; ?> !important;
		    color: <?php echo $dignity_options['highlight_color']; ?> !important;
		    font-family: "OpenSansLight";
		    font-size: 16px;
		    font-weight: normal;
		    line-height: 27px;
		    padding: 11px 10px;
		    width: 60%;
		    box-shadow: none !important;
		    margin-top: 10px;
		}

		#comments-form textarea{
			width: 100% !important;
		}

		@-moz-document url-prefix(){
			#searchform input[type="text"]{
				padding: 14px 10px !important;
			}
			.sidebar .dignity-button {padding:14px 14px !important;}
		}
		#searchform .dignity-button{
			border: 0px; 
			margin-top: 0px;
			border: 4px solid <?php echo $dignity_options['highlight_color']; ?>;
			background: <?php echo $dignity_options['highlight_color']; ?>;
			color: #FFF !important;
		}
		.sidebar ul li a:hover{color: <?php echo $dignity_options['highlight_color']; ?>;}
		.featured_attr{padding: 7px 10px; background: <?php echo $dignity_options['highlight_color']; ?>; color: #FFF;}
		.featured_attr a{color: #FFF !important;}
		.cmntbox a:hover, .post-tags a:hover{color: <?php echo $dignity_options['highlight_color']; ?>;}
		.logged-in-as a:hover{color: <?php echo $dignity_options['highlight_color']; ?> !important;}
		#comments-form .form-submit #post-comment:hover{background: <?php echo $dignity_options['highlight_color']; ?>;}
		.post-tags{border-top: #EEE solid 2px; padding-top: 15px;}
		.dignity-button:hover{
			border: 1px solid <?php echo $dignity_options['highlight_color']; ?>;
			background: <?php echo $dignity_options['highlight_color']; ?>;
			color: #FFF !important;
		}
		.post-type-quote { border-left: 5px solid <?php echo $dignity_options['highlight_color']; ?> !important; }
		.post-type-link{background: <?php echo $dignity_options['highlight_color']; ?> !important;}
	</style>