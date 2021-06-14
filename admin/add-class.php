<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
  if (isset($_POST['creatclass'])) {
	$std = $_POST['standard'];
	$subject_1 = $_POST['subject-1'];
	$subject_2 = $_POST['subject-2'];
	$subject_3 = $_POST['subject-3'];

  	$query = "INSERT INTO `classes`(`standard`, `lang_1`, `lang_2`, `lang_3`) VALUES ('$std', '$subject_1', '$subject_2', '$subject_3');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Class Created!</p>';
  		
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Class Not Created, please input right informations!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Creat Class<small class="text-warning"> Add New Class!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Class</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Class Insert Alert</strong>
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
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="name">Standard</label>
		    <input name="standard" type="text" class="form-control" id="standard" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="roll">Subject-1</label>
		    <input name="subject-1" type="text" value="<?= isset($roll)? $roll: '' ; ?>" class="form-control" id="subject-1" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Subject-2</label>
		    <input name="subject-2" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="subject-2" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="address">Subject-3</label>
		    <input name="subject-3" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="subject-3" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="creatclass" value="Creat Class" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>