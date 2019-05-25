<?php 

function betweenDays($tgl1='', $tgl2='')
{

	$awal  = date('d',strtotime($tgl1));
	$tgl1  = new DateTime($tgl1);
	$tgl2  = new DateTime($tgl2);
	$akhir = $tgl1->diff($tgl2)->d + 1; 
	
	$result = '';
	for ($i=$awal; $i <= $akhir ; $i++) { 
		$result .= "'".date('Y-m-'.$i)."',";
	}

	return rtrim($result, ',');
	

}


echo betweenDays('2019-11-01','2019-11-05');

/*
https://www.php.net/manual/en/datetime.diff.php
*/