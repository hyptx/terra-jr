<?php /* Template Name: Home */ ?>
<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','home') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php get_template_part('content','home') ?>
			</div><!-- /#content -->
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','home') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>