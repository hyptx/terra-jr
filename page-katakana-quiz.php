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
</header><!-- .page-header -->
<?php $kana_generator->print_resize_buttons(0,0,1) ?>
<div id="main" class="container no-margin-template">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?> no-pad">
			<div id="content" role="main">								
				<article id="post-<?php the_ID() ?>" <?php post_class() ?>>					
					<div class="entry-content">
						<?php the_content() ?>
						<div id="quiz" class="carousel slide type-hiragana">
  							<div class="carousel-inner" role="listbox">
  								<?php $kana_generator->print_quiz() ?>  								
  								<div id="flashcard-control-bar" class="text-center">
									<a class="flashcard-prev" href="#quiz" role="button" data-slide="prev">
								    	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    	<span class="sr-only">Previous</span>
								  	</a>						  	
								  	<a class="flashcard-next" href="#quiz" role="button" data-slide="next">
								    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    	<span class="sr-only">Next</span>
								  	</a>
							  	</div>	
  							</div>					
						</div>
						<script type="text/javascript">
							flashcardPlaying = false;
							jQuery('#quiz').carousel({ interval: 3000 });
							jQuery('#quiz').carousel('pause');
							jQuery('#quiz').on('slide.bs.carousel', function (){
								if(answered == quizItems) jQuery('#results').hide('slow');
							});
						</script>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID() ?> -->
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<div class="theme-bg-color" style="min-height: 24px"><div id="restart"><a class="btn btn-success" onclick="window.location.reload(); return false;">Start Over</a></div></div>
<?php get_footer() ?>