<?php

$theme_cookie = new ThemeCookie();
//$theme_cookie->delete_cookie('cta');

class ThemeCookie{
	private $_set_cookie_url;
	public function __construct(){ $this->_set_cookie_url = get_bloginfo('template_directory') . '/set-cookie.php';	}
	
	public function print_form($id,$days,$value,$submit,$redirect = '/'){?>
		<form id="<?php echo 'kuesuto_theme_' . $id . '_' . $value ?>" action="<?php echo $this->_set_cookie_url ?>" enctype="multipart/form-data" method="get" class="kuesuto_theme_form">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<input type="hidden" name="days" value="<?php echo $days ?>">
			<input type="hidden" name="value" value="<?php echo $value ?>">
			<input type="submit" name="submit" value="" style="background: #<?php echo $value ?>">
			<input type="hidden" name="redirect" value="<?php echo $redirect ?>">
		</form>
		<?php
	}
	
	public function get_set_cookie_url(){ return $this->_set_cookie_url; }	
	public function get_cookie($id){ $exploded_cookie = explode(',',$_COOKIE['ter_cookie_' . $id]);	return $exploded_cookie; }	
	public function delete_cookie($id){ unset($_COOKIE['ter_cookie_' . $id]); setcookie('ter_cookie_' . $id,'',time() -3600,'/' ); }
}

function ter_navbar_slide($location,$nav_class,$fallback){
	if(!has_nav_menu($location) && $fallback == false) return;
	?>	
	<nav id="<?php echo $location ?>-nav" class="ter-navbar navbar slide-collapse-nav <?php echo $nav_class ?>">
		<div class="container">		
			<div id="<?php echo $location ?>-slide-collapse" class="slide-collapse" role="navigation">
				<ul id="<?php echo $location ?>-nav-ul" class="nav navbar-nav slide-collapse-ul">
				    <li class="hidden-xs"><a href="/" id="desktop-logo" class="inline-block theme-color"><h2 id="site-title" class="nihongo" data-placement="bottom" title="Kuesuto.org">クエスト</h2></a></li>
					<?php wp_nav_menu(array('fallback_cb' => 'ter_navbar_fallback','theme_location' => $location,'container' => false,'items_wrap' => '%3$s','walker' => new TerWalkerNavMenu())) ?>
				</ul>
			</div>			
			<div class="navbar-header text-center relative visible-xs">
				<button type="button" class="navbar-toggle absolute" onclick="terNavAnimate('#<?php echo $location ?>-slide-collapse','<?php echo $location ?>'); return false;"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<!-- For Image Button, comment out button above -->
				<!--<a href="#" class="navbar-toggle-image absolute" onclick="terNavAnimate('#<?php echo $location ?>-slide-collapse','<?php echo $location ?>'); return false;"><img src="<?php echo TER_GRAPHICS ?>btn-menu.png" class="menu-button" alt="Open Menu"></a>-->
				<a href="/" id="mobile-logo" class="inline-block theme-color" title="Kuesuto.org"><h2 id="site-title" class="nihongo">クエスト</h2></a>            
			</div>					
		</div>
	</nav>
    <?php
}

/* <~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~< Extras >~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~> */

/* Custom Post Types - Uncomment to start creating easy CTP's ~~~~> */
/*
require(TER_CHILD_INCLUDES . 'custom-post-type.php');//Load Parent Class
require(TER_CHILD_INCLUDES . 'custom-post-type-skeleton.php');//Load a starter skeleton CPT
*/

/* Enqueue Scripts - Uncomment to load js/scripts.js ~~~~> */
/*
function ter_enqueue_child_scripts(){
	wp_enqueue_script('ter_child_scripts',TER_CHILD_JS . 'scripts.js',array('ter_scripts'));
}
add_action('wp_print_scripts','ter_enqueue_child_scripts',101);
*/

/* Child Shortcode System - Uncomment to add custom shortcodes ~~~~> */
/*
//Shortcode callback
function ter_gray_box( $atts, $content = null ){ return '<div class="gray-box">' . do_shortcode($content) . '</div>'; }
add_shortcode('gray-box','ter_gray_box');

//Prevent autop from breaking nested shortcodes by adding it to this array
$ter_child_shortcodes_for_filter = array('gray-box');
*/

/* Child Help - Uncomment to add custom theme help ~~~~> */
/*
//Custom Shortcode section
$ter_child_shortcodes = array('[gray-box]' => 'A gray box with rounded corners');

//Main section
$ter_child_help = array('Help Section Title' => '<p>This is a paragraph of help text</p>','Help Section Title 2' => '<p>This is a paragraph of help text 2</p>');
*/
?>