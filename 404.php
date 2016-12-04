<?php get_header() ?>
<header id="app-header" class="theme-bg-color">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="app-title h-balance-margin"><?php _e('Not Found','terra') ?></h1>
			</div>
		</div>
	</div>
</header><!-- .page-header -->
<div id="main" class="container">
	<div id="main-row" class="row">
		<?php ter_get_sidebar('left','blog') ?>
		<div id="primary" class="<?php echo TER_PRIMARY_CLASS ?>">
			<div id="content" role="main">
				<article id="post-0" class="post error404 not-found">
					
					<div class="entry-content">
						<p class="alert alert-warning"><?php _e('<img src="' . TER_GRAPHICS . '404.png" class="inline-block no-margin" alt="404 Unhappy Face Icon"><span class="margin-left">Sorry, the page you requested cannot be found.</span>','terra') ?></p>
						<p><?php get_search_form() ?></p>
						<div class="widget">
							<?php the_widget('WP_Widget_Recent_Posts',array('number' => 10),array('widget_id' => '404')) ?>
						</div>
						<div class="widget">
							<h2 class="widgettitle"><?php _e('Most Used Categories','terra') ?></h2>
							<ul><?php wp_list_categories(array('orderby' => 'count','order' => 'DESC','show_count' => 1,'title_li' => '','number' => 10)) ?></ul>
						</div>
						<div class="widget">
							<?php the_widget('WP_Widget_Archives',array('count' => 0,'dropdown' => 1),array('after_title' => '</h2>')) 					?>
						</div>
						<div class="widget">
							<?php the_widget('WP_Widget_Tag_Cloud') ?>
						</div>
					</div><!-- /.entry-content --> 
				</article><!-- /#post-0 --> 
			</div><!-- /#content --> 
		</div><!-- /#primary -->
		<?php ter_get_sidebar('right','blog') ?>
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>