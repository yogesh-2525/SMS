<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    
  if (isset($_POST['updateclass'])) {
    $std = $_POST['standard'];
	$subject_1 = $_POST['subject-1'];
	$subject_2 = $_POST['subject-2'];
	$subject_3 = $_POST['subject-3'];

  	$query = "UPDATE `classes` SET `standard`='$std',`lang_1`='$subject_1',`lang_2`='$subject_2',`lang_3`='$subject_3' WHERE `class_id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Class Updated!</p>';
  		header('Location: index.php?page=all-class&edit=success');
  	}else{
  		header('Location: index.php?page=all-class&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Edit Class Informations!<small class="text-warning"> Edit Class!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Class </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Class Info</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT * FROM `classes` WHERE `class_id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
            $old_std = $row['standard'];
            $lang_1 = $row['lang_1'];
            $lang_2 = $row['lang_2'];
            $lang_3 = $row['lang_3'];
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
		    <label for="name">Standard</label>
		    <input name="standard" type="text" class="form-control" id="standard" value="<?php echo $old_std; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Subject-1</label>
		    <input name="subject-1" type="text" value="<?php echo $lang_1; ?>" class="form-control" id="subject-1" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Subject-2</label>
		    <input name="subject-2" type="text" value="<?php echo $lang_2; ?>" class="form-control" id="subject-2" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Subject-3</label>
		    <input name="subject-3" type="text" value="<?php echo $lang_3; ?>" class="form-control" id="subject-3" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updateclass" value="Update Class" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>