<?php
	function getPerfectNumber($n){
		if (is_numeric($n)) {
			$k = $n < 0 ? -1 : 1;			
			echo "Досконалі числа до $n:<br>";
			$n = abs($n);			
			for ($i = 2; $i <= $n; $i++) {
				$s = 0;
				for ($j = $i - 1; $j > 0; $j--) {
					if (($i % $j) == 0) { $s += $j; }   
				}
				if ($s == $i) {
					$s *= $k; 
					echo "$s<br>";
				} 
			}
		} else {
			echo "$n не є цілим числом";
		}	
	}
	getPerfectNumber($_POST["data"]);
?>