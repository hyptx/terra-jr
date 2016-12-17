<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<?php the_post() ?>
<?php require(TER_CHILD_INCLUDES . 'kana-generator.php') ?>
<?php $kana_generator = new KanaGenerator('hiragana') ?>
<header id="app-header" class="theme-bg-color">
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><h1 class="app-title h-balance-margin"><?php the_title() ?></h1></div>
		</div>
	</div>
</header><!-- .page-header -->
<?php $kana_generator->print_resize_buttons(0,0,1) ?>
<div id="main" class="container no-margin-template">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?> no-pad">
			<div id="content" role="main">								
				<article id="post-<?php the_ID() ?>" <?php post_class() ?>>					
					<div class="entry-content">
						<?php the_content() ?>
						<div id="flashcard-swipe" class="carousel slide type-hiragana">
  							<div class="carousel-inner" role="listbox"><?php $kana_generator->print_flashcards() ?></div>
						  	<div id="flashcard-control-bar" class="text-center">
								<a class="flashcard-prev" href="#flashcard-swipe" role="button" data-slide="prev">
							    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    	<span class="sr-only">Previous</span>
							  	</a>
							  	<a role="button" onclick="toggleRomanji();" class="tooggle-details-plus"><span class="glyphicon glyphicon-plus" aria-hidden="true" title="More Details"></span></a>
							  	<a role="button" onclick="toggleRomanji();" class="tooggle-details-minus"><span class="glyphicon glyphicon-minus" aria-hidden="true" title="Less Details"></span></a>
							  	<a role="button" data-toggle="collapse" href="#flashcard-nav-container" aria-expanded="false" aria-controls="flashcard-nav-container"><span class="glyphicon glyphicon-th-list" aria-hidden="true" title="Kana List"></span></a>			
							  	<a role="button" class="tooggle-play" onclick="toggleFlashcardPlay(this);"><span class="glyphicon glyphicon-play" aria-hidden="true" title="Fast Play"><span class="glyph-inner">F</span></span><span class="glyphicon glyphicon-play play-x2" aria-hidden="true" title="Slow Play"><span class="glyph-inner">S</span></span><span class="glyphicon glyphicon-pause" aria-hidden="true" title="Pause"></span></a>							  	
							  	<a class="flashcard-next" href="#flashcard-swipe" role="button" data-slide="next">
							    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							    	<span class="sr-only">Next</span>
							  	</a>
						  	</div>						  		
							<div class="collapse responsive-neg-margin" id="flashcard-nav-container">
							  	<div class="well trans-a"><?php $kana_generator->print_nav() ?></div>
							</div>						
						</div>
						<script type="text/javascript">
							flashcardPlaying = false;
							jQuery('#flashcard-swipe').carousel({ interval: 4000 });
							jQuery('#flashcard-swipe').carousel('pause');
						</script>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID() ?> -->
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>