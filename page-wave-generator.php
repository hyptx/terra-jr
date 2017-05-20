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
$total_oscillators = 3;
if($_GET['fsl']) $fsl = $_GET['fsl'];
else $fsl = 3000;
$i = 1;
while($i <= $total_oscillators){
	if($_GET['f' . $i]) $frequency[$i] = $_GET['f' . $i];
	else $frequency[$i]= 200;
	if($_GET['t' . $i]) $type[$i] = $_GET['t' . $i];
	else $type[$i]= 'sine';
	$i++;
}
?>
<form method="get" action="" class="form-inline">
	<div class="form-group">
		<div class="input-group">
      		<div class="input-group-addon" title="Frequency Slider Limit">FSL</div>
      		<input type="number" id="fsl" name="fsl" min="200" max="20000" value="<?php echo $fsl ?>" class="form-control">
      	</div>
	</div>
	<button type="submit" class="btn btn-default">Apply FSL</button>
	<button id="save-config" class="btn btn-success" onclick="return false;">Current Settings Link</button>
</form>

<div id="config-link"></div>
<hr>
<?php $i = 1; while($i <= $total_oscillators): ?>
<div id="oscillator-<?php echo $i ?>" class="oscillator rounded-8 shadow text-center">
	<form onsubmit="return false;">
		<div class="form-group">
			<input type="number" id="frequency-<?php echo $i ?>" name="frequency" value="<?php echo $frequency[$i] ?>" class="form-control frequency" min="0" max="20000">
			<input type="range" id="frequencyrange-<?php echo $i ?>" name="frequencyrange" value="<?php echo $frequency[$i] ?>" class="form-control range-slider" min="0" max="<?php echo $fsl ?>" step="1">
		</div>
		<div class="form-group">
			<label><input type="radio" name="type" value="sine"<?php if($type[$i] == 'sine') echo ' checked' ?>> Sine</label>
			<label><input type="radio" name="type" value="square"<?php if($type[$i] == 'square') echo ' checked' ?>> Square</label>
			<label><input type="radio" name="type" value="sawtooth"<?php if($type[$i] == 'sawtooth') echo ' checked' ?>> Sawtooth</label>
			<label><input type="radio" name="type" value="triangle"<?php if($type[$i] == 'triangle') echo ' checked' ?>> Triangle</label>
		</div>
	</form>
	<button id="play-<?php echo $i ?>" class="btn btn-info play-btn"><span class="glyphicon glyphicon-play" aria-hidden="true"></span> Play</button>
	<button id="stop-<?php echo $i ?>" class="btn btn-default stop-btn"><span class="glyphicon glyphicon-stop" aria-hidden="true"></span> Stop</button>
</div>
<?php $i++; endwhile ?>

<div class="text-center"><button id="stop-all" class="btn btn-warning" style="width:100%"><span class="glyphicon glyphicon-volume-off" aria-hidden="true"></span> Stop All</button></div>

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

//Stop All Click
jQuery('#save-config').click(function(e){ 
	var configLink = 'fsl=' + jQuery('#fsl').val();
	for(var i = 1; i <= <?php echo $total_oscillators ?>; i++){
		configLink += '&f' + i + '=' + jQuery('#frequency-' + i).val();
		configLink += '&t' + i + '=' + jQuery('#oscillator-' + i + ' input[name=type]:checked').val();
	}
	jQuery('#config-link').html('<div class="alert alert-success margin-top"><a href="https://coloradogoldfever.com/wave-generator/?' + configLink + '" target="_blank">https://coloradogoldfever.com/wave-generator/?' + configLink + '</a></div>');
});

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

<div class="margin-top pad-top">
	<h4>Help:</h4>
	<ul>
		<li>Applying FSL setting will cancel all playback and refresh the page</li>
		<li>Number input range = 0Hz to 20000Hz</li>
		<li>Frequency slider limit = Defaults to 3000Hz</li>
		<li>Don't blow your eardrums out, make sure your volume is down before playing a tone</li>
	</ul>
</div>
					</div><!-- .entry-content -->
					<footer class="entry-meta hidden">
					</footer><!-- .entry-meta -->
				</article><!-- #post-<?php the_ID() ?> -->
			</div><!-- /#content -->
		</div><!-- /#primary -->
	</div><!-- /#main-row -->
</div><!-- /#main -->
<?php get_footer() ?>