<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<?php the_post() ?>
<?php require(TER_CHILD_INCLUDES . 'kana-generator.php') ?>
<?php $kana_generator = new KanaGenerator('katakana') ?>
<header id="app-header" class="theme-bg-color">
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><h1 class="app-title h-balance-margin"><?php the_title() ?></h1></div>
		</div>
	</div>
	<?php $kana_generator->print_resize_buttons(false,false) ?>
</header><!-- .page-header -->
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?> no-pad practice-page">
			<div id="content" role="main">								
				<div id="post-<?php the_ID() ?>" <?php post_class() ?>>					
					<div class="entry-content">
						<?php the_content() ?>						
						<?php $kana_generator->print_practice_sheet() ?>
					</div><!-- .entry-content -->
				</div><!-- #post-<?php the_ID() ?> -->
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>