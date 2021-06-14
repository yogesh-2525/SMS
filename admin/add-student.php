<?php
$corepage = explode('/', $_SERVER['PHP_SELF']);
$corepage = end($corepage);
if ($corepage !== 'index.php') {
    if ($corepage == $corepage) {
        $corepage = explode('.', $corepage);
        header('Location: index.php?page=' . $corepage[0]);
    }
}

if (isset($_POST['addstudent'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $address = $_POST['address'];
    $pcontact = $_POST['pcontact'];
    $class = $_POST['class_id'];
    $arr = (explode(" ", $class));
    $class_std = $arr[1];
    $class_id = $arr[0];

    $photo = explode('.', $_FILES['photo']['name']);
    $photo = end($photo);
    $photo = $roll . date('Y-m-d-m-s') . '.' . $photo;

    $query = "INSERT INTO `students`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`, `std`, `marks`) VALUES ('$name', '$roll', '$class_std', '$address', '$pcontact','$photo', '$class_id', 1);";
    if (mysqli_query($db_con, $query)) {
        $datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo);
    } else {
        $datainsert['inserterror'] = '<p style="color: red;">Student Not Inserted, please input right informations!</p>';
        die('uery Failed' . mysqli_error($db_con));
    }
}
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Student<small class="text-warning"> Add New Student!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>

<div class="row">

<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Student Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php
if (isset($datainsert['insertsucess'])) {
    echo $datainsert['insertsucess'];
}
    if (isset($datainsert['inserterror'])) {
        echo $datainsert['inserterror'];
    }
    ?>
	  </div>
	</div>
		<?php }?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Student Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?=isset($name) ? $name : '';?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Student Roll</label>
		    <input name="roll" type="text" value="<?=isset($roll) ? $roll : '';?>" class="form-control" pattern="[0-9]{2}" id="roll" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Student Address</label>
		    <input name="address" type="text" value="<?=isset($address) ? $address : '';?>" class="form-control" id="address" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="pcontact">Parant Contact No</label>
		    <input name="pcontact" type="text" class="form-control" id="pcontact" value="<?=isset($pcontact) ? $pcontact : '';?>" pattern="[0-9]{10}" placeholder="" required="">
			<!--  pattern="01[5|6|7|8|9][0-9]{10}" -->
	  	</div>
	  	<div class="form-group">
		    <label for="class">Student Class</label>
		    <select name="class_id" class="form-control" id="class" required="">
		    	<option value="" disabled selected>Select Class</option>
				<?php
				$query = "SELECT * FROM classes";
				$result = mysqli_query($db_con, $query);
				while ($row = mysqli_fetch_assoc($result)) {
    			$std = $row['standard'];
    			$class_id = $row['class_id'];?>
				<option value="<?php echo $class_id . ' '; ?><?php echo $std; ?>"><?php echo $std; ?></option>
				<?php	}?>
		    </select>
			<div class="container">
			<div class="row">
				<table class="table table-borderless table-sm text-center" id="table_data">

				</table>
			</div>
			</div>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addstudent" value="Add Student" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>
