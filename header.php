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
<script>
  (function(d) {
    var config = {
      kitId: 'aco6yvg',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<script type="text/javascript">
//jQuery Mobile
jQuery(document).on("mobileinit", function(){ jQuery.extend(jQuery.mobile,{ ajaxEnabled: false, pushStateEnabled: false,autoInitializePage: false });
    }); </script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.min.js'></script>
<meta name="google-site-verification" content="MFDDM8eAIcEdoueliJAs7aPWprNwzJVpqkz3iP9oj6Q" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88087151-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body <?php body_class() ?>>
<div id="page-wrap"><!-- Closes in footer -->
	<div id="page">
		<?php ter_nav('slide','header','navbar-default navbar-static-top header-navbar') //See 'terra/includes/template-tags.php' for nav options ?>