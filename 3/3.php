<?php 

function isVowel($str) 
{ 
	$str = strtoupper($str); 
	return $str =='A' || $str =='E' || 
			$str =='I' || $str =='O' || 
			$str =='U'; 
} 

function count_vowel($str) 
{ 
	$result = 0; 
	for ($i = 0; $i < strlen($str); $i++) 
		if (isVowel($str[$i]))
			++$result; 
	return $result; 
} 
echo count_vowel('programmer') . '<br />';
echo count_vowel('hmmm..') . '<br />';


/*

https://www.geeksforgeeks.org/program-count-vowels-string-iterative-recursive/

*/