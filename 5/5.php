<?php 

function ganti_kata($str='',$search='',$replace='')
{
	$result = '';
	for ($i=0; $i < strlen($str); $i++) { 
		if (substr($str, $i,1) == $search) {
			$result .= $replace;
		}else{
			$result .= substr($str, $i,1);
		}
	}
	return $result;
}

var_dump(ganti_kata('purwakarta', 'a', 'o'));
