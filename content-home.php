<?php ter_template_comment(__FILE__) ?>
<article id="post-0" class="page type-page hentry">
	<div class="entry-content">
		<?php the_content() ?>
		<div class="row">
			<div class="col-sm-12">


			</div>
		</div>
	</div><!-- .entry-content --> 
</article><!-- #post-0 -->

<script>  
jQuery(document).ready(function() {  
   jQuery("#character-swipe").swiperight(function() {  
      jQuery("#character-swipe").carousel('prev');  
    });  
   jQuery("#character-swipe").swipeleft(function() {  
      jQuery("#character-swipe").carousel('next');  
   });  
});  
</script> 