<?php do_action('ter_redirect') ?><!DOCTYPE html>
<!--[if IE 6]><html id="ie6" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html id="ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes() ?>><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes() ?>>
<!--<![endif]-->
<head>
<title><?php ter_title() ?></title>
<meta charset="<?php bloginfo('charset') ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url') ?>">
<?php if(is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply') ?>
<?php wp_head() ?>
<?php do_action('ter_head') ?>
<!--[if lt IE 9]>
	<script src="<?php echo TER_JS ?>html5.js" type="text/javascript"></script>
    <script src="<?php echo TER_JS ?>respond.min.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript">
//jQuery Mobile
jQuery(document).on("mobileinit", function(){ jQuery.extend(jQuery.mobile,{ ajaxEnabled: false, pushStateEnabled: false,autoInitializePage: false });
    }); </script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.min.js'></script>
<script type='text/javascript'>
//Typekit Load
  (function() {
    var config = {
      kitId: 'aco6yvg',
      scriptTimeout: 3000
    };
    var h = document.getElementsByTagName('html')[0];
    h.className += ' wf-loading';
    var t = setTimeout(function() {
      h.className = h.className.replace(/(\s|^)wf-loading(\s|$)/g, ' ');
      h.className += ' wf-inactive';
    }, config.scriptTimeout);
    var d = false;
    var tk = document.createElement('script');
    tk.src = '//use.typekit.net/' + config.kitId + '.js';
    tk.type = 'text/javascript';
    tk.async = 'true';
    tk.onload = tk.onreadystatechange = function() {
      var rs = this.readyState;
      if (d || rs && rs != 'complete' && rs != 'loaded') return;
      d = true;
      clearTimeout(t);
      try { Typekit.load(config); } catch (e) {}
    };
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(tk, s);
  })();
</script>
<script type="text/javascript">jQuery(function () { jQuery('[data-toggle="tooltip"]').tooltip()})</script>
</head>
<body <?php body_class() ?>>
<div id="page-wrap"><!-- Closes in footer -->
	<div id="page">
		<?php ter_nav('slide','header','navbar-default navbar-static-top header-navbar') //See 'terra/includes/template-tags.php' for nav options ?>