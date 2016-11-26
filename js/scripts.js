jQuery(document).ready(function() {  
	jQuery('#flashcard-swipe').on('slide.bs.carousel', function(){	scrollToAnchor('primary'); });
	jQuery("#flashcard-swipe").swiperight(function(){ jQuery("#flashcard-swipe").carousel('prev'); });  
   	jQuery("#flashcard-swipe").swipeleft(function(){ jQuery("#flashcard-swipe").carousel('next'); });  
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