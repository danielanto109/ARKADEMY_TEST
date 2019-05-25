<?php 

$name   	= 'Mahesa Ibrahim';
$address 	= 'Ds. Pasir Angin RT 02/04 Cileungsi Bogor 16820';
$hobbies	= ['Menulis kode', 'Bermain Dota'];
$is_married = false;
$school		= new stdClass();
$school->highSchool = 'SMK BINA MANDIRI MULTIMEDIA';
$school->university = '-';
$skills = [ (object) [
				'name' => 'OOP', 
				'score' => 75
			],
			[
				'name' => 'Android', 
				'score' => 70
			],
			[
				'name' => 'Web', 
				'score' => 80
			],
			[
				'name' => 'Dekstop', 
				'score' => 70
			]

		];

echo json_encode([
        'name' => $name,
        'address' => $address,
        'hobbies' => $hobbies,
        'is_married' => $is_married,
        'school' => $school,
        'skills' => $skills
 ], JSON_PRETTY_PRINT);

/*
https://stackoverflow.com/questions/3707722/how-to-build-arrays-of-objects-in-php-without-specifying-an-index-number
*/