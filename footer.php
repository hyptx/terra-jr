		<?php ter_branding() ?>
		<?php ter_cta_sidebar(2000,500) ?>
		<nav id="page-nav" role="contentinfo" class="theme-bg-color">
			<div class="container">	
				<div class="row">
					<div class="col-sm-2">&nbsp;</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</nav>
		<footer id="colophon">
			<div id="theme-options">			
				<?php
				global $theme_cookie;
				$theme_cookie->print_form('kuesuto_theme',30,'6B7FA9','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'647857','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'8B628E','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'8B765C','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'DAD4BD','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'9DC691','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'53A8B0','submit',$_SERVER['REQUEST_URI']);
				$theme_cookie->print_form('kuesuto_theme',30,'559BE4','submit',$_SERVER['REQUEST_URI']);
				?>			
			</div>		
			<div class="container">	
				<div class="row hidden-xs">					
					<div class="col-sm-12"><div id="copyright"><?php echo TER_COPYRIGHT ?></div></div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer>
		<?php ter_nav('standard','footer','navbar-default navbar-static-bottom') ?>	
		<?php ter_back_to_top(1000,500) ?>	
	</div><!-- /#page -->
</div><!-- /#page-wrap - Opens in header -->
<?php do_action('ter_footer') ?>
<?php wp_footer() ?>
</body>
</html>