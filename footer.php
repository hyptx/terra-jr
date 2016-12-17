		<?php ter_branding() ?>
		<?php ter_cta_sidebar(2000,500) ?>
		<div id="color-bar" class="theme-bg-color"></div>
		<footer id="colophon">
			<div id="theme-options">			
				<?php
				global $theme_cookie;
				$theme_cookie->print_form('kuesuto_theme',30,'6B7FA9','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'647857','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'8B628E','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'8B765C','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'B7AF90','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'9DC691','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'53A8B0','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'559BE4','submit',$_SERVER['REQUEST_URI']);
				?>			
			</div>		
			<div class="container">	
				<div class="row hidden-xs">					
					<div class="col-sm-12"><div id="copyright"><a href="/sitemap/">Sitemap</a><span>&nbsp;&nbsp;|&nbsp;&nbsp;</span><?php echo TER_COPYRIGHT ?></div></div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer>
		<?php ter_nav('standard','footer','navbar-default navbar-static-bottom') ?>	
		<?php ter_back_to_top(1000,500) ?>	
	</div><!-- /#page -->
</div><!-- /#page-wrap - Opens in header -->
<?php do_action('ter_footer') ?>
<?php wp_footer() ?>
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
</body>
</html>