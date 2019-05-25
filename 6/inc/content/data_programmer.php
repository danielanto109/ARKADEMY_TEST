<?php ob_start(); 
$sql = "SELECT u.name, u.id 
FROM user u ORDER BY id DESC";

$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
	$edit = true;
	$id = $_GET['id'];
	$sql = "SELECT u.name, u.id 
	FROM user u WHERE u.id = '$id'";

	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($query);
}

if (isset($_POST['input'])) {
	$id = $_POST['id'];
	$skill = $_POST['skill'];
	$sql = "INSERT INTO skills (name,user_id) 
			VALUES ('".$skill."', '".$id."')";
	if (mysqli_query($conn,$sql)) {
		$result = '<div class="alert alert-success">
                      Berhasil!
                   </div>';
	}else{
		$result = '<div class="alert alert-danger">
                      Gagal! '.$conn->error.'
                   </div>';
	}
}


if (isset($_POST['programmer'])) {
	$name = $_POST['name'];
	$sql = "INSERT INTO user (name) 
			VALUES ('".$name."')";
	if (mysqli_query($conn,$sql)) {
		echo "<script>alert('Sukses!');location.assign('?page=data_programmer')</script>";
	}else{
		$result = '<div class="alert alert-danger">
                      Gagal! '.$conn->error.'
                   </div>';
	}
}

if (isset($_POST['editprogrammer'])) {
	$id = $_GET['id'];
	$name = $_POST['name'];
	$sql = "UPDATE user SET name = '".$name."' WHERE id = '$id'";
	if (mysqli_query($conn,$sql)) {
		echo "<script>alert('Sukses!');location.assign('?page=data_programmer')</script>";
	}else{
		$result = '<div class="alert alert-danger">
                      Gagal! '.$conn->error.'
                   </div>';
	}
}
?>

<div class="col mt-5">
	<?php if (isset($edit)): ?>
		<h2 class="text-center">Edit Programmer</h2>
		<?php else: ?>
			<h2 class="text-center">Input Programmer</h2>
	<?php endif ?>
        <form method="post">
        	<div class="form-group">
	          <input class="form-control" type="text" name="name" value="<?= isset($edit) ?  $row['name']  : ''  ?>" placeholder="Tambah Programmer">
        	</div>
    	    <?php if (isset($edit)): ?>
    	    	<button class="btn btn-danger btn-block" type="submit" name="editprogrammer">Edit</button>
    	    	<a href="?page=data_programmer" class="btn btn-warning btn-block">Baral</a>
    	    <?php else: ?>
    	    	<button class="btn btn-danger btn-block" type="submit" name="programmer">Input</button>
    	    <?php endif ?>
        </form>
</div>
<div class="col mt-5">
	<h2 class="text-center">Data Programmer</h2>
	<?= isset($result) ? $result : '' ?>
	<div class="table-responsive">
		<table class="table">
				<?php foreach ($data as $item): ?>
					<tr>
						<td><h3><a href="?page=data_programmer&id=<?= $item['id']  ?>" ><?= $item['name']  ?></a></h3>
							<a href="?page=deleteProgrammer&id=<?= $item['id']  ?>"><span class="badge badge-danger" onclick="return confirm('Yakin?')">Hapus</span></a>
							<hr>
							<p>Skills: <?= get_skills($item['id'])  ?></p>
						</td>
						<td colspan ="2">
        <form method="post">
          <input type="hidden" name="id" value="<?= $item['id']  ?>">
          <div class="form-group">
          	<input class="form-control" type="text" name="skill" placeholder="Tambah Skill">
          </div>
          <button class="btn btn-success btn-block" type="submit" name="input">Input</button>
        </form>
						</td>
					</tr>


				<?php endforeach ?>
		</table>
	</div>
</div>

<?php $data_programmer = ob_get_clean(); ?>