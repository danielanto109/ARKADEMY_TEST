<?php 

function get_skills($id='')
{
	include 'inc/db.php';
	$sql = "SELECT name,id FROM skills WHERE user_id = '$id'";
	$query = mysqli_query($conn, $sql);
	$data = mysqli_fetch_all($query,MYSQLI_ASSOC);


	$result = '';
	if (mysqli_num_rows($query) > 0 ) {
		foreach ($data as $item) {
			$result .=
			'<a href="?page=deleteSkill&id='.$item['id'].'" 
				onclick="return confirm(\'Yakin?\')"
			title="Delete ?">'.$item['name'].'</a>'.', ';
		}	
	}else{
		$result = '<em>BELUM MEMILIKI SKILL</em>';
	}
	return rtrim($result, ', ');
}
