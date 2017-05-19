<?php get_header() ?>
<?php ter_template_comment(__FILE__) ?>
<div id="main" class="container">
	<div id="main-row" class="row">
		<div id="primary" class="<?php echo TER_FULL_WIDTH_CLASS ?>">
			<div id="content" role="main">
				<?php the_post() ?>
				<?php ter_breadcrumbs() ?>
				<?php ter_template_comment(__FILE__) ?>
				<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
					<header class="page-header">
						<h1 class="page-title"><?php the_title() ?></h1>
					</header><!-- .page-header -->
					<div class="entry-content">
						<?php the_content() ?>
						
<?php 
$frequency = 200;
$type = 'sine';
$total_oscillators = 3;
?>
<?php $i = 1; while($i <= $total_oscillators): ?>
<div id="oscillator-<?php echo $i ?>" class="oscillator rounded-8 shadow text-center">
	<form onsubmit="return false;">
		<div class="form-group">
			<input type="number" id="frequency-<?php echo $i ?>" name="frequency" value="<?php echo $frequency ?>" class="form-control frequency" min="0" max="20000">
			<input type="range" id="frequencyrange-<?php echo $i ?>" name="frequencyrange" value="<?php echo $frequency ?>" class="form-control range-slider" min="0" max="5000" step="1">
		</div>
		<div class="form-group">
			<label><input type="radio" name="type" value="sine"<?php if($type == 'sine') echo ' checked' ?>> Sine</label>
			<label><input type="radio" name="type" value="square"<?php if($type == 'square') echo ' checked' ?>> Square</label>
			<label><input type="radio" name="type" value="sawtooth"<?php if($type == 'sawtooth') echo ' checked' ?>> Sawtooth</label>
			<label><input type="radio" name="type" value="triangle"<?php if($type == 'triangle') echo ' checked' ?>> Triangle</label>
		</div>
	</form>
	<button id="play-<?php echo $i ?>" class="btn btn-success play-btn">Play</button>
	<button id="stop-<?php echo $i ?>" class="btn btn-warning stop-btn">Stop</button>
</div>
<?php $i++; endwhile ?>

<div class="text-center margin-top"><button id="stop-all" class="btn btn-danger" style="width:100%">Stop All</button></div>

<script type="text/javascript">
cgfAudioContext = new(window.AudioContext || window.webkitAudioContext || window.mozAudioContext || window.oAudioContext || window.msAudioContext);
if(cgfAudioContext) cgfAudioSupported = true;
else alert('Sorry, your browser does not support this advanced audio Javascript');

oscillators = [];

//Play Click
jQuery('.play-btn').click(function(e){ playTone(getOscillatorId(jQuery(this).attr('id'))); });

//Stop Click
jQuery('.stop-btn').click(function(e){ stopTone(getOscillatorId(jQuery(this).attr('id'))); });

//Stop All Click
jQuery('#stop-all').click(function(e){ stopTone(0); });

//Frequency Change
jQuery('.frequency').change(function(e){
	oscID = getOscillatorId(jQuery(this).attr('id'));
	selectedFrequency = jQuery(this).val();
	if(typeof oscillators[oscID] !== 'undefined') oscillators[oscID].frequency.value = selectedFrequency;
	jQuery('#frequencyrange-' + oscID).val(selectedFrequency);
}); 

//Range Change
jQuery('.range-slider').change(function(e){
	oscID = getOscillatorId(jQuery(this).attr('id'));
	selectedFrequency = jQuery(this).val();
	if(typeof oscillators[oscID] !== 'undefined') oscillators[oscID].frequency.value = selectedFrequency;
	jQuery('#frequency-' + oscID).val(selectedFrequency);
}); 

//Type Change
jQuery('input[name=type]').change(function(e){
	parentOsc = jQuery(this).closest('.oscillator');
	oscID = getOscillatorId(jQuery(parentOsc).attr('id'));
	selectedFrequency = jQuery(this).val();
	if(typeof oscillators[oscID] !== 'undefined') oscillators[oscID].type = jQuery('#oscillator-' + oscID + ' input[name=type]:checked').val();
}); 

//Get ID
function getOscillatorId(CSSID){
	var splitID = CSSID.split('-');
	return splitID[1];
}

//Play
function playTone(osdID){
	oscillators[osdID] = cgfAudioContext.createOscillator();
	oscillators[osdID].frequency.value = jQuery('#oscillator-' + osdID + ' .frequency').val();
	oscillators[osdID].type = jQuery('#oscillator-' + osdID + ' input[name=type]:checked').val();
	oscillators[osdID].connect(cgfAudioContext.destination);
	oscillators[osdID].start();
}

//Stop
function stopTone(osdID){
	if(osdID == 0){
		for(var i = 1; i < oscillators.length; i++) oscillators[i].stop(cgfAudioContext.currentTime);
	}
	else oscillators[osdID].stop(cgfAudioContext.currentTime);
	for(var i = 1; i < oscillators.length; i++) console.log(i + ' - ' + oscillators[i]);
}

function stopToneOnChange(element){
	oscillators[oscillatorInterfaceNumber].stop(cgfAudioContext.currentTime);
}
</script>
					</div><!-- .entry-content -->
					<footer class="entry-meta hidden">
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID() ?> -->
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>