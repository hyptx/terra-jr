<?php 
/**
* KanaGenerator
*/
class KanaGenerator{
	private $_kana_type,$_kana_array,$_character_count;
	public function __construct($kana_type){
		$this->_kana_type = $kana_type;
		$this->store_data();
	}

	private function store_data(){
		//[] = Hiragana[0],Katakana[1],Hepburn[2],Nihon-shiki[3],Kunrei-shiki[4],section[5],consonant[6],vowel[7]
		//[] => ['', '', '', '', '', '', '', ''],
		$this->_kana_array = [
			['あ', 'ア', 'a', '', '', 		'Monographs(Gojūon)', '*', 'a'], 
			['い', 'イ', 'i', 'wi', 'i', 		'Monographs(Gojūon)', '*', 'i'], 
			['う', 'ウ', 'u', '', '', 		'Monographs(Gojūon)', '*', 'u'], 
			['え', 'エ', 'e', 'we', 'e', 		'Monographs(Gojūon)', '*', 'e'], 
			['お', 'オ', 'o', 'wo', 'o', 		'Monographs(Gojūon)', '*', 'o'], 
			['か', 'カ', 'ka', '', '', 		'Monographs(Gojūon)', 'k', 'a'], 
			['き', 'キ', 'ki', '', '', 		'Monographs(Gojūon)', 'k', 'i'], 
			['く', 'ク', 'ku', '', '', 		'Monographs(Gojūon)', 'k', 'u'], 
			['け', 'ケ', 'ke', '', '', 		'Monographs(Gojūon)', 'k', 'e'], 
			['こ', 'コ', 'ko', '', '', 		'Monographs(Gojūon)', 'k', 'o'], 
			['さ', 'サ', 'sa', '', '', 		'Monographs(Gojūon)', 's', 'a'], 
			['し', 'シ', 'shi', 'si', 'si', 	'Monographs(Gojūon)', 's', 'i'], 
			['す', 'ス', 'su', '', '', 		'Monographs(Gojūon)', 's', 'u'], 
			['せ', 'セ', 'se', '', '', 		'Monographs(Gojūon)', 's', 'e'], 
			['そ', 'ソ', 'so', '', '', 		'Monographs(Gojūon)', 's', 'o'], 
			['た', 'タ', 'ta', '', '', 		'Monographs(Gojūon)', 't', 'a'], 
			['ち', 'チ', 'chi', 'ti', 'ti', 	'Monographs(Gojūon)', 't', 'i'], 
			['つ', 'ツ', 'tsu', 'tu', 'tu', 	'Monographs(Gojūon)', 't', 'u'], 
			['て', 'テ', 'te', '', '', 		'Monographs(Gojūon)', 't', 'e'], 
			['と', 'ト', 'to', '', '', 		'Monographs(Gojūon)', 't', 'o'], 
			['な', 'ナ', 'na', '', '', 		'Monographs(Gojūon)', 'n', 'a'], 
			['に', 'ニ', 'ni', '', '', 		'Monographs(Gojūon)', 'n', 'i'], 
			['ぬ', 'ヌ', 'nu', '', '', 		'Monographs(Gojūon)', 'n', 'u'], 
			['ね', 'ネ', 'ne', '', '', 		'Monographs(Gojūon)', 'n', 'e'], 
			['の', 'ノ', 'no', '', '', 		'Monographs(Gojūon)', 'n', 'o'], 
			['は', 'ハ', 'ha', '', '', 		'Monographs(Gojūon)', 'h', 'a'], 
			['ひ', 'ヒ', 'hi', '', '', 		'Monographs(Gojūon)', 'h', 'i'], 
			['ふ', 'フ', 'fu', 'hu', 'hu', 	'Monographs(Gojūon)', 'h', 'u'], 
			['へ', 'ヘ', 'he', '', '', 		'Monographs(Gojūon)', 'h', 'e'], 
			['ほ', 'ホ', 'ho', '', '', 		'Monographs(Gojūon)', 'h', 'o'], 
			['ま', 'マ', 'ma', '', '', 		'Monographs(Gojūon)', 'm', 'a'], 
			['み', 'ミ', 'mi', '', '', 		'Monographs(Gojūon)', 'm', 'i'], 
			['む', 'ム', 'mu', '', '', 		'Monographs(Gojūon)', 'm', 'u'], 
			['め', 'メ', 'me', '', '', 		'Monographs(Gojūon)', 'm', 'e'], 
			['も', 'モ', 'mo', '', '', 		'Monographs(Gojūon)', 'm', 'o'], 
			['や', 'ャ', 'ya', '', '', 		'Monographs(Gojūon)', 'y', 'a'], 
			['ゆ', 'ュ', 'yu', '', '', 		'Monographs(Gojūon)', 'y', 'u'], 
			['よ', 'ョ', 'yo', '', '', 		'Monographs(Gojūon)', 'y', 'o'], 
			['ら', 'ラ', 'ra', '', '', 		'Monographs(Gojūon)', 'r', 'a'], 
			['り', 'リ', 'ri', '', '', 		'Monographs(Gojūon)', 'r', 'i'], 
			['る', 'ル', 'ru', '', '', 		'Monographs(Gojūon)', 'r', 'u'], 
			['れ', 'レ', 're', '', '', 		'Monographs(Gojūon)', 'r', 'e'], 
			['ろ', 'ロ', 'ro', '', '', 		'Monographs(Gojūon)', 'r', 'o'], 
			['わ', 'ワ', 'wa', '', '', 		'Monographs(Gojūon)', 'w', 'a'], 
			['ゐ', 'ヰ', 'i', 'wi', 'i',		'Monographs(Gojūon)', 'w', 'i'],
			['ゑ', 'ヱ', 'e', 'we', 'e',		'Monographs(Gojūon)', 'w', 'e'],
			['を', 'ヲ', 'o', 'wo', 'o', 		'Monographs(Gojūon)', 'w', 'o'], 
			['ん', 'ン', 'n', 'n-n', 'n-n', 	'Monographs(Gojūon)', '*', '*'], 
			['っ', 'ッ', 'gc', '', '', 		'Monographs(Gojūon)', '*', '*'],
			['ゝ', 'ゝ', 'rdu', '', '', 		'Monographs(Gojūon)', '*', '*'],
			['ゞ', 'ゞ', 'rdv', '', '', 		'Monographs(Gojūon)', '*', '*'],
		];
		$level_2 = [
			['が', 'ガ', 'ga', '', '', 		'Diacritics(Gojūon/Handakuten)', 'g', 'a'], 
			['ぎ', 'ギ', 'gi', '', '', 		'Diacritics(Gojūon/Handakuten)', 'g', 'i'], 
			['ぐ', 'グ', 'gu', '', '', 		'Diacritics(Gojūon/Handakuten)', 'g', 'u'], 
			['げ', 'ゲ', 'ge', '', '', 		'Diacritics(Gojūon/Handakuten)', 'g', 'e'], 
			['ご', 'ゴ', 'go', '', '', 		'Diacritics(Gojūon/Handakuten)', 'g', 'o'], 
			['ざ', 'ザ', 'za', '', '', 		'Diacritics(Gojūon/Handakuten)', 'z', 'a'], 
			['じ', 'ジ', 'ji', 'zi', 'zi', 	'Diacritics(Gojūon/Handakuten)', 'z', 'i'], 
			['ず', 'ズ', 'zu', '', '', 		'Diacritics(Gojūon/Handakuten)', 'z', 'u'], 
			['ぜ', 'ゼ', 'ze', '', '', 		'Diacritics(Gojūon/Handakuten)', 'z', 'e'], 
			['ぞ', 'ゾ', 'zo', '', '', 		'Diacritics(Gojūon/Handakuten)', 'z', 'o'], 
			['だ', 'ダ', 'da', '', '', 		'Diacritics(Gojūon/Handakuten)', 'd', 'a'], 
			['ぢ', 'ヂ', 'ji', 'di', 'zi', 	'Diacritics(Gojūon/Handakuten)', 'd', 'i'], 
			['づ', 'ヅ', 'zu', 'du', 'zu', 	'Diacritics(Gojūon/Handakuten)', 'd', 'u'], 
			['で', 'デ', 'de', '', '', 		'Diacritics(Gojūon/Handakuten)', 'd', 'e'], 
			['ど', 'ド', 'do', '', '', 		'Diacritics(Gojūon/Handakuten)', 'd', 'o'], 
			['ば', 'バ', 'ba', '', '', 		'Diacritics(Gojūon/Handakuten)', 'b', 'a'], 
			['び', 'ビ', 'bi', '', '', 		'Diacritics(Gojūon/Handakuten)', 'b', 'i'], 
			['ぶ', 'ブ', 'bu', '', '', 		'Diacritics(Gojūon/Handakuten)', 'b', 'u'], 
			['べ', 'ベ', 'be', '', '', 		'Diacritics(Gojūon/Handakuten)', 'b', 'e'], 
			['ぼ', 'ボ', 'bo', '', '', 		'Diacritics(Gojūon/Handakuten)', 'b', 'o'], 
			['ぱ', 'パ', 'pa', '', '', 		'Diacritics(Gojūon/Handakuten)', 'p', 'a'], 
			['ぴ', 'ピ', 'pi', '', '', 		'Diacritics(Gojūon/Handakuten)', 'p', 'i'], 
			['ぷ', 'プ', 'pu', '', '', 		'Diacritics(Gojūon/Handakuten)', 'p', 'u'], 
			['ぺ', 'ペ', 'pe', '', '', 		'Diacritics(Gojūon/Handakuten)', 'p', 'e'], 
			['ぽ', 'ポ', 'po', '', '', 		'Diacritics(Gojūon/Handakuten)', 'p', 'o'],
			['ゔ', 'ウ', 'u', '', '', 		'Diacritics(Gojūon/Handakuten)', 'v', 'u'],
		];
		$level_3 = [		
			['きゃ', 'キャ', 'kya', '', '', 		'Digraphs(Yōon)', 'k', 'ya'], 
			['きゅ', 'キュ', 'kyu', '', '', 		'Digraphs(Yōon)', 'k', 'yu'], 
			['きょ', 'キョ', 'kyo', '', '', 		'Digraphs(Yōon)', 'k', 'yo'], 
			['しゃ', 'シャ', 'sha', 'sya', 'sya', 	'Digraphs(Yōon)', 's', 'ya'], 
			['しゅ', 'シュ', 'shu', 'syu', 'syu', 	'Digraphs(Yōon)', 's', 'yu'], 
			['しょ', 'ショ', 'sho', 'syo', 'syo', 	'Digraphs(Yōon)', 's', 'yo'], 
			['ちゃ', 'チャ', 'cha', 'tya', 'tya', 	'Digraphs(Yōon)', 't', 'ya'], 
			['ちゅ', 'チュ', 'chu', 'tyu', 'tyu', 	'Digraphs(Yōon)', 't', 'yu'], 
			['ちょ', 'チョ', 'cho', 'tyo', 'tyo', 	'Digraphs(Yōon)', 't', 'yo'], 
			['にゃ', 'ニャ', 'nya', '', '', 		'Digraphs(Yōon)', 'n', 'ya'], 
			['にゅ', 'ニュ', 'nyu', '', '', 		'Digraphs(Yōon)', 'n', 'yu'], 
			['にょ', 'ニョ', 'nyo', '', '', 		'Digraphs(Yōon)', 'n', 'yo'], 
			['ひゃ', 'ヒャ', 'hya', '', '', 		'Digraphs(Yōon)', 'h', 'ya'], 
			['ひゅ', 'ヒュ', 'hyu', '', '', 		'Digraphs(Yōon)', 'h', 'yu'], 
			['ひょ', 'ヒョ', 'hyo', '', '', 		'Digraphs(Yōon)', 'h', 'yo'], 
			['みゃ', 'ミャ', 'mya', '', '', 		'Digraphs(Yōon)', 'm', 'ya'], 
			['みゅ', 'ミュ', 'myu', '', '', 		'Digraphs(Yōon)', 'm', 'yu'], 
			['みょ', 'ミョ', 'myo', '', '', 		'Digraphs(Yōon)', 'm', 'yo'], 
			['りゃ', 'リャ', 'rya', '', '', 		'Digraphs(Yōon)', 'r', 'ya'], 
			['りゅ', 'リュ', 'ryu', '', '', 		'Digraphs(Yōon)', 'r', 'yu'], 
			['りょ', 'リョ', 'ryo', '', '', 			'Digraphs(Yōon)', 'r', 'yo'], 
			['ぎゃ', 'ギャ', 'gya', '', '', 		'Digraphs/Diacritics', 'g', 'ya'], 
			['ぎゅ', 'ギュ', 'gyu', '', '', 		'Digraphs/Diacritics', 'g', 'yu'], 
			['ぎょ', 'ギョ', 'gyo', '', '', 		'Digraphs/Diacritics', 'g', 'yo'], 
			['じゃ', 'ジャ', 'ja', 'zya', 'zya', 	'Digraphs/Diacritics', 'z', 'ya'], 
			['じゅ', 'ジュ', 'ju', 'zyu', 'zyu', 	'Digraphs/Diacritics', 'z', 'yu'], 
			['じょ', 'ジョ', 'jo', 'zyo', 'zyo', 	'Digraphs/Diacritics', 'z', 'yo'], 
			['ぢゃ', 'ヂャ', 'ja', 'dya', 'zya', 	'Digraphs/Diacritics', 'd', 'ya'], 
			['ぢゅ', 'ヂュ', 'ju', 'dyu', 'zyu', 	'Digraphs/Diacritics', 'd', 'yu'], 
			['ぢょ', 'ヂョ', 'jo', 'dyo', 'zyo', 	'Digraphs/Diacritics', 'd', 'yo'], 
			['びゃ', 'ビャ', 'bya', '', '', 		'Digraphs/Diacritics', 'b', 'ya'], 
			['びゅ', 'ビュ', 'byu', '', '', 		'Digraphs/Diacritics', 'b', 'yu'], 
			['びょ', 'ビョ', 'byo', '', '', 		'Digraphs/Diacritics', 'b', 'yo'], 
			['ぴゃ', 'ピャ', 'pya', '', '', 		'Digraphs/Diacritics', 'p', 'ya'], 
			['ぴゅ', 'ピュ', 'pyu', '', '', 		'Digraphs/Diacritics', 'p', 'yu'], 
			['ぴょ', 'ピョ', 'pyo', '', '', 		'Digraphs/Diacritics', 'p', 'yo'], 
		];
		if($_GET['level'] == 2) $this->_kana_array = array_merge($this->_kana_array,$level_2);
		if($_GET['level'] == 3){
			$this->_kana_array = array_merge($this->_kana_array,$level_2);
			$this->_kana_array = array_merge($this->_kana_array,$level_3);
		} 
		$this->_character_count = count($this->_kana_array);
		$this->prepare_flashcards();
	}

	private function prepare_flashcards(){ 
		if($_GET['random'] == 1) $this->shuffle_array();
	}

	public function print_flashcards(){
		//[] = Hiragana[0],Katakana[1],Hepburn[2],Nihon-shiki[3],Kunrei-shiki[4],section[5],consonant[6],vowel[7]
		$current_section = 'Monographs(Gojūon)';
		$i = 0;
		foreach($this->_kana_array as $kana){
			if($i == 0) $active = ' active';
			else $active = '';
			switch($kana[2]) {
				case 'gc': $translation = '<span class="complex-trans">Geminate Consonant</span>'; break;
				case 'rduv': $translation = '<span class="complex-trans">Reduplicates/Unvoices</span>'; break;
				case 'rdv': $translation = '<span class="complex-trans">Reduplicates/Voices</span>'; break;
				default: $translation = $kana[2]; break;
			}
			if($this->_kana_type == 'hiragana'){
				$hiragana_indicator = 'main-indicator';
				$katakana_indicator = 'reverse-kana-indicator';
			}
			else{
				$hiragana_indicator = 'reverse-kana-indicator';
				$katakana_indicator = 'main-indicator';
			}
			?>
			<div class="item<?php echo $active ?> flashcard type-<?php echo $this->_kana_type ?>">
				<div class="character-section" onclick="toggleKana();">
					<span class="character nihongo character-hiragana theme-border-bottom"><?php echo $kana[0] ?></span>
					<span class="character nihongo character-katakana theme-border-bottom"><?php echo $kana[1] ?></span>
				</div>
				<div class="translation-section" onclick="speakCharacter('<?php echo $kana[0] ?>');">
					<?php if($kana[3]) echo '<div class="romanji-alt nihon-alt"><span class="opacity-light">Nihon</span><br><span class="uppercase bold">' .  $kana[3] . '</span></div>';	?>
					<span class="translation uppercase"><?php echo $translation ?></span>
					<?php if($kana[4]) echo '<div class="romanji-alt kunrei-alt"><span class="opacity-light">Kunrei</span><br><span class="uppercase bold">' . $kana[4] . '</span></div>'; ?>
				</div>
				<div class="details-section">
					<div class="row">
						<div class="col-xs-2 text-left uppercase"><?php echo $kana[6] ?></div>
						<div class="col-xs-8 text-center"><?php echo $kana[5] ?></div>
						<div class="col-xs-2 text-right uppercase"><?php echo $kana[7] ?></div>
					</div>
				</div>

				<div class="info-section">
					<div class="row">
						<div class="col-xs-6 text-left">
							<a href="https://en.wikipedia.org/wiki/<?php echo $kana[0] ?>" target="_blank" title="Kana Info" class="kana-indicator <?php echo $hiragana_indicator ?>"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Hiragana</a><a href="https://en.wikipedia.org/wiki/<?php echo $kana[1] ?>" target="_blank" title="Kana Info" class="kana-indicator <?php echo $katakana_indicator ?>"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Katakana</a>
						</div>
						<div class="col-xs-6 text-right">
							<?php echo ($i + 1) . ' of ' . $this->_character_count ?>
						</div>
					</div>
				</div>
			</div>
			<?php 
			$i++; 
		}
	}

	public function print_nav(){
		$i = 0;
		echo '<ul id="flashcard-nav" class="carousel-indicators">';
		foreach($this->_kana_array as $kana){
			if($this->_kana_type == 'hiragana')	$character = $kana[0];
			else $character = $kana[1];
			if($i == 0) echo '<li data-target="#flashcard-swipe" data-slide-to="0" class="active nihongo" title="' . $kana[2] . '">' . $character . '</li>';
			else echo '<li data-target="#flashcard-swipe" data-slide-to="' . $i . '" class="nihongo" title="' . $kana[2] . '">' . $character . '</li>';
			$i++;
		}
		echo '</ol>';
	}

	public function print_nav_anchors(){?>
		<div class="theme-bg-color text-center anchor-indicators anchors">
			<div class="bg-overlay-7">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
						<?php
						$i = 0;
						echo '<ul id="flashcard-nav" class="carousel-indicators">';
						foreach($this->_kana_array as $kana){
							if($this->_kana_type == 'hiragana')	$character = $kana[0];
							else $character = $kana[1];
							echo '<li class="nihongo" title="' . $kana[2] . '"><a href="#char-' . $i . '">' . $character . '</a></li>';
							$i++;
						}
						echo '</ol>';
						?>
					</div>
				</div>
			</div>
		</div>		
		<?php		
	}

	public function print_characters(){
		//[] = Hiragana[0],Katakana[1],Hepburn[2],Nihon-shiki[3],Kunrei-shiki[4],section[5],consonant[6],vowel[7]
		global $current_section;
		$current_section = 'Monographs(Gojūon)';
		?>
		<div id="character-list" class="character-list-<?php echo $this->_kana_type ?> text-center font-resize responsive-neg-margin<?php if($_GET['spacers'] != 1) echo ' hide-spacers' ?>">
			<?php $i = 0; foreach($this->_kana_array as $kana):
			$add_blank = '';
			$add_blank_line = '';
			if($current_section != $kana[5]){
				$add_blank = '<hr class="spacer">';
				$current_section = $kana[5];
			}
			else $add_blank = '';
			if($kana[2] == 'n'){
				$add_blank = '<hr class="spacer">';
				$add_blank_line = '<hr class="spacer">';
			}			
			if($this->_kana_type == 'hiragana'){
				$character = $kana[0];
				$character_alt = $kana[1];
			}	
			else{
				$character = $kana[1];
				$character_alt = $kana[0];
			} 
			?>		
			<?php echo $add_blank ?>
			<div id="char-<?php echo $i ?>" class="character-tile theme-bg-color theme-border-color rounded-8">
				<div class="character-bg-overlay rounded-12 bg-overlay">
					<span class="tile-type hiragana-label">H</span>
					<span class="tile-type katakana-label">K</span>
					<div class="character nihongo theme-border-bottom" onclick="toggleTileKana(this);"><?php echo $character ?></div>
					<div class="character character-alt nihongo theme-border-bottom" onclick="toggleTileKana(this);"><?php echo $character_alt ?></div>
					<div class="translation" onclick="speakCharacter('<?php echo $kana[0] ?>');"><?php echo $kana[2] ?></div>
				</div>
			</div>
			<?php 
			if($kana[2] == 'ya') $this->print_blank_char();
			if($kana[2] == 'yu') $this->print_blank_char();
			if($kana[0] == 'ゐ') $this->print_blank_char();
			?>
			<?php echo $add_blank_line ?>
			<?php $i++; endforeach ?>
		</div>
		<script type="text/javascript">
		// jQuery.event.special.tap.emitTapOnTaphold = false;
		// jQuery('.character-tile').on('tap',function(){
		// 	var character = jQuery(this).attr('rel');
		// 	if(character) responsiveVoice.speak(character,'Japanese Female',{rate: .8,pitch: 1.1});
		// }).on('taphold',function(){
  		//   jQuery(this).toggleClass('tile-alt');
		// });
		</script>
		<?php
	}

	public function print_characters_with_details(){
		//[] = Hiragana[0],Katakana[1],Hepburn[2],Nihon-shiki[3],Kunrei-shiki[4],section[5],consonant[6],vowel[7]
		$i = 0;
		?>
		<div id="character-list" class="character-detailed-list-<?php echo $this->_kana_type ?> text-center">
			<?php foreach($this->_kana_array as $kana):
			if($this->_kana_type == 'hiragana'){
				$character = $kana[0];
				$character_alt = $kana[1];
			}	
			else{
				$character = $kana[1];
				$character_alt = $kana[0];
			} 
			?>		
			<div id="char-<?php echo $i ?>" class="character-with-detials">
				<div class="character nihongo theme-border-bottom inline-block" onclick="speakCharacter('<?php echo $kana[0] ?>');"><?php echo $character ?></div>
				<div class="translation-section" onclick="speakCharacter('<?php echo $kana[0] ?>');">
					<?php if($kana[3]) echo '<div class="romanji-alt nihon-alt"><span class="opacity-light">Nihon</span><br><span class="uppercase bold">' .  $kana[3] . '</span></div>';	?>
					<span class="translation uppercase"><?php echo $kana[2] ?></span>
					<?php if($kana[4]) echo '<div class="romanji-alt kunrei-alt"><span class="opacity-light">Kunrei</span><br><span class="uppercase bold">' . $kana[4] . '</span></div>'; ?>
				</div>
				<div class="translation-details">
					<div class="row">
						<div class="col-xs-2 text-left uppercase"><?php echo $kana[6] ?></div>
						<div class="col-xs-8 text-center"><?php echo $kana[5] ?></div>
						<div class="col-xs-2 text-right uppercase"><?php echo $kana[7] ?></div>
					</div>
				</div>
				<div class="info-section">
					<div class="row">
						<div class="col-xs-6 text-left">
							<a href="https://en.wikipedia.org/wiki/<?php echo $kana[0] ?>" target="_blank" title="Kana Info" class="kana-indicator"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Wikipedia Info</a>
						</div>
						<div class="col-xs-6 text-right">
							<?php echo ($i + 1) . ' of ' . $this->_character_count ?>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<?php $i++; endforeach ?>
		</div>
		<?php
	}

	public function print_resize_buttons($show_resize = false,$show_spacers = false){?>
		<div class="resize-buttons theme-bg-color text-center bold<?php if($_GET['random']) echo ' random' ?>">
			<div class="bg-overlay-7">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<a role="button" href="<?php $this->print_level_qs('1'); ?>" class="<?php if(!$_GET['level'] || $_GET['level'] == 1)echo  'active' ?>" title="Monographs Only">Easy</a>		
						  	<a role="button" href="<?php $this->print_level_qs('2'); ?>" class="<?php if($_GET['level'] == 2)echo  'active' ?>" title="Monographs and Diacritics">Med</a> 	
						  	<a role="button" href="<?php $this->print_level_qs('3'); ?>" class="<?php if($_GET['level'] == 3)echo  'active' ?>" title="Monographs, Diacritics, Diagraphs">Hard</a>
						  	<?php if($_GET['random'] == 1): ?>
						  	<a role="button" href="<?php $this->print_random_qs('0'); ?>" class="toggle-shuffle" title="Turn Shuffle Off">Un-Shuffle</a>
						  	<?php else: ?>
						  	<a role="button" href="<?php $this->print_random_qs('1'); ?>" class="toggle-shuffle opacity-light" title="Turn Shuffle On">Shuffle</a>
						  	<?php endif ?>
						  	<?php if($show_spacers): ?>
						  	<?php if($_GET['spacers'] == 1): ?>
						  	<a role="button" href="<?php $this->print_spacer_qs('0'); ?>" class="toggle-spacers" title="Hide Spacers">Hide Spacers</a>
						  	<?php else: ?>
						  	<a role="button" href="<?php $this->print_spacer_qs('1'); ?>" class="toggle-spacers opacity-light" title="Show Spacers">Show Spacers</a>
						  	<?php endif ?>
						  	<?php endif ?>
						</div>
					</div>
					<?php if($show_resize): ?>
					<div class="row">
						<div class="col-sm-12" style="padding-top: 3px">
							<a href="<?php $this->print_resize_qs('4') ?>" class="<?php if($_GET['resize'] == 4) echo 'active' ?>">4<span id="r-4" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('5') ?>" class="<?php if($_GET['resize'] == 5) echo 'active' ?>">5<span id="r-5" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('6') ?>" class="<?php if($_GET['resize'] == 6) echo 'active' ?>">6<span id="r-6" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('8') ?>" class="<?php if($_GET['resize'] == 8) echo 'active' ?>">8<span id="r-8" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('10') ?>" class="<?php if($_GET['resize'] == 10) echo 'active' ?>">10<span id="r-10" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('12') ?>" class="<?php if($_GET['resize'] == 12 || !$_GET['resize']) echo 'active' ?>">12<span id="r-12" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('14') ?>" class="<?php if($_GET['resize'] == 14) echo 'active' ?>">14</a>
							<a href="<?php $this->print_resize_qs('16') ?>" class="<?php if($_GET['resize'] == 16) echo 'active' ?>">16<span id="r-16" class="underline-indicator"></span></a>
							<a href="<?php $this->print_resize_qs('20') ?>" class="<?php if($_GET['resize'] == 20) echo 'active' ?>">20</a>
							<a href="<?php $this->print_resize_qs('24') ?>" class="<?php if($_GET['resize'] == 24) echo 'active' ?>">24</a>
							<a href="<?php $this->print_resize_qs('36') ?>" class="<?php if($_GET['resize'] == 36) echo 'active' ?>">36</a>
							<a href="<?php $this->print_resize_qs('48') ?>" class="<?php if($_GET['resize'] == 48) echo 'active' ?>">48</a>
							<a href="<?php $this->print_resize_qs('64') ?>" class="<?php if($_GET['resize'] == 64) echo 'active' ?>">64</a>
						</div>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div>
		<?php
	}

	private function print_blank_char(){
		echo '<div class="character-tile theme-bg-color theme-border-color rounded-8 blank-char">
				<div class="character-bg-overlay rounded-12 bg-overlay">
					<div class="character nihongo theme-border-bottom">&nbsp;</div>
					<div class="character character-alt nihongo theme-border-bottom">&nbsp;</div>
					<div class="translation">&nbsp;</div>
				</div>
			</div>';
	}

	private function print_resize_qs($switch){
		echo '?level=' . $_GET['level'] . '&amp;resize=' . $switch . '&amp;random=' . $_GET['random'] . '&amp;spacers=' . $_GET['spacers'];
	}

	private function print_level_qs($switch){
		echo '?level=' . $switch . '&amp;resize=' . $_GET['resize'] . '&amp;random=' . $_GET['random'] . '&amp;spacers=' . $_GET['spacers'];
	}

	private function print_random_qs($switch){
		echo '?level=' . $_GET['level'] . '&amp;resize=' . $_GET['resize'] . '&amp;random=' . $switch . '&amp;spacers=' . $_GET['spacers'];
	}

	private function print_spacer_qs($switch){
		echo '?level=' . $_GET['level'] . '&amp;resize=' . $_GET['resize'] . '&amp;random=' . $_GET['random'] . '&amp;spacers=' . $switch;
	}
	
	private function shuffle_array(){ 
  		$keys = array_keys($this->_kana_array); 
  		shuffle($keys); 
  		$randomized_array = array(); 
  		foreach($keys as $key) $randomized_array[$key] = $this->_kana_array[$key];
  		$this->_kana_array = $randomized_array; 
	}
}
?>