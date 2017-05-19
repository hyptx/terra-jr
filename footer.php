		<?php ter_branding() ?>
		<?php ter_cta_sidebar(2000,500) ?>
		<footer id="colophon" role="contentinfo" class="home-footer">
			<div class="container">	
				<div id="footer-nav-row-1" class="row footer-nav-row none">
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 1</a><?php //wp_nav_menu(array('menu' => 'Footer 1')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 2</a><?php //wp_nav_menu(array('menu' => 'Footer 2')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 3</a><?php //wp_nav_menu(array('menu' => 'Footer 3')) ?></div>
				</div><!-- /.row -->
				<div id="footer-nav-row-2" class="row footer-nav-row none">
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 4</a><?php //wp_nav_menu(array('menu' => 'Footer 4')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 5</a><?php //wp_nav_menu(array('menu' => 'Footer 5')) ?></div>
					<div class="col-xs-12 col-sm-4 footer-nav-col"><a href="#">Footer 6</a><?php //wp_nav_menu(array('menu' => 'Footer 6')) ?></div>
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12"><div id="copyright"><?php echo TER_COPYRIGHT ?></div></div>
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