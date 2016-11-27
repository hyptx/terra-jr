jQuery(document).ready(function() {  
	jQuery('#flashcard-swipe').on('slide.bs.carousel', function(){	scrollToAnchor('primary'); });
	jQuery("#flashcard-swipe").swiperight(function(){ jQuery("#flashcard-swipe").carousel('prev'); });  
   	jQuery("#flashcard-swipe").swipeleft(function(){ jQuery("#flashcard-swipe").carousel('next'); });

  	jQuery(function(){
  		setTimeout(function(){
    		if (location.hash){
      			window.scrollTo(0, 0);
      			target = location.hash.split('#');
      			smoothScrollTo(jQuery('#'+target[1]));
    		}
  		}, 1);
  		jQuery('.anchors a[href*=#]:not([href=#])').click(function(){
    		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname){
      			smoothScrollTo(jQuery(this.hash));
      			return false;
    		}
  		});
  
  		function smoothScrollTo(target){
    		target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');    
			if (target.length) jQuery('html,body').animate({ scrollTop: target.offset().top }, 500);
  		}
	});

});

function scrollToAnchor(anchor_id){
    var tag = jQuery('#' + anchor_id + '');
    jQuery('html,body').animate({scrollTop: tag.offset().top},'slow');
}

function toggleKana(){
    jQuery('#flashcard-swipe .item.active').toggleClass('swap-kana');
}

function toggleRomanji(){
    jQuery('#flashcard-swipe').toggleClass('show-details');
}

function toggleCharTile(element){
    jQuery(element).toggleClass('tile-alt');
}			