<?php ter_template_comment(__FILE__) ?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
	<div class="entry-content margin-top">
		<?php the_content() ?>
		<?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:','terra') . '</span>','after' => '</div>')) ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta hidden">
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID() ?> -->