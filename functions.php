<?php /* Child Theme */

/* Define Constants Function - DO NOT MODIFY >~~~~~~~~~~> */
function terx_define_constants($constants){ foreach($constants as $key => $value) if(!defined($key)) define($key,$value); }
$terx_dir = get_bloginfo('stylesheet_directory');//Child theme is always 'stylesheet_directory'
/* <~~~~~~~~~~< END Define Constants Function */

/* Parent Theme Directories ~~> */
terx_define_constants(array(
	'TERX_CHILD' => 			$terx_dir . '/',
	'TERX_CHILD_CSS' => 		$terx_dir . '/css/',
	'TERX_CHILD_GRAPHICS' => $terx_dir . '/graphics/',
	'TERX_CHILD_INCLUDES' =>	dirname(__FILE__) . '/includes/',
	'TERX_CHILD_JS' => 		$terx_dir . '/js/'
));

/* Theme Options - See README.md for your release: https://github.com/hyptx/terra-jr >~~~~~~~~> */
terx_define_constants(array(
	/* System */
	'TERX_ERROR_DISPLAY_ON' => 		false,
	'TERX_CDN_URL' => 				'//cdnjs.cloudflare.com/ajax/libs/',
	'TERX_JQUERY_VERSION' => 		'1.9.1',//GF Compatibility issue with 3.0
	'TERX_BOOTSTRAP_VERSION' => 		'4.1.3',
	'TERX_POPPER_VERSION' =>			'1.14.3',
	'TERX_BS_IMG_RESPONSIVE' => 		'article img,.widget img',
	'TERX_GOOGLE_FONT' => 			'Open+Sans:400,400italic,600,600italic',	
	/* Layout */
	'TERX_LOGO' => 					$terx_dir . '/graphics/logo.png',
	'TERX_HEADER_HOME_LINK' => 		'title',
	'TERX_FULL_WIDTH_CLASS' => 		'col-12',
	'TERX_PRIMARY_CLASS' => 			'col-md-8 col-lg-9',
	'TERX_SECONDARY_CLASS' => 		'col-md-4 col-lg-3',
	'TERX_SECONDARY' => 				'right',
	'TERX_SIDEBARS' => 				'Blog Sidebar,Page Sidebar',
	/* Wordpress */
	'TERX_ADD_HOME_LINK' => 			false,
	'TERX_ADMIN_BAR' => 				'editor',
	'TERX_ADMIN_BAR_LOGIN' => 		false,
	'TERX_COMMENTS' => 				false,
	'TERX_DISABLE_VISUAL_EDITOR' =>  false,
	'TERX_EXCERPT' => 				false,
	'TERX_EXCERPT_LEN' => 			40,
	'TERX_TITLE_FORMAT_DEFAULT' => 	false,
	'TERX_MAX_IMAGE_SIZE_KB' => 		640,
	'TERX_WP_POST_FORMATS' => 		false,
	'TERX_GF_BUTTON_CLASS' =>		'btn btn-info',
	'TERX_COPYRIGHT' =>				'&copy; ' . date('Y ') . get_bloginfo('name') . ' - ' . 'Design by <a target="_blank" href="https://hyperspatial.com">Hyperspatial Design Ltd</a>',
	/* Google - Entering a value will create the google snippets dynamically */
	'TERX_GOOGLE_ANALYTICS_UA_NO' => '',
	'TERX_GOOGLE_ADWORDS_CONV_ID' => '',
	'TERX_GTM_CONTAINER_ID' => 		'',
	/* Features */
	'TERX_ACTIVATE_BACK_TO_TOP' => 	false,
	'TERX_ACTIVATE_BRANDING' => 		false,
	'TERX_ACTIVATE_BREADCRUMBS' => 	false,
	'TERX_ACTIVATE_CUSTOM_SIDEBAR' =>false,
	'TERX_ACTIVATE_FAVICONS' => 		false,
	'TERX_ACTIVATE_RETINA_JS' => 	false,
	'TERX_ACTIVATE_SITE_MOVED' => 	false,
	'TERX_ACTIVATE_SMTP' => 			false,
	'TERX_ACTIVATE_SLIDER' => 		false,
	'TERX_ACTIVATE_WAYPOINTS' => 	false,
	/* SMTP TERX_ACTIVATE_SMTP - Use Google API for Gmail - Test: terx_test_email('adam@hyperspatial.com') */
	'TERX_SMTP_HOST' => 				'smtp.gmail.com',
	'TERX_SMTP_PORT' => 				465,
	'TERX_SMTP_USERNAME' => 			'',
	'TERX_SMTP_PASSWORD' => 			'',
	'TERX_SMTP_ENCRYPTION' => 		'ssl',//ssl or tls
	'TERX_SMTP_FROM_NAME' => 		'',
	/* Experimental */
	'TERX_ACTIVATE_SKROLLR' => 		false
));
/* END <~~~~~~~~< Theme Options */

/* Enqueue Styles - Load theme css ~~> */
function terx_enqueue_styles(){
	if(is_admin() && !is_404()) return;	
	wp_enqueue_style('terx_styles',TERRA . 'style.css');
	wp_enqueue_style('terx_child_styles',TERX_CHILD . 'style.css',array('terx_styles'));
}

/* Load Custom Functions - Add extras or overwrites in this file ~~~~> */
require(TERX_CHILD_INCLUDES . 'functions-custom.php');
?>