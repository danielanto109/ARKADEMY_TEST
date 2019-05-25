<?php ob_start();				
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id) {
	$sql = "DELETE FROM user WHERE id = $id";
	if (mysqli_query($conn,$sql)) {
		echo "<script>alert('Sukses!');location.assign('?page=data_programmer')</script>";
	}
}	

$deleteProgrammer = ob_get_clean();