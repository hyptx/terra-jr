<?php 
/**
* KanaGenerator
*/
class KanaGenerator{
	private $_kana_array,$_character_count;
	public function __construct(){
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
			['ゝ', 'ゝ', 'rduv', '', '', 		'Monographs(Gojūon)', '*', '*'],
			['ゞ', 'ゞ', 'rdv', '', '', 		'Monographs(Gojūon)', '*', '*'],
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
		$this->_character_count = count($this->_kana_array);
		if($_GET['random'] == 1) $this->shuffle_flashcards();
	}

	public function print_flashcards(){ ////[] = Hiragana[0],Katakana[1],Hepburn[2],Nihon-shiki[3],Kunrei-shiki[4],section[5],consonant[6],vowel[7]
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
			?>
			<div class="item<?php echo $active ?> flashcard"> 
				<div class="character-section">
					<span class="character han character-hiragana text-150 theme-border-bottom"><?php echo $kana[0] ?></span>
					<span class="character han character-katakana text-150 theme-border-bottom"><?php echo $kana[1] ?></span>
				</div>
				<div class="translation-section">
					<?php if($kana[3]) echo '<div class="romanji-alt nihon-alt"><span class="opacity-light">Nihon</span><br><span class="uppercase bold">' .  $kana[3] . '</span></div>';	?>
					<span class="translation uppercase text-64"><?php echo $translation ?></span>
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
							<a href="https://en.wikipedia.org/wiki/<?php echo $kana[0] ?>" target="_blank" title="Kana Info" class="kana-indicator main-indicator"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Hiragana</a><a href="https://en.wikipedia.org/wiki/<?php echo $kana[1] ?>" target="_blank" title="Kana Info" class="kana-indicator reverse-kana-indicator"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Katakana</a>
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
			if($i == 0) echo '<li data-target="#flashcard-swipe" data-slide-to="0" class="active han" title="' . $kana[2] . '">' . $kana[0] . '</li>';
			else echo '<li data-target="#flashcard-swipe" data-slide-to="' . $i . '" class="han" title="' . $kana[2] . '">' . $kana[0] . '</li>';
			$i++;
		}
		echo '</ol>';
	}

	private function shuffle_flashcards(){ 
  		$keys = array_keys($this->_kana_array); 
  		shuffle($keys); 
  		$randomized_array = array(); 
  		foreach($keys as $key) $randomized_array[$key] = $this->_kana_array[$key];
  		$this->_kana_array = $randomized_array; 
	}
}
?>