<?php
define('PUNCTUATION', ' \t\n!?;,.');

function removeLongestWord($string) {	
	$wordLength = 0;
	$word = strtok($string, PUNCTUATION);
	$longestWord = $word;
	$longestWordLength = strlen($longestWord);    
	while($word) {
		$word = strtok(PUNCTUATION);				
		$wordLength = strlen($word);
		if ($wordLength > $longestWordLength) {
			$longestWord = $word;
			$longestWordLength = $wordLength;			
		}
	}
	return str_replace($longestWord, "", $string);	
}

$text = $_POST["data"];
$newText = removeLongestWord($text );
echo "<u>Ви ввели:</u><br>$text<br><br>";
echo "<u>Після вилучення найдовшого слова (слів):</u><br>$newText<br>";
?>