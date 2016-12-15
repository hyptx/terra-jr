jQuery(document).ready(function(){  
	//Text to Speech
	responsiveVoice.setDefaultVoice('Japanese Female');
	//Swipe
	jQuery('#flashcard-swipe').on('slide.bs.carousel', function(){	scrollToAnchor('primary'); });
	jQuery("#flashcard-swipe, #quiz").swiperight(function(){
	 	jQuery("#flashcard-swipe").carousel('prev'); 
	 	if(answered == quizItems) jQuery("#quiz").carousel('prev'); 
	});  
   	jQuery("#flashcard-swipe, #quiz").swipeleft(function(){
   	 	jQuery("#flashcard-swipe").carousel('next'); 
   	 	if(answered == quizItems) jQuery("#quiz").carousel('next'); 

   	});
   	//Smooth Scrolling
  	jQuery(function(){
  		setTimeout(function(){
    		if(location.hash){
      			window.scrollTo(0, 0);
      			target = location.hash.split('#');
      			smoothScrollTo(jQuery('#'+target[1]));
    		}
  		}, 1);
  		jQuery('.anchors a[href*=#]:not([href=#])').click(function(){
    		if(location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname){
      			smoothScrollTo(jQuery(this.hash));
      			return false;
    		}
  		});
  
  		function smoothScrollTo(target){
    		target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');    
			if(target.length) jQuery('html,body').animate({ scrollTop: target.offset().top }, 500);
  		}
	});

	jQuery('#speakme-examples span.nihongo').on('click',function(){
		var existingText = jQuery('#speakme').val();
		jQuery('#speakme').val(existingText + ' ' + jQuery(this).html());
		jQuery('html,body').animate({ scrollTop: 0 }, 'slow');
	});
});

function scrollToAnchor(anchor_id){
    var tag = jQuery('#' + anchor_id + '');
    jQuery('html,body').animate({scrollTop: tag.offset().top},'slow');
}

function toggleKana(){
    jQuery('#flashcard-swipe .item.active,#quiz .item.active').toggleClass('swap-kana');
}

function toggleTileKana(element){
    jQuery(element).closest('.character-tile').toggleClass('tile-alt');
}

function toggleRomanji(){
    jQuery('#flashcard-swipe').toggleClass('show-details');
}

function speakCharacter(speech){
	//speech = ', ' + speech;
	if(speech == 'う') responsiveVoice.speak(speech,'Japanese Female',{rate: .5,pitch: 1.1});
	else responsiveVoice.speak(speech,'Japanese Female',{rate: .8,pitch: 1.1});
}

function speakSentence(speech){
	var speech = jQuery('#speakme').val();
	if(speech) responsiveVoice.speak(speech,'Japanese Female',{rate: .8});
}

function toggleFlashcardPlay(element){ 
	c = jQuery('#flashcard-swipe');
	if(flashcardPlaying == 2){
		jQuery('#flashcard-swipe').carousel('pause');
		jQuery(element).removeClass('playing');
		jQuery(element).removeClass('playing-x2');
		opt = c.data()['bs.carousel'].options;
      	opt.interval= 4000;
      	c.data({options: opt});
		flashcardPlaying = false;
	}
	else if(flashcardPlaying == 1){
		jQuery(element).addClass('playing-x2');
      	opt = c.data()['bs.carousel'].options;
      	opt.interval= 6000;
      	c.data({options: opt});
		flashcardPlaying = 2;
	}
	else{
		jQuery(element).addClass('playing');
		jQuery('#flashcard-swipe').carousel('next');
		jQuery('#flashcard-swipe').carousel('cycle');
		flashcardPlaying = 1;
	}
}

//Quiz
correctAnswers = 0;
incorrectAnswers = 0;
score = 0;
answered = 0;
function checkQuizAnswer(element){	
	jQuery('#quiz .active .quiz-answer').attr('onclick','');
	answered++;
    if(jQuery(element).hasClass('correct')){
    	score++;
    	jQuery(element).addClass('right');
    	correctAnswers++;
    	jQuery('#score-correct').html(correctAnswers);
    	if(answered != quizItems) setTimeout(function(){ jQuery('#quiz').carousel('next'); },500);
    }
    else{
    	jQuery(element).addClass('wrong');
    	incorrectAnswers++;
    	jQuery('#score-incorrect').html(incorrectAnswers);
    	jQuery('#quiz .active .correct').addClass('right-indicator');
    	if(answered != quizItems) setTimeout(function(){ jQuery('#quiz').carousel('next'); },2000);
    }

    if(answered == quizItems){
    	jQuery('#results').html('<strong>Sugoiyo!</strong> You got ' + correctAnswers + ' out of ' + quizItems + '<br><br>Use the arrows below to review your results.');
    	jQuery('#results').show('slow');
    	jQuery('#restart').show('slow');
    	jQuery('#flashcard-control-bar').css('visibility','visible');
    	jQuery('#flashcard-control-bar,#quiz-answer-bar-container').addClass('tall');
    }
}