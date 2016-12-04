<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<header id="app-header" class="theme-bg-color">
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><h1 class="app-title h-balance-margin"><?php the_title() ?></h1></div>
		</div>
	</div>
</header><!-- .page-header -->
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','page') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php ter_breadcrumbs() ?>
				<?php get_template_part('content','page') ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','page') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>