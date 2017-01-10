<?php
define('PUNCTUATION', ' \t\n?;,.');
function countSimpleNumbers($numbersStr) {	
	$k = 0;
	$x = 0;
	$absX = 0;
	$isSimple = false;
	$s = strtok($numbersStr, PUNCTUATION);	
	while($s) {		
		$x = intval($s);
		$absX = abs($x);
		$s = strtok(PUNCTUATION);
		if ($absX < 3) continue;
		$isSimple = true;
		for ($j = $absX - 1; $j > 1; $j--) {
			if (($x % $j) == 0) {
				$isSimple = false;
				break;
			}
		}
		if ($isSimple) { 
			$k++; 
			echo "$x ";
		}				
	}	
	return $k;
}
$digitsStr = $_POST["data"];
echo "Для чисел, більших 2: $digitsStr<br>простими є: ";
$n = countSimpleNumbers($digitsStr);
echo "<br>Кількість простих чисел рівна $n<br>";
?>