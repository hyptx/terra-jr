<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<?php the_post() ?>
<header id="app-header" class="theme-bg-color">
	<div class="container">
		<div class="row">
			<div class="col-sm-6"><h1 class="app-title h-balance-margin"><?php the_title() ?></h1></div>
			<div class="col-sm-6"></div>
		</div>
	</div>
</header><!-- .page-header -->
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">								
				<article id="post-<?php the_ID() ?>" <?php post_class() ?>>					
					<div class="entry-content">
						<?php the_content() ?>
						<?php require(TER_CHILD_INCLUDES . 'kana_generator.php') ?>
						<?php $kana_generator = new KanaGenerator('katakana') ?>
						<div id="flashcard-swipe" class="carousel slide type-katakana" data-ride="carousel" data-interval="false">
  							<div class="carousel-inner" role="listbox"><?php $kana_generator->print_flashcards() ?></div>
						  	<div id="flashcard-control-bar" class="text-center">
								<a class="flashcard-prev" href="#flashcard-swipe" role="button" data-slide="prev">
							    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    	<span class="sr-only">Previous</span>
							  	</a>
							  	<a role="button" onclick="toggleKana();"><span class="glyphicon glyphicon-retweet" aria-hidden="true" title="Switch Kana"></span></a>
							  	<a role="button" data-toggle="collapse" href="#flashcard-nav-container" aria-expanded="false" aria-controls="flashcard-nav-container"><span class="glyphicon glyphicon-th-list" aria-hidden="true" title="Kana List"></span></a>							  	
							  	<a role="button" onclick="toggleRomanji();" class="tooggle-details-plus"><span class="glyphicon glyphicon-plus" aria-hidden="true" title="More Details"></span></a>
							  	<a role="button" onclick="toggleRomanji();" class="tooggle-details-minus"><span class="glyphicon glyphicon-minus" aria-hidden="true" title="Less Details"></span></a>
							  	<?php if($_GET['random'] == 1): ?>
							  	<a role="button" href="?random=0" class="tooggle-shuffle"><span class="glyphicon glyphicon-random" aria-hidden="true" title="UnShuffle"></span></a>
							  	<?php else: ?>
							  	<a role="button" href="?random=1" class="tooggle-shuffle opacity-light"><span class="glyphicon glyphicon-random" aria-hidden="true" title="Shuffle"></span></a>
							  	<?php endif ?>							  	
							  	<a class="flashcard-next" href="#flashcard-swipe" role="button" data-slide="next">
							    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    	<span class="sr-only">Next</span>
							  	</a>
						  	</div>						  		
							<div class="collapse responsive-neg-margin" id="flashcard-nav-container">
							  	<div class="well trans-a"><?php $kana_generator->print_nav() ?></div>
							</div>						
						</div>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID() ?> -->
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>