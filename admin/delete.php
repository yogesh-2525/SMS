
<?php 
session_start();
if (isset($_SESSION['user_login'])) {

	$id = base64_decode($_GET['id']);
	$photo = base64_decode($_GET['photo']);
	if(mysqli_query($db_con,"DELETE FROM `students` WHERE `id` = '$id'")){
		unlink('images/'.$photo);
		header('Location: index.php?page=all-student&delete=success');
	}else{
		header('Location: index.php?page=all-student&delete=error');
	}

	$class_id = base64_decode($_GET['id']);
	if(mysqli_query($db_con,"DELETE FROM `classes` WHERE `class_id` = '$class_id'")){
		header('Location: index.php?page=all-class&delete=success');
	}else{
		header('Location: index.php?page=all-class&delete=error');
	}
}else{
	header('Location: login.php');
 }
