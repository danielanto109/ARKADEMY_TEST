<?php

function cetek_gambar($number)
{
	$cek = $number % 2;
	if ($cek != 1) {
		return 'Bukan bilangan ganjil!';
	}

    $result = "";

    for ($i=0; $i <= $number; $i++) { 
        for($j = 1;$j < $number;$j++){
        	if ($i == 0) {
        		$result .= ' X ';
        	}else{
        		if ($j == round($number / 2)) {
        			$result .= ' X ';
        		}
        		if ($i == $number) {
        			$result .= ' X ';
        		}else{
        			$result .= ' = ';
        		}
        	}
        }
        if ($i == 0) {
        	$result .= ' X ';
        }
        $result .="<br>";
    }
    return $result;
}

echo '<center>'.cetek_gambar(5).'</center><br />';
echo '<center>'.cetek_gambar(7).'</center>';

?>