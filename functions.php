<?php /* Child Theme */

/* Define Constants Function - DO NOT MODIFY >~~~~~~~~~~> */
function ter_define_constants($constants){ foreach($constants as $key => $value) if(!defined($key)) define($key,$value); }
$ter_dir = get_bloginfo('stylesheet_directory');//Child theme is always 'stylesheet_directory'
/* <~~~~~~~~~~< END Define Constants Function */

/* Parent Theme Directories ~~> */
ter_define_constants(array(
	'TER_CHILD' => 			$ter_dir . '/',
	'TER_CHILD_CSS' => 		$ter_dir . '/css/',
	'TER_CHILD_GRAPHICS' => $ter_dir . '/graphics/',
	'TER_CHILD_INCLUDES' =>	dirname(__FILE__) . '/includes/',
	'TER_CHILD_JS' => 		$ter_dir . '/js/'
));

/* Theme Options - See README.md for your release: https://github.com/hyptx/terra >~~~~~~~> */
ter_define_constants(array(
	/* System */
	'TER_ERROR_DISPLAY_ON' => 		false,
	'TER_CDN_URL' => 				'//cdnjs.cloudflare.com/ajax/libs/',
	'TER_JQUERY_VERSION' => 		'1.9.1',//GF Compatibility issue with 3.0
	'TER_BOOTSTRAP_VERSION' => 		'3.3.7',
	'TER_BS_IMG_RESPONSIVE' => 		'article img,.widget img',
	'TER_GOOGLE_FONT' => 			'Open+Sans:400,400italic,600,600italic',	
	/* Layout */
	'TER_LOGO' => 					$ter_dir . '/graphics/logo.png',
	'TER_HEADER_HOME_LINK' => 		'title',
	'TER_FULL_WIDTH_CLASS' => 		'col-sm-12',
	'TER_PRIMARY_CLASS' => 			'col-sm-8',
	'TER_SECONDARY_CLASS' => 		'col-sm-4',
	'TER_SECONDARY' => 				'right',
	'TER_SIDEBARS' => 				'Blog Sidebar,Page Sidebar',
	/* Wordpress */
	'TER_ADD_HOME_LINK' => 			false,
	'TER_ADMIN_BAR' => 				'editor',
	'TER_ADMIN_BAR_LOGIN' => 		false,
	'TER_COMMENTS' => 				false,
	'TER_DISABLE_VISUAL_EDITOR' =>  false,
	'TER_EXCERPT' => 				false,
	'TER_EXCERPT_LEN' => 			40,
	'TER_TITLE_FORMAT_DEFAULT' => 	false,
	'TER_MAX_IMAGE_SIZE_KB' => 		640,
	'TER_WP_POST_FORMATS' => 		false,
	'TER_GF_BUTTON_CLASS' =>		'btn btn-info',
	'TER_COPYRIGHT' =>				'&copy; ' . date('Y ') . get_bloginfo('name'),
	/* Features */
	'TER_ACTIVATE_BACK_TO_TOP' => 	false,
	'TER_ACTIVATE_BRANDING' => 		false,
	'TER_ACTIVATE_BREADCRUMBS' => 	false,
	'TER_ACTIVATE_CUSTOM_SIDEBAR' =>false,
	'TER_ACTIVATE_FAVICONS' => 		false,
	'TER_ACTIVATE_RETINA_JS' => 	false,
	'TER_ACTIVATE_SITE_MOVED' => 	false,
	'TER_ACTIVATE_SMTP' => 			false,
	'TER_ACTIVATE_SLIDER' => 		false,
	'TER_ACTIVATE_WAYPOINTS' => 	false,	
	/* SMTP TER_ACTIVATE_SMTP - Test: ter_test_email('webmaster@atrainmarketing.com') */
	'TER_SMTP_HOST' => 				'smtp.gmail.com',
	'TER_SMTP_PORT' => 				465,
	'TER_SMTP_USERNAME' => 			'',
	'TER_SMTP_PASSWORD' => 			'',
	'TER_SMTP_ENCRYPTION' => 		'ssl',//ssl or tls
	'TER_SMTP_FROM_NAME' => 		'',
	/* Experimental */
	'TER_ACTIVATE_SKROLLR' => 		false
));
/* END <~~~~~~~< Theme Options */

/* Enqueue Styles - Load theme css ~~> */
function ter_enqueue_styles(){
	if(is_admin() && !is_404()) return;	
	wp_enqueue_style('ter_styles',TERRA . 'style.css');
	wp_enqueue_style('ter_child_styles',TER_CHILD . 'style.css',array('ter_styles'));
}

/* Load Custom Functions - Add extras or overwrites in this file ~~~~> */
require(TER_CHILD_INCLUDES . 'functions-custom.php');
?>